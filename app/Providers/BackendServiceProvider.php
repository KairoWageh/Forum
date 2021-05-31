<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\contracts\BaseRepositoryInterface',
            'App\Repository\sql\BaseRepository'
        );

        $this->app->bind(
            'App\Repository\contracts\ThreadsRepositoryInterface',
            'App\Repository\sql\ThreadsRepository'
        );

        $this->app->bind(
            'App\Repository\contracts\RepliesRepositoryInterface',
            'App\Repository\sql\RepliesRepository'
        );
    }
}
