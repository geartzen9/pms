<?php


namespace App\Controllers;

/**
 * Class AdminController
 * @package App\Controllers
 */
class AdminController extends BaseController
{
    /**
     * Render the dashboard page.
     */
    public function index(): void
    {
        $display_name = "Timo";

        $this->render('User/Admin/index', [
            "title" => "Welkom " . $display_name,
            'display_name' => $display_name,
            'email' => "timo@tres.nl",
            "back_button" => false
        ]);
    }
}