# Random

Contains information related to the random number generator.

## Table of Contents

- [randString](#randString)
- [randArray](#randArray)
- [randBool](#randBool)
- [genRandomRgbColor](#genRandomRgbColor)
- [genRandomHexColor](#genRandomHexColor)
- [selectRandom](#selectRandom)

## Document

### randString

Generate a random string

Method:
```php
public static function randString(int $length = 6, string $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'): string
```

Example:
```php
$res = \Naroat\Ivory\Random\Random::randString(10);
var_dump($res);
//Output: string(10) "Z2tPu6Nieg"

$res = \Naroat\Ivory\Random\Random::randString(10, '0123456789');
var_dump($res);
//Output: string(10) "6780451932"
```

### randArray

Generate random array

Method:
```php
public static function randArray(int $size, int $min, int $max, bool $allowDuplicates = true): array
```

Parameter description:
- `size`: array size
- `min`: minimum value
- `max`: maximum value
- `allowDuplicates`: whether to allow duplicate values

Example:
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

Generate random boolean values

Method:
```php
public static function randBool(): bool
```

Example:
```php
$res = \Naroat\Ivory\Random\Random::randBool();
var_dump($res);
```

### genRandomRgbColor

Randomly generate RGB colors

Method:
```php
public static function genRandomRgbColor(): string
```

Example:
```php
$res = \Naroat\Ivory\Random\Random::genRandomRgbColor();
var_dump($res);
//Output: string(17) "rgb(183, 195, 14)"
```

### genRandomHexColor

Randomly generate HEX colors

Method:
```php
public static function genRandomHexColor(): string
```

Example:
```php
$res = \Naroat\Ivory\Random\Random::genRandomHexColor();
var_dump($res);
//Output: string(7) "#E1618D"
```

### selectRandom

Randomly select one or more elements

Method:
```php
public static function selectRandom(array $array, int $count = 1): array
```

Parameter description:
- `array`: array
- `count`: quantity

Example:
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
