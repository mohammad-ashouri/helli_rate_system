<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$work = $_REQUEST['work'];
@$value = $_REQUEST['value'];
$nationalCode = $_POST['nationalCode'];
$registrar = $_SESSION['username'];
if ($_SESSION['head'] == 1) {
    switch ($work) {
        case 'phoneChange':
            mysqli_query($signup_connection, "update contacts set phone='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'mobileChange':
            mysqli_query($signup_connection, "update contacts set mobile='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'postalcodeChange':
            mysqli_query($signup_connection, "update contacts set postal_code='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'addressChange':
            mysqli_query($signup_connection, "update contacts set address='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'contactSaveTo1':
            mysqli_query($signup_connection, "update contacts set approved=1,updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'contactSaveTo0':
            mysqli_query($signup_connection, "update contacts set approved=0,updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'noetahsilhozaviChange':
            mysqli_query($signup_connection, "update educational_infos set noetahsilhozavi='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'changePaye':
            mysqli_query($signup_connection, "update educational_infos set paye='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'changeTerm':
            $sath = $_REQUEST['sath'];
            $term = $_REQUEST['term'];
            mysqli_query($signup_connection, "update educational_infos set sath='$sath',term='$term',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'shparvandetahsiliChange':
            mysqli_query($signup_connection, "update educational_infos set shparvandetahsili='$value',updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'tahsilatghhozaviChange':
            $tahsilatghhozavi = $_REQUEST['tahsilatghhozavi'];
            if ($tahsilatghhozavi == 'دیپلم' or $tahsilatghhozavi == 'زیر دیپلم') {
                mysqli_query($signup_connection, "update educational_infos set tahsilatghhozavi='$tahsilatghhozavi',reshtedaneshgahi=null,updated_at='$now' where national_code='$nationalCode'");
            } else {
                $reshtedaneshgahi = $_REQUEST['reshtedaneshgahi'];
                mysqli_query($signup_connection, "update educational_infos set tahsilatghhozavi='$tahsilatghhozavi',reshtedaneshgahi='$reshtedaneshgahi',updated_at='$now' where national_code='$nationalCode'");
            }
            break;
        case 'markaztakhasosihozaviChange':
            $markaztakhasosihozavi = $_REQUEST['markaztakhasosihozavi'];
            if ($markaztakhasosihozavi == 'اشتغال ندارم' or $markaztakhasosihozavi == '') {
                mysqli_query($signup_connection, "update educational_infos set markaztakhasosihozavi='$markaztakhasosihozavi',reshtetakhasosihozavi=null,updated_at='$now' where national_code='$nationalCode'");
            } else {
                $reshtetakhasosihozavi = $_REQUEST['reshtetakhasosihozavi'];
                mysqli_query($signup_connection, "update educational_infos set markaztakhasosihozavi='$markaztakhasosihozavi',reshtetakhasosihozavi='$reshtetakhasosihozavi',updated_at='$now' where national_code='$nationalCode'");
            }
            break;
        case 'educationalSaveTo0':
            mysqli_query($signup_connection, "update educational_infos set approved=0,updated_at='$now' where national_code='$nationalCode'");
            break;
        case 'educationalSaveTo1':
            mysqli_query($signup_connection, "update educational_infos set approved=1,updated_at='$now' where national_code='$nationalCode'");
            break;
    }
}
