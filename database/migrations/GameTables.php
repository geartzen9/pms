<?php

namespace Database\Migrations;

use Database\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

ini_set('memory_limit', -1);

/**
 * Class GameTables
 * @package Database\Migrations
 * @author Bryan Smit
 */
class GameTables implements Migration
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        Capsule::schema()->disableForeignKeyConstraints();
        Capsule::schema()->dropIfExists('game_tables');

        Capsule::schema()->enableForeignKeyConstraints();
        Capsule::schema()->create('game_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('game_id');
        });

        Capsule::schema()->table('game_tables', function (Blueprint $table) {
            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');
        });
    }
}