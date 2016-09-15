<?php

namespace Exitialis\Repository\Tests;

use Illuminate\Console;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Orchestra\Testbench\TestCase;

class DbTestCase extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();


    }

    /**
     * Подключить service provider пакета.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [RepositoryServiceProvider::class];
    }
    /**
     * Настроить конфиги под тестовое окружение.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'test');
        $app['config']->set('database.connections.test', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
