<?php

namespace Tumichnix\Env\Providers;

use Illuminate\Support\ServiceProvider;
use Tumichnix\Env\Console\Commands\Del;
use Tumichnix\Env\Console\Commands\Get;
use Tumichnix\Env\Console\Commands\Set;

class EnvServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            Del::class,
            Get::class,
            Set::class,
        ]);
    }
}
