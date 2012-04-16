<?php

/**
 *  Autoload using psr-0 standard
 *  
 */
function psr0($className) {
    
    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    require BASE.$fileName;
}

function generalAutoload($className) {
    $filename = $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

function modulesAutoload($className) {
    //convert class name with underscode to DIRECTORY_SEPARATOR
    $className = str_replace('__', DIRECTORY_SEPARATOR, $className);
    $filename = APP."modules/" . $className . ".php";
    if (is_readable($filename)) {
        require $filename;
    }
}

//spl_autoload_register("generalAutoload");
spl_autoload_register("modulesAutoload");
spl_autoload_register("psr0");