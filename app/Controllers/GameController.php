<?php


namespace App\Controllers;

/**
 * Class GameController
 * @package App\Controllers
 */
class GameController extends BaseController
{
    /**
     * Render the current game page.
     */
    public function index(): void
    {
        $this->render('Game/index', ["title" => "Huidig pokertoernooi"]);
    }

    /**
     * Render the new game page.
     */
    public function new(): void
    {
        $this->render('Game/new', ["title" => "Nieuw pokertoernooi"]);
    }

    /**
     * Render the add players page.
     */
    public function addPlayers(): void
    {
        $this->render('Game/add-players', ["title" => "Personen toevoegen"]);
    }

    /**
     * Render the remove player page.
     */
    public function removePlayer(): void
    {
        $this->render('Game/remove-player', ["title" => "Speler uitschakelen"]);
    }
}