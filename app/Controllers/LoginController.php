<?php


namespace App\Controllers;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends BaseController
{
    /**
     * Render the home page.
     */
    public function index(): void
    {
        $this->render('login', ["title" => "Inloggen"]);
    }
}