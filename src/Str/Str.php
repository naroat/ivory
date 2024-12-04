<?php

namespace Naroat\Ivory\Str;

class Str
{
    /**
     * 转换为驼峰命名
     * @param string $str
     * @return string
     */
    public static function toCamelCase(string $str): string
    {
        $str = str_replace(['-', '_'], ' ', $str);
        $str = ucwords($str);
        return lcfirst(str_replace(' ', '', $str));
    }

    /**
     * 转换为蛇形命名
     * @param string $str
     * @return string
     */
    public static function toSnakeCase(string $str): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $str));
    }

    /**
     * 将字符串转换为kebab-case命名。
     * @param string $str
     * @return string
     */
    public static function toKebabCase(string $str): string
    {
        return strtolower(preg_replace('/(?<!^)(?=[A-Z])/', '-', $str));
    }

    /**
     * 用另一个字符串包裹一个字符串。
     * @param string $str
     * @param string $wrapper
     * @return string
     */
    public static function wrap(string $str, string $wrapper): string
    {
        return $wrapper . $str . $wrapper;
    }

    /**
     * 移除字符串两端的包裹字符串。
     * @param string $str
     * @param string $wrapper
     * @return string
     */
    public static function unwrap(string $str, string $wrapper): string
    {
        return str_replace($wrapper, '', $str);
    }

    /**
     * 检查字符串是否以指定字符串数组中的任何一个开头
     * @param string $str 要检查的字符串
     * @param array<string> $prefixes 前缀字符串数组
     * @return bool
     */
    public static function startsWithAny(string $str, array $prefixes): bool
    {
        foreach ($prefixes as $prefix) {
            if (substr($str, 0, strlen($prefix)) === $prefix) {
                return true;
            }
        }
        return false;
    }

    /**
     * 检查字符串是否以指定字符串数组中的任何一个结尾
     * @param string $str 要检查的字符串
     * @param array<string> $suffixes 后缀字符串数组
     * @return bool
     */
    public static function endsWithAny(string $str, array $suffixes): bool
    {
        foreach ($suffixes as $suffix) {
            if (substr($str, -strlen($suffix)) === $suffix) {
                return true;
            }
        }
        return false;
    }

    /**
     * 替换字符串中指定范围内的字符
     * @param string $str 原始字符串
     * @param string $replacement 替换的内容
     * @param int $start 起始位置（从0开始）
     * @param int|null $length 替换的长度，如果为null则替换到字符串末尾
     * @return string
     */
    public static function replaceRange(string $str, string $replacement, int $start, ?int $length = null): string
    {
        if ($start < 0) {
            $start = strlen($str) + $start;
        }

        if ($length === null) {
            $length = strlen($str) - $start;
        } elseif ($length < 0) {
            $length = strlen($str) - $start + $length;
        }

        return substr_replace($str, $replacement, $start, $length);
    }

    /**
     * 私隐化邮箱
     * @param $email
     * @param $char
     * @return string
     */
    public static function hideEmail(string $email, string $char = '***@'): string
    {
        if (empty($email)) {
            return $email;
        }

        $email_array = explode("@", $email);
        //邮箱前缀
        $prevfix = (strlen($email_array[0]) < 4) ? "" : substr($email, 0, 3);
        $str = preg_replace('/([\d\w+_-]{0,100})@/', $char, $email, -1);
        return $prevfix . $str;
    }

    /**
     * 私隐化手机号码
     * @param $phone
     * @param $char
     * @return string
     */
    public static function hidePhone(string $phone, string $char = '****'): string
    {
        // 手机号正则
        $mobilePattern = '/^1[3-9]\d{9}$/';

        if (preg_match($mobilePattern, $phone)) {
            // 隐私化手机号码（示例：138****1234）
            return preg_replace('/(\d{3})(\d{4})(\d{4})/', '$1' . $char . '$3', $phone);
        }

        return $phone; // 如果不匹配，则返回原始字符串
    }

    /**
     * 删除字符串中的空格
     * @param string $str 原始字符串
     * @param bool $replaceAll 是否删除所有空格，true删除所有空格，false将多个空格替换为一个空格
     * @return string
     */
    public static function removeSpace(string $str, bool $replaceAll = true): string
    {
        if ($replaceAll) {
            return preg_replace('/\s+/', '', $str);
        }
        
        return preg_replace('/\s+/', ' ', $str);
    }

    /**
     * 将字符串截断到指定长度，并在末尾添加省略号
     * @param string $str 原始字符串
     * @param int $length 目标长度（不包含省略号）
     * @param string $ellipsis 省略号字符串
     * @return string
     */
    public static function truncate(string $str, int $length, string $ellipsis = '...'): string
    {
        if (mb_strlen($str) <= $length) {
            return $str;
        }

        return mb_substr($str, 0, $length) . $ellipsis;
    }

    /**
     * 按指定的字符数旋转字符串
     * @param string $str 原始字符串
     * @param int $shift 旋转的字符数（正数向右旋转，负数向左旋转）
     * @param bool $preserveUnicode 是否保持Unicode字符完整性（处理中文等多字节字符）
     * @return string
     */
    public static function rotate(string $str, int $shift, bool $preserveUnicode = true): string
    {
        if (empty($str) || $shift === 0) {
            return $str;
        }

        if ($preserveUnicode) {
            $chars = preg_split('//u', $str, -1, PREG_SPLIT_NO_EMPTY);
            $length = count($chars);
        } else {
            $length = strlen($str);
            $chars = str_split($str);
        }

        // 标准化位移量，确保它在字符串长度范围内
        $shift = $shift % $length;
        if ($shift < 0) {
            $shift = $length + $shift;
        }

        // 执行旋转
        $right = array_splice($chars, -$shift);
        return implode('', array_merge($right, $chars));
    }

    /**
     * 清除字符串中的HTML标签
     * @param string $str 原始字符串
     * @param string $allowableTags 允许保留的标签（可以是字符串如'<p><a>'）
     * @param bool $removeLineBreaks 是否同时移除换行符
     * @return string
     */
    public static function stripHtml(string $str, string $allowableTags = '', bool $removeLineBreaks = false): string
    {
        if (empty($str)) {
            return $str;
        }

        // 如果allowableTags是数组，转换为strip_tags可接受的格式
        if (is_array($allowableTags)) {
            $allowableTags = '<' . implode('><', $allowableTags) . '>';
        }

        $str = strip_tags($str, $allowableTags);

        if ($removeLineBreaks) {
            $str = str_replace(["\r", "\n"], '', $str);
        }

        return trim($str);
    }

    /**
     * 人民币转大写，最大支持千亿
     * @param float $num 金额
     * @return string
     */
    public static function rmbUpper(float $num): string
    {
        $num = round($num,2);  //取两位小数
        $num = ''.$num;  //转换成数字
        $arr = explode('.',$num);

        $str_left = $arr[0];
        $str_right = $arr[1] ?? 0;

        $len_left = strlen($str_left); //小数点左边的长度
        $len_right = strlen($str_right); //小数点右边的长度

        //循环将字符串转换成数组，
        for($i=0;$i<$len_left;$i++)
        {
            $arr_left[] = substr($str_left,$i,1);
        }

        for($i=0;$i<$len_right;$i++)
        {
            $arr_right[] = substr($str_right,$i,1);
        }

        //构造数组$daxie
        $daxie = array(
            '0'=>'零',
            '1'=>'壹',
            '2'=>'贰',
            '3'=>'叁',
            '4'=>'肆',
            '5'=>'伍',
            '6'=>'陆',
            '7'=>'柒',
            '8'=>'捌',
            '9'=>'玖',
        );

        //循环将数组$arr_left中的值替换成大写
        foreach($arr_left as $k => $v)
        {
            $arr_left[$k] = $daxie[$v];
            switch($len_left--)
            {
                //数值后面追加金额单位
                case 9:
                    $arr_left[$k] .= '亿';break;
                case 5:
                    $arr_left[$k] .= '万';break;
                case 4:
                case 8:
                case 12:
                    $arr_left[$k] .= '仟';break;
                case 3:
                case 7:
                case 11:
                    $arr_left[$k] .= '佰';break;
                case 2:
                case 6:
                case 10:
                    $arr_left[$k] .= '拾';break;
                default:
                    $arr_left[$k] .= '元';break;
            }
        }

        foreach($arr_right as $k =>$v)
        {
            $arr_right[$k] = $daxie[$v];
            switch($len_right--)
            {
                case 2:
                    $arr_right[$k] .= '角';break;
                default:
                    $arr_right[$k] .= '分';break;
            }
        }

        //将数组转换成字符串，并拼接在一起
        $new_left_str = implode('',$arr_left);
        $new_right_str = implode('',$arr_right);

        $new_str = $new_left_str.$new_right_str;

        //如果金额中带有0，大写的字符串中将会带有'零仟零佰零拾',这样的字符串，需要替换掉
        $new_str = str_replace('零万','零',$new_str);
        $new_str = str_replace('零仟','零',$new_str);
        $new_str = str_replace('零佰','零',$new_str);
        $new_str = str_replace('零拾','零',$new_str);
        $new_str = str_replace('零零零','零',$new_str);
        $new_str = str_replace('零零','零',$new_str);
        $new_str = str_replace('零元','元',$new_str);
        if ($new_str == "元零分") {
            $new_str = '零元零分';
        }
        return $new_str;
    }
}
