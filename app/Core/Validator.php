<?php

namespace App\Core;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Validator
 * @package App\Core
 */
class Validator
{
    /** @var Validator $instance */
    private static $instance;

    /**
     * Get the instance of the Singleton Validator class.
     *
     * @return Validator
     */
    public static function getInstance(): Validator
    {
        if (static::$instance === null) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    /**
     * Validate the given request.
     *
     * @param $request
     * @param array $rules
     * @return bool
     */
    public function validate($request, array $rules = []): bool
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
                            case 'confirm':
                                $confirmation = $request[$key . '_confirmation'];
                                $valid &= ($request[$key] === $confirmation);
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