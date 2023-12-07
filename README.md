# LaraFileEncrypter: Secure your files in Laravel with AES-256 encryption, without persistent key storage hassle.

LaraFileEncrypter is a Laravel package, designed to enhance file security in your applications. With a straightforward integration, it enables you to easily implement AES-256 encryption. What sets LaraFileEncrypter apart is its unique approach: delivering maximum security without the need for key storage. Now, securing your files becomes a straightforward process, ensuring data confidentiality without added complexity.

## How does it work?

LaraFileEncrypter simplifies file security by eliminating the need to manage encryption keys. Instead, the process relies on the use of a user-chosen password.

When encrypting a file, LaraFileEncrypter generates an encryption key based on the provided password. It's this key, derived from the password, that is used to secure your files using the AES-256 algorithm.

This approach removes the necessity of storing or managing separate encryption keys. By choosing a robust password, you ensure effective protection of your files without the complexity associated with traditional key management. LaraFileEncrypter makes the file security process straightforward, all while providing top-tier protection.

## Pros and cons

| Pros                                               | Cons                                                     |
|----------------------------------------------------|----------------------------------------------------------|
| No key storage                                      | Loss of password leads to unrecoverable file              |
| Each user can encrypt their files with a unique password | AES keys potentially less robust than truly random methods |
| No modifications needed on the files infrastructure or database side | Potentially predictable keys                             |


Convinced ? :)

## Installation

``` composer require mrdebug/lara-file-encrypter ```

## Usage

This package provides a facade called `LaraFileEncrypter`.

### Encrypt a file

The `encryptFile` method `public function encryptFile(string $filePath, string $rawPassword)` locates a file and replaces its existing content with his encrypted content using the provided password. The password must be provided in raw text.

Example :
`LaraFileEncrypter::encryptFile(storage_path('app/files/secret-file.pdf'), 'mysecurerawpassword');`

You can add a salt :
`LaraFileEncrypter::encryptFile(storage_path('app/files/secret-file.pdf'), 'mysecurerawpassword'.$salt);`

### Decrypt a file

The `LaraFileEncrypter` facade provides two methods for decrypting a file. One method streamDownload (`decryptAndStreamDownloadFile()`) the file, while the other decrypts the file's content (`decryptContentFile()`).

`public function decryptAndStreamDownloadFile(string $filePath, string $rawPassword)`

and

`public function decryptContentFile(string $filePath, string $rawPassword)`

Examples : 

`LaraFileEncrypter::decryptAndStreamDownloadFile(storage_path('app/files/secret-file.pdf'), 'mysecurerawpassword');`

and 

`LaraFileEncrypter::decryptContentFile(storage_path('app/files/secret-file.pdf'), 'mysecurerawpassword');`

 You must, of course, provide the same password as used in the encryption step.
 

## License

This package is licensed under the [license MIT](http://opensource.org/licenses/MIT).

tests
vendor/bin/phpunit vendor/mrdebug/crudgen/tests/
php artisan make:crud post "title, content:text"
php artisan rm:crud post --force
php artisan test
