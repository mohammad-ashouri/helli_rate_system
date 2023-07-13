<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$work = $_POST['work'];
@$value = $_POST['value'];
$nationalCode = $_POST['nationalCode'];
$registrar = $_SESSION['username'];
if ($_SESSION['head']==1) {
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
    }
}
