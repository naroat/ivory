# String

包含字符串的相关处理。

## 目录

- [toCamelCase](#toCamelCase)
- [toSnakeCase](#toSnakeCase)
- [toKebabCase](#toKebabCase)
- [wrap](#wrap)
- [unwrap](#unwrap)
- [startsWithAny](#startsWithAny)
- [endsWithAny](#endsWithAny)
- [replaceRange](#replaceRange)
- [hideEmail](#hideEmail)
- [hidePhone](#hidePhone)
- [removeSpace](#removeSpace)
- [truncate](#truncate)
- [rotate](#rotate)
- [stripHtml](#stripHtml)
- [rmbUpper](#rmbUpper)

## 文档

### toCamelCase

将带有`-`和`_`的字符串转换成驼峰式字符串

方法: 
```php
public static function toCamelCase(string $str): string
```

示例: 
```php
$strs = ['', 'foo-bar', 'foo_bar'];

foreach ($strs as $val) {
    $res = \Naroat\Ivory\Str\Str::toCamelCase($val);
    var_dump($res);
}

//output
//""
//fooBar
//fooBar
```

### toSnakeCase

转换为蛇形命名

方法:
```php
public static function toSnakeCase(string $str): string
```

示例:
```php
$strs = ['', 'foobar', 'fooBar', 'FooBar'];

foreach ($strs as $val) {
    $res = \Naroat\Ivory\Str\Str::toSnakeCase($val);
    var_dump($res);
}
//output
//""
//foobar
//foo_bar
//foo_bar
```

### toKebabCase

将字符串转换为kebab-case命名。

方法:
```php
public static function toKebabCase(string $str): string
```

示例:
```php
$strs = ['', 'foobar', 'fooBar', 'FooBar'];

foreach ($strs as $val) {
    $res = \Naroat\Ivory\Str\Str::toKebabCase($val);
    var_dump($res);
}
//output
//""
//foobar
//foo-bar
//foo-bar
```

### wrap

用另一个字符串包裹一个字符串

方法:
```php
public static function wrap(string $str, string $wrapper): string
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::wrap('foo', '--');
var_dump($res);
//output: "--foo--"
```

### unwrap

移除字符串两端的包裹字符串

方法:
```php
public static function unwrap(string $str, string $wrapper): string
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::unwrap('--foo--', '--');
var_dump($res);
//output: "foo"
```


### startsWithAny

检查字符串是否以指定字符串数组中的任何一个开头

方法:
```php
public static function startsWithAny(string $str, array $prefixes): bool
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::startsWithAny('foobar', ['foo', 'oof']);
var_dump($res);
//output: bool(true)

$res = \Naroat\Ivory\Str\Str::startsWithAny('foobar', ['oof', 'rab']);
var_dump($res);
//output: bool(false)
```


### endsWithAny

检查字符串是否以指定字符串数组中的任何一个结尾

方法:
```php
public static function endsWithAny(string $str, array $suffixes): bool
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::endsWithAny('foobar', ['bar', 'rab']);
var_dump($res);
//output: bool(true)

$res = \Naroat\Ivory\Str\Str::endsWithAny('foobar', ['oof', 'rab']);
var_dump($res);
//output: bool(false)
```


### replaceRange

替换字符串中指定范围内的字符

方法:
```php
public static function replaceRange(string $str, string $replacement, int $start, ?int $length = null): string
```

参数说明
- `str`: 原始字符串
- `replacement`:替换的内容
- `start`: 起始位置（从0开始）
- `length`: 替换的长度，如果为null则替换到字符串末尾

示例:
```php
$res = \Naroat\Ivory\Str\Str::replaceRange('foobar', 'baz', 0);
var_dump($res);
//output: "baz"

$res = \Naroat\Ivory\Str\Str::replaceRange('foobar', 'baz', 3, 3);
var_dump($res);
//output: "foobaz"

$res = \Naroat\Ivory\Str\Str::replaceRange('foobar', 'baz', 3, 1);
var_dump($res);
//output: "fobazar"

$res = \Naroat\Ivory\Str\Str::replaceRange('foobar', 'baz', 0, 0);
var_dump($res);
//output: "bazfoobar"
```

### hideEmail

私隐化邮箱

方法:
```php
public static function hideEmail(string $email, string $char = '***@'): string
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com');
var_dump($res);
//output: "foo***@bar.com"

$res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com', '---@');
var_dump($res);
//output: "foo---@bar.com"
```

### hidePhone

私隐化手机号

方法:
```php
public static function hidePhone(string $phone, string $char = '****'): string
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::hidePhone('13012345678');
var_dump($res);
//output: "130****5678"

$res = \Naroat\Ivory\Str\Str::hidePhone('13012345678', '(-)');
var_dump($res);
//output: "130(-)5678"
```

### removeSpace

删除字符串中的空格

方法:
```php
public static function removeSpace(string $str, bool $replaceAll = true): string
```

参数说明
- `str`: 原始字符串
- `replaceAll`: 是否删除所有空格，true删除所有空格，false将多个空格替换为一个空格

示例:
```php
$res = \Naroat\Ivory\Str\Str::removeSpace('foo      b a   r');
    var_dump($res);
    //output: "foobar"

    $res = \Naroat\Ivory\Str\Str::removeSpace('foo      b a   r', false);
    var_dump($res);
    //output: "foo b a r"
```


### truncate

将字符串截断到指定长度，并在末尾添加省略号

方法:
```php
public static function truncate(string $str, int $length, string $ellipsis = '...'): string
```

参数说明：
- `str`: 原始字符串
- `length`: 截断的长度（不包含省略号）
- `ellipsis`: 省略号字符串

示例:
```php
$res = \Naroat\Ivory\Str\Str::truncate('This method truncates the string to the specified length and adds an ellipsis at the end', 30);
var_dump($res);
//output: "This method truncates the stri..."

$res = \Naroat\Ivory\Str\Str::truncate('This method truncates the string to the specified length and adds an ellipsis at the end', 30, '(...)');
var_dump($res);
//output: "This method truncates the stri(...)"
```


### rotate

按指定的字符数旋转字符串

方法:
```php
public static function rotate(string $str, int $shift, bool $preserveUnicode = true): string
```

参数说明：
- `str`: 原始字符串
- `shift`: 旋转的字符数
- `preserveUnicode`: 是否保留unicode字符

示例:
```php
$res = \Naroat\Ivory\Str\Str::rotate('abcdefg', 3);
var_dump($res);
//output: "efgabcd"

$res = \Naroat\Ivory\Str\Str::rotate('abcdefg', -3);
var_dump($res);
//output: "defgabc"

$res = \Naroat\Ivory\Str\Str::rotate('你好世界', 2);
var_dump($res);
//output: "世界你好"
```

### stripHtml

清除字符串中的HTML标签

方法:
```php
public static function stripHtml(string $str, string $allowableTags = '', bool $removeLineBreaks = false): string
```

参数说明：
- `str`: 原始字符串
- `allowableTags`: 允许的标签，为空则清除所有标签（可以是字符串如`<p><a>`）
- `removeLineBreaks`: 是否移除换行符

示例:
```php
$res = \Naroat\Ivory\Str\Str::stripHtml('<p>This method strips <b>HTML</b> tags from the string.</p>');
var_dump($res);
//output: "This method strips HTML tags from the string."

$res = \Naroat\Ivory\Str\Str::stripHtml('<p>This method strips <b>HTML</b> tags from the string.</p>', '<b>');
var_dump($res);
//output: "This method strips <b>HTML</b> tags from the string."
```


### rmbUpper

人民币转大写，最大支持千亿

方法:
```php
public static function rmbUpper(float $num): string
```

示例:
```php
$res = \Naroat\Ivory\Str\Str::rmbUpper(543211234567.89);
var_dump($res);
//output: "伍仟肆佰叁拾贰亿壹仟壹佰贰拾叁万肆仟伍佰陆拾柒元捌角玖分"
```

