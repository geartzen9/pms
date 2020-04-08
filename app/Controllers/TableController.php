<?php


namespace App\Controllers;

/**
 * Class TableController
 * @package App\Controllers
 */
class TableController extends BaseController
{
    /**
     * Render the table overview.
     */
    public function index(): void
    {
        $this->render('Table/index', [
            "title" => "Tafel Overzicht",
            "header" => false,
            "bg_secondary" => true,
        ]);
    }
}