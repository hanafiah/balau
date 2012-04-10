<?php

namespace System;

use System\Route;
use System\Balau;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controller
 *
 * @author user
 */
abstract class Controller {

    private $_viewFile;
    private $_loadView = true;

    public function __construct() {
        if ($this->_loadView === true) {
            echo '<br/>' . $this->_viewfile = get_class();
        }
    }

    public function __call($method, $parameters) {
        echo '404';
    }

    public function call($destination, $parameters = array()) {
        //search if @ exist. if not, just append index as method
        list($controller, $method) = explode('@', $destination);
//        echo $controller . ' : ' . $method;
        $action = "action_{$method}";
        if (is_callable(array($controller, $action), false, $callable_name)) {
            $response = call_user_func_array(array($controller, $action), $parameters);
        } else {
            echo '404 : '.$callable_name;
        }
    }

    public function beforeAction() {
        
    }

    public function afterAction() {
        
    }

    public function getViewFile() {
        return $this->_viewFile;
    }

}

