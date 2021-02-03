<?php

namespace Almesery\Bosta;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Almesery\Bosta\Commands\BostaCommand;

class BostaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-bosta')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_bosta_table')
            ->hasCommand(BostaCommand::class);
    }
}
