<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Phar;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        config(['logging.channels.single.path' => Phar::running()
            ? dirname(Phar::running(false)) . '/logs/data-feed.log'
            : storage_path('logs/data-feed.log')
        ]);
    }

}
