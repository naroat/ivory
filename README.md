English | [中文](./README_zh-CN.md)

<div align=center>
<img src="./docs/assets/images/logo-512x512.png" width="200" height="200"/>

<br/>
<br/>

![PHP version](https://img.shields.io/badge/php-%3E%3D7.2-blue)
![Composer version](https://img.shields.io/badge/composer-%3E%3D2.0-orange)
[![License](https://img.shields.io/badge/license-MIT-ddodger.svg)](https://github.com/naroat/ivory/blob/main/LICENSE)

</div>

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

