<?php

namespace Karkow\BitFlag\Laravel\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class MakeBitFlag extends GeneratorCommand
{
    public $signature = 'make:bit-flag {name}';

    public $description = 'Create a new bit flag';

    public function handle()
    {
        $this->type = $this->getNameInput();

        return parent::handle();
    }

    protected function getStub(): string
    {
        return __DIR__ . '/../../stubs/bit-flag.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\BitFlags';
    }

    protected function getArguments(): array
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the bit flag'],
        ];
    }
}
