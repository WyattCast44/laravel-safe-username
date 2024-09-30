<?php

namespace Wyattcast44\SafeUsername\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Wyattcast44\SafeUsername\SafeUsernameServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SafeUsernameServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //
    }
}
