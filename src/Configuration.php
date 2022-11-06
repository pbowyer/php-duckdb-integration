<?php

namespace Maple\DuckDb;

class Configuration
{
    /*
     * Access mode of the database (AUTOMATIC, READ_ONLY or READ_WRITE)
     */
    public string $access_mode;
    /*
     * The WAL size threshold at which to automatically trigger a checkpoint (e.g. 1GB)
     */
    public string $checkpoint_threshold;
    /*
     * DEBUG SETTING: trigger an abort while checkpointing for testing purposes
     */
    public string $debug_checkpoint_abort;
    /*
     * DEBUG SETTING: force out-of-core computation for operators that support it, used for testing
     */
    public string $debug_force_external;
    /*
     * DEBUG SETTING: Force disable cross product generation when hyper graph isn't connected, used for testing
     */
    public string $debug_force_no_cross_product;
    /*
     * DEBUG SETTING: add additional blocks to the free list
     */
    public string $debug_many_free_list_blocks;
    /*
     * DEBUG SETTING: switch window mode to use
     */
    public string $debug_window_mode;
    /*
     * The collation setting used when none is specified
     */
    public string $default_collation;
    /*
     * The order type used when none is specified (ASC or DESC)
     */
    public string $default_order;
    /*
     * Null ordering used when none is specified (NULLS_FIRST or NULLS_LAST)
     */
    public string $default_null_order;
    /*
     * DEBUG SETTING: disable a specific set of optimizers (comma separated)
     */
    public string $disabled_optimizers;
    /*
     * Allow the database to access external state (through e.g. loading/installing modules, COPY TO/FROM, CSV readers, pandas replacement scans, etc)
     */
    public string $enable_external_access;
    /*
     * Allow to load extensions with invalid or missing signatures
     */
    public string $allow_unsigned_extensions;
    /*
     * Whether or not object cache is used to cache e.g. Parquet metadata
     */
    public string $enable_object_cache;
    /*
     * Enables profiling, and sets the output format (JSON, QUERY_TREE, QUERY_TREE_OPTIMIZER)
     */
    public string $enable_profiling;
    /*
     * Enables the progress bar, printing progress to the terminal for long queries
     */
    public string $enable_progress_bar;
    /*
     * Output of EXPLAIN statements (ALL, OPTIMIZED_ONLY, PHYSICAL_ONLY)
     */
    public string $explain_output;
    /*
     * The number of external threads that work on DuckDB tasks.
     */
    public string $external_threads;
    /*
     * A comma separated list of directories to search for input files
     */
    public string $file_search_path;
    /*
     * DEBUG SETTING: forces a specific compression method to be used
     */
    public string $force_compression;
    /*
     * Sets the home directory used by the system
     */
    public string $home_directory;
    /*
     * Specifies the path to which queries should be logged (default: empty string, queries are not logged)
     */
    public string $log_query_path;
    /*
     * The maximum expression depth limit in the parser. WARNING: increasing this setting and using very deep expressions might lead to stack overflow errors.
     */
    public string $max_expression_depth;
    /*
     * The maximum memory of the system (e.g. 1GB)
     */
    public string $max_memory;
    /*
     * The maximum memory of the system (e.g. 1GB)
     */
    public string $memory_limit;
    /*
     * Null ordering used when none is specified (NULLS_FIRST or NULLS_LAST)
     */
    public string $null_order;
    /*
     * Threshold in bytes for when to use a perfect hash table (default: 12)
     */
    public string $perfect_ht_threshold;
    /*
     * Whether or not to preserve the identifier case, instead of always lowercasing all non-quoted identifiers
     */
    public string $preserve_identifier_case;
    /*
     * Whether or not to preserve insertion order. If set to false the system is allowed to re-order any results that do not contain ORDER BY clauses.
     */
    public string $preserve_insertion_order;
    /*
     * Sets the profiler history size
     */
    public string $profiler_history_size;
    /*
     * The file to which profile output should be saved, or empty to print to the terminal
     */
    public string $profile_output;
    /*
     * The profiling mode (STANDARD or DETAILED)
     */
    public string $profiling_mode;
    /*
     * The file to which profile output should be saved, or empty to print to the terminal
     */
    public string $profiling_output;
    /*
     * Sets the time (in milliseconds) how long a query needs to take before we start printing a progress bar
     */
    public string $progress_bar_time;
    /*
     * Sets the default search schema. Equivalent to setting search_path to a single value.
     */
    public string $schema;
    /*
     * Sets the default search search path as a comma-separated list of values
     */
    public string $search_path;
    /*
     * Set the directory to which to write temp files
     */
    public string $temp_directory;
    /*
     * The number of total threads used by the system.
     */
    public string $threads;
    /*
     * The WAL size threshold at which to automatically trigger a checkpoint (e.g. 1GB)
     */
    public string $wal_autocheckpoint;
    /*
     * The number of total threads used by the system.
     */
    public string $worker_threads;

}
