<?php

namespace Karkow\BitFlag\Laravel\Tests;

use Karkow\BitFlag\Laravel\BitFlagServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            BitFlagServiceProvider::class,
        ];
    }

    public function getStub(string $file): string
    {
        return file_get_contents(__DIR__ . '/stubs/' . $file);
    }
}
