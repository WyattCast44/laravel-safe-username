<?php

namespace Wyattcast44\SafeUsername\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Config;
use Wyattcast44\SafeUsername\SafeUsername;
use Wyattcast44\SafeUsername\SafeUsernameServiceProvider;

class SafeUsernameTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            SafeUsernameServiceProvider::class,
        ];
    }

    protected function getApplicationAliases($app)
    {
        return [
            'SafeUsername' => SafeUsername::class,
        ];
    }

    public function test_the_base_class_can_be_resolved()
    {
        $this->assertInstanceOf(SafeUsername::class, app('safe-username'));
    }

    public function test_an_allowed_username_passes()
    {
        $allowedUsername = 'johndoe';

        $this->assertTrue(app('safe-username')->validate($allowedUsername));
    }

    public function test_a_disallowed_username_fails()
    {
        $disallowedUsername = 'admin';

        $this->assertFalse(app('safe-username')->validate($disallowedUsername));
    }

    public function test_a_custom_allowed_username_passes()
    {
        $customAllowedUsername = 'admin';
        
        Config::set('safe-username.allowed', $customAllowedUsername);

        $this->assertTrue(app('safe-username')->validate($customAllowedUsername));
    }

    public function test_a_custom_disallowed_username_fails()
    {
        $customDisallowedUsername = 'johndoe';
        
        Config::set('safe-username.disallowed', $customDisallowedUsername);

        $this->assertFalse(app('safe-username')->validate($customDisallowedUsername));
    }
}
