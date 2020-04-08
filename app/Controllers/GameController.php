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
        $this->render('Game/index', [
            "title" => "Huidig pokertoernooi"
        ]);
    }

    /**
     * Render the new game page.
     */
    public function new(): void
    {
        $this->render('Game/new', [
            "title" => "Nieuw pokertoernooi"
        ]);
    }

    /**
     * Render the add players page.
     */
    public function addPlayers(): void
    {
        $this->render('Game/add-players', [
            "title" => "Personen toevoegen",
            "users" => [
                0 => [
                    "name" => "Harmen",
                    "ranking" => 1,
                    "score" => 100
                ],
                1 => [
                    "name" => "Marco",
                    "ranking" => 2,
                    "score" => 80
                ],
                2 => [
                    "name" => "Welmoed",
                    "ranking" => 3,
                    "score" => 75
                ],
                3 => [
                    "name" => "Peter",
                    "ranking" => 4,
                    "score" => 50
                ],
                4 => [
                    "name" => "Timo",
                    "ranking" => 5,
                    "score" => 40
                ],
                5 => [
                    "name" => "Pieter",
                    "ranking" => 6,
                    "score" => 25
                ],
                6 => [
                    "name" => "Marjan",
                    "ranking" => 7,
                    "score" => 20
                ]
            ]
        ]);
    }

    /**
     * Render the remove player page.
     */
    public function removePlayer(): void
    {
        $this->render('Game/remove-player', [
            "title" => "Speler uitschakelen",
            "users" => [
                0 => [
                    "name" => "Harmen",
                    "ranking" => 1,
                    "score" => 100
                ],
                1 => [
                    "name" => "Marco",
                    "ranking" => 2,
                    "score" => 80
                ],
                2 => [
                    "name" => "Welmoed",
                    "ranking" => 3,
                    "score" => 75
                ],
                3 => [
                    "name" => "Peter",
                    "ranking" => 4,
                    "score" => 50
                ],
                4 => [
                    "name" => "Timo",
                    "ranking" => 5,
                    "score" => 40
                ],
                5 => [
                    "name" => "Pieter",
                    "ranking" => 6,
                    "score" => 25
                ],
                6 => [
                    "name" => "Marjan",
                    "ranking" => 7,
                    "score" => 20
                ]
            ]
        ]);
    }
}