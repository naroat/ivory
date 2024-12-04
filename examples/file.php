<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function getMsectimeExample() {
    $res = \Naroat\Ivory\File\File::copyDir('/tmp/test', './');
    var_dump($res);
    //Output: bool(true)
}

function clearFileExample() {
    $res = \Naroat\Ivory\File\File::clearFile('./tmp/test.txt');
    var_dump($res);
    //Output: bool(true)
}

function getFileDetailsExample() {
    $res = \Naroat\Ivory\File\File::getFileDetails('./tmp/test.txt');
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
}

function getFileModeExample() {
    $res = \Naroat\Ivory\File\File::getFileMode('./tmp/test.txt');
    var_dump($res);
    //Output: string(9) "-rw-r--r-"
}

function traverseDirExample() {
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
}

//getMsectimeExample();
//clearFileExample();
//getFileDetailsExample();
//getFileModeExample();
traverseDirExample();