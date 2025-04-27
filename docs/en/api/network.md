# NetWork

Contains network related processing.

## Table of Contents

- [getMacAddrs](#getMacAddrs)
- [isPrivateIP](#isPrivateIP)
- [getIPv4Addrs](#getIPv4Addrs)
- [getIPv6Addrs](#getIPv6Addrs)

## Document

### getMacAddrs

Get the MAC addresses of all network interfaces in the system

Method:
```php
public static function getMacAddrs(): array
```

Example:
```php
$res = \Naroat\Ivory\Network\Network::getMacAddrs();
var_dump($res);
// Output: array(9) {
//  [0]=>
//  string(17) "AC:DE:48:00:11:22"
//  [1]=>
//  string(17) "A6:83:E7:B2:57:C2"
//  [2]=>...
// }
```

### isPrivateIP

Determine whether the given IP address is a LAN IP address

Method:
```php
public static function isPrivateIP(string $ip): bool
```

Example:
```php
$ip1 = '192.168.1.1';
$ip2 = '39.156.66.10';
$ip3 = '10.0.0.1';
var_dump(\Naroat\Ivory\Network\Network::isPrivateIP($ip1));
var_dump(\Naroat\Ivory\Network\Network::isPrivateIP($ip2));
var_dump(\Naroat\Ivory\Network\Network::isPrivateIP($ip3));
// Output: bool(true)   bool(false)   bool(true)
```

### getIPv4Addrs

Get all IPv4 addresses in the system

Method:
```php
public static function getIPv4Addrs(): array
```

Example:
```php
$res = \Naroat\Ivory\Network\Network::getIPv4Addrs();
var_dump($res);
// Output: array(2) {
//  [0]=>
//  string(9) "127.0.0.1"
//  [1]=>
//  string(14) "192.168.50.168"
//}
```

### getIPv6Addrs

Get all IPv6 addresses in the system

Method:
```php
public static function getIPv6Addrs(): array
```

Example:
```php
$res = \Naroat\Ivory\Network\Network::getIPv6Addrs();
var_dump($res);
// Output: array(1) {
//  [0]=>
//  string(39) "fe80::aede:48ff:fe00:1122"
//}
```
