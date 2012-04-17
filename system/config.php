<?php

namespace System;

class Config {
    
    public static $cache = array();
    
    public static function load(){
        $config = APP . DIRECTORY_SEPARATOR . 'config/config.php';
        if(is_readable($config)){
            static::$cache = array_merge(static::$cache, require $config);
        }
        
        //load development config if exist
        $config = APP . DIRECTORY_SEPARATOR . 'config/config_development.php';
        if(is_readable($config)){
            static::$cache = array_merge(static::$cache, require $config);
        }
    }
    
    public static function get($key){
        return static::$cache[$key];
    }
}