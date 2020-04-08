<?php


namespace App\Controllers;

/**
 * Class PlayerController
 * @package App\Controllers
 */
class PlayerController extends BaseController
{
    /**
     * Render the dashboard page.
     */
    public function index(): void
    {
        $this->render('User/Player/index', [
            "title" => "Welkom Timo",
            "back_button" => false
        ]);
    }

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
}