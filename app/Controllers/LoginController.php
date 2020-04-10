<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $validRequest = $this->validateRequest($request, [
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

            return redirect('/');
        }

        return redirect('/login');
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
            if (Hash::check($request['password'], $user->password)) {
                return $user;
            }
        }

        return false;
    }

    /**
     * Validate the request
     *
     * @param $request
     * @param array $rules
     * @return bool
     */
    private function validateRequest($request, array $rules): bool
    {
        $valid = true;

        if (!empty($request) && !empty($rules)) {
            foreach ($rules as $key => $value) {
                if (strpos($value, '|') !== false) {
                    $rule = explode('|', $value);

                    foreach ($rule as $item) {
                        switch ($item) {
                            case 'required':
                                $valid &= !empty($request[$key]);
                                break;
                            case 'email':
                                $valid &= (filter_var($request[$key], FILTER_VALIDATE_EMAIL) !== false);
                                break;
                        }
                    }
                } else {
                    switch ($value) {
                        case 'required':
                            $valid &= !empty($request[$key]);
                            break;
                        case 'email':
                            $valid &= (filter_var($request[$key], FILTER_VALIDATE_EMAIL) !== false);
                            break;
                    }
                }
            }
        }

        return (bool)$valid;
    }
}