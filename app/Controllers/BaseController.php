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
 * @author Bryan Smit
 */
class BaseController
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
            redirect('/404');
        } catch (RuntimeError $e) {
            redirect('/404');
        } catch (SyntaxError $e) {
            redirect('/404');
        }
    }
}