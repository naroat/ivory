<?php

namespace Naroat\Ivory\Random;

class Random
{
    /**
     * 生成随机字符串
     * @param int $length 长度
     * @param string $chars 指定字符范围(默认：0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz)
     * @return string
     */
    public static function randString(int $length = 6, string $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'): string
    {
        $chars = str_split($chars);
        $chars = array_map(function ($i) use ($chars) {
            return $chars[$i];
        }, array_rand($chars, $length));
        // 打乱数组顺序, 用于处理array_rang当length和chars相同时，会返回相同的索引的情况
        shuffle($chars);
        return implode($chars);
    }

    /**
     * 生成随机数组
     * @param int $size 数组大小
     * @param int $min 元素最小值
     * @param int $max 元素最大值
     * @param bool $allowDuplicates 是否允许重复元素
     * @return array 返回生成的随机数组
     */
    public static function randArray(int $size, int $min, int $max, bool $allowDuplicates = true): array
    {
        $randomArray = [];

        if ($allowDuplicates) {
            // 允许重复元素
            for ($i = 0; $i < $size; $i++) {
                $randomArray[] = rand($min, $max);
            }
        } else {
            // 不允许重复元素
            if ($max - $min + 1 < $size) {
                throw new \Exception("无法生成不重复的随机数组，范围太小。");
            }
            $randomArray = range($min, $max);
            shuffle($randomArray);
            $randomArray = array_slice($randomArray, 0, $size);
        }

        return $randomArray;
    }

    /**
     * 随机生成布尔值
     * @return bool 返回生成的布尔值
     */
    public static function randBool(): bool
    {
        return (bool) rand(0, 1); // 随机生成0或1，并转换为布尔值
    }

    /**
     * 随机生成RGB颜色
     * @return string 返回生成的RGB颜色字符串
     */
    public static function genRandomRgbColor(): string
    {
        $r = rand(0, 255); // 随机生成红色分量
        $g = rand(0, 255); // 随机生成绿色分量
        $b = rand(0, 255); // 随机生成蓝色分量
        return "rgb($r, $g, $b)"; // 返回RGB格式的颜色字符串
    }

    /**
     * 随机生成HEX颜色
     * @return string 返回生成的HEX颜色字符串
     */
    public static function genRandomHexColor(): string
    {
        $color = sprintf("#%06X", rand(0, 0xFFFFFF)); // 随机生成HEX格式的颜色
        return $color; // 返回HEX格式的颜色字符串
    }

    /**
     * 随机选择一个或多个元素
     * @param array $array 输入数组
     * @param int $count 要返回的元素数量
     * @return array 返回随机选择的元素
     * @throws \Exception 如果请求的数量超过数组大小
     */
    public static function selectRandom(array $array, int $count = 1): array
    {
        if ($count > count($array)) {
            throw new \Exception("请求的数量超过数组大小。");
        }

        // 随机选择元素
        $randomKeys = array_rand($array, $count);
        if ($count === 1) {
            return [$array[$randomKeys]]; // 返回单个元素
        }

        return array_intersect_key($array, array_flip($randomKeys)); // 返回多个元素
    }
}