<?php

use System\Route;

//echo ' PUBLIC : ' . PB;
//echo '<br/>';
//echo ' BASE : '.BASE;
//echo '<br/>';
//echo ' APP : '.APP;
//echo '<br/>';
//echo ' SYS : '.SYS;


$ayam = function() {
            echo 'ayam man';
        };
$route = new Route();
echo '<pre>';
$route->register('get', '/controller/method/(:all)/(:all),/kuku/(:num)', function($ayam=9, $itik=0, $kacang=200) {
            echo 'cicakman : ' . $ayam . ' : ' . $itik . ' : ' . $kacang;
        });

$route->register('get', '/ayam', $ayam);
$route->register('get', '/itik/(:all)', 'cobaan@aeyam');

$route->run();

//print_r($route->getRoutes());
//
//
//print_r(parse_url($_SERVER['REQUEST_URI']));
echo '</pre>';
?>
