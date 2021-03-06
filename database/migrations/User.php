<?php

namespace Database\Migrations;

use Database\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

ini_set('memory_limit', -1);

/**
 * Class User
 * @package Database\Migrations
 * @author Bryan Smit
 */
class User implements Migration
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        Capsule::schema()->disableForeignKeyConstraints();
        Capsule::schema()->dropIfExists('users');

        Capsule::schema()->enableForeignKeyConstraints();
        Capsule::schema()->create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('is_admin')
                ->default(false);
            $table->unsignedInteger('score')
                ->default(0);
            $table->timestamps();
        });
    }
}