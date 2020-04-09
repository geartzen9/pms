<?php

namespace App\Controllers;

use App\Core\Request;
use App\Models\User;

/**
 * Class LoginController
 * @package App\Controllers
 */
class LoginController extends BaseController
{
    /**
     * Handle the login post request.
     */
    public function login()
    {
        $request = [
            'email' => Request::post('email'),
            'password' => Request::post('password')
        ];

        $valid = $this->validateRequest($request, [
            'email' => 'email'
        ]);

        $valid = $this->validateUser($request);

        if ($valid) {
            // TODO: Login the user.
        }
    }

    /**
     * @param array $request
     */
    private function validateUser(array $request)
    {
        // TODO: Check if there is a user with the email from the request.
        $user = User::where(['email' => $request['email']])->one();
        // TODO: Compare the password from the request with the user's password.

        // TODO: If the password is right, return true otherwise false. (this also counts for the checks before)
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
                switch ($value) {
                    case 'email':
                        $valid = filter_var($request[$key], FILTER_VALIDATE_EMAIL);
                        break;
                    default:
                        $valid = true;
                }
            }
        }

        return $valid;
    }
}