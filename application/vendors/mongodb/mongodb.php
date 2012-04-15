<?php

namespace Application\Vendors\Mongodb;

class mongodb {

    private static $instance = array();

    private function __construct() {
        
    }

    public static function get_instance($connections = '') {

        if (empty(self::$instance[md5($connections)])) {
            self::$instance[md5($connections)] = new \Mongo($connections);
        }
        return self::$instance[md5($connections)];
    }

}

?>
