# DateTime

Contains date and time related processing.

## Table of Contents

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

## Document

### getMsectime

Get millisecond timestamp

Method:
```php
public static function getMsectime(): int
```

Example:
```php
$res = \Naroat\Ivory\DateTime\DateTime::getMsectime();
var_dump($res);
//output: int(1733217511706)
```

### msecToDate

Milliseconds to date

Method:
```php
public static function msecToDate(int $msectime, string $format = "Y-m-d H:i:s.x"): string
```

Example:
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

Date to milliseconds

Method:
```php
public static function dateToMsec(string $mescdate): int
```

Example:
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

Find the number of days between two dates

Method:
```php
public static function dateDiff(string $startDate, string $endDate): int
```

Parameter description:
- `startDate`: first date（format：Y-m-d）
- `endDate`: second date（format：Y-m-d）

Example:
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

Returns the number of seconds between two times

Method:
```php
public static function timeDiff(string $startTime, string $endTime): int
```

Parameter description:
- `startTime`:  first time（format：Y-m-d H:i:s）
- `endTime`: second time（format：Y-m-d H:i:s）

Example:
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

Verify whether it is a leap year

Method:
```php
public static function isLeapYear(int $year): bool
```

Example:
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

Returns the day of the year for the parameter date

Method:
```php
public static function dayOfYear(string $date): int
```

Example:
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

Get the date range for the week of the specified date

Method:
```php
public static function weekRange(string $date, string $format = 'Y-m-d'): array
```

Example:
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

Get the date range for the month of the specified date

Method:
```php
public static function monthRange(string $date, string $format = 'Y-m-d'): array
```

Example:
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

Query all dates, months, and years within a specified time range

Method:
```php
public static function dateByInterval(string $startDate, string $endDate, string $type): array
```

Parameter description:
- `startDate`: start time（format：Y-m-d）
- `endDate`: end time（format：Y-m-d）
- `type`: optional values：`day`，`month`，`year`

Example:
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

