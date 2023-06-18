<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
if (isset($_POST['maintenance']) and !empty($_SESSION['username'])) {
    $codeasar = $_POST['codeasar'];
    $query = mysqli_query($connection, "select * from options where op_name='maintenance'");
    foreach ($query as $option) {
    }
    if ($option['op_value']==1){
          $operation = "Maintenance OFF";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

        mysqli_query($connection, "update options set op_value=0,editor='$user',edited_time='$dateforupdateloghelli' where op_name='maintenance'");
    }
    else{
          $operation = "Maintenance ON";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

        mysqli_query($connection, "update options set op_value=1,editor='$user',edited_time='$dateforupdateloghelli' where op_name='maintenance'");
    }
    header("location:" . $main_website_url . "/../../superadmin_options.php");

}
