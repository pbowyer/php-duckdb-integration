<?php
declare(strict_types=1);

use Maple\DuckDB\DuckDB;
use PHPUnit\Framework\TestCase;

class BasicQueryTest extends TestCase
{
    public function testQueryWorks()
    {
        error_reporting(E_ALL);

        $db = new DuckDB(':memory:', $_ENV['TEST_DUCKDB_LIBRARY']);

        $db->query('CREATE TABLE IF NOT EXISTS test_table (i INTEGER, j INTEGER, k VARCHAR)');

        $db->query("INSERT INTO test_table VALUES (3, 4, 'FOO'), (5, 6, 'BAR'), (7, NULL, 'BAZ')");

        $result = $db->query('SELECT * FROM test_table');
        print_r($result);
    }
}
