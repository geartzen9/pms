<?php

use App\Core\Application;
use Illuminate\Database\Capsule\Manager as Capsule;

Application::bind('config', require_once 'config/app.php');

$capsule = new Capsule();
$database = Application::get('config')['database'];

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => $database['host'],
    'database'  => $database['name'],
    'username'  => $database['username'],
    'password'  => $database['password'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->bootEloquent();

