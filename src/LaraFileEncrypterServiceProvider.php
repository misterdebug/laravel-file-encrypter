<?php

namespace Mrdebug\LaraEncryptedFiles;

use Illuminate\Support\ServiceProvider;
use Mrdebug\LaraFileEncrypter\LaraFileEncrypter;

class LaraFileEncrypterServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('lara-file-encrypter', function () {
            return new LaraFileEncrypter;
        });
    }
}
