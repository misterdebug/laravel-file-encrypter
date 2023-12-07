<?php

namespace Mrdebug\LaraFileEncrypter;

use Illuminate\Support\ServiceProvider;
use Mrdebug\LaraFileEncrypter\LaraFileEncrypter;

class LaraFileEncrypterServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('lara-file-encrypter', function ($app) {
            return new LaraFileEncrypter;
        });
    }
}
