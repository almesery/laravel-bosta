# laravel-bosta

[![Latest Version on Packagist](https://img.shields.io/packagist/v/almesery/laravel-bosta.svg?style=flat-square)](https://packagist.org/packages/almesery/laravel-bosta)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/almesery/laravel-bosta/run-tests?label=tests)](https://github.com/almesery/laravel-bosta/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/almesery/laravel-bosta.svg?style=flat-square)](https://packagist.org/packages/almesery/laravel-bosta)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-laravel-bosta-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-laravel-bosta-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require almesery/laravel-bosta
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Almesery\Bosta\BostaServiceProvider" --tag="laravel-bosta-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Almesery\Bosta\BostaServiceProvider" --tag="laravel-bosta-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel-bosta = new Almesery\Bosta();
echo $laravel-bosta->echoPhrase('Hello, Almesery!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [almesery](https://github.com/almesery)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
