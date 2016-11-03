<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    use DatabaseTransactions;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * Default preparation for each test
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->setupDatabase();
    }

    /**
     * Function to help speed up tests by using a premade database
     * complete with migrations
     */
    public function setupDatabase()
    {
        exec('rm ' . storage_path() . '/testdb.sqlite');
        exec('cp ' . 'database/database.sqlite ' . storage_path() . '/testdb.sqlite');
    }
}
