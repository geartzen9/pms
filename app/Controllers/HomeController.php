<?php


namespace App\Controllers;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends BaseController
{
    /**
     * Render the home page.
     */
    public function index(): void
    {
        if (authenticated() !== null) {
            $display_name = authenticated()->name;

            $this->render('User/Player/index', [
                "title" => "Welkom " . $display_name,
                'display_name' => $display_name,
                'email' => "timo@tres.nl",
                "back_button" => false,
                "table_number" => 1,
                "inkoop_ischecked" => true,
                "rebuy_ischecked" => false,
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
                ]
            ]);
        } else {
            $this->render('index', [
                "title" => "Startpagina",
                "header" => false
            ]);
        }
    }
}