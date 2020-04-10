<?php

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Container\Container;

/**
 * Redirect to given path.
 *
 * @param string $path
 */
function redirect(string $path)
{
    header("Location: {$path}");
}

if (!function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param string|null $abstract
     * @param array $parameters
     * @return Container|mixed
     * @throws BindingResolutionException
     */
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($abstract, $parameters);
    }
}

if (!function_exists('resolve')) {
    /**
     * Resolve a service from the container.
     *
     * @param string $name
     * @param array $parameters
     * @return mixed
     * @throws BindingResolutionException
     */
    function resolve($name, array $parameters = [])
    {
        return app($name, $parameters);
    }
}