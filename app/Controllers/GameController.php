<?php


namespace App\Controllers;
use App\Core\Request;
use App\Models\User;
use App\Models\Game;

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

    public function startGame(): void
    {
        $settings = [
            "investment" => Request::post('investment'),
            "chips" => [
                "white" => Request::post('chip_white'),
                "red" => Request::post('chip_red'),
                "blue" => Request::post('chip_blue'),
                "green" => Request::post('chip_green'),
                "black" => Request::post('chip_black')
            ],
            "blinds" => [
                "small" => Request::post('blind_small_value'),
                "big" => Request::post('blind_big_value'),
                "step_size" => Request::post('blind_step_value')
            ]
        ];

        $game = new Game;
        $game->name = Request::post('name');
        $game->amount_of_tables = Request::post('table_count');
        $game->settings = json_encode($settings);

        $game->save();
        
        redirect("/admin/game/add-players");
        return;
    }

    public function gamerules(): void
    {
        $this->render('Game/gamerules', [
            "title" => "Spelregels"
        ]);
    }

    /**
     * Render the add players page.
     */
    public function addPlayers(): void
    {
        $users = User::orderBy('name', 'asc')->get();

        $this->render('Game/add-players', [
            "title" => "Personen toevoegen",
            "users" => $users,
        ]);
    }

    public function submitPlayers(): void
    {
        var_dump(Request::post('player'));die;
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