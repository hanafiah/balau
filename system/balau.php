<?php
use System\Router;
use System\Balau;
use System\Config;

Config::load();

$route = new Router();
include APP . 'config' . DIRECTORY_SEPARATOR . 'routes.php';
$route->run();