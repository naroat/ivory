# Validator

包含常用字符串格式验证。

## 目录

- [isChineseMobile](#isChineseMobile)   
- [isChineseLandline](#isChineseLandline)   
- [isChineseIdNum](#isChineseIdNum)   
- [validateStrongPassword](#validateStrongPassword)   
- [isChinaUnionPay](#isChinaUnionPay)   
- [isUSAUnionPay](#isUSAUnionPay)   
- [isVisa](#isVisa)   

## 文档

### isChineseMobile

验证字符串是否是有效的中国手机号码

方法:
```php
public static function isChineseMobile(string $mobile): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::isChineseMobile('13012345678');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChineseMobile('12012345678');
var_dump($res);
//Output: bool(false)
```

### isChineseLandline

验证字符串是否是有效的中国电话座机号码

方法:
```php
public static function isChineseLandline(string $phone): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::isChineseLandline('021-12345678');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChineseLandline('123-12345678');
var_dump($res);
//Output: bool(false)
```

### isChineseIdNum

验证字符串是否是有效的中国身份证号码

方法:
```php
public static function isChineseIdNum(string $idCard): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::isChineseIdNum('11010119900307173X');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChineseIdNum('110101199003071739');
var_dump($res);
//Output: bool(true)
```

### validateStrongPassword

验证字符串是否是强密码； 强密码要求至少包含 8 位字符, 至少包含大写字母, 小写字母, 数字, 特殊字符

方法:
```php
public static function validateStrongPassword(string $password): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::validateStrongPassword('123456');
var_dump($res);
//Output: bool(false)

$res = \Naroat\Ivory\Validator\Validator::validateStrongPassword('123456abc');
var_dump($res);
//Output: bool(false)

$res = \Naroat\Ivory\Validator\Validator::validateStrongPassword('AbC695!@$');
var_dump($res);
//Output: bool(true)
```
### isChinaUnionPay

验证字符串是否是有效的中国银联卡号

方法:
```php
public static function isChinaUnionPay(string $cardNumber): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::isChinaUnionPay('6228480000000000018');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChinaUnionPay('6228480000000000019');
var_dump($res);
//Output: bool(false)
```

### isUSAUnionPay

验证字符串是否是有效的美国银联卡号

方法:
```php
public static function isUSAUnionPay(string $cardNumber): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::isUSAUnionPay('6228480000000000018');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isUSAUnionPay('3782822463100007');
var_dump($res);
//Output: bool(false)
```

### isVisa

验证字符串是否是有效的 Visa 卡号

方法:
```php
public static function isVisa(string $cardNumber): bool
```

示例:
```php
$res = \Naroat\Ivory\Validator\Validator::isVisa('4111111111111111');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isVisa('123123123');
var_dump($res);
//Output: bool(false)
```