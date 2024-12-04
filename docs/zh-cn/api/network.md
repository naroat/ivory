# NetWork

包含网络相关处理。

## 目录

- [getMacAddrs](#getMacAddrs)
- [isPrivateIP](#isPrivateIP)
- [getIPv4Addrs](#getIPv4Addrs)
- [getIPv6Addrs](#getIPv6Addrs)

## 文档

### getMacAddrs

获取系统中所有网络接口的 MAC 地址

方法:
```php
public static function getMacAddrs(): array
```

示例:
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

判断给定的 IP 地址是否是局域网 IP 地址

方法:
```php
public static function isPrivateIP(string $ip): bool
```

示例:
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

获取系统中所有的 IPv4 地址

方法:
```php
public static function getIPv4Addrs(): array
```

示例:
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

获取系统中所有的 IPv6 地址

方法:
```php
public static function getIPv6Addrs(): array
```

示例:
```php
$res = \Naroat\Ivory\Network\Network::getIPv6Addrs();
var_dump($res);
// Output: array(1) {
//  [0]=>
//  string(39) "fe80::aede:48ff:fe00:1122"
//}
```
