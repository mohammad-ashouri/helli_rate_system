<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

//start move to school
if (isset($_POST['move_to_school']) and !empty($_POST['schoolname'])) {

    $school = $_POST['schoolname'];
    $state = $_SESSION['city'];
    $city = $_SESSION['shahr_name'];
    $usercode = $_SESSION['username'];
    $query=mysqli_query($connection,"select distinct jashnvareh from etelaat_a order by jashnvareh");
    foreach ($query as $festivals){}
    $lastFestival=$festivals['jashnvareh'];
    $query = mysqli_query($connection, "select * from etelaat_p inner join etelaat_a on etelaat_p.codeasar=etelaat_a.codeasar where etelaat_p.ostantahsili='$state' and (etelaat_a.vaziatkarnamemadrese is null or etelaat_a.vaziatkarnamemadrese='') and (etelaat_a.vaziatmadreseasar is null or etelaat_a.vaziatmadreseasar='') and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_p.madrese='$school' and etelaat_p.master='نیست' and etelaat_a.jashnvareh='$lastFestival'");
    foreach ($query as $item) {
        $codeasar = $item['codeasar'];
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='انتقال از استان',transporter_to_school_user='$usercode',date_transfer_to_school='$date',vaziatkarnamemadrese='در حال ارزیابی',nobat_arzyabi_madrese='ارزیابی اجمالی',nobat_arzyabi_ostani=null where codeasar='$codeasar'");
    }
    $num = mysqli_num_rows($query);

    $operation = "Move Posts To School => " . $school;
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
    header("location: ../../move_to_school.php?moved&num=$num");
}
//end move to school