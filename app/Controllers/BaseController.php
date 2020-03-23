<?php


namespace App\Controllers;

/**
 * Class BaseController
 * @package App\Controllers
 */
abstract class BaseController
{
    /**
     * Render a template.
     *
     * @param string $name
     * @param array $data
     */
    public function render(string $name, $data = [])
    {
        extract($data);

        require ROOT_PATH . "/views/{$name}.view.php";
    }
}