# LaraFileEncrypter: Secure your files in Laravel with AES-256 encryption, without persistent key storage hassle.

![image](https://github.com/misterdebug/laravel-file-encrypter/assets/23297600/4beeebb4-d064-4d09-9c81-876d5dbdde69)


LaraFileEncrypter is a Laravel package, designed to enhance file security in your applications. With a straightforward integration, it enables you to easily implement AES-256 encryption. What sets LaraFileEncrypter apart is its unique approach: delivering maximum security without the need for key storage. Now, securing your files becomes a straightforward process, ensuring data confidentiality without added complexity.

## How does it work?

LaraFileEncrypter simplifies file security by eliminating the need to manage encryption keys. Instead, the process relies on the use of a user-chosen password.

When encrypting a file, LaraFileEncrypter generates an encryption key based on the provided password. It's this key, derived from the password, that is used to secure your files using the AES-256 algorithm.

This approach removes the necessity of storing or managing separate encryption keys. By choosing a robust password, you ensure effective protection of your files without the complexity associated with traditional key management. 

## Pros and cons

| Pros                                               | Cons                                                     |
|----------------------------------------------------|----------------------------------------------------------|
| No key storage                                      | Loss of password leads to unrecoverable file              |
| Each user can encrypt their files with a unique password | AES keys potentially less robust than truly random methods |
| No modifications needed on the files infrastructure or database side | Potentially predictable keys                             |


Convinced ? 🙂

If you find this project useful, please consider giving it a star⭐. It helps me prioritize and focus on keeping project up-to-date. Thank you for your support!

## Installation

``` composer require mrdebug/lara-file-encrypter ```

## Usage

This package provides a facade called `LaraFileEncrypter`.

### Encrypt a file

The `encryptFile` method `public function encryptFile(string $filePath, string $rawPassword)` locates a file and replaces its existing content with his encrypted content using the provided password. The password must be provided in raw text.

Example :
```php 
LaraFileEncrypter::encryptFile(
  storage_path('app/files/secret-file.pdf'),
  'mysecurerawpassword'
);
```

You can add a salt :
```php 
LaraFileEncrypter::encryptFile(
  storage_path('app/files/secret-file.pdf'),
  'mysecurerawpassword'.$salt
);
```

### Decrypt a file

The `LaraFileEncrypter` facade provides two methods for decrypting a file. One method streamDownload (`decryptAndStreamDownloadFile()`) the file, while the other decrypts the file's content (`decryptContentFile()`).

```php 
public function decryptAndStreamDownloadFile(string $filePath, string $rawPassword)
```

and

```php
public function decryptContentFile(string $filePath, string $rawPassword)
```

Examples : 

```php
LaraFileEncrypter::decryptAndStreamDownloadFile(
  storage_path('app/files/secret-file.pdf'),
  'mysecurerawpassword'
);
```

and 

```php
LaraFileEncrypter::decryptContentFile(
  storage_path('app/files/secret-file.pdf'),
  'mysecurerawpassword'
);
```

 You must, of course, provide the same password as used in the encryption step.
 

## License

This package is licensed under the [license MIT](http://opensource.org/licenses/MIT).

## Other Projects

Explore my other projects on GitHub:

- **[Crud Generator Laravel](https://github.com/misterdebug/crud-generator-laravel)**: Create a Laravel 10 CRUD in a few seconds
