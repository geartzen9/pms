<?php


namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     * Get the request URI.
     *
     * @return mixed
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    /**
     * Get the request method.
     *
     * @return mixed
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}