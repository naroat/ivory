# Random

包含随机数生成器相关。

## 目录

- [randString](#randString)
- [randArray](#randArray)
- [randBool](#randBool)
- [genRandomRgbColor](#genRandomRgbColor)
- [genRandomHexColor](#genRandomHexColor)
- [selectRandom](#selectRandom)

## 文档

### randString

生成随机字符串

方法:
```php
public static function randString(int $length = 6, string $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'): string
```

示例:
```php
$res = \Naroat\Ivory\Random\Random::randString(10);
var_dump($res);
//Output: string(10) "Z2tPu6Nieg"

$res = \Naroat\Ivory\Random\Random::randString(10, '0123456789');
var_dump($res);
//Output: string(10) "6780451932"
```

### randArray

生成随机数组

方法:
```php
public static function randArray(int $size, int $min, int $max, bool $allowDuplicates = true): array
```

参数说明:
- `size`: 数组大小
- `min`: 最小值
- `max`: 最大值
- `allowDuplicates`: 是否允许重复值

示例:
```php
$res = \Naroat\Ivory\Random\Random::randArray(3, 10, 200);
var_dump($res);
//Output: array(3) {
//  [0]=>
//  int(51)
//  [1]=>
//  int(108)
//  [2]=>
//  int(42)
//}
```

### randBool

随机生成布尔值

方法:
```php
public static function randBool(): bool
```

示例:
```php
$res = \Naroat\Ivory\Random\Random::randBool();
var_dump($res);
```

### genRandomRgbColor

随机生成RGB颜色

方法:
```php
public static function genRandomRgbColor(): string
```

示例:
```php
$res = \Naroat\Ivory\Random\Random::genRandomRgbColor();
var_dump($res);
//Output: string(17) "rgb(183, 195, 14)"
```

### genRandomHexColor

随机生成HEX颜色

方法:
```php
public static function genRandomHexColor(): string
```

示例:
```php
$res = \Naroat\Ivory\Random\Random::genRandomHexColor();
var_dump($res);
//Output: string(7) "#E1618D"
```

### selectRandom

随机选择一个或多个元素

方法:
```php
public static function selectRandom(array $array, int $count = 1): array
```

参数说明:
- `array`: 数组
- `count`: 数量

示例:
```php
$res = \Naroat\Ivory\Random\Random::selectRandom(['apple', 'banana', 'orange', 'grape', 'pear']);
var_dump($res);
//Output: array(1) {
//  [0]=>
//  string(5) "grape"
//}

$res = \Naroat\Ivory\Random\Random::selectRandom(['apple', 'banana', 'orange', 'grape', 'pear'], 2);
var_dump($res);
//Output: array(2) {
//  [0]=>
//  string(5) "apple"
//  [4]=>
//  string(4) "pear"
//}
```
