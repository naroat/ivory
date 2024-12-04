<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);

require_once __DIR__ . '/../vendor/autoload.php';

function getMsectimeExample() {
    $res = \Naroat\Ivory\DateTime\DateTime::getMsectime();
    var_dump($res);
    //output: int(1733217511706)
}

function msecToDateExample() {
    $msec = 1733217511706;
    $res = \Naroat\Ivory\DateTime\DateTime::msecToDate($msec);
    var_dump($res);
    //output: string(26) "2024-12-03 09:18:31.706"

    $res = \Naroat\Ivory\DateTime\DateTime::msecToDate($msec, 'Y-m-d H:i:s');
    var_dump($res);
    //output: string(19) "2024-12-03 09:18:31"
}

function dateToMsecExample() {
    $date = '2024-12-03 09:18:31.706';
    $res = \Naroat\Ivory\DateTime\DateTime::dateToMsec($date);
    var_dump($res);
    //output: int(1733217511706)

    $date = '2024-12-03 09:18:31';
    $res = \Naroat\Ivory\DateTime\DateTime::dateToMsec($date);
    var_dump($res);
    //output: int(1733217511000)
}

function dateDiffExample() {
    $startDate = '2024-10-03';
    $endDate = '2024-12-10';
    $res = \Naroat\Ivory\DateTime\DateTime::dateDiff($startDate, $endDate);
    var_dump($res);
    //output:
    //int(68)

    $startDate = '2024-10-03';
    $endDate = '2024-09-10';
    $res = \Naroat\Ivory\DateTime\DateTime::dateDiff($startDate, $endDate);
    var_dump($res);
    //output:
    //int(23)
}

function timeDiffExample() {
    $startTime = '2024-10-03 10:30:20';
    $endTime = '2024-10-03 10:30:56';
    $res = \Naroat\Ivory\DateTime\DateTime::timeDiff($startTime, $endTime);
    var_dump($res);
    //output:
    //int(36)

    $startTime = '2024-10-03 10:30:00';
    $endTime = '2024-10-10 10:30:00';
    $res = \Naroat\Ivory\DateTime\DateTime::timeDiff($startTime, $endTime);
    var_dump($res);
    //output:
    //int(604800)
}

function isLeapYearExample() {
    $year = 2024;
    $res = \Naroat\Ivory\DateTime\DateTime::isLeapYear($year);
    var_dump($res);
    //output: bool(true)

    $year = 2023;
    $res = \Naroat\Ivory\DateTime\DateTime::isLeapYear($year);
    var_dump($res);
    //output: bool(false)
}

function dayOfYearExample() {
    $date = '2024-12-03';
    $res = \Naroat\Ivory\DateTime\DateTime::dayOfYear($date);
    var_dump($res);
    //output: int(337)

    $date = '2024-02-29';
    $res = \Naroat\Ivory\DateTime\DateTime::dayOfYear($date);
    var_dump($res);
    //output: int(60)
}

function weekRangeExample() {
    $date = '2024-12-03';
    $res = \Naroat\Ivory\DateTime\DateTime::weekRange($date);
    var_dump($res);
    //output: array(2) {
    //  ["start"]=>
    //  string(10) "2024-12-02"
    //  ["end"]=>
    //  string(10) "2024-12-08"
    //}
}

function monthRangeExample() {
    $date = '2024-12-03';
    $res = \Naroat\Ivory\DateTime\DateTime::monthRange($date);
    var_dump($res);
    //output: array(2) {
    //  ["start"]=>
    //  string(10) "2024-12-01"
    //  ["end"]=>
    //  string(10) "2024-12-31"
    //}
}

function dateByIntervalExample()
{
    $startDate = '2024-11-25';
    $endDate = '2024-12-01';
    $res = \Naroat\Ivory\DateTime\DateTime::dateByInterval( $startDate, $endDate, 'day');
    var_dump($res);
    //output: array(7) {
    //  [0]=>
    //  string(10) "2024-11-25"
    //  [1]=>
    //  string(10) "2024-11-26"
    //  [2]=>
    //  string(10) "2024-11-27"
    //  [3]=>
    //  string(10) "2024-11-28"
    //  [4]=>
    //  string(10) "2024-11-29"
    //  [5]=>
    //  string(10) "2024-11-30"
    //  [6]=>
    //  string(10) "2024-12-01"
    //}

    $startDate = '2023-11-01';
    $endDate = '2024-02-07';
    $res = \Naroat\Ivory\DateTime\DateTime::dateByInterval( $startDate, $endDate, 'month');
    var_dump($res);
    //output: array(4) {
    //  [0]=>
    //  string(7) "2023-11"
    //  [1]=>
    //  string(7) "2023-12"
    //  [2]=>
    //  string(7) "2024-01"
    //  [3]=>
    //  string(7) "2024-02"
    //}

    $startDate = '2020-01-01';
    $endDate = '2024-12-31';
    $res = \Naroat\Ivory\DateTime\DateTime::dateByInterval( $startDate, $endDate, 'year');
    var_dump($res);
    //output: array(5) {
    //  [0]=>
    //  string(4) "2020"
    //  [1]=>
    //  string(4) "2021"
    //  [2]=>
    //  string(4) "2022"
    //  [3]=>
    //  string(4) "2023"
    //  [4]=>
    //  string(4) "2024"
    //}
}

//getMsectimeExample();
//msecToDateExample();
//dateToMsecExample();
//dateDiffExample();
//timeDiffExample();
//isLeapYearExample();
//dayOfYearExample();
//weekRangeExample();
//monthRangeExample();
dateByIntervalExample();