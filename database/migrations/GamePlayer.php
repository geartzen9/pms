<?php

namespace Database\Migrations;

use Database\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

ini_set('memory_limit', -1);

/**
 * Class GamePlayer
 * @package Database\Migrations
 * @author Bryan Smit
 */
class GamePlayer implements Migration
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        Capsule::schema()->disableForeignKeyConstraints();
        Capsule::schema()->dropIfExists('game_players');

        Capsule::schema()->enableForeignKeyConstraints();
        Capsule::schema()->create('game_players', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('table_id');
            $table->boolean('is_broke')
                ->default(false);
        });

        Capsule::schema()->table('game_players', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('game_id')
                ->references('id')
                ->on('games')
                ->onDelete('cascade');
            $table->foreign('table_id')
                ->references('id')
                ->on('game_tables')
                ->onDelete('cascade');
        });
    }
}