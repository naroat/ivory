<?php

namespace Naroat\Ivory\Network;

class Network
{
    /**
     * 获取系统中所有网络接口的 MAC 地址
     * @return array 返回 MAC 地址列表
     */
    public static function getMacAddrs(): array
    {
        // 使用系统命令获取网络接口信息
        // 在 Linux 和 macOS 上使用 ifconfig
        // 在 Windows 上使用 getmac
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows 系统
            $output = shell_exec('getmac');
            $macAddresses = preg_split('/\s+/', trim($output));
        } else {
            // Linux 或 macOS 系统
            $output = shell_exec('ifconfig');
            // 使用正则表达式提取 MAC 地址
            preg_match_all('/(?:[0-9a-fA-F]{2}[:-]){5}(?:[0-9a-fA-F]{2})/', $output, $matches);
            $macAddresses = array_map('strtoupper', $matches[0]); // 转换为大写
        }

        return array_unique($macAddresses); // 返回唯一的 MAC 地址
    }

    /**
     * 判断给定的 IP 地址是否是局域网 IP 地址
     * @param string $ip 要检查的 IP 地址
     * @return bool 返回 true 如果是局域网 IP，否则返回 false
     */
    public static function isPrivateIP(string $ip): bool
    {
        // 验证 IP 地址格式
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            return false; // 如果不是有效的 IP 地址，返回 false
        }

        // 将 IP 地址转换为长整型
        $longIP = ip2long($ip);

        // 检查是否在局域网范围内
        return (
            ($longIP >= ip2long('10.0.0.0') && $longIP <= ip2long('10.255.255.255')) ||
            ($longIP >= ip2long('172.16.0.0') && $longIP <= ip2long('172.31.255.255')) ||
            ($longIP >= ip2long('192.168.0.0') && $longIP <= ip2long('192.168.255.255'))
        );
    }

    /**
     * 获取系统中所有的 IPv4 地址
     * @return array 返回 IPv4 地址列表
     */
    public static function getIPv4Addrs(): array
    {
        // 使用系统命令获取网络接口信息
        // 在 Linux 和 macOS 上使用 ifconfig
        // 在 Windows 上使用 ipconfig
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows 系统
            $output = shell_exec('ipconfig');
            // 使用正则表达式提取 IPv4 地址
            preg_match_all('/IPv4 Address[ .]*: ([0-9.]+)/', $output, $matches);
            $ipv4Addresses = $matches[1];
        } else {
            // Linux 或 macOS 系统
            $output = shell_exec('ifconfig');
            // 使用正则表达式提取 IPv4 地址
            preg_match_all('/inet\s+([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/', $output, $matches);
            $ipv4Addresses = $matches[1];
        }

        return array_unique($ipv4Addresses);
    }

    /**
     * 获取系统中所有的 IPv6 地址
     * @return array 返回 IPv6 地址列表
     */
    public static function getIPv6Addrs(): array
    {
        // 使用系统命令获取网络接口信息
        // 在 Linux 和 macOS 上使用 ifconfig
        // 在 Windows 上使用 ipconfig
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            // Windows 系统
            $output = shell_exec('ipconfig');
            // 使用正则表达式提取 IPv6 地址
            preg_match_all('/([0-9a-fA-F]*:[0-9a-fA-F:]+)/', $output, $matches);
            $ipv6Addresses = $matches[0];
        } else {
            // Linux 或 macOS 系统
            $output = shell_exec('ifconfig');
            // 使用正则表达式提取 IPv6 地址
            preg_match_all('/inet6 ([a-f0-9:]+)/i', $output, $matches);
            $ipv6Addresses[] = $matches[1];
        }

        return array_unique($ipv6Addresses);
    }
}