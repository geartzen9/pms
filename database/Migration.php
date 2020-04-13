<?php

namespace Database;

/**
 * Interface Migration
 * @package Database
 * @author Bryan Smit
 */
interface Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function run();
}