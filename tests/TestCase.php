<?php

namespace Ctrlv\Lardmin\Tests;

use Ctrlv\Lardmin\LardminServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase {

    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LardminServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
    }
}
