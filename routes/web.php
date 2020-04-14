<?php

/**
 * @var $router Router
 */

use App\Core\Router;

// Home page route.
$router->get('', 'HomeController@index');

// User routes
$router->get('login', 'LoginController@index');
$router->get('register', 'RegistrationController@index');

// Admin routes.
$router->get('admin', 'AdminController@index');

// Player routes.
$router->get('player', 'PlayerController@index');
$router->get('admin/game/update-player', 'PlayerController@update');

// Game routes.
$router->get('admin/game', 'GameController@index');
$router->get('admin/game/new', 'GameController@new');
$router->get('admin/game/add-players', 'GameController@addPlayers');
$router->get('admin/game/remove-player', 'GameController@removePlayer');
$router->get('gamerules', 'GameController@gamerules');
$router->get('ranking', 'PlayerController@ranking');

// Table route.
$router->get('table', 'TableController@index');

$router->post('login', 'LoginController@login');
$router->post('register', 'RegistrationController@register');

$router->post('player/disable', 'PlayerController@disablePlayer');
$router->post('player/rebought', 'PlayerController@rebought');
