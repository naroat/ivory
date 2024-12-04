<?php

namespace Naroat\Ivory\Validator;

class Validator
{
  /**
     * 验证字符串是否是有效的中国手机号码
     * @param string $mobile 要验证的手机号码
     * @return bool 返回验证结果
     */
    public static function isChineseMobile(string $mobile): bool
    {
        // 使用正则表达式验证手机号码格式
        return preg_match('/^1[3-9]\d{9}$/', $mobile) === 1;
    }

    /**
     * 验证字符串是否是有效的中国电话座机号码
     * @param string $phone 要验证的座机号码
     * @return bool 返回验证结果
     */
    public static function isChineseLandline(string $phone): bool
    {
        // 使用正则表达式验证座机号码格式
        return preg_match('/^(0[1-9]{1}\d{1,2}-?\d{7,8})$/', $phone) === 1;
    }

    /**
     * 验证字符串是否是有效的中国身份证号码
     * @param string $idCard 要验证的身份证号码
     * @return bool 返回验证结果
     */
    public static function isChineseIdNum(string $idCard): bool
    {
        return preg_match('/^\d{15}|\d{18}$/', $idCard);
    }

    /**
     * 验证字符串是否是强密码； 强密码要求至少包含 8 位字符, 至少包含大写字母, 小写字母, 数字, 特殊字符
     * @param string $password 要验证的密码
     * @return bool 返回验证结果
     */
    public static function validateStrongPassword(string $password): bool
    {
        // 检查密码长度
        if (strlen($password) < 8) {
            return false;
        }

        // 检查是否包含大写字母
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }

        // 检查是否包含小写字母
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }

        // 检查是否包含数字
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }

        // 检查是否包含特殊字符
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            return false;
        }

        return true; // 如果所有条件都满足，则返回true
    }

    /**
     * 验证字符串是否是有效的中国银联卡号
     * @param string $cardNumber 要验证的银联卡号
     * @return bool 返回验证结果
     */
    public static function isChinaUnionPay(string $cardNumber): bool
    {
        // 检查卡号是否为数字
        if (!preg_match('/^\d{16,19}$/', $cardNumber)) {
            return false; // 银行卡号必须是 16 到 19 位的数字
        }

        // 使用 Luhn 算法验证卡号
        return self::luhnCheck($cardNumber);
    }

    /**
     * 验证字符串是否是有效的美国银联卡号
     * @param string $cardNumber 要验证的卡号
     * @return bool 返回验证结果
     */
    public static function isUSAUnionPay(string $cardNumber): bool
    {
        // 检查卡号长度
        if (strlen($cardNumber) < 16 || strlen($cardNumber) > 19) {
            return false; // 银联卡号必须是 16 到 19 位
        }

        // 检查卡号是否以 62 开头（美国银联的标准卡一般为"62"打头）
        if (substr($cardNumber, 0, 2) !== '62') {
            return false;
        }

        // 使用 Luhn 算法验证卡号
        return self::luhnCheck($cardNumber);
    }

    /**
     * 验证字符串是否是有效的 Visa 卡号
     * @param string $cardNumber 要验证的卡号
     * @return bool 返回验证结果
     */
    public static function isVisa(string $cardNumber): bool
    {
        // 检查卡号长度
        if (strlen($cardNumber) !== 13 && strlen($cardNumber) !== 16) {
            return false; // Visa 卡号必须是 13 或 16 位
        }

        // 检查卡号是否以 4 开头
        if ($cardNumber[0] !== '4') {
            return false; // Visa 卡号必须以 4 开头
        }

        // 使用 Luhn 算法验证卡号
        return self::luhnCheck($cardNumber);
    }

    /**
     * Luhn 算法检查(银行卡号码校验算法)
     * @param string $number 要检查的卡号
     * @return bool 返回验证结果
     */
    private static function luhnCheck(string $number): bool
    {
        $sum = 0;
        $length = strlen($number);
        $parity = $length % 2;

        for ($i = 0; $i < $length; $i++) {
            $digit = (int)$number[$i];

            // 如果是偶数位，乘以 2
            if ($i % 2 === $parity) {
                $digit *= 2;
                // 如果结果大于 9，减去 9
                if ($digit > 9) {
                    $digit -= 9;
                }
            }

            $sum += $digit;
        }

        // 如果总和能被 10 整除，则卡号有效
        return $sum % 10 === 0;
    }
}