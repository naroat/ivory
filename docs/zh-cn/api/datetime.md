# DateTime

包含日期时间的相关处理。

## 目录

- [getMsectime](#getMsectime)
- [msecToDate](#msecToDate)
- [dateToMsec](#dateToMsec)
- [dateDiff](#dateDiff)
- [timeDiff](#timeDiff)
- [isLeapYear](#isLeapYear)
- [dayOfYear](#dayOfYear)
- [weekRange](#weekRange)
- [monthRange](#monthRange)
- [dateByInterval](#dateByInterval)

## 文档


### getMsectime

获取毫秒级别的时间戳

方法:
```php
public static function getMsectime(): int
```

示例:
```php
$res = \Naroat\Ivory\DateTime\DateTime::getMsectime();
var_dump($res);
//output: int(1733217511706)
```

### msecToDate

毫秒转日期

方法:
```php
public static function msecToDate(int $msectime, string $format = "Y-m-d H:i:s.x"): string
```

示例:
```php
$msec = 1733217511706;
$res = \Naroat\Ivory\DateTime\DateTime::msecToDate($msec);
var_dump($res);
//output: string(26) "2024-12-03 09:18:31.706"

$res = \Naroat\Ivory\DateTime\DateTime::msecToDate($msec, 'Y-m-d H:i:s');
var_dump($res);
//output: string(19) "2024-12-03 09:18:31"
```

### dateToMsec

日期转毫秒

方法:
```php
public static function dateToMsec(string $mescdate): int
```

示例:
```php
$date = '2024-12-03 09:18:31.706';
$res = \Naroat\Ivory\DateTime\DateTime::dateToMsec($date);
var_dump($res);
//output: int(1733217511706)

$date = '2024-12-03 09:18:31';
$res = \Naroat\Ivory\DateTime\DateTime::dateToMsec($date);
var_dump($res);
//output: int(1733217511000)
```


### dateDiff

求两个日期之间相差的天数

方法:
```php
public static function dateDiff(string $startDate, string $endDate): int
```

参数说明：
- `startDate`: 第一个日期（格式：Y-m-d）
- `endDate`: 第二个日期（格式：Y-m-d）

示例:
```php
$startDate = '2024-10-03';
$endDate = '2024-12-10';
$res = \Naroat\Ivory\DateTime\DateTime::dateDiff($startDate, $endDate);
var_dump($res);
//output:
//int(68)

$startDate = '2024-10-03';
$endDate = '2024-09-10';
$res = \Naroat\Ivory\DateTime\DateTime::dateDiff($startDate, $endDate);
var_dump($res);
//output:
//int(23)
```


### timeDiff

返回两个时间的间隔秒数

方法:
```php
public static function timeDiff(string $startTime, string $endTime): int
```

参数说明:
- `startTime`: 第一个时间（格式：Y-m-d H:i:s）
- `endTime`: 第二个时间（格式：Y-m-d H:i:s）

示例:
```php
$startTime = '2024-10-03 10:30:20';
$endTime = '2024-10-03 10:30:56';
$res = \Naroat\Ivory\DateTime\DateTime::timeDiff($startTime, $endTime);
var_dump($res);
//output:
//int(36)

$startTime = '2024-10-03 10:30:00';
$endTime = '2024-10-10 10:30:00';
$res = \Naroat\Ivory\DateTime\DateTime::timeDiff($startTime, $endTime);
var_dump($res);
//output:
//int(604800)
```

### isLeapYear

验证是否是闰年

方法:
```php
public static function isLeapYear(int $year): bool
```

示例:
```php
$year = 2024;
$res = \Naroat\Ivory\DateTime\DateTime::isLeapYear($year);
var_dump($res);
//output: bool(true)

$year = 2023;
$res = \Naroat\Ivory\DateTime\DateTime::isLeapYear($year);
var_dump($res);
//output: bool(false)
```


### dayOfYear

返回参数日期是一年中的第几天

方法:
```php
public static function dayOfYear(string $date): int
```

示例:
```php
$date = '2024-12-03';
$res = \Naroat\Ivory\DateTime\DateTime::dayOfYear($date);
var_dump($res);
//output: int(337)

$date = '2024-02-29';
$res = \Naroat\Ivory\DateTime\DateTime::dayOfYear($date);
var_dump($res);
//output: int(60)
```


### weekRange

获取指定日期的那一周的日期范围

方法:
```php
public static function weekRange(string $date, string $format = 'Y-m-d'): array
```

示例:
```php
$date = '2024-12-03';
$res = \Naroat\Ivory\DateTime\DateTime::weekRange($date);
var_dump($res);
//output: array(2) {
//  ["start"]=>
//  string(10) "2024-12-02"
//  ["end"]=>
//  string(10) "2024-12-08"
//}
```

### monthRange

获取指定日期的那一月的日期范围

方法:
```php
public static function monthRange(string $date, string $format = 'Y-m-d'): array
```

示例:
```php
$date = '2024-12-03';
$res = \Naroat\Ivory\DateTime\DateTime::monthRange($date);
var_dump($res);
//output: array(2) {
//  ["start"]=>
//  string(10) "2024-12-01"
//  ["end"]=>
//  string(10) "2024-12-31"
//}
```


### dateByInterval

查询指定时间范围内的所有日期、月份、年份

方法:
```php
public static function dateByInterval(string $startDate, string $endDate, string $type): array
```

参数说明:
- `startDate`: 开始时间（格式：Y-m-d）
- `endDate`: 结束时间（格式：Y-m-d）
- `type`: 类型，可选值：`day`（天），`month`（月份），`year`（年份）

示例:
```php
$startDate = '2024-11-25';
$endDate = '2024-12-01';
$res = \Naroat\Ivory\DateTime\DateTime::dateByInterval( $startDate, $endDate, 'day');
var_dump($res);
//output: array(7) {
//  [0]=>
//  string(10) "2024-11-25"
//  [1]=>
//  string(10) "2024-11-26"
//  [2]=>
//  string(10) "2024-11-27"
//  [3]=>
//  string(10) "2024-11-28"
//  [4]=>
//  string(10) "2024-11-29"
//  [5]=>
//  string(10) "2024-11-30"
//  [6]=>
//  string(10) "2024-12-01"
//}

$startDate = '2023-11-01';
$endDate = '2024-02-07';
$res = \Naroat\Ivory\DateTime\DateTime::dateByInterval( $startDate, $endDate, 'month');
var_dump($res);
//output: array(4) {
//  [0]=>
//  string(7) "2023-11"
//  [1]=>
//  string(7) "2023-12"
//  [2]=>
//  string(7) "2024-01"
//  [3]=>
//  string(7) "2024-02"
//}

$startDate = '2020-01-01';
$endDate = '2024-12-31';
$res = \Naroat\Ivory\DateTime\DateTime::dateByInterval( $startDate, $endDate, 'year');
var_dump($res);
//output: array(5) {
//  [0]=>
//  string(4) "2020"
//  [1]=>
//  string(4) "2021"
//  [2]=>
//  string(4) "2022"
//  [3]=>
//  string(4) "2023"
//  [4]=>
//  string(4) "2024"
//}
```

