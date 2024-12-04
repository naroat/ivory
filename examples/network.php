<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function getMacAddrsExample() {
    $res = \Naroat\Ivory\Network\Network::getMacAddrs();
    var_dump($res);
    // Output: array(9) {
    //  [0]=>
    //  string(17) "AC:DE:48:00:11:22"
    //  [1]=>
    //  string(17) "A6:83:E7:B2:57:C2"
    //  [2]=>...
    // }
}

function isPrivateIPExample() {
    $ip1 = '192.168.1.1';
    $ip2 = '39.156.66.10';
    $ip3 = '10.0.0.1';
    var_dump(\Naroat\Ivory\Network\Network::isPrivateIP($ip1));
    var_dump(\Naroat\Ivory\Network\Network::isPrivateIP($ip2));
    var_dump(\Naroat\Ivory\Network\Network::isPrivateIP($ip3));
    // Output: bool(true)   bool(false)   bool(true)
}

function getIPv4AddrsExample() {
    $res = \Naroat\Ivory\Network\Network::getIPv4Addrs();
    var_dump($res);
    // Output: array(2) {
    //  [0]=>
    //  string(9) "127.0.0.1"
    //  [1]=>
    //  string(14) "192.168.50.168"
    //}
}

function getIPv6AddrsExample() {
    $res = \Naroat\Ivory\Network\Network::getIPv6Addrs();
    var_dump($res);
    // Output: array(1) {
    //  [0]=>
    //  string(39) "fe80::a00:27ff:fe8d:c800"
    //}
}


//getMacAddrsExample();
//isPrivateIPExample();
//getIPv4AddrsExample();
getIPv6AddrsExample();