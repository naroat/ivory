# Cryptor

The package contains data encryption and decryption functions

## Table of Contents

- [genRsaKeyPair](#genRsaKeyPair)
- [encryptWithPublicKey](#encryptWithPublicKey)
- [decryptWithPrivateKey](#decryptWithPrivateKey)
- [genRsaKeys](#genRsaKeys)

## Document

### genRsaKeyPair

Generate the RSA private key and public key files and return the key pair

Method:
```php
public static function genRsaKeyPair(string $privateKeyFile = 'private_key.pem', string $publicKeyFile = 'public_key.pem', int $keySize = 2048): array
```

Example:
```php
// Return the RSA key pair and save the file. By default, private_key.pem and public_key.pem are generated in the current directory
$keyPair = \Naroat\Ivory\Cryptor\Cryptor::genRsaKeyPair();
var_dump($keyPair);
//Output: array(2) {
//  ["privateKey"]=> '...',
//  ["publicKey"]=> '...',
//}

// Return the RSA key pair and specify the generation path to save the file
$keyPair = \Naroat\Ivory\Cryptor\Cryptor::genRsaKeyPair('./examples/private_key.pem', './examples/public_key.pem');
var_dump($keyPair);
//Output: array(2) {
//  ["privateKey"]=> '...',
//  ["publicKey"]=> '...',
//}
```

### encryptWithPublicKey

Encrypt data using the public key file

Method:
```php
public static function encryptWithPublicKey(string $data, string $publicKeyFile): string
```

Example:
```php
$publicKey = './public_key.pem'; // Public key
$data = 'Hello, Ivory!';
$encryptedData = \Naroat\Ivory\Cryptor\Cryptor::encryptWithPublicKey($data, $publicKey);
var_dump($encryptedData);
//Output: string(344) "gAhWro7LsJPBk/ZyNbjJt/TtjAZ/w9kSPVF6Ut0vvdigLprbM3254knCZ76n+Y5jRSCNrmuAGEAgFrqNJH5/APBxOT6P6RF4898797pgl01q+S5OJQ8stA2QwTjz2eJ7KpCYhq6pGyKqKsahvHVWoOnA3m02WzxvbquW+gRUJ4Z/R8RIo/zBYuK0BctONBYIZJ5+zlpXzgvpsgDffPTYXD20Z+uf/dkKn+8foJsQ79LsFpfcCJm1yTrpoCk4vSmwxM5OT2OqvPuov3hbXc9xgQ+Ld0QbtBl7WocQjW5bWPNn0OGX7I/2XYVz7rjHIyIxGfEJn4LF+hHs3lv2v1/v5g=="
```

### decryptWithPrivateKey

Decrypt data using private key file

Method:
```php
public static function decryptWithPrivateKey(string $encryptedData, string $privateKeyFile): string
```

Example:
```php
$privateKey = './private_key.pem'; // private key
$encryptedData = 'gAhWro7LsJPBk/ZyNbjJt/TtjAZ/w9kSPVF6Ut0vvdigLprbM3254knCZ76n+Y5jRSCNrmuAGEAgFrqNJH5/APBxOT6P6RF4898797pgl01q+S5OJQ8stA2QwTjz2eJ7KpCYhq6pGyKqKsahvHVWoOnA3m02WzxvbquW+gRUJ4Z/R8RIo/zBYuK0BctONBYIZJ5+zlpXzgvpsgDffPTYXD20Z+uf/dkKn+8foJsQ79LsFpfcCJm1yTrpoCk4vSmwxM5OT2OqvPuov3hbXc9xgQ+Ld0QbtBl7WocQjW5bWPNn0OGX7I/2XYVz7rjHIyIxGfEJn4LF+hHs3lv2v1/v5g=='; // 待解密数据
$decryptedData = \Naroat\Ivory\Cryptor\Cryptor::decryptWithPrivateKey($encryptedData, $privateKey);
var_dump($decryptedData);
//Output: string(13) "Hello, Ivory!"
```

### genRsaKeys

Generate RSA private and public key files

> (Abandoned, please use genRsaKeyPair)

Method:
```php
public static function genRsaKeys(string $privateKeyFile = 'private_key.pem', string $publicKeyFile = 'public_key.pem', int $keySize = 2048): void
```

Example:
```php
// By default, private_key.pem and public_key.pem are generated in the current directory
\Naroat\Ivory\Cryptor\Cryptor::genRsaKeys();

// Specify the generation path
\Naroat\Ivory\Cryptor\Cryptor::genRsaKeys('./examples/private_key.pem', './examples/public_key.pem');
```
