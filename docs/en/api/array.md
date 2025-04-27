# Array

Including the relevant processing of arrays.

## Table of Contents

- [removeValue](#removeValue)
- [arrSort](#arrSort)
- [objToArr](#objToArr)
- [xmlToArr](#xmlToArr)
- [arrToXml](#arrToXml)
- [csvToArr](#csvToArr)
- [arrToCsv](#arrToCsv)
- [arrDiff](#arrDiff)

## Document

### removeValue

Delete a certain value in the array

Method:
```php
public static function removeValue(array $array, $value): array
```

Example:
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

Sort the multi-dimensional array

Method:
```php
public static function arrSort(array $array, string $key, int $sortOrder = SORT_ASC): array
```

Example:
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

Convert the object into an array

Method:
```php
public static function objToArr($object): array
```

Example:
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

xml to Array Conversion

Method:
```php
public static function xmlToArr(string $xml): array
```

Example:
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

Array to XML

Method:
```php
public static function arrToXml(array $array, ?\SimpleXMLElement $xmlData = null): string
```

Example:
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

Convert the CSV file to an array

Method:
```php
public static function csvToArr(string $filename, bool $header = true): array
```

Parameter description:
- `filename`: CSV file path
- `header`: Whether there is a table header, the default is `true`


Example:
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

Array to CSV

Method:
```php
public static function arrToCsv(array $array, bool $header = true): string
```

Parameter description:
- `array`: array
- `header`: Whether to use the first row as the key name of the array

Example:
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

Return the different elements in the two arrays

Method:
```php
public static function arrDiff(array $array1, array $array2): array
```

Example:
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

