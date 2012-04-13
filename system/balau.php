<?php

$route = new \System\Router();
include APP . 'config' . DIRECTORY_SEPARATOR . 'routes.php';
$route->run();