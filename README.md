<p align="center">
    <img src="https://raw.githubusercontent.com/karkowg/laravel-bit-flag/main/docs/snippet.png" height="600" alt="BitFlag code snippet">
</p>

# Laravel BitFlag

[![Latest Version on Packagist](https://img.shields.io/packagist/v/karkowg/laravel-bit-flag.svg)](https://packagist.org/packages/karkowg/laravel-bit-flag)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/karkowg/laravel-bit-flag/Tests/main?label=tests)](https://github.com/karkowg/laravel-bit-flag/actions?query=workflow%3Atests+branch%3Amain)
[![License](https://img.shields.io/packagist/l/karkowg/laravel-bit-flag.svg)](https://github.com/karkowg/laravel-bit-flag/blob/main/LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/karkowg/laravel-bit-flag.svg)](https://packagist.org/packages/karkowg/laravel-bit-flag)

------

This package provides Laravel support for [karkowg/bit-flag](https://github.com/karkowg/bit-flag).

> **Requires [PHP 7.4](https://php.net/releases/) and [Laravel 8.x](https://laravel.com/docs/8.x/releases/)**

⚡️ Installation

```bash
composer require karkowg/laravel-bit-flag
```

## Usage

```php
<?php

namespace App\BitFlags;

use Karkow\BitFlag\Laravel\BitFlag;

class CartStatus extends BitFlag
{
    private const CHECKED_OUT = 1 << 0;
    private const PAYED = 1 << 1;
    private const SHIPPED = 1 << 2;

    // ... other setters/getters

    public function markAsPayed(): self
    {
        return $this->set(self::PAYED);
    }

    public function hasBeenPayed(): bool
    {
        return $this->has(self::PAYED);
    }
}


// App\Services\CartService

$cartStatus = CartStatus::make();

if ($paymentSuccessful) {
    $cartStatus->markAsPayed();
}

$cartStatus->hasBeenPayed(); //? true
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Gustavo Karkow](https://github.com/karkowg)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
