<?php

namespace Lean\ConsoleLog\Tests;

uses(TestCase::class);

beforeEach(function () {
    view()->addNamespace('lean-test', __DIR__ . '/views');
});

it('only works in local environment by default', function () {
    $this->testView('default');

    environment('local');
    $this->assertListenerRendered();

    environment('staging');
    $this->assertListenerNotRendered();

    environment('production');
    $this->assertListenerNotRendered();
});

it('can be configured to only work in one specific environment', function () {
    $this->testView('production');

    environment('local');
    $this->assertListenerNotRendered();

    environment('staging');
    $this->assertListenerNotRendered();

    environment('production');
    $this->assertListenerRendered();
});

it('can be configured to only in multiple specific environments', function () {
    $this->testView('local-and-staging');

    environment('local');
    $this->assertListenerRendered();

    environment('staging');
    $this->assertListenerRendered();

    environment('production');
    $this->assertListenerNotRendered();
});
