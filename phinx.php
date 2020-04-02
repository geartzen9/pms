<?php

require 'vendor/autoload.php';

require 'bootstrap/app.php';

return [
    'paths' => [
        'migrations'    => '%%PHINX_CONFIG_DIR%%\database\migrations',
        'seeds'         => '%%PHINX_CONFIG_DIR%%\database\seeds',
    ],
    'templates' => [
        'file' => 'phinx-template.php.dist'
    ],
    'migration_base_class' => '\Database\Migration',
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'default',
        'default' => [
            'adapter' => 'mysql',
            'host' => $database['host'],
            'name' => $database['name'],
            'user' => $database['username'],
            'pass' => $database['password'],
            'port' => 3306
        ]
    ]
];