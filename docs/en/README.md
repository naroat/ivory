## What is Ivory?

Ivory is a practical, efficient and reusable PHP function toolkit. Help developers develop PHP applications more efficiently. The tools included in Ivory are:
- String
- Array
- Data & Time
- Cryptor
- File
- Network
- validator

Documentation：[https://naroat.github.io/ivory/](https://naroat.github.io/ivory/)

## Installation

Version requirements：
- PHP >= 7.2
- composer >= 2.0

Installation:
```shell
composer require naroat/ivory
```

## Use

Example: Find the number of days between two dates：
```php
$startDate = '2024-10-03';
$endDate = '2024-12-10';
$res = \Naroat\Ivory\DateTime\DateTime::dateDiff($startDate, $endDate);
var_dump($res);
//output:
//int(68)
```

Example: Example of a private email

```php
$res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com');
var_dump($res);
//output: "foo***@bar.com"

$res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com', '---@');
var_dump($res);
//output: "foo---@bar.com"
```

## More

For more features, please refer to [API](zh-cn/api/string.md).