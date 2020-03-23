<?php

namespace App\Core;

/**
 * Class Application
 * @package App\Core
 */
class Application
{
    /** @var array $registry */
    protected static $registry = [];

    /**
     * App constructor.
     */
    protected function __construct()
    {
    }

    /**
     * The Application class should not be cloned.
     */
    protected function __clone()
    {
    }

    /**
     * Bind a value into the registry.
     *
     * @param $key
     * @param $value
     */
    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    /**
     * Get the value out of the registry.
     *
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return static::$registry[$key];
    }
}