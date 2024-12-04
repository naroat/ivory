<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';
function removeValueExample()
{
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
}

function arrSortExample()
{
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
}

function objToArrExample()
{
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
}

function xmlToArrExample()
{
    $xml = '<root><name>John</name><age>30</age></root>';
    $res = \Naroat\Ivory\Arr\Arr::xmlToArr($xml);
    var_dump($res);
    // Output: array(2) {
    //  ["name"]=>
    //  string(4) "John"
    //  ["age"]=>
    //  int(30)
    //}
}

function arrToXmlExample()
{
    $arr = [
        'name' => 'John',
        'age' => 30,
    ];
    $res = \Naroat\Ivory\Arr\Arr::arrToXml($arr);
    var_dump($res);
    // Output: "<root><name>John</name><age>30</age></root>"
}

function csvToArrExample()
{
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
}

function arrToCsvExample()
{
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
}

function arrDiffExample()
{
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
}

//removeValueExample();
//arrSortExample();
//objToArrExample();
//xmlToArrExample();
//arrToXmlExample();
//csvToArrExample();
//arrToCsvExample();
arrDiffExample();