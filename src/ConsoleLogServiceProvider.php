<?php

declare(strict_types=1);

namespace Lean\ConsoleLog;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;

class ConsoleLogServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'lean');

        Component::macro('consoleLog', function (...$data) {
            /** @var Component $this */
            if (count($data) === 1) {
                $data = $data[0];
            }

            $this->dispatchBrowserEvent('lean-debug', $data);
        });
    }
}
