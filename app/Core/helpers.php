<?php

use App\Core\Application;

/**
 * Redirect to given path.
 *
 * @param string $path
 */
function redirect(string $path)
{
    header("Location: {$path}");
}

/**
 * @param string $instance
 * @return mixed
 */
function resolve(string $instance)
{
    return Application::get($instance);
}