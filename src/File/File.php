<?php

namespace Naroat\Ivory\File;

class File
{
    /**
     * 拷贝目录及其内容
     * @param string $sourceDir 源目录路径
     * @param string $destinationDir 目标目录路径
     * @return bool
     * @throws \Exception 如果源目录不存在或拷贝失败
     */
    public static function copyDir(string $sourceDir, string $destinationDir): bool
    {
        // 检查源目录是否存在
        if (!is_dir($sourceDir)) {
            throw new \Exception("源目录不存在: $sourceDir");
        }

        // 创建目标目录
        if (!is_dir($destinationDir)) {
            mkdir($destinationDir, 0755, true); // 创建目录及其父目录
        }

        // 遍历源目录中的文件和子目录
        $items = scandir($sourceDir);
        foreach ($items as $item) {
            if ($item === '.' || $item === '..') {
                continue; // 跳过当前目录和父目录
            }

            $sourcePath = $sourceDir . DIRECTORY_SEPARATOR . $item;
            $destinationPath = $destinationDir . DIRECTORY_SEPARATOR . $item;

            if (is_dir($sourcePath)) {
                // 递归拷贝子目录
                self::copyDir($sourcePath, $destinationPath);
            } else {
                // 拷贝文件
                copy($sourcePath, $destinationPath);
            }
        }
        return true;
    }

    /**
     * 清空文件内容
     * @param string $filePath 文件路径
     * @return bool
     * @throws \Exception
     */
    public static function clearFile(string $filePath): bool
    {
        if (!file_exists($filePath)) {
            throw new \Exception("文件不存在: $filePath");
        }

        // 打开文件并清空内容
        $fileHandle = fopen($filePath, 'w');
        if ($fileHandle === false) {
            throw new \Exception("无法打开文件: $filePath");
        }

        // 清空文件内容
        if (ftruncate($fileHandle, 0) === false) {
            fclose($fileHandle);
            throw new \Exception("清空文件内容失败: $filePath");
        }

        fclose($fileHandle); // 关闭文件句柄
        return true;
    }

    /**
     * 获取文件的详细信息
     * @param string $filePath 文件路径
     * @return array 返回文件的详细信息
     * @throws \Exception 如果文件不存在
     */
    public static function getFileDetails(string $filePath): array
    {
        if (!file_exists($filePath)) {
            throw new \Exception("文件不存在: $filePath");
        }

        // 获取文件的状态信息
        $fileInfo = stat($filePath);

        // 获取文件的详细信息
        return [
            'name' => basename($filePath), // 文件名
            'size' => $fileInfo['size'], // 文件大小（字节）
            'type' => mime_content_type($filePath), // 文件类型
            'modified' => date("Y-m-d H:i:s", $fileInfo['mtime']), // 修改时间
            'permissions' => substr(sprintf('%o', $fileInfo['mode']), -4), // 文件权限
            'path' => realpath($filePath), // 文件的绝对路径
        ];
    }
    
    /**
     * 获取文件的模式信息
     * @param string $filePath 文件路径
     * @return string 返回文件的模式信息
     * @throws \Exception 如果文件不存在或无法获取模式信息
     */
    public static function getFileMode(string $filePath): string
    {
        if (!file_exists($filePath)) {
            throw new \Exception("文件不存在: $filePath");
        }

        // 获取文件的模式信息
        $perms = fileperms($filePath);

        // 格式化模式信息为可读字符串
        $info = '';
        if (($perms & 0xC000) === 0xC000) {
            $info = 's'; // socket
        } elseif (($perms & 0xA000) === 0xA000) {
            $info = 'l'; // symlink
        } elseif (($perms & 0x8000) === 0x8000) {
            $info = '-'; // regular
        } elseif (($perms & 0x6000) === 0x6000) {
            $info = 'b'; // block special
        } elseif (($perms & 0x4000) === 0x4000) {
            $info = 'd'; // directory
        } elseif (($perms & 0x2000) === 0x2000) {
            $info = 'c'; // character special
        } else {
            $info = 'u'; // unknown
        }

        // 所有者权限
        $info .= (($perms & 0x0100) ? 'r' : '-') . 
                 (($perms & 0x0080) ? 'w' : '-') . 
                 (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : '-'); // setuid

        // 组权限
        $info .= (($perms & 0x0020) ? 'r' : '-') . 
                 (($perms & 0x0010) ? 'w' : '-') . 
                 (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : '-'); // setgid

        // 其他权限
        $info .= (($perms & 0x0004) ? 'r' : '-') . 
                 (($perms & 0x0002) ? 'w' : '-') . 
                 (($perms & 0x0001) ? 'x' : ''); // sticky

        return $info; // 返回文件模式信息
    }
    

    /**
     * 遍历目录下所有文件
     * @param string $directoryPath 目录路径
     * @param int $level 遍历层级，0 表示无限制，1 表示只遍历当前目录，依此类推
     * @return array 返回遍历到的文件名
     * @throws \Exception 如果目录不存在或无法读取
     */
    public static function traverseDir(string $directoryPath, int $level = 0): array
    {
        if (!is_dir($directoryPath)) {
            throw new \Exception("目录不存在: $directoryPath");
        }

        $fileNames = [];
        $files = scandir($directoryPath);

        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $filePath = $directoryPath . DIRECTORY_SEPARATOR . $file;

                if (is_dir($filePath)) {
                    // 如果是目录且层级未达到限制，递归调用
                    if ($level !== 1) {
                        $fileNames = array_merge($fileNames, self::traverseDir($filePath, $level > 0 ? $level - 1 : 0));
                    }
                } else {
                    // 如果是文件，添加到结果数组
                    $fileNames[] = $filePath;
                }
            }
        }

        return $fileNames; // 返回遍历到的文件名数组
    }
}