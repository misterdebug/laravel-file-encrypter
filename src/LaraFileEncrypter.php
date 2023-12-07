<?php

namespace Mrdebug\LaraFileEncrypter;

use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\File;

class LaraFileEncrypter
{
    public function encryptFile(string $filePath, string $rawPassword)
    {
        $newEncrypter = $this->createEncrypter($rawPassword);
        $fileContent = File::get($filePath);
        File::put($filePath, $newEncrypter->encrypt($fileContent));
    }

    public function decryptContentFile(string $filePath, string $rawPassword)
    {
        $newEncrypter = $this->createEncrypter($rawPassword);
        $fileContent = File::get($filePath);
        return $newEncrypter->decrypt($fileContent);
    }

    public function decryptAndStreamDownloadFile(string $filePath, string $rawPassword)
    {
        return response()->streamDownload(function () use ($filePath, $rawPassword) {
            echo $this->decryptContentFile($filePath, $rawPassword);
        }, basename($filePath))->send();
    }

    private function generateKeyWithRawPassword($rawPassword)
    {
        return hash_pbkdf2("sha256", $rawPassword, "", 10000, 32, true);
    }

    private function createEncrypter($rawPassword)
    {
        $key = $this->generateKeyWithRawPassword($rawPassword);
        return new Encrypter($key, 'AES-256-CBC');
    }
}
