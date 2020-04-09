<?php

require 'vendor/autoload.php';
require 'bootstrap/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

ini_set('memory_limit', -1);

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->id('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->boolean('is_admin')
        ->default(false);
    $table->unsignedInteger('score')
        ->default(0);
    $table->timestamps();
});