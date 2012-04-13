<?php

$ayam = function() {
            echo 'ayam man';
        };


$route->register('get', '/controller/method/(:all)/(:all),/kuku/(:num)', function($ayam = 9, $itik = 0, $kacang = 200) {
            echo 'cicakman : ' . $ayam . ' : ' . $itik . ' : ' . $kacang;
        });

$route->register('get', '/ayam', $ayam);
$route->register('get', '/itik/(:all)', 'itik_itik_cobaan@ayam');
$route->register('get', '/test', 'ayam_ayam@test');


