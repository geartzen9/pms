<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Validator;
use App\Models\User;

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

    /**
     * Register a new User.
     *
     * @return void
     */
    public function register(): void
    {
        $request = [
            'name' => Request::post('name'),
            'email' => Request::post('email'),
            'password' => Request::post('password'),
            'password_confirmation' => Request::post('password_confirmation')
        ];

        $validator = Validator::getInstance();

        $validRequest = $validator->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirm'
        ]);

        if ($validRequest) {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => password_hash($request['password'], PASSWORD_BCRYPT)
            ]);

            redirect('/login');
            return;
        }

        redirect('/register');
        return;
    }
}