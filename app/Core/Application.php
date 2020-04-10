<?php

namespace App\Core;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Application
 * @package App\Core
 */
class Application extends Container
{
    /**
     * Create a new Application instance.
     */
    public function __construct()
    {
        $this->registerBindings();
    }


    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBindings(): void
    {
        static::setInstance($this);

        $this->instance('app', $this);

        $this->instance(Container::class, $this);
    }

    /**
     * @throws BindingResolutionException
     */
    public function bootstrap(): void
    {
        $config = $this->loadConfiguration($this);

        $capsule = new Capsule();

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $config['database']['host'],
            'database' => $config['database']['name'],
            'username' => $config['database']['username'],
            'password' => $config['database']['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setAsGlobal();

        $capsule->bootEloquent();
    }

    /**
     * @param Application $app
     * @return array
     * @throws BindingResolutionException
     */
    protected function loadConfiguration(Application $app): array
    {
        $app->bind('config', function () {
            return require __DIR__ . '/../../config/app.php';
        });

        return $app->make('config');
    }
}