<?php

namespace Mrdebug\LaraFileEncrypter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed encrypt(string $filePath, string $rawPassword)
 * @method static mixed decrypt(string $filePath, string $rawPassword)
 *
 * @see \Mrdebug\LaraFileEncrypter\LaraFileEncrypter
 */
class LaraFileEncrypter extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lara-file-encrypter';
    }
}
