<?php

/**
 * Description of route
 *
 * @author user
 */

namespace System;

use Closure;

class Route {

    /**
     * store all request info
     */
    private $_request = array();

    /**
     * store all routes
     * @var type 
     */
    private $_routes = array();
    private $_method = array('GET', 'POST', 'PUT', 'DELETE');
    public $patterns = array(
        '(:num)' => '([0-9]+)',
        '(:any)' => '([a-zA-Z0-9\.\-_%]+)',
        '(:all)' => '(.*)',
    );
    public $optional = array(
        '/(:num?)' => '(?:/([0-9]+)',
        '/(:any?)' => '(?:/([a-zA-Z0-9\.\-_%]+)',
        '/(:all?)' => '(?:/(.*)',
    );

    /**
     * Function to get HTTP headers
     */
    private function getHeaders() {
        $headers = array();
        $keys = preg_grep('{^HTTP_}i', array_keys($_SERVER));
        foreach ($keys as $val) {
            $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($val, 5)))));
            $headers[$key] = $_SERVER[$val];
        }
        return $headers;
    }

    public function register($method, $route, $action) {

        if (is_string($route))
            $route = explode(',', $route);

        foreach ((array) $route as $uri) {
            if ($method == '*') {
                foreach ($this->_method as $method) {
                    $this->register($method, $route, $action);
                }

                continue;
            }
            $this->_routes[strtoupper($method)][trim($uri)] = $action;
        }

        return $this;
    }

    public function match($route, $uri) {
//        $search= array_keys($this->optional);
//        $replace= array_values($this->optional);
//        $route = str_replace($search, $replace, $route, $count);
//        if ($count > 0) {
//            $route .= str_repeat(')?', $count);
//        }

        $search = array_keys($this->patterns);
        $replace = array_values($this->patterns);
        $route = str_replace($search, $replace, $route);
        $pattern = '#^' . $route . '#';
        if (preg_match($pattern, $uri, $parameters)) {
            return array_slice($parameters, 1);
        }else{
            return false;
        }
    }

    public function run() {
        $this->_request['method'] = strtoupper($_SERVER['REQUEST_METHOD']);
        $this->_request['headers'] = $this->getHeaders();
        $this->_request['path'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        //get input
        switch ($this->_request['method']) {
            case 'GET':
                $this->_request['params'] = $_GET;
                break;
            case 'POST':
                $this->_request['params'] = $_POST; //array_merge($_POST, $_GET);
                break;
            case 'PUT':
                parse_str(file_get_contents('php://input'), $this->_request['params']);
                break;
            case 'DELETE':
                $this->_request['params'] = $_GET;
                break;
            default:
                break;
        }

//        echo '<pre>';
//        print_r($this->_routes);
//        echo '</pre>';

        foreach ($this->_routes['GET'] as $key => $callback) {
            //echo $row;
            $match = $this->match($key, $this->_request['path']);
            if ($match !== false) {
                if (is_string($callback)) {
//                    echo 'string : '. $callback;
                    Controller::call($callback,$match);
                    //call_user_func_array(array($callback),$match);
                } elseif ($callback instanceof Closure) {
                    //echo 'closure';
                    call_user_func_array($callback,$match);
                }
//                echo '"' . $key . '"', ' -> ', '"' . $this->_request['path'] . '"';
//                echo '<br/>match<hr>';
//                echo '<pre>';
//                print_r($match);
//                echo '</pre>';
            }
        }

        return $this;
    }

    public function getRequest() {
        return $this->_request;
    }

    public function getRoutes() {
        return $this->_routes;
    }

}

