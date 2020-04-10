<?php

/**
 * @var $router Router
 */

use App\Core\Router;

// Home page route.
$router->get('', 'HomeController@index');

// User routes
$router->get('login', 'LoginController@index');

// Admin routes.
$router->get('admin', 'AdminController@index');

// Player routes.
$router->get('player', 'PlayerController@index');
$router->get('player/ranking', 'PlayerController@ranking');
$router->get('admin/game/update-player', 'PlayerController@update');

// Game routes.
$router->get('admin/game', 'GameController@index');
$router->get('admin/game/new', 'GameController@new');
$router->get('admin/game/add-players', 'GameController@addPlayers');
$router->get('admin/game/remove-player', 'GameController@removePlayer');

// Table route.
$router->get('table', 'TableController@index');

$router->post('login', 'LoginController@login');
