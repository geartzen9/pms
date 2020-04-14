<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Database\Migration;

/**
 * Class AddHasReboughtToGameplayer
 * @package Database\Migrations
 * @author Bryan Smit
 */
class AddHasReboughtToGameplayer implements Migration
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        Capsule::schema()->table('game_players', function (Blueprint $table) {
            $table->boolean('has_rebought')
                ->default(false);
        });
    }
}