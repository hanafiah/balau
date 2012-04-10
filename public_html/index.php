<?php

/**
 * --------------------------------------------------------------
 * Start timer
 * --------------------------------------------------------------
 */
ob_start();
define('BALAU_START', microtime(true));

/**
 * --------------------------------------------------------------
 * Load all path setting
 * --------------------------------------------------------------
 */
require '../paths.php';

/**
 * --------------------------------------------------------------
 * Load all config
 * --------------------------------------------------------------
 */
require APP . 'config'.DIRECTORY_SEPARATOR.'config.php';

/**
 * --------------------------------------------------------------
 * Start balau
 * --------------------------------------------------------------
 */
require SYS . 'balau.php';

function echo_memory_usage() {
    $mem_usage = memory_get_usage(true);

    if ($mem_usage < 1024)
        echo $mem_usage . " bytes";
    elseif ($mem_usage < 1048576)
        echo round($mem_usage / 1024, 2) . " kilobytes";
    else
        echo round($mem_usage / 1048576, 2) . " megabytes";

    echo "<br/>";
}
echo echo_memory_usage();
echo microtime(true) - BALAU_START;
ob_flush();