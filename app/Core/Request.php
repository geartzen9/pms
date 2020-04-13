<?php


namespace App\Core;

/**
 * Class Request
 * @package App\Core
 * @author Bryan Smit
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

    /**
     * Get a value from the post request.
     *
     * @param string $key
     * @return string
     */
    public static function post(string $key)
    {
        return htmlspecialchars($_POST[$key]);
    }
}