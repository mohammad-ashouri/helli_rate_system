<?php

session_start();
include_once 'config/connection.php';
include_once 'build/php/functions.php';
//$ip = getIPAddress();
//$browsername = $_SERVER['HTTP_USER_AGENT'];
//$browserversion = NULL;
//type=0 => ارزیاب جشنواره
//type=1 => کارشناس سامانه
//type=1 and full_access=1 => مدیر سامانه
//type=2 => دبیر استان
//type=3 => دبیر مدرسه
//approved=0 => کاربر غیر فعال شده
$dateforinsertloglogins = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$ip='127.0.0.1';
if (isset($_POST) & !empty($_POST)) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($_POST['captcha'] == $_SESSION['captcha']) {
    if (!isset($_POST['submit']) and empty($user) or empty($pass)) {
        $operation = "LoginError";
        mysqli_query($connection, "insert into login_logs (user_id,date_time,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");

        header("location:index?error");
    } else {
        $result = mysqli_query($connection, "select * from rater_list where `username`='$user' and `password`='$pass'");
        foreach ($result as $rows) {
        }
        if ($user == $rows['username'] && $pass == $rows['password'] and $rows['type'] == 0) {
            $operation = "RaterLoginSuccess";
            mysqli_query($connection, "insert into login_logs (user_id,date_time,operation,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");
            $_SESSION['groupname'] = null;
            $_SESSION['username'] = $user;
            $query = mysqli_query($connection, "select * from log_helli where username='$user' and logout_year is null");
            foreach ($query as $items) {
            }
            if ($items != null) {
                $code = $items['username'];
                mysqli_query($connection, "update log_helli set logout_year=1,logout_month=1,logout_day=1,logout_hour=1,logout_minute=1,logout_second=1 where username='$code' and logout_year is null");
            }
            mysqli_query($connection, "insert into `log_helli`(`username`,`login_year`,`login_month`,`login_day`,`login_hour`,`login_minute`,`login_second`,`ip_address`,`browser_name`,`browser_version`)
                values ('$user','$year','$month','$day','$hour','$min','$sec','$ip','$browsername','$browserversion')");
            $_SESSION['head'] = $rows['type'];
            $_SESSION['islogin'] = true;
            $_SESSION['coderater'] = $rows['code'];
            if ($rows['GroupNameIfGroupHead'] != null or $rows['GroupNameIfGroupHead'] != '') {
                $_SESSION['groupname'] = $rows['GroupNameIfGroupHead'];
            } else {
                $_SESSION['groupname'] = null;
            }
            $_SESSION['start'] = time();
            $_SESSION['end'] = $_SESSION['start'] + 10800;
            if ($rows['approved'] == 1 and $rows['city_name'] != NULL) {
                $_SESSION['city'] = $rows['city_name'];
                $_SESSION['school'] = $rows['school_name'];
                $_SESSION['approved'] = 1;
            } elseif ($rows['approved'] == 0 and $rows['city_name'] != NULL and $rows['school_name'] == NULL) {
                $_SESSION['approved'] = 0;
                $_SESSION['city'] = $rows['city_name'];
                $_SESSION['school'] = NULL;
            } elseif ($rows['approved'] == 0 and $rows['city_name'] != NULL and $rows['school_name'] != NULL) {
                $_SESSION['approved'] = 0;
            } elseif ($rows['approved'] == 1 and $rows['city_name'] == NULL and $rows['school_name'] == NULL) {
                $_SESSION['approved'] = 1;
                $_SESSION['city'] = null;
            } elseif ($rows['approved'] == 2 and $rows['city_name'] != NULL and $rows['school_name'] == NULL) {
                $_SESSION['approved'] = 2;
            } elseif ($rows['approved'] == 2 and $rows['city_name'] != NULL and $rows['school_name'] != NULL) {
                $_SESSION['approved'] = 2;
            }
            header("location:panel.php");

        } elseif ($user == $rows['username'] && $pass == $rows['password'] and $rows['type'] == 1 and $rows['approved'] == 1) {
            $operation = "AdminLoginSuccess";
            mysqli_query($connection, "insert into login_logs (user_id,date_time,operation,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");

            $_SESSION['username'] = $user;
            $query = mysqli_query($connection, "select * from log_helli where username='$user' and logout_year is null");
            foreach ($query as $items) {
            }
            if ($items != null) {
                $code = @$items['username'];
                mysqli_query($connection, "update log_helli set logout_year=1,logout_month=1,logout_day=1,logout_hour=1,logout_minute=1,logout_second=1 where username='$code' and logout_year is null");
            }
            mysqli_query($connection, "insert into `log_helli`(`username`,`login_year`,`login_month`,`login_day`,`login_hour`,`login_minute`,`login_second`,`ip_address`,`browser_name`,`browser_version`)
                values ('$user','$year','$month','$day','$hour','$min','$sec','$ip','$browsername','$browserversion')");
            if ($rows['full_access'] == 1) {
                $_SESSION['full_access'] = 1;
            }
            $_SESSION['head'] = $rows['type'];
            $_SESSION['approved'] = 1;
            $_SESSION['islogin'] = true;
            $_SESSION['coderater'] = $rows['code'];
            $_SESSION['namefamily'] = $rows['name'] . " " . $rows['family'];
            $_SESSION['start'] = time();
            $_SESSION['end'] = $_SESSION['start'] + 10800;
            header("location:panel.php");
        } elseif ($user == $rows['username'] && $pass == $rows['password'] and $rows['type'] == 2 and $rows['approved'] == 1) {

            $operation = "StateAdminLoginSuccess";
            mysqli_query($connection, "insert into login_logs (user_id,date_time,operation,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");

            $_SESSION['username'] = $user;
            $query = mysqli_query($connection, "select * from log_helli where username='$user' and logout_year is null");
            foreach ($query as $items) {
            }
            if ($items != null) {
                $code = $items['username'];
                mysqli_query($connection, "update log_helli set logout_year=1,logout_month=1,logout_day=1,logout_hour=1,logout_minute=1,logout_second=1 where username='$code' and logout_year is null");
            }
            mysqli_query($connection, "insert into `log_helli`(`username`,`login_year`,`login_month`,`login_day`,`login_hour`,`login_minute`,`login_second`,`ip_address`,`browser_name`,`browser_version`)
                values ('$user','$year','$month','$day','$hour','$min','$sec','$ip','$browsername','$browserversion')");

            $_SESSION['head'] = $rows['type'];
            $_SESSION['city'] = $rows['city_name'];
            $_SESSION['shahr_name'] = $rows['shahr_name'];
            $_SESSION['islogin'] = true;
            $_SESSION['coderater'] = $rows['code'];
            $_SESSION['namefamily'] = $rows['name'] . " " . $rows['family'];
            $_SESSION['approved'] = $rows['approved'];
            $_SESSION['start'] = time();
            $_SESSION['end'] = $_SESSION['start'] + 10800;
            header("location:panel.php");
        } elseif ($user == $rows['username'] && $pass == $rows['password'] and $rows['type'] == 3 and $rows['approved'] == 1) {
            $operation = "CityAdminLoginSuccess";
            mysqli_query($connection, "insert into login_logs (user_id,date_time,operation,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");

            $_SESSION['username'] = $user;
            $query = mysqli_query($connection, "select * from log_helli where username='$user' and logout_year is null");
            foreach ($query as $items) {
            }
            if ($items != null) {
                $code = $items['username'];
                mysqli_query($connection, "update log_helli set logout_year=1,logout_month=1,logout_day=1,logout_hour=1,logout_minute=1,logout_second=1 where username='$code' and logout_year is null");
            }
            mysqli_query($connection, "insert into `log_helli`(`username`,`login_year`,`login_month`,`login_day`,`login_hour`,`login_minute`,`login_second`,`ip_address`,`browser_name`,`browser_version`)
        values ('$user','$year','$month','$day','$hour','$min','$sec','$ip','$browsername','$browserversion')");

            $_SESSION['head'] = $rows['type'];
            $_SESSION['city'] = $rows['city_name'];
            $_SESSION['shahr_name'] = $rows['shahr_name'];
            $_SESSION['school'] = $rows['school_name'];
            $_SESSION['islogin'] = true;
            $_SESSION['coderater'] = $rows['code'];
            $_SESSION['namefamily'] = $rows['name'] . " " . $rows['family'];
            $_SESSION['approved'] = $rows['approved'];
            $_SESSION['start'] = time();
            $_SESSION['end'] = $_SESSION['start'] + 10800;
            header("location:panel.php");
        } else {
            $pass = $_POST['password'];
            $operation = "NotFoundUser(PasswordEntered=$pass)";
            mysqli_query($connection, "insert into login_logs (user_id,date_time,operation,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");

            header("location:index.php?notfound");
        }
    }
    }
	else {
        $captcha=$_POST['captcha'];
        $operation = "InvalidCaptcha(CaptchaEntered=$captcha)";
        mysqli_query($connection, "insert into login_logs (user_id,date_time,operation,IPAddress) values ('$user','$dateforinsertloglogins','$operation','$ip')");
        header("location:index.php?invalidcaptcha");
    }
}

