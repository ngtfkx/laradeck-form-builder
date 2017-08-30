<?php

namespace Ngtfkx\Laradeck\FormBuilder;

use Illuminate\Support\ServiceProvider;

class LaradeckFormBuilderServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'fb');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        include_once __DIR__ . '/helpers.php';
    }
}