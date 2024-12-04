# File

包含文件的相关处理。

## 目录

- [copyDir](#copyDir)
- [clearFile](#clearFile)
- [getFileDetails](#getFileDetails)
- [getFileMode](#getFileMode)
- [traverseDir](#traverseDir)

## 文档

### copyDir

拷贝目录及其内容

方法:
```php
public static function copyDir(string $sourceDir, string $destinationDir): bool
```

示例:
```php
$res = \Naroat\Ivory\File\File::copyDir('/tmp/test', './');
var_dump($res);
//Output: bool(true)
```

### clearFile

清空文件内容

方法:
```php
public static function clearFile(string $filePath): bool
```

示例:
```php
$res = \Naroat\Ivory\File\File::clearFile('./tmp/test.txt');
var_dump($res);
//Output: bool(true)
```

### getFileDetails

获取文件的详细信息

方法:
```php
public static function getFileDetails(string $filePath): array
```

示例:
```php
$res = \Naroat\Ivory\File\File::getFileDetails('/tmp/test.txt');
var_dump($res);
//Output: array(6) {
//  ["name"]=>
//  string(8) "test.txt"
//  ["size"]=>
//  int(0)
//  ["type"]=>
//  string(13) "inode/x-empty"
//  ["modified"]=>
//  string(19) "2024-12-04 02:00:20"
//  ["permissions"]=>
//  string(4) "0644"
//  ["path"]=>
//  string(48) "/tmp/test.txt"
//}
```

### getFileMode

获取文件的模式信息

方法:
```php
public static function getFileMode(string $filePath): string
```

示例:
```php
$res = \Naroat\Ivory\File\File::getFileMode('./tmp/test.txt');
var_dump($res);
//Output: string(9) "-rw-r--r-"
```

### traverseDir

遍历目录下所有文件

方法:
```php
public static function traverseDir(string $directoryPath, int $level = 0): array
```
参数: 

- `directoryPath`: 要遍历的目录路径 
- `level`: 遍历层级，0 表示无限制，1 表示只遍历当前目录，依此类推

示例:
```php
$res = \Naroat\Ivory\File\File::traverseDir('./tmp');
var_dump($res);
//Output: array(3) {
//  [0]=>
//  string(13) "./tmp/a/a.txt"
//  [1]=>
//  string(13) "./tmp/b/b.txt"
//  [2]=>
//  string(14) "./tmp/test.txt"
//}
```
