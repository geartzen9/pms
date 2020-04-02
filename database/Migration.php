<?php

namespace Database;

require_once 'bootstrap/app.php';

use App\Core\Application;
use Doctrine\DBAL\DBALException;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

/**
 * Class Migration
 * @package Database
 */
class Migration extends AbstractMigration
{
    /** @var Capsule $capsule */
    public $capsule;

    /** @var Builder $capsule */
    public $schema;

    public static $CAPSULE;

    /**
     * @throws DBALException
     */
    public function init(): void
    {
        if (self::$CAPSULE) {
            $this->capsule = self::$CAPSULE;
            $this->schema = $this->capsule->schema();
        } else {
            $database = Application::get('config')['database'];
            $this->capsule = new Capsule;
            $this->capsule->addConnection([
                'driver' => 'mysql',
                'host' => $database['host'],
                'database' => $database['name'],
                'username' => $database['username'],
                'password' => $database['password'],
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'engine' => 'InnoDB'
            ]);

            $platform = $this->capsule->getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();
            $platform->registerDoctrineTypeMapping('enum', 'string');

            $this->capsule->bootEloquent();
            $this->capsule->setAsGlobal();
            $this->schema = $this->capsule->schema();

            self::$CAPSULE = $this->capsule;
        }
    }
}