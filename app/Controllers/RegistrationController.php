<?php

namespace App\Controllers;

use App\Core\Request;

/**
 * Class RegistrationController
 * @package App\Controllers
 */
class RegistrationController extends BaseController
{
    /**
     * Render the registration page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->render('User/register', [
            "title" => "Registreren",
            "header" => false
        ]);
    }

    public function register()
    {
        $request = [
            'name' => Request::post('name'),
            'email' => Request::post('email'),
            'password' => Request::post('password'),
            'password_confirmation' => Request::post('password_confirmation')
        ];

        $validRequest = $this->validateRequest($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirm'
        ]);
    }
}