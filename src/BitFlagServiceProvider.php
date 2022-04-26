<?php

namespace Karkow\BitFlag\Laravel;

use Karkow\BitFlag\Laravel\Commands\MakeBitFlag;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BitFlagServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-bit-flag')
            ->hasCommand(MakeBitFlag::class);
    }
}
