<?php

namespace App\Core;

/**
 * Class Session
 * @package App\Core
 */
class Session
{
    /**
     * Put a new entry into the session.
     *
     * @param $key
     * @param $value
     */
    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Check whether a key exists in the session.
     *
     * @param $key
     * @return boolean
     */
    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get a value from the session based on the key.
     *
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        if (!static::has($key)) {
            return null;
        }

        return $_SESSION[$key];
    }

    /**
     * Remove a value from the session based on the key.
     *
     * @param $key
     */
    public static function remove($key): void
    {
        if (Session::has($key)) {
            unset($_SESSION[$key]);
        }
    }
}