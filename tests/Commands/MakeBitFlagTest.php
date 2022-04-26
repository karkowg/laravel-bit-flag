<?php

namespace Karkow\BitFlag\Laravel\Tests\Commands;

use Karkow\BitFlag\Laravel\Tests\TestCase;

class MakeBitFlagTest extends TestCase
{
    public const CART_STATUS_PATH = __DIR__ . '/../../vendor/orchestra/testbench-core/laravel/app/BitFlags/CartStatus.php';

    protected ?string $content;

    public function setUp(): void
    {
        parent::setUp();

        @unlink(self::CART_STATUS_PATH);

        $this->content = null;
    }

    /** @test */
    public function it_creates_a_bit_flag_from_stub(): void
    {
        $this->runMakeCommand('cart-status.stub.php', ['name' => 'CartStatus']);
    }

    private function runMakeCommand(string $stub, array $args = []): void
    {
        $artisan = $this->artisan('make:bit-flag', $args);

        $artisan->assertExitCode(0);
        $artisan->expectsOutput(sprintf('%s created successfully.', $args['name']));
        $artisan->run();

        $this->assertTrue(file_exists(self::CART_STATUS_PATH));
        $this->content = file_get_contents(self::CART_STATUS_PATH);
        $this->assertEquals($this->getStub($stub), $this->content);
    }
}
