<?php

namespace Maple\DuckDB;

use Maple\DuckDB\Error\Exception;

class DuckDB
{
    private \FFI $ffi;
    private \FFI\CData $db;
    private \FFI\CData $conn;

    public function __construct(string $databasePath, string $libraryPath, string $headersPath = null)
    {
        if (!$headersPath) {
            $headersPath = __DIR__.'/../data/duckdb0.5.1.h';
        }
        $this->ffi = \FFI::cdef(file_get_contents($headersPath), $libraryPath);

        $this->db = $this->ffi->new('duckdb_database');
        $this->conn = $this->ffi->new('duckdb_connection');

        $error = $this->ffi->duckdb_open($databasePath, \FFI::addr($this->db));
        if ($error) {
            throw new Exception('error open: ' . $databasePath);
        }

        $error = $this->ffi->duckdb_connect($this->db, \FFI::addr($this->conn));
        if ($error) {
            throw new Exception('error connect');
        }
    }

    public function __destruct()
    {
        $this->ffi->duckdb_disconnect(\FFI::addr($this->conn));
        $this->ffi->duckdb_close(\FFI::addr($this->db));
        \FFI::free($this->conn);
        \FFI::free($this->db);
        unset($this->ffi);
    }

    public function getConfigOptions(): array
    {
        $count = $this->ffi->duckdb_config_count();

        $name = $this->ffi->new('char*');
        $description = $this->ffi->new('char*');
        $options = [];
        for ($i = 0; $i < $count; $i++) {
            $this->ffi->duckdb_get_config_flag($i, \FFI::addr($name), \FFI::addr($description));
            $options[\FFI::string($name)] = \FFI::string($description);
        }
        return $options;
    }

    public function query(string $query): array
    {
        $result = $this->ffi->new('duckdb_result');

        $error = $this->ffi->duckdb_query($this->conn, $query, \FFI::addr($result));
        if ($error) {
            $message = \FFI::string($result->error_message);

            $this->ffi->duckdb_destroy_result(\FFI::addr($result));

            throw new Exception($message);
        }

        $data = [];
        $columns = [];

        for ($col = 0; $col < $this->ffi->duckdb_column_count(\FFI::addr($result)); $col++) {
            $columns[] = $this->ffi->duckdb_column_name(\FFI::addr($result), $col);

            for ($row = 0; $row < $this->ffi->duckdb_row_count(\FFI::addr($result)); $row++) {
                $value = $this->ffi->duckdb_value_varchar(\FFI::addr($result), $col, $row);
                if ($value === null) {
                    $data[$row][$columns[$col]] = $value;
                } else {
                    $data[$row][$columns[$col]] = \FFI::string($value);
                    \FFI::free($value);
                }
            }
        }

        $this->ffi->duckdb_destroy_result(\FFI::addr($result));

        return $data;
    }
}
