<?php

use Database\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Capsule::schema()->create('users', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->string('email')
               ->unique();
           $table->string('password');
           $table->boolean('is_admin');
           $table->unsignedInteger('score');
           $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->dropIfExists('users');
    }
}