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
//start approve sianat ostan
if (isset($_POST['decline_asar']) and !empty($_POST['codeasar'])) {
    $operation = "decline_asar_sianati";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasar'];
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $eta) {
    }
    $nameasar = $eta['nameasar'];
    mysqli_query($connection, "update etelaat_a set approve_sianat=2,approver_sianat='$user',ellatnadashtansharayet='رد اثر در امور صیانتی استان',sharayetavalliehsherkat='ندارد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    header("location:" . $main_website_url . "/../../Send_To_Secretariat.php?success_sianat_decline&codeasar=$codeasar&nameasar=$nameasar");

}
