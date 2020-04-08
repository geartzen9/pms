<?php


namespace App\Controllers;

/**
 * Class UserController
 * @package App\Controllers
 */
class UserController extends BaseController
{
    /**
     * Render the login page.
     */
    public function login(): void
    {
        $this->render('User/login', [
            "title" => "Inloggen",
            "header" => false
        ]);
    }

    /**
     * Render the register page.
     */
    public function register(): void
    {
        $this->render('User/register', [
            "title" => "Registreren",
            "header" => false
        ]);
    }
}