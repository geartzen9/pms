<?php

namespace Database\Migrations;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use Database\Migration;

/**
 * Class AddSettingsToGame
 * @package Database\Migrations
 * @author Bryan Smit
 */
class AddSettingsToGame implements Migration
{
    /**
     * @inheritDoc
     */
    public function run()
    {
        Capsule::schema()->table('games', function (Blueprint $table) {
            $table->json('settings')
                ->after('amount_of_tables');
        });
    }
}