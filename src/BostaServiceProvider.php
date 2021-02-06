<?php

namespace Almesery\Bosta;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BostaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name('laravel-bosta')->hasConfigFile();
    }

    /**
     * @return BostaServiceProvider
     */
    public function boot()
    {
        parent::boot();
        app()->singleton('bosta', function () {
            return new Bosta(config('bosta.production.bosta_api_key'));
        });
    }
}
