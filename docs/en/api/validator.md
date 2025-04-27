# Validator

Contains common string format validations.

## Table of Contents

- [isChineseMobile](#isChineseMobile)   
- [isChineseLandline](#isChineseLandline)   
- [isChineseIdNum](#isChineseIdNum)   
- [validateStrongPassword](#validateStrongPassword)   
- [isChinaUnionPay](#isChinaUnionPay)   
- [isUSAUnionPay](#isUSAUnionPay)   
- [isVisa](#isVisa)   

## Document

### isChineseMobile

Verify whether the string is a valid Chinese mobile phone number

Method:
```php
public static function isChineseMobile(string $mobile): bool
```

Example:
```php
$res = \Naroat\Ivory\Validator\Validator::isChineseMobile('13012345678');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChineseMobile('12012345678');
var_dump($res);
//Output: bool(false)
```

### isChineseLandline

Verify whether the string is a valid Chinese landline number

Method:
```php
public static function isChineseLandline(string $phone): bool
```

Example:
```php
$res = \Naroat\Ivory\Validator\Validator::isChineseLandline('021-12345678');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChineseLandline('123-12345678');
var_dump($res);
//Output: bool(false)
```

### isChineseIdNum

Verify that the string is a valid Chinese ID number

Method:
```php
public static function isChineseIdNum(string $idCard): bool
```

Example:
```php
$res = \Naroat\Ivory\Validator\Validator::isChineseIdNum('11010119900307173X');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChineseIdNum('110101199003071739');
var_dump($res);
//Output: bool(true)
```

### validateStrongPassword

Verify whether the string is a strong password; a strong password must contain at least 8 characters, at least uppercase letters, lowercase letters, numbers, and special characters

Method:
```php
public static function validateStrongPassword(string $password): bool
```

Example:
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

Verify whether the string is a valid China UnionPay card number

Method:
```php
public static function isChinaUnionPay(string $cardNumber): bool
```

Example:
```php
$res = \Naroat\Ivory\Validator\Validator::isChinaUnionPay('6228480000000000018');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isChinaUnionPay('6228480000000000019');
var_dump($res);
//Output: bool(false)
```

### isUSAUnionPay

Verify whether the string is a valid US UnionPay card number

Method:
```php
public static function isUSAUnionPay(string $cardNumber): bool
```

Example:
```php
$res = \Naroat\Ivory\Validator\Validator::isUSAUnionPay('6228480000000000018');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isUSAUnionPay('3782822463100007');
var_dump($res);
//Output: bool(false)
```

### isVisa

Verify that the string is a valid Visa card number

Method:
```php
public static function isVisa(string $cardNumber): bool
```

Example:
```php
$res = \Naroat\Ivory\Validator\Validator::isVisa('4111111111111111');
var_dump($res);
//Output: bool(true)

$res = \Naroat\Ivory\Validator\Validator::isVisa('123123123');
var_dump($res);
//Output: bool(false)
```