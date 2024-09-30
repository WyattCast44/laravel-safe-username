<?php

use Illuminate\Support\Facades\Config;
use Wyattcast44\SafeUsername\SafeUsername;
use Wyattcast44\SafeUsername\SafeUsernameServiceProvider;

function getPackageProviders($app)
{
    return [
        SafeUsernameServiceProvider::class,
    ];
}

function getApplicationAliases($app)
{
    return [
        'SafeUsername' => SafeUsername::class,
    ];
}

test('the base class can be resolved', function () {
    expect(app('safe-username'))->toBeInstanceOf(SafeUsername::class);
});

test('an allowed username passes', function () {
    $allowedUsername = 'johndoe';

    expect(app('safe-username')->validate($allowedUsername))->toBeTrue();
});

test('a disallowed username fails', function () {
    $disallowedUsername = 'admin';

    expect(app('safe-username')->validate($disallowedUsername))->toBeFalse();
});

test('a custom allowed username passes', function () {
    $customAllowedUsername = 'admin';

    Config::set('safe-username.allowed', $customAllowedUsername);

    expect(app('safe-username')->validate($customAllowedUsername))->toBeTrue();
});

test('a custom disallowed username fails', function () {
    $customDisallowedUsername = 'johndoe';

    Config::set('safe-username.disallowed', $customDisallowedUsername);

    expect(app('safe-username')->validate($customDisallowedUsername))->toBeFalse();
});
