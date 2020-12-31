<?php

namespace Lean\ConsoleLog\Tests;

use Lean\ConsoleLog\ConsoleLogServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;
use Illuminate\Support\Str;
use Livewire\LivewireServiceProvider;

class TestCase extends TestbenchTestCase
{
    public string $testView = 'default';

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            ConsoleLogServiceProvider::class,
        ];
    }

    protected function assertListenerRendered()
    {
        $this->assertTrue(
            Str::contains(renderComponent($this->testView), 'window.addEventListener')
        );
    }

    protected function assertListenerNotRendered()
    {
        $this->assertFalse(
            Str::contains(renderComponent($this->testView), 'window.addEventListener')
        );
    }

    protected function testView(string $view): void
    {
        $this->testView = $view;
    }
}
