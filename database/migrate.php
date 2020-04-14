<?php

use Database\Migration;
use Database\Migrations\AddHasReboughtToGameplayer;
use Database\Migrations\AddSettingsToGame;
use Database\Migrations\Game;
use Database\Migrations\GamePlayer;
use Database\Migrations\GameTables;
use Database\Migrations\User;

/**
 * @author Bryan Smit
 */

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->bootstrap();

$migrations = [
    User::class,
    Game::class,
    GameTables::class,
    GamePlayer::class,
    AddHasReboughtToGameplayer::class,
    AddSettingsToGame::class
];

/** @var Migration $migration */
foreach ($migrations as $migration) {
    $migration = new $migration;
    $migration->run();
}
