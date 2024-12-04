<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function isChineseMobileExample($mobile) {
    $res = \Naroat\Ivory\Validator\Validator::isChineseMobile('13012345678');
    var_dump($res);
    //Output: bool(true)

    $res = \Naroat\Ivory\Validator\Validator::isChineseMobile('12012345678');
    var_dump($res);
    //Output: bool(false)
}

function isChineseLandlineExample() {
    $res = \Naroat\Ivory\Validator\Validator::isChineseLandline('021-12345678');
    var_dump($res);
    //Output: bool(true)

    $res = \Naroat\Ivory\Validator\Validator::isChineseLandline('123-12345678');
    var_dump($res);
    //Output: bool(false)
}

function isChineseIdNumExample() {
    $res = \Naroat\Ivory\Validator\Validator::isChineseIdNum('11010119900307173X');
    var_dump($res);
    //Output: bool(true)

    $res = \Naroat\Ivory\Validator\Validator::isChineseIdNum('110101199003071739');
    var_dump($res);
    //Output: bool(false)
}

function validateStrongPasswordExample() {
    $res = \Naroat\Ivory\Validator\Validator::validateStrongPassword('123456');
    var_dump($res);
    //Output: bool(false)

    $res = \Naroat\Ivory\Validator\Validator::validateStrongPassword('123456abc');
    var_dump($res);
    //Output: bool(false)

    $res = \Naroat\Ivory\Validator\Validator::validateStrongPassword('AbC695!@$');
    var_dump($res);
    //Output: bool(true)
}

function isChinaUnionPayExample() {
    $res = \Naroat\Ivory\Validator\Validator::isChinaUnionPay('6228480000000000018');
    var_dump($res);
    //Output: bool(true)

    $res = \Naroat\Ivory\Validator\Validator::isChinaUnionPay('6228480000000000019');
    var_dump($res);
    //Output: bool(false)
}

function isUSAUnionPayExample() {
    $res = \Naroat\Ivory\Validator\Validator::isUSAUnionPay('6228480000000000018');
    var_dump($res);
    //Output: bool(true)

    $res = \Naroat\Ivory\Validator\Validator::isUSAUnionPay('3782822463100007');
    var_dump($res);
    //Output: bool(false)
}

function isVisaExample() {
    $res = \Naroat\Ivory\Validator\Validator::isVisa('4111111111111111');
    var_dump($res);
    //Output: bool(true)

    $res = \Naroat\Ivory\Validator\Validator::isVisa('123123123');
    var_dump($res);
    //Output: bool(false)
}

//isChineseMobileExample('13912345678');
//isChineseLandlineExample();
//isChineseIdNumExample();
//validateStrongPasswordExample();
//isChinaUnionPayExample();
//isUSAUnionPayExample();
isVisaExample();