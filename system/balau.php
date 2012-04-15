<?php
use System\Router;
use System\Balau;


$route = new Router();
include APP . 'config' . DIRECTORY_SEPARATOR . 'routes.php';
$route->run();