<?php

namespace Naroat\Ivory\Cryptor;

class Cryptor
{
    /**
     * 生成RSA私钥和公钥文件
     * @param string $privateKeyFile 私钥文件名
     * @param string $publicKeyFile 公钥文件名
     * @param int $keySize 密钥大小，默认为2048
     * @throws \Exception 如果密钥生成失败
     */
    public static function genRsaKeys(string $privateKeyFile = 'private_key.pem', string $publicKeyFile = 'public_key.pem', int $keySize = 2048): void
    {
        // 生成RSA密钥对
        $config = [
            "digest_alg" => "sha256",
            "private_key_bits" => $keySize,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        // 创建私钥
        $res = openssl_pkey_new($config);
        if (!$res) {
            throw new \Exception("私钥生成失败。");
        }

        // 导出私钥
        openssl_pkey_export($res, $privateKey);
        file_put_contents($privateKeyFile, $privateKey); // 保存私钥到文件

        // 生成公钥
        $keyDetails = openssl_pkey_get_details($res);
        $publicKey = $keyDetails['key'];
        file_put_contents($publicKeyFile, $publicKey); // 保存公钥到文件
    }

    /**
     * 生成RSA私钥和公钥文件，并返回密钥对
     * @param string $privateKeyFile 私钥文件名
     * @param string $publicKeyFile 公钥文件名
     * @param int $keySize 密钥大小，默认为2048
     * @return array 返回生成的私钥和公钥
     * @throws \Exception 如果密钥生成失败
     */
    public static function genRsaKeyPair(string $privateKeyFile = 'private_key.pem', string $publicKeyFile = 'public_key.pem', int $keySize = 2048): array
    {
        // 生成RSA密钥对
        $config = [
            "digest_alg" => "sha256",
            "private_key_bits" => $keySize,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        // 创建私钥
        $res = openssl_pkey_new($config);
        if (!$res) {
            throw new \Exception("私钥生成失败。");
        }

        // 导出私钥
        openssl_pkey_export($res, $privateKey);
        file_put_contents($privateKeyFile, $privateKey); // 保存私钥到文件

        // 生成公钥
        $keyDetails = openssl_pkey_get_details($res);
        $publicKey = $keyDetails['key'];
        file_put_contents($publicKeyFile, $publicKey); // 保存公钥到文件

        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
        ];
    }

    /**
     * 使用公钥文件加密数据
     * @param string $data 要加密的数据
     * @param string $publicKeyFile 公钥文件路径
     * @return string 返回加密后的数据(base64编码)
     * @throws \Exception 如果公钥文件无法读取或加密失败
     */
    public static function encryptWithPublicKey(string $data, string $publicKeyFile): string
    {
        // 读取公钥文件
        $publicKey = file_get_contents($publicKeyFile);
        if ($publicKey === false) {
            throw new \Exception("无法读取公钥文件: $publicKeyFile");
        }

        // 创建公钥资源
        $keyResource = openssl_pkey_get_public($publicKey);
        if ($keyResource === false) {
            throw new \Exception("无效的公钥格式。");
        }

        // 使用公钥加密数据
        $encrypted = '';
        if (!openssl_public_encrypt($data, $encrypted, $keyResource)) {
            throw new \Exception("数据加密失败。");
        }

        return base64_encode($encrypted);
    }

    /**
     * 使用私钥文件解密数据
     * @param string $encryptedData 要解密的数据（Base64编码）
     * @param string $privateKeyFile 私钥文件路径
     * @return string 返回解密后的数据
     * @throws \Exception 如果私钥文件无法读取或解密失败
     */
    public static function decryptWithPrivateKey(string $encryptedData, string $privateKeyFile): string
    {
        // 读取私钥文件
        $privateKey = file_get_contents($privateKeyFile);
        if ($privateKey === false) {
            throw new \Exception("无法读取私钥文件: $privateKeyFile");
        }

        // 创建私钥资源
        $keyResource = openssl_pkey_get_private($privateKey);
        if ($keyResource === false) {
            throw new \Exception("无效的私钥格式。");
        }

        // 解码Base64编码的数据
        $encryptedData = base64_decode($encryptedData);
        if ($encryptedData === false) {
            throw new \Exception("无效的Base64编码数据。");
        }

        // 使用私钥解密数据
        $decrypted = '';
        if (!openssl_private_decrypt($encryptedData, $decrypted, $keyResource)) {
            throw new \Exception("数据解密失败。");
        }

        return $decrypted; // 返回解密后的数据
    }
}