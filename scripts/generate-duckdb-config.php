<?php
declare(strict_types=1);

use Maple\DuckDB\DuckDB;

require_once __DIR__ . '/../vendor/autoload.php';

$_ENV['TEST_DUCKDB_LIBRARY'] = "/opt/homebrew/Cellar/duckdb/0.5.1/lib/libduckdb.dylib";

$db = new DuckDB(':memory:', $_ENV['TEST_DUCKDB_LIBRARY']);
$config = $db->getConfigOptions();

$data = '';
foreach ($config as $name => $description) {
    $data .= <<<QQQ
/*
     * $description
     */
    public string \$$name;
    
QQQ;
}

$class = <<<QQQ
<?php

namespace Maple\DuckDb;

class Configuration
{
$data
}
QQQ;


file_put_contents(__DIR__ . '/../src/Configuration.php', $class);
