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
        $this->render('User/Admin/index', [
            "title" => "Welkom Timo",
            "back_button" => false
        ]);
    }
}