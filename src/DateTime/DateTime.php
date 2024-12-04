<?php

namespace Naroat\Ivory\DateTime;

class DateTime
{
    /**
     * 获取毫秒级别的时间戳
     *
     * @return int
     */
    public static function getMsectime(): int
    {
        list($msec, $sec) = explode(' ', microtime());
        $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        return (int)$msectime;
    }

    /**
     * 毫秒转日期
     *
     * @param $msectime
     * @param $format
     * @return array|false|string|string[]
     */
    public static function msecToDate(int $msectime, string $format = "Y-m-d H:i:s.x"): string
    {
        $msectime = $msectime * 0.001;
        if (strstr($msectime, '.')) {
            sprintf("%01.3f", $msectime);
            list($usec, $sec) = explode(".", $msectime);
            $sec = str_pad($sec, 3, "0", STR_PAD_RIGHT);
        } else {
            $usec = $msectime;
            $sec = "000";
        }
        $date = date($format, $usec);
        return $mescdate = str_replace('x', $sec, $date);
    }

    /**
     * 日期转毫秒
     *
     * @param $mescdate
     * @return int
     */
    public static function dateToMsec(string $mescdate): int
    {
        $mescdate_arr = explode(".", $mescdate);
        $usec = $mescdate_arr[0];
        $sec = isset($mescdate_arr[1]) ? $mescdate_arr[1] : 0;
        $date = strtotime($usec);
        $return_data = str_pad($date . $sec, 13, "0", STR_PAD_RIGHT);
        return (int)$return_data;
    }

    /**
     * 求两个日期之间相差的天数
     * @param string $startDate 第一个日期（格式：Y-m-d）
     * @param string $endDate 第二个日期（格式：Y-m-d）
     * @return int 返回两个日期之间相差的天数
     * @throws \Exception 如果日期格式不正确
     */
    public static function dateDiff(string $startDate, string $endDate): int
    {
        $startDateTime = new \DateTime($startDate);
        $endDateTime = new \DateTime($endDate);
        
        $interval = $startDateTime->diff($endDateTime);
        
        return (int) $interval->days; // 返回相差的天数
    }

    /**
     * 返回两个时间的间隔秒数
     * @param string $startTime 第一个时间（格式：Y-m-d H:i:s）
     * @param string $endTime 第二个时间（格式：Y-m-d H:i:s）
     * @return int 返回两个时间之间的间隔秒数
     * @throws \Exception 如果时间格式不正确
     */
    public static function timeDiff(string $startTime, string $endTime): int
    {
        $startDateTime = new \DateTime($startTime);
        $endDateTime = new \DateTime($endTime);
        
        $interval = $startDateTime->diff($endDateTime);
        
        return (int) $interval->format('%s') + ($interval->days * 86400); // 返回间隔的秒数
    }

    /**
     * 验证是否是闰年
     * @param int $year 要验证的年份
     * @return bool 返回是否是闰年
     */
    public static function isLeapYear(int $year): bool
    {
        // 闰年的条件：能被4整除且不能被100整除，或者能被400整除
        return ($year % 4 === 0 && $year % 100 !== 0) || ($year % 400 === 0);
    }

    /**
     * 返回参数日期是一年中的第几天
     * @param string $date 日期字符串（格式：Y-m-d）
     * @return int 返回该日期是一年中的第几天
     */
    public static function dayOfYear(string $date): int
    {
        $datetime = new \DateTime($date);
        return (int) $datetime->format('z') + 1; // 'z' 返回从0开始的天数，加1使其从1开始
    }

    /**
     * 获取指定日期的那一周的日期范围
     * @param string $date 指定日期（格式：Y-m-d）
     * @param string $format 日期格式，默认为 'Y-m-d'
     * @return array 返回指定日期所在周的开始和结束日期
     */
    public static function weekRange(string $date, string $format = 'Y-m-d'): array
    {
        $datetime = new \DateTime($date);
        $startOfWeek = clone $datetime;
        $endOfWeek = clone $datetime;

        // 获取周一和周日
        $startOfWeek->modify('monday this week');
        $endOfWeek->modify('sunday this week');

        return [
            'start' => $startOfWeek->format($format),
            'end' => $endOfWeek->format($format),
        ];
    }

    /**
     * 获取指定日期的那一月的日期范围
     * @param string $date 指定日期（格式：Y-m-d）
     * @param string $format 日期格式，默认为 'Y-m-d'
     * @return array 返回指定日期所在月的开始和结束日期
     */
    public static function monthRange(string $date, string $format = 'Y-m-d'): array
    {
        $datetime = new \DateTime($date);

        $startClone = clone $datetime;
        $startOfMonth = $startClone->setDate($startClone->format('Y'), $startClone->format('m'), 1);

        $endClone = clone $datetime;
        $endOfMonth = $endClone->setDate($endClone->format('Y'), $endClone->format('m'), $endClone->format('t'));

        return [
            'start' => $startOfMonth->format($format),
            'end' => $endOfMonth->format($format),
        ];
    }

    /**
     * 查询指定时间范围内的所有日期、月份、年份
     * @param string $startDate 指定开始时间（格式：Y-m-d）
     * @param string $endDate 指定结束时间（格式：Y-m-d）
     * @param string $type 类型：day（天）、month（月份）、year（年份）
     * @return array 返回指定时间范围内的日期、月份或年份
     * @throws \Exception 如果日期格式不正确
     */
    public static function dateByInterval(string $startDate, string $endDate, string $type): array
    {
        if (date('Y-m-d', strtotime($startDate)) != $startDate || date('Y-m-d', strtotime($endDate)) != $endDate) {
            throw new \Exception("日期格式不正确，必须为 Y-m-d 格式。");
        }

        $tempDate = $startDate;
        $returnData = [];
        $i = 0;

        switch ($type) {
            case 'day': // 查询所有日期
                while (strtotime($tempDate) <= strtotime($endDate)) {
                    $returnData[] = date('Y-m-d', strtotime($tempDate));
                    $tempDate = date('Y-m-d', strtotime('+' . ++$i . ' day', strtotime($startDate)));
                }
                break;

            case 'month': // 查询所有月份
                while (strtotime($tempDate) <= strtotime($endDate)) {
                    $returnData[] = date('Y-m', strtotime($tempDate));
                    $tempDate = date('Y-m-01', strtotime('+' . ++$i . ' month', strtotime($startDate)));
                }
                break;

            case 'year': // 查询所有年份
                while (strtotime($tempDate) <= strtotime($endDate)) {
                    $returnData[] = date('Y', strtotime($tempDate));
                    $tempDate = date('Y-01-01', strtotime('+' . ++$i . ' year', strtotime($startDate)));
                }
                break;

            default:
                throw new \Exception("无效的类型，必须为 day、month 或 year。");
        }

        return $returnData;
    }
}