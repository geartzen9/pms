<?php

/**
 * @var $router Router
 */

use App\Core\Router;

$router->get('', 'HomeController@index');
$router->get('login', 'LoginController@index');