<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function toCamelCaseExample()
{
    $strs = ['', 'foo-bar', 'foo_bar'];

    foreach ($strs as $val) {
        $res = \Naroat\Ivory\Str\Str::toCamelCase($val);
        var_dump($res);
    }

    //output
    //""
    //fooBar
    //fooBar
}


function toSnakeCaseExample()
{
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
}


function toKebabCaseExample()
{
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
}

function wrapExample()
{
    $res = \Naroat\Ivory\Str\Str::wrap('foo', '--');
    var_dump($res);
}

function unwrapExample()
{
    $res = \Naroat\Ivory\Str\Str::unwrap('--foo--', '--');
    var_dump($res);
}

function startsWithAnyExample()
{
    $res = \Naroat\Ivory\Str\Str::startsWithAny('foobar', ['foo', 'oof']);
    var_dump($res);
    //output: bool(true)

    $res = \Naroat\Ivory\Str\Str::startsWithAny('foobar', ['oof', 'rab']);
    var_dump($res);
    //output: bool(false)
}

function endsWithAnyExample()
{
    $res = \Naroat\Ivory\Str\Str::endsWithAny('foobar', ['bar', 'rab']);
    var_dump($res);
    //output: bool(true)

    $res = \Naroat\Ivory\Str\Str::endsWithAny('foobar', ['oof', 'rab']);
    var_dump($res);
    //output: bool(false)
}

function replaceRangeExample()
{
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
}
function hideEmailExample()
{
    $res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com');
    var_dump($res);
    //output: "foo***@bar.com"

    $res = \Naroat\Ivory\Str\Str::hideEmail('foo123456@bar.com', '---@');
    var_dump($res);
    //output: "foo---@bar.com"
}

function hidePhoneExample()
{
    $res = \Naroat\Ivory\Str\Str::hidePhone('13012345678');
    var_dump($res);
    //output: "130****5678"

    $res = \Naroat\Ivory\Str\Str::hidePhone('13012345678', '(-)');
    var_dump($res);
    //output: "130(-)5678"
}

function removeSpaceExample()
{
    $res = \Naroat\Ivory\Str\Str::removeSpace('foo      b a   r');
    var_dump($res);
    //output: "foobar"

    $res = \Naroat\Ivory\Str\Str::removeSpace('foo      b a   r', false);
    var_dump($res);
    //output: "foo b a r"
}

function truncateExample()
{
    $res = \Naroat\Ivory\Str\Str::truncate('This method truncates the string to the specified length and adds an ellipsis at the end', 30);
    var_dump($res);
    //output: "This method truncates the stri..."

    $res = \Naroat\Ivory\Str\Str::truncate('This method truncates the string to the specified length and adds an ellipsis at the end', 30, '(...)');
    var_dump($res);
    //output: "This method truncates the stri(...)"
}

function rotateExample()
{
    $res = \Naroat\Ivory\Str\Str::rotate('abcdefg', 3);
    var_dump($res);
    //output: "efgabcd"

    $res = \Naroat\Ivory\Str\Str::rotate('abcdefg', -3);
    var_dump($res);
    //output: "defgabc"

    $res = \Naroat\Ivory\Str\Str::rotate('你好世界', 2);
    var_dump($res);
    //output: "世界你好"
}

function stripHtmlExample()
{
    $res = \Naroat\Ivory\Str\Str::stripHtml('<p>This method strips <b>HTML</b> tags from the string.</p>');
    var_dump($res);
    //output: "This method strips HTML tags from the string."

    $res = \Naroat\Ivory\Str\Str::stripHtml('<p>This method strips <b>HTML</b> tags from the string.</p>', '<b>');
    var_dump($res);
    //output: "This method strips <b>HTML</b> tags from the string."
}

function rmbUpperExample()
{
    $res = \Naroat\Ivory\Str\Str::rmbUpper(543211234567.89);
    var_dump($res);
    //output: "伍仟肆佰叁拾贰亿壹仟壹佰贰拾叁万肆仟伍佰陆拾柒元捌角玖分"
}


//toCamelCaseExample();
//toSnakeCaseExample();
//toKebabCaseExample();
//wrapExample();
//unwrapExample();

//startsWithAnyExample();
//endsWithAnyExample();

//replaceRangeExample();
//hideEmailExample();
//hidePhoneExample();

//removeSpaceExample();
//truncateExample();

//rotateExample();
//stripHtmlExample();
rmbUpperExample();