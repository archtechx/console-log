<?php

namespace Lean\ConsoleLog\Tests;

use Illuminate\View\ComponentAttributeBag;

function renderComponent(string $component = 'lean::components.console-log')
{
    $component = [
        'default' => 'lean-test::default',
        'local-and-staging' => 'lean-test::local-and-staging',
        'production' => 'lean-test::production',
    ][$component] ?? $component;

    return view($component, [
        'attributes' => new ComponentAttributeBag([]),
    ])->toHtml();
}

function environment(string $env)
{
    app()['env'] = $env;
}
