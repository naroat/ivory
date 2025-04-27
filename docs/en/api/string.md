# String

Contains string related processing.

## Table of Contents

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

## Document

### toCamelCase

Convert strings with `-` and `_` to camel case

Method: 
```php
public static function toCamelCase(string $str): string
```

Example: 
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

Convert to snake case

Method:
```php
public static function toSnakeCase(string $str): string
```

Example:
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

Convert a string to kebab-case.

Method:
```php
public static function toKebabCase(string $str): string
```

Example:
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

Wrap a string with another string

Method:
```php
public static function wrap(string $str, string $wrapper): string
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::wrap('foo', '--');
var_dump($res);
//output: "--foo--"
```

### unwrap

Remove the wrapped strings at both ends of a string

Method:
```php
public static function unwrap(string $str, string $wrapper): string
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::unwrap('--foo--', '--');
var_dump($res);
//output: "foo"
```

### startsWithAny

Checks if a string starts with any of the specified strings in an array

Method:
```php
public static function startsWithAny(string $str, array $prefixes): bool
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::startsWithAny('foobar', ['foo', 'oof']);
var_dump($res);
//output: bool(true)

$res = \Naroat\Ivory\Str\Str::startsWithAny('foobar', ['oof', 'rab']);
var_dump($res);
//output: bool(false)
```


### endsWithAny

Checks if a string ends with any of the specified strings in an array

Method:
```php
public static function endsWithAny(string $str, array $suffixes): bool
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::endsWithAny('foobar', ['bar', 'rab']);
var_dump($res);
//output: bool(true)

$res = \Naroat\Ivory\Str\Str::endsWithAny('foobar', ['oof', 'rab']);
var_dump($res);
//output: bool(false)
```

### replaceRange

Replaces characters in a specified range in a string

Method:
```php
public static function replaceRange(string $str, string $replacement, int $start, ?int $length = null): string
```

Parameter Description:
- `str`: the original string
- `replacement`:the content to be replaced
- `start`: starting position (starting from 0)
- `length`: the length of the replacement, if it is null, the replacement will be to the end of the string

Example:
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

Privacy mailbox

Method:
```php
public static function hideEmail(string $email, string $char = '***@'): string
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com');
var_dump($res);
//output: "foo***@bar.com"

$res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com', '---@');
var_dump($res);
//output: "foo---@bar.com"
```

### hidePhone

Privacy phone number

Method:
```php
public static function hidePhone(string $phone, string $char = '****'): string
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::hidePhone('13012345678');
var_dump($res);
//output: "130****5678"

$res = \Naroat\Ivory\Str\Str::hidePhone('13012345678', '(-)');
var_dump($res);
//output: "130(-)5678"
```

### removeSpace

Remove spaces from a string

Method:
```php
public static function removeSpace(string $str, bool $replaceAll = true): string
```

Parameter Description
- `str`: the original string
- `replaceAll`: whether to delete all spaces, `true` to delete all spaces, `false` to replace multiple spaces with one space

Example:
```php
$res = \Naroat\Ivory\Str\Str::removeSpace('foo      b a   r');
    var_dump($res);
    //output: "foobar"

    $res = \Naroat\Ivory\Str\Str::removeSpace('foo      b a   r', false);
    var_dump($res);
    //output: "foo b a r"
```

### truncate

Truncates a string to a specified length and adds an ellipsis at the end

Method:
```php
public static function truncate(string $str, int $length, string $ellipsis = '...'): string
```

Parameter description:
- `str`: the original string
- `length`: truncated length (excluding ellipsis)
- `ellipsis`: ellipsis string

Example:
```php
$res = \Naroat\Ivory\Str\Str::truncate('This method truncates the string to the specified length and adds an ellipsis at the end', 30);
var_dump($res);
//output: "This method truncates the stri..."

$res = \Naroat\Ivory\Str\Str::truncate('This method truncates the string to the specified length and adds an ellipsis at the end', 30, '(...)');
var_dump($res);
//output: "This method truncates the stri(...)"
```


### rotate

Rotate a string by the specified number of characters

Method:
```php
public static function rotate(string $str, int $shift, bool $preserveUnicode = true): string
```

Parameter description:
- `str`: the original string
- `shift`: the number of characters to rotate
- `preserveUnicode`: whether to preserve unicode characters

Example:
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

Remove HTML tags from a string

Method:
```php
public static function stripHtml(string $str, string $allowableTags = '', bool $removeLineBreaks = false): string
```

Parameter description:
- `str`: the original string
- `allowableTags`: : allowed tags, if empty, clear all tags (can be a string such as `<p><a>`)
- `removeLineBreaks`: whether to remove line breaks

Example:
```php
$res = \Naroat\Ivory\Str\Str::stripHtml('<p>This method strips <b>HTML</b> tags from the string.</p>');
var_dump($res);
//output: "This method strips HTML tags from the string."

$res = \Naroat\Ivory\Str\Str::stripHtml('<p>This method strips <b>HTML</b> tags from the string.</p>', '<b>');
var_dump($res);
//output: "This method strips <b>HTML</b> tags from the string."
```


### rmbUpper

Convert RMB to uppercase, up to 100 billion supported

Method:
```php
public static function rmbUpper(float $num): string
```

Example:
```php
$res = \Naroat\Ivory\Str\Str::rmbUpper(543211234567.89);
var_dump($res);
//output: "伍仟肆佰叁拾贰亿壹仟壹佰贰拾叁万肆仟伍佰陆拾柒元捌角玖分"
```

