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
        $this->render('index', [
            "title" => "Startpagina",
            "header" => false
        ]);
    }
}