<?php


$route->register('get', '/hello_world', 'hello_world@index');
$route->register('get', '/hello', 'sub__hello@index');

$route->register('get', '/hello/(:any)', function($user) {
            echo '<h2>', 'Hi ', $user, '</h2>';
        });


