<?php
//ini_set('display_errors', 1);

include_once 'jdf.php';
include_once 'GDate.php';
// include_once 'PHPExcel/Classes/PHPExcel.php';
function convertPersianNumbersToEnglish($text)
{
    $persianToEnglish = array(
        '۰' => '0',
        '۱' => '1',
        '۲' => '2',
        '۳' => '3',
        '۴' => '4',
        '۵' => '5',
        '۶' => '6',
        '۷' => '7',
        '۸' => '8',
        '۹' => '9'
    );
    $englishText = str_replace(array_keys($persianToEnglish), $persianToEnglish, $text);
    return $englishText;
}
date_default_timezone_set("Asia/Tehran");
$main_website_url = "localhost/";
$year = jdate('Y');
$month = jdate('n');
$day = jdate('d');
$hour = jdate('H');
$min = jdate('i');
$sec = jdate('s');
$date = $year . "/" . $month . "/" . $day;
$datewithtime = $year . "/" . $month . "/" . $day . ' ' . $hour . ":" . $min;
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$now = date('Y-m-d H:i:s');

$servername = "";
$username = "";
$password = "";
$dbname = "";

$connection = mysqli_connect($servername, $username, $password, $dbname);

$servername = "";
$username = "";
$password = "";
$dbname = "";

$signup_connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("اتصال با خطا مواجه شد: " . mysqli_connect_error());
}

mysqli_set_charset($connection, 'utf8');
mysqli_set_charset($signup_connection, 'utf8');