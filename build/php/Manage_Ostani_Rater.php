<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
$markforlinklogs = mysqli_fetch_array($select);
$LinkLogID = @$markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

//start add non keshvari rater
if (isset($_POST['subsetnonkeshvarirater']) and !empty($_POST['code'])) {
    $operation = "subsetnonkeshvarirater";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
    $codearzyab = $_POST['code'];
    $query = mysqli_query($connection, "select * from rater_list where code='$codearzyab'");
    $checkraterfound=mysqli_fetch_array($query);
    if ($checkraterfound != null) {
        header("location: ../../add_rater_ostani.php?raterfounded&code=$codearzyab");
    } else {
        $password = convertPersianNumbersToEnglish($_POST['password']);
        $namearzyab = $_POST['name'];
        $familyarzyab = $_POST['family'];
        if (isset($_POST['arshad']) and $_POST['arshad'] == 'on') {
            $arshad = 'کارشناسی ارشد';
        }
        if (isset($_POST['doctor']) and $_POST['doctor'] == 'on') {
            $doctor = 'دکتری';
        }
        if (isset($_POST['sath3']) and $_POST['sath3'] == 'on') {
            $sath3 = 'سطح 3 حوزه';
        }
        if (isset($_POST['sath4']) and $_POST['sath4'] == 'on') {
            $sath4 = 'سطح 4 حوزه';
        }
        $sathelmiarzyab = $arshad . '-' . $doctor . '-' . $sath3 . '-' . $sath4;
//			$codemelli=$_POST['codemelli'];
        $gender = $_POST['gender'];

        $arzyabsamane = 'ارزیاب جشنواره';
        $phone = $_POST['phone'];
        $state = $_POST['state_custom'];
        $city = $_POST['city_custom'];
        $school = $_POST['school'];
        if ($city == '') {
            $city = NULL;
        }
        if ($school == '') {
            $school = NULL;
        }

        $inputuser = $_POST['user'];

        if ($sathelmiarzyab == "") {
            $sathelmiarzyab = NULL;
        }
        $date = $year . "/" . $month . "/" . $day;
        $addtorater_list = "insert into `rater_list` (`name`,`family`,`code`,`gender`,`codemelli`,`sath_elmi`,`phone`,`username`,`password`,`city_name`,`shahr_name`,`school_name`,`input_user`,`approved`,`subject`,`type`,`date_added`)
                                                values ('$namearzyab','$familyarzyab','$codearzyab','$gender','$codearzyab','$sathelmiarzyab','$phone','$codearzyab','$password','$state','$city','$school','$inputuser',0,'$arzyabsamane',0,'$date')";
        mysqli_query($connection, $addtorater_list);
        $query = mysqli_query($connection, "select * from school_list where name='$school' and state='$state' and city='$city'");
        $schoollist=mysqli_fetch_array($query);
        if ($schoollist == null and $school != null) {
            $addtoschool_list = "insert into school_list (name,state,city,registrant_user,date_added) values ('$school','$state','$city','$inputuser','$date')";
            mysqli_query($connection, $addtoschool_list);
        }
        $info = $namearzyab . ' ' . $familyarzyab;
        header("location: ../../add_rater_ostani.php?addedrater&code=$codearzyab&info=$info");
    }
}
//end add non keshvari rater

//start edit non keshvari rater
elseif (isset($_POST['subeditnonkeshvarirater']) and !empty($_POST['editratercode'])) {
    $operation = "subeditnonkeshvarirater";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codearzyab = $_POST['editratercode'];
    $query = mysqli_query($connection, "select * from rater_list where code='$codearzyab'");
    $checkraterfound = mysqli_fetch_array($query);
    if ($checkraterfound == null) {
        header("location: ../../add_rater_ostani.php?raternotfounded&code=$codearzyab");
    } else {
        $namearzyab = $_POST['name'];
        $familyarzyab = $_POST['family'];
        $password = convertPersianNumbersToEnglish($_POST['password']);
        if (isset($_POST['arshad']) and $_POST['arshad'] == 'on') {
            $arshad = 'کارشناسی ارشد';
        }
        if (isset($_POST['doctor']) and $_POST['doctor'] == 'on') {
            $doctor = 'دکتری';
        }
        if (isset($_POST['sath3']) and $_POST['sath3'] == 'on') {
            $sath3 = 'سطح 3 حوزه';
        }
        if (isset($_POST['sath4']) and $_POST['sath4'] == 'on') {
            $sath4 = 'سطح 4 حوزه';
        }
        $sathelmiarzyab = $arshad . '-' . $doctor . '-' . $sath3 . '-' . $sath4;
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $state = $_POST['state_custom'];
        $city = $_POST['city_custom'];
        $school = $_POST['school'];
        if ($city == '') {
            $city = NULL;
        }
        if ($school == '') {
            $school = NULL;
        }
        $inputuser = $_POST['user'];
        if ($sathelmiarzyab == "") {
            $sathelmiarzyab = NULL;
        }
        $user_status = $_POST['user_status'];
        $active_status = $_POST['active_status'];
        switch ($user_status) {
            case 2:
                $subject = 'دبیر جشنواره استان';
                break;
            case 3:
                $subject = 'دبیر مدرسه ای جشنواره';
                break;
            default:
                $subject = 'ارزیاب جشنواره';
                break;
        }
        $date = $year . "/" . $month . "/" . $day;
        $editraterostani = "update rater_list set name='$namearzyab',family='$familyarzyab',password='$password',sath_elmi='$sathelmiarzyab',phone='$phone',gender='$gender',city_name='$state',shahr_name='$city',school_name='$school',type='$user_status',subject='$subject',approved='$active_status',editor='$user',date_edited='$date' where username='$codearzyab'";
        mysqli_query($connection, $editraterostani);
        $info = $namearzyab . ' ' . $familyarzyab;
        header("location: ../../add_rater_ostani.php?editedrater&code=$codearzyab&info=$info");
    }
}
//end edit non keshvari rater