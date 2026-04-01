<?php

namespace Wirestack\Ui\Tests;

use Livewire\LivewireServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Wirestack\Ui\WsServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        // Bind the config key used by components (ds.* → ws.*)
        config()->set('ds', config('ws'));
    }

    protected function getPackageProviders($app): array
    {
        return [
            LivewireServiceProvider::class,
            WsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
        $app['config']->set('app.debug', true);
        $app['config']->set('view.paths', [
            __DIR__.'/../resources/views',
        ]);
    }
}
