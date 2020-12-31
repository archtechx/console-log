<?php

namespace Lean\ConsoleLog\Tests;

use Livewire\Component;

use function Pest\Livewire\livewire;

uses(TestCase::class);

beforeEach(function () {
    view()->addNamespace('lean-test', __DIR__ . '/views');
});

it('sends the event to the browser', function () {
    livewire(TestComponent::class)
        ->call('dumpString')
        ->assertDispatchedBrowserEvent('lean-debug');
});

it('can accept multiple values', function () {
    livewire(TestComponent::class)
        ->call('dumpArray')
        ->assertDispatchedBrowserEvent('lean-debug', ['foo', 'bar']);
});

it('displays a single value as a single value and not an arary', function () {
    livewire(TestComponent::class)
        ->call('dumpString')
        ->assertDispatchedBrowserEvent('lean-debug', 'foo');
});

//////////////////////////////////////////////////////////////////

class TestComponent extends Component
{
    public function dumpString()
    {
        $this->consoleLog('foo');
    }

    public function dumpArray()
    {
        $this->consoleLog(['foo', 'bar']);
    }

    public function render()
    {
        return view('lean-test::livewire-component');
    }
}
