<?php

use App\Core\Request;
use App\Core\Router;

session_start();

/*
 * Register the autoloader of composer.
 */
require 'vendor/autoload.php';

/*
 * Prepare the application before starting it.
 */
$app = require_once 'bootstrap/app.php';

$app->bootstrap();

Router::load('routes/web.php')
    ->direct(Request::uri(), Request::method());