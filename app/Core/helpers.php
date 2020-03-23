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

/**
 * Check if the user is logged in.
 *
 * @return bool
 */
function userIsLoggedIn(): bool
{
    return isset($_SESSION['user']);
}