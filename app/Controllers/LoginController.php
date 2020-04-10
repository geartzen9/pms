<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Session;
use App\Core\Validator;
use App\Models\User;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends BaseController
{
    /**
     * Render the login page.
     *
     * @return void
     */
    public function index(): void
    {
        $this->render('User/login', [
            "title" => "Inloggen",
            "header" => false
        ]);
    }

    /**
     * Handle the login post request.
     *
     * @return void
     */
    public function login(): void
    {
        $request = [
            'email' => Request::post('email'),
            'password' => Request::post('password')
        ];

        $validator = Validator::getInstance();

        $validRequest = $validator->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validUser = $this->validateUser($request);

        if ($validRequest && ($validUser !== false)) {
            Session::put('user', [
                'id' => $validUser->id,
                'is_admin' => $validUser->is_admin,
                'email' => $validUser->email
            ]);

            redirect('/test');
            return;
        }

        redirect('/login');
        return;
    }

    /**
     * Validate if the user is using the right credentials.
     *
     * @param array $request
     * @return bool|User
     */
    private function validateUser(array $request)
    {
        $user = User::where(['email' => $request['email']])->first();

        if ($user !== null) {
            if (password_verify($request['password'], $user->password)) {
                return $user;
            }
        }

        return false;
    }
}