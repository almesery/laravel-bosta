# laravel-bosta

[![Latest Version on Packagist](https://img.shields.io/packagist/v/almesery/laravel-bosta.svg?style=flat-square)](https://packagist.org/packages/almesery/laravel-bosta)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/almesery/laravel-bosta/run-tests?label=tests)](https://github.com/almesery/laravel-bosta/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/almesery/laravel-bosta.svg?style=flat-square)](https://packagist.org/packages/almesery/laravel-bosta)

## Installation

You can install the package via composer:

```bash
composer require almesery/laravel-bosta
```

You can publish and run the migrations with:

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Almesery\Bosta\BostaServiceProvider" --tag="laravel-bosta-config"
```

This is the contents of the published config file:

```php
return [
     'stage' => [
        'bosta_api_key' => env('STAGE_BOSTA_API_KEY', null),
        'base_url' => env('STAGE_BASE_URL', 'https://stg-app.bosta.co'),
    ],
    'production' => [
        'bosta_api_key' => env('PRODUCTION_BOSTA_API_KEY', null),
        'base_url' => env('PRODUCTION_BASE_URL', 'https://app.bosta.co'),
    ],
];
```

## Usage

```php
$bosta = new Almesery\Bosta();
echo $bosta->getDeliveries();
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
