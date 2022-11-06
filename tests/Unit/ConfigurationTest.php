<?php
declare(strict_types=1);

use Maple\DuckDB\DuckDB;
use PHPUnit\Framework\TestCase;

class ConfigurationTest extends TestCase
{
    public function testQueryWorks()
    {
        error_reporting(E_ALL);

        $db = new DuckDB(':memory:', $_ENV['TEST_DUCKDB_LIBRARY'], __DIR__.'/../../duckdb0.5.1.h');
        print_r($db->getConfigOptions());
    }
}
