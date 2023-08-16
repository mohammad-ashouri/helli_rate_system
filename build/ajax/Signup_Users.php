<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$work = $_REQUEST['work'];
@$value = $_REQUEST['value'];
$nationalCode = $_POST['nationalCode'];
$registrar = $_SESSION['username'];
$user = $_SESSION['username'];
$linklog = $markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
if ($_SESSION['head'] == 1) {
    switch ($work) {
        case 'removePersonalImage':
            mysqli_query($signup_connection, "update users set personalImageSrc=null,updated_at='$now' where national_code='$nationalCode'");
            $operation = "removePersonalImage";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
            break;
        case 'phoneChange':
            mysqli_query($signup_connection, "update contacts set phone='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "phoneChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'mobileChange':
            mysqli_query($signup_connection, "update contacts set mobile='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "mobileChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'postalcodeChange':
            mysqli_query($signup_connection, "update contacts set postal_code='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "postalcodeChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'addressChange':
            mysqli_query($signup_connection, "update contacts set address='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "addressChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'contactSaveTo1':
            mysqli_query($signup_connection, "update contacts set approved=1,updated_at='$now' where national_code='$nationalCode'");
            $operation = "contactSaveTo1";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'contactSaveTo0':
            mysqli_query($signup_connection, "update contacts set approved=0,updated_at='$now' where national_code='$nationalCode'");
            $operation = "contactSaveTo0";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'noetahsilhozaviChange':
            mysqli_query($signup_connection, "update educational_infos set noetahsilhozavi='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "noetahsilhozaviChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'changePaye':
            mysqli_query($signup_connection, "update educational_infos set paye='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "changePaye";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'changeTerm':
            $sath = $_REQUEST['sath'];
            $term = $_REQUEST['term'];
            mysqli_query($signup_connection, "update educational_infos set sath='$sath',term='$term',updated_at='$now' where national_code='$nationalCode'");
            $operation = "changeTerm";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'shparvandetahsiliChange':
            mysqli_query($signup_connection, "update educational_infos set shparvandetahsili='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "shparvandetahsiliChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'tahsilatghhozaviChange':
            $tahsilatghhozavi = $_REQUEST['tahsilatghhozavi'];
            if ($tahsilatghhozavi == 'دیپلم' or $tahsilatghhozavi == 'زیر دیپلم') {
                mysqli_query($signup_connection, "update educational_infos set tahsilatghhozavi='$tahsilatghhozavi',reshtedaneshgahi=null,updated_at='$now' where national_code='$nationalCode'");
            } else {
                $reshtedaneshgahi = $_REQUEST['reshtedaneshgahi'];
                mysqli_query($signup_connection, "update educational_infos set tahsilatghhozavi='$tahsilatghhozavi',reshtedaneshgahi='$reshtedaneshgahi',updated_at='$now' where national_code='$nationalCode'");
            }
            $operation = "tahsilatghhozaviChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'markaztakhasosihozaviChange':
            $markaztakhasosihozavi = $_REQUEST['markaztakhasosihozavi'];
            if ($markaztakhasosihozavi == '') {
                mysqli_query($signup_connection, "update educational_infos set markaztakhasosihozavi=null,reshtetakhasosihozavi=null,updated_at='$now' where national_code='$nationalCode'");
            } else {
                $reshtetakhasosihozavi = $_REQUEST['reshtetakhasosihozavi'];
                mysqli_query($signup_connection, "update educational_infos set markaztakhasosihozavi='$markaztakhasosihozavi',reshtetakhasosihozavi='$reshtetakhasosihozavi',updated_at='$now' where national_code='$nationalCode'");
            }
            $operation = "markaztakhasosihozaviChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'educationalSaveTo0':
            mysqli_query($signup_connection, "update educational_infos set approved=0,updated_at='$now' where national_code='$nationalCode'");
            $operation = "educationalSaveTo0";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'educationalSaveTo1':
            mysqli_query($signup_connection, "update educational_infos set approved=1,updated_at='$now' where national_code='$nationalCode'");
            $operation = "educationalSaveTo1";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'isMasterStatusChange':
            mysqli_query($signup_connection, "update teaching_infos set isMaster='$value',updated_at='$now' where national_code='$nationalCode'");
            if ($value=='خیر'){
                mysqli_query($signup_connection, "update teaching_infos set masterCode=null,teachingProvince=null,teachingCity=null,teachingPlaceName=null,updated_at='$now' where national_code='$nationalCode'");
            }
            $operation = "isMasterStatusChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'masterCodeChange':
            mysqli_query($signup_connection, "update teaching_infos set isMaster='بله', masterCode='$value',updated_at='$now' where national_code='$nationalCode'");
            $operation = "masterCodeChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'teachingPlaceNameChange':
            $teachingProvince=$_REQUEST['teachingProvince'];
            $teachingCity=$_REQUEST['teachingCity'];
            $teachingPlaceName=$_REQUEST['teachingPlaceName'];
            mysqli_query($signup_connection, "update teaching_infos set isMaster='بله',teachingProvince='$teachingProvince',teachingCity='$teachingCity',teachingPlaceName='$teachingPlaceName',updated_at='$now' where national_code='$nationalCode'");
            $operation = "teachingPlaceNameChange";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'teachingSaveTo0':
            mysqli_query($signup_connection, "update teaching_infos set approved=0,updated_at='$now' where national_code='$nationalCode'");
            $operation = "teachingSaveTo0";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
        case 'teachingSaveTo1':
            mysqli_query($signup_connection, "update teaching_infos set approved=1,updated_at='$now' where national_code='$nationalCode'");
            $operation = "teachingSaveTo1";
            mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
            break;
    }
}
