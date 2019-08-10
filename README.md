# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wyattcast44/laravel-safe-username.svg?style=flat-square)](https://packagist.org/packages/wyattcast44/laravel-safe-username)
[![Total Downloads](https://img.shields.io/packagist/dt/wyattcast44/laravel-safe-username.svg?style=flat-square)](https://packagist.org/packages/wyattcast44/laravel-safe-username)

This is a small package to help you easily validate usernames against a list of
commonly banned usernames, for example: `json`, `admin`, `security`, etc. You
can also add your own custom allowed and disallowed usernames.

## Installation

You can install the package via composer:

```bash
composer require wyattcast44/laravel-safe-username
```

You can then publish the configuration file

```bash
php artisan vendor:publish
```

## Usage

```php
Validator::make($request, [
    'username' => ['required', 'string', new AllowedUsername],
]);
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed
recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email
wyatt.castaneda@gmail.com instead of using the issue tracker.

## Credits

-   [Wyatt Castaneda](https://github.com/wyattcast44)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more
information.

## Laravel Package Boilerplate

This package was generated using the
[Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
