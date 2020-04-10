<?php


namespace App\Controllers;

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

/**
 * Class BaseController
 * @package App\Controllers
 */
abstract class BaseController
{
    /**
     * Get the Twig Environment.
     *
     * @return Environment
     */
    public function twig(): Environment
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../views');
        return new Environment($loader);
    }

    /**
     * Render a template by name with the included data.
     *
     * @param string $name
     * @param array $data
     */
    public function render(string $name, $data = []): void
    {
        try {
            echo $this->twig()->render("$name.html.twig", $data);
        } catch (LoaderError $e) {
            echo '<pre>';
            var_dump($e->getMessage());
            die;
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
    }
}