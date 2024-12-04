# Array

包含数组的相关处理。

## 目录

- [removeValue](#removeValue)
- [arrSort](#arrSort)
- [objToArr](#objToArr)
- [xmlToArr](#xmlToArr)
- [arrToXml](#arrToXml)
- [csvToArr](#csvToArr)
- [arrToCsv](#arrToCsv)
- [arrDiff](#arrDiff)

## 文档

### removeValue

删除数组中的某个值

方法:
```php
public static function removeValue(array $array, $value): array
```

示例:
```php
$res = \Naroat\Ivory\Arr\Arr::removeValue(['a', 'b', 'c', 'd'], 'c');
var_dump($res);
// Output: array(3) {
//  [0]=>
//  string(1) "a"
//  [1]=>
//  string(1) "b"
//  [2]=>
//  string(1) "d"
//}
```

### arrSort

对多维数组进行排序

方法:
```php
public static function arrSort(array $array, string $key, int $sortOrder = SORT_ASC): array
```

示例:
```php
$arr = [
    ['name' => 'John', 'age' => 30],
    ['name' => 'Sarah', 'age' => 25],
    ['name' => 'Mike', 'age' => 35],
    ['name' => 'Tom', 'age' => 20],
];
$res = \Naroat\Ivory\Arr\Arr::arrSort($arr, 'age', SORT_DESC);
var_dump($res);
// Output: array(4) {
//  [0]=>
//  array(2) {
//    ["name"]=>
//    string(4) "John"
//    ["age"]=>
//    int(30)
//  }
//  [1]=>
//  array(2) {
//    ["name"]=>
//    string(5) "Sarah"
//    ["age"]=>
//    int(25)
//  }
//  [2]=>
//  array(2) {
//    ["name"]=>
//    string(4) "Mike"
//    ["age"]=>
//    int(35)
//  }
//  [3]=>
//  array(2) {
//    ["name"]=>
//    string(3) "Tom"
//    ["age"]=>
//    int(20)
//  }
//}
```


### objToArr

将对象转换成数组

方法:
```php
public static function objToArr($object): array
```

示例:
```php
$obj = new stdClass();
$obj->name = 'John';
$obj->age = 30;
$res = \Naroat\Ivory\Arr\Arr::objToArr($obj);
var_dump($res);
// Output: array(2) {
//  ["name"]=>
//  string(4) "John"
//  ["age"]=>
//  int(30)
//}
```


### xmlToArr

xml转数组

方法:
```php
public static function xmlToArr(string $xml): array
```

示例:
```php
$xml = '<root><name>John</name><age>30</age></root>';
$res = \Naroat\Ivory\Arr\Arr::xmlToArr($xml);
var_dump($res);
// Output: array(2) {
//  ["name"]=>
//  string(4) "John"
//  ["age"]=>
//  int(30)
//}
```


### arrToXml

数组转XML

方法:
```php
public static function arrToXml(array $array, ?\SimpleXMLElement $xmlData = null): string
```

示例:
```php
$arr = [
    'name' => 'John',
    'age' => 30,
];
$res = \Naroat\Ivory\Arr\Arr::arrToXml($arr);
var_dump($res);
// Output: string(26) "<root><name>John</name><age>30</age></root>"
```


### csvToArr

将CSV文件转换为数组

方法:
```php
public static function csvToArr(string $filename, bool $header = true): array
```

参数说明:
- `filename`: CSV文件路径
- `header`: 是否存在表头，默认`true`


示例:
```php
$res = \Naroat\Ivory\Arr\Arr::csvToArr('./examples/example.csv');
var_dump($res);
// Output: array(3) {
//  [0]=>
//  array(2) {
//    ["name"]=>
//    string(4) "John"
//    ["age"]=>
//    string(2) "30"
//  }
//  [1]=>
//  array(2) {
//    ["name"]=>
//    string(5) "Sarah"
//    ["age"]=>
//    string(2) "25"
//  }
//  [2]=>
//  array(2) {
//    ["name"]=>
//    string(4) "Mike"
//    ["age"]=>
//    string(2) "35"
//  }
//}
```


### arrToCsv

数组转CSV

方法:
```php
public static function arrToCsv(array $array, bool $header = true): string
```

参数说明:
- `array`: 数组
- `header`: 是否将第一行作为数组的键名

示例:
```php
$arr = [
    ['name' => 'John', 'age' => 30],
    ['name' => 'Sarah', 'age' => 25],
    ['name' => 'Mike', 'age' => 35],
];
$res = \Naroat\Ivory\Arr\Arr::arrToCsv($arr, './examples/example.csv');
var_dump($res);
// Output: string(34) "name,age
//John,30
//Sarah,25
//Mike,35
//"
```


### arrDiff

返回两个数组中不同的元素

方法:
```php
public static function arrDiff(array $array1, array $array2): array
```

示例:
```php
$arr1 = ['john', 'Sarah', 'Mike'];
$arr2 = ['Sarah', 'Tom'];
$res = \Naroat\Ivory\Arr\Arr::arrDiff($arr1, $arr2);
var_dump($res);
// Output: array(3) {
//  [0]=>
//  string(4) "john"
//  [1]=>
//  string(4) "Mike"
//  [2]=>
//  string(3) "Tom"
//}
```

