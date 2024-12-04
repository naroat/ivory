<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function randStringExample() {
    $res = \Naroat\Ivory\Random\Random::randString(10);
    var_dump($res);
    //Output: string(10) "Z2tPu6Nieg"

    $res = \Naroat\Ivory\Random\Random::randString(10, '0123456789');
    var_dump($res);
    //Output: string(10) "6780451932"
}

function randArrayExample() {
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
}

function randBoolExample() {
    $res = \Naroat\Ivory\Random\Random::randBool();
    var_dump($res);
    //Output: bool(true)
}

function genRandomRgbColorExample() {
    $res = \Naroat\Ivory\Random\Random::genRandomRgbColor();
    var_dump($res);
    //Output: string(17) "rgb(183, 195, 14)"
}

function genRandomHexColorExample() {
    $res = \Naroat\Ivory\Random\Random::genRandomHexColor();
    var_dump($res);
    //Output: string(7) "#E1618D"
}

function selectRandomExample() {;
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
}

//randStringExample();
//randArrayExample();
//randBoolExample();
//genRandomRgbColorExample();
//genRandomHexColorExample();
selectRandomExample();