<?php


namespace App\Controllers;

/**
 * Class TableController
 * @package App\Controllers
 */
class TableController extends BaseController
{
    /**
     * Render the table overview.
     */
    public function index(): void
    {
        $this->render('Table/index', [
            "title" => "Tafel Overzicht",
            "header" => false,
            "bg_secondary" => true,
            "table_number" => 1,
            "small_blind_value" => 3,
            "big_blind_value" => 6,
            "chips" => [
                0 => [
                    "color" => "1",
                    "value" => 1
                ],
                1 => [
                    "color" => "2",
                    "value" => 5
                ],
                2 => [
                    "color" => "3",
                    "value" => 25
                ],
                3 => [
                    "color" => "4",
                    "value" => 100
                ],
                4 => [
                    "color" => "5",
                    "value" => 500
                ],
                5 => [
                    "color" => "6",
                    "value" => 1000
                ]
            ],
            "players" => [
                0 => [
                    "name" => "Peter"
                ],
                1 => [
                    "name" => "Marco"
                ],
                2 => [
                    "name" => "Welmoed"
                ],
                3 => [
                    "name" => "Harmen"
                ],
                4 => [
                    "name" => "Timo"
                ],
                5 => [
                    "name" => "Pieter"
                ],
                6 => [
                    "name" => "Marjan"
                ]
            ]
        ]);
    }
}