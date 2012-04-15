<?php

namespace System;


class Controller {

    private $_viewFile;
    private $_loadView = true;
    public $db;

    public function __construct() {
        if ($this->_loadView === true) {
            echo '<br/>' . $this->_viewfile = get_class();
        }
    }

    public function __call($method, $parameters) {
        echo '404';
    }

    public function call($destination, $parameters = array()) {
        //@TODO : search if @ exist. if not, just append index as method
        list($controller, $method) = explode('@', $destination);
        $action = "{$method}Action";
        if (is_callable(array($controller, $action), false, $callable_name)) {
            call_user_func_array(array($controller, 'beforeAction'), $parameters);
            call_user_func_array(array($controller, $action), $parameters);
            call_user_func_array(array($controller, 'afterAction'), $parameters);
        } else {
            echo '404 : ' . $callable_name;
        }
    }

    public function beforeAction() {
        
    }

    public function afterAction() {
        
    }

    public function view($viewFile, $viewData = array()) {
        $classPath = explode('_', get_called_class());
        if (count($classPath) > 1) {
            array_pop($classPath);
        }
        $classPath = implode(DIRECTORY_SEPARATOR, $classPath);
        $publicViewFile = APP . 'views' . DIRECTORY_SEPARATOR . $viewFile . '.php';
        $childViewFile = APP . 'modules' . DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $viewFile . '.php';

        extract($viewData);
        if (is_readable($childViewFile)) {
            include ($childViewFile);
        } elseif (is_readable($publicViewFile)) {
            include ($publicViewFile);
        } else {
            echo $viewFile . ' not found';
        }
    }

    public function getViewFile() {
        return $this->_viewFile;
    }

    public function model($modelName) {
        include (APP . 'models' . DIRECTORY_SEPARATOR . $modelName . '.php');
        
        return new $modelName;
    }

}

