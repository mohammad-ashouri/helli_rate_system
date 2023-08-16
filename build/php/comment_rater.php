<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];


//start set rate ejmali rater keshvari
if (isset($_POST['submitrateraterkeshvari']) and !empty($_POST['tozihat']) and !empty($_POST['nazar']) and !empty($_POST['code'])) {
    $operation = "submitrateraterkeshvari";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $lentozih = strlen($_POST['tozihat']);
    $tozih = $_POST['tozihat'];
    $comment = $_POST['nazar'];
    $codeasar = $_POST['code'];
    $coderater = $_SESSION['username'];

    if ($lentozih > 100 and $comment <> "انتخاب کنید") {
        mysqli_query($connection, "update rater_comments_archive set timesabt_sec='$sec',timesabt_min='$min',timesabt_hour='$hour',tarikhsabt_year='$year',tarikhsabt_month='$month',tarikhsabt_day='$day',comment='$tozih',accept_or_reject='$comment' where rater_id='$coderater' and codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../panel.php?success");
    } elseif ($lentozih < 100 and $comment <> "انتخاب کنید") {
        header("location:" . $main_website_url . "/../../panel.php?-100characters");
    } elseif ($lentozih > 100 and $comment == "انتخاب کنید") {
        header("location:" . $main_website_url . "/../../panel.php?nazarnull");
    } else {
        header("location:" . $main_website_url . "/../../panel.php?fail");
    }
}
//end set rate ejmali rater keshvari
