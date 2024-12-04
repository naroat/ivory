<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function genRsaKeysExample() {
    // 默认当前目录下生成 private_key.pem 和 public_key.pem
    \Naroat\Ivory\Cryptor\Cryptor::genRsaKeys();

    //指定生成路径
    \Naroat\Ivory\Cryptor\Cryptor::genRsaKeys('./examples/private_key.pem', './examples/public_key.pem');
}

function genRsaKeyPairExample()
{
    // 返回 RSA 密钥对，并保存文件，默认当前目录下生成 private_key.pem 和 public_key.pem
    $keyPair = \Naroat\Ivory\Cryptor\Cryptor::genRsaKeyPair();
    var_dump($keyPair);
    //Output: array(2) {
    //  ["privateKey"]=> '...',
    //  ["publicKey"]=> '...',
    //}

    // 返回 RSA 密钥对，并指定生成路径保存文件
//    $keyPair = \Naroat\Ivory\Cryptor\Cryptor::genRsaKeyPair('./examples/private_key.pem', './examples/public_key.pem');
//    var_dump($keyPair);
    //Output: array(2) {
    //  ["privateKey"]=> '...',
    //  ["publicKey"]=> '...',
    //}
}

function encryptWithPublicKeyExample() {
    $publicKey = './public_key.pem'; // 公钥
    $data = 'Hello, Ivory!';
    $encryptedData = \Naroat\Ivory\Cryptor\Cryptor::encryptWithPublicKey($data, $publicKey);
    var_dump($encryptedData);
    //Output: string(344) "gAhWro7LsJPBk/ZyNbjJt/TtjAZ/w9kSPVF6Ut0vvdigLprbM3254knCZ76n+Y5jRSCNrmuAGEAgFrqNJH5/APBxOT6P6RF4898797pgl01q+S5OJQ8stA2QwTjz2eJ7KpCYhq6pGyKqKsahvHVWoOnA3m02WzxvbquW+gRUJ4Z/R8RIo/zBYuK0BctONBYIZJ5+zlpXzgvpsgDffPTYXD20Z+uf/dkKn+8foJsQ79LsFpfcCJm1yTrpoCk4vSmwxM5OT2OqvPuov3hbXc9xgQ+Ld0QbtBl7WocQjW5bWPNn0OGX7I/2XYVz7rjHIyIxGfEJn4LF+hHs3lv2v1/v5g=="
}

function decryptWithPrivateKeyExample() {
    $privateKey = './private_key.pem'; // 私钥
    $encryptedData = 'gAhWro7LsJPBk/ZyNbjJt/TtjAZ/w9kSPVF6Ut0vvdigLprbM3254knCZ76n+Y5jRSCNrmuAGEAgFrqNJH5/APBxOT6P6RF4898797pgl01q+S5OJQ8stA2QwTjz2eJ7KpCYhq6pGyKqKsahvHVWoOnA3m02WzxvbquW+gRUJ4Z/R8RIo/zBYuK0BctONBYIZJ5+zlpXzgvpsgDffPTYXD20Z+uf/dkKn+8foJsQ79LsFpfcCJm1yTrpoCk4vSmwxM5OT2OqvPuov3hbXc9xgQ+Ld0QbtBl7WocQjW5bWPNn0OGX7I/2XYVz7rjHIyIxGfEJn4LF+hHs3lv2v1/v5g=='; // 待解密数据
    $decryptedData = \Naroat\Ivory\Cryptor\Cryptor::decryptWithPrivateKey($encryptedData, $privateKey);
    var_dump($decryptedData);
    //Output: string(13) "Hello, Ivory!"
}

//genRsaKeysExample();
//genRsaKeyPairExample();
//encryptWithPublicKeyExample();
decryptWithPrivateKeyExample();