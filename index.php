<?php

use App\Core\Request;
use App\Core\Router;

session_start();

require 'vendor/autoload.php';
require 'bootstrap/app.php';
require 'app/Core/helpers.php';

const ROOT_PATH = __DIR__;

Router::load('routes/web.php')
    ->direct(Request::uri(), Request::method());