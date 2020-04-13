<?php

namespace App\Core;

use Illuminate\Container\Container;

/**
 * Class Router
 * @package App\Core
 * @author Bryan Smit
 */
class Router
{
    public const ROUTER_TYPE_GET = 'GET';
    public const ROUTER_TYPE_POST = 'POST';

    /** @var Container $app */
    protected $app = null;

    /**
     * All registered routes.
     *
     * @var array
     */
    public $routes = [
        self::ROUTER_TYPE_GET => [],
        self::ROUTER_TYPE_POST => []
    ];

    /**
     * Load a routes files.
     *
     * @param string $file
     * @return static
     */
    public static function load(string $file): Router
    {
        $router = new static;

        require $file;

        return $router;
    }

    /**
     * Add a new get request route.
     *
     * @param string $uri
     * @param $controller
     */
    public function get(string $uri, $controller)
    {
        $this->routes[self::ROUTER_TYPE_GET][$uri] = $controller;
    }

    /**
     * Add a new post request route.
     *
     * @param string $uri
     * @param $controller
     */
    public function post(string $uri, $controller)
    {
        $this->routes[self::ROUTER_TYPE_POST][$uri] = $controller;
    }

    /**
     * Load the requested URI's associated controller method.
     *
     * @param $uri
     * @param $method
     * @return mixed
     */
    public function direct($uri, $method)
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->callAction(
                ...explode('@', $this->routes[$method][$uri])
            );
        }

//        return redirect('/404');
    }

    /**
     * Call an action from a controller.
     *
     * @param $controller
     * @param $action
     * @return mixed
     */
    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new \BadMethodCallException(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return call_user_func([$controller, $action]);
    }
}