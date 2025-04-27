# File

Contains file related processing.

## Table of Contents

- [copyDir](#copyDir)
- [clearFile](#clearFile)
- [getFileDetails](#getFileDetails)
- [getFileMode](#getFileMode)
- [traverseDir](#traverseDir)

## Document

### copyDir

Copy a directory and its contents

Method:
```php
public static function copyDir(string $sourceDir, string $destinationDir): bool
```

Example:
```php
$res = \Naroat\Ivory\File\File::copyDir('/tmp/test', './');
var_dump($res);
//Output: bool(true)
```

### clearFile

Clear file contents

Method:
```php
public static function clearFile(string $filePath): bool
```

Example:
```php
$res = \Naroat\Ivory\File\File::clearFile('./tmp/test.txt');
var_dump($res);
//Output: bool(true)
```

### getFileDetails

Get detailed information about a file

Method:
```php
public static function getFileDetails(string $filePath): array
```

Example:
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

Get the mode information of a file

Method:
```php
public static function getFileMode(string $filePath): string
```

Example:
```php
$res = \Naroat\Ivory\File\File::getFileMode('./tmp/test.txt');
var_dump($res);
//Output: string(9) "-rw-r--r-"
```

### traverseDir

Traverse all files in the directory

Method:
```php
public static function traverseDir(string $directoryPath, int $level = 0): array
```

Parameter description:
- `directoryPath`: The directory path to traverse 
- `level`: traversal level, 0 means unlimited, 1 means only traversing the current directory, and so on

Example:
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
