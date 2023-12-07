<?php

namespace Mrdebug\LaraFileEncrypter;

use Illuminate\Support\Facades\File;

class LaraFileEncrypter
{

    public function encrypt($filePath, $rawPassword)
    {
        $key = $this->generateKeyWithRawPassword($rawPassword);
        $newEncrypter = new \Illuminate\Encryption\Encrypter($key, 'AES-256-CBC');

        $fileContent = File::get($filePath);

        File::put($filePath, $newEncrypter->encrypt($fileContent));
    }

    public function decrypt($filePath, $rawPassword)
    {
        $key = $this->generateKeyWithRawPassword($rawPassword);
        $newEncrypter = new \Illuminate\Encryption\Encrypter($key, 'AES-256-CBC');

        $fileContent = File::get($filePath);

        return response()->streamDownload(function () use ($newEncrypter, $fileContent) {
            echo $newEncrypter->decrypt($fileContent);
        }, basename($filePath))->send();
    }

    private function generateKeyWithRawPassword($rawPassword)
    {
        return hash_pbkdf2("sha256", $rawPassword, "", 10000, 32, true);
    }
}
