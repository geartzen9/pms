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
            "title" => "Inkopen en Rebuy"
        ]);
    }

    /**
     * Render the ranking page.
     */
    public function ranking(): void
    {
        $this->render('User/Player/ranking', [
            "title" => "Ranking"
        ]);
    }
}