<?php

namespace Database\Migrations;

use Database\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

ini_set('memory_limit', -1);

/**
 * Class Game
 * @package Database\Migrations
 * @author Bryan Smit
 */
class Game implements Migration
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        Capsule::schema()->disableForeignKeyConstraints();
        Capsule::schema()->dropIfExists('games');

        Capsule::schema()->enableForeignKeyConstraints();
        Capsule::schema()->create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_paused')
                ->default(false);
            $table->boolean('is_finished')
                ->default(false);
            $table->unsignedInteger('amount_of_tables');
            $table->timestamps();
        });
    }
}