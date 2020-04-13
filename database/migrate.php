<?php

use Database\Migration;
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
    new User(),
    new Game(),
    new GameTables(),
    new GamePlayer()
];

/** @var Migration $migration */
foreach ($migrations as $migration) {
    $migration->run();
}
