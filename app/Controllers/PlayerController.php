<?php


namespace App\Controllers;

use App\Core\Request;
use App\Models\GamePlayer;

/**
 * Class PlayerController
 * @package App\Controllers
 */
class PlayerController extends BaseController
{
    /**
     * Render the purchase and rebuy page.
     */
    public function update(): void
    {
        $this->render('User/Player/update', [
            "title" => "Inkopen en Rebuy",
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
     * Render the ranking page.
     */
    public function ranking(): void
    {
        $this->render('User/Player/ranking', [
            "title" => "Ranking",
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
     * @return void
     */
    public function disablePlayer(): void
    {
        $request = [
            'user_id' => Request::post('user_id'),
            'game_id' => Request::post('game_id')
        ];

        /** @var GamePlayer $gamePlayer */
        $gamePlayer = GamePlayer::where('user_id', $request['user_id'])
            ->andWhere('game_id', $request['game_id'])
            ->one();

        $gamePlayer->setBroke(true);
    }

    public function rebought()
    {
        $request = [
            'game_player_id' => Request::post('game_player')
        ];

        /** @var GamePlayer $gamePlayer */
        $gamePlayer = GamePlayer::find($request['game_player_id']);

        $gamePlayer->setRebought(true);
    }
}