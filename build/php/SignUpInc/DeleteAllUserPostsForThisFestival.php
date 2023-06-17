<?php
include_once __DIR__ . '/../../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$nationalCode=$_POST['nationalCode'];
$operation = "Delete All Posts With This UserName => " . $nationalCode;
mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

$query=mysqli_query($signup_connection,"select * from festivals where active=1");
foreach($query as $festivalInfo){}
$ActivefestivalTitle=$festivalInfo['title'];

if (isset($_POST['nationalCode']) and !empty($_SESSION['username'])) {
    $query=mysqli_query($signup_connection,"select * from users where national_code='$nationalCode'");
    foreach ($query as $Person){}
    $personID=$Person['id'];

    $query=mysqli_query($signup_connection,"select * from posts where user_id='$personID' and sent=1 and festival_title='$ActivefestivalTitle'");
    foreach ($query as $posts){
        $date=date('Y-m-d H:i:s');
        $assignedPostID=$posts['assigned_post_id'];
        mysqli_query($connection,"delete from etelaat_a where codeasar='$assignedPostID'");
        mysqli_query($connection,"delete from etelaat_p where codeasar='$assignedPostID'");
        mysqli_query($signup_connection,"update posts set deleted_at='$date',sent=2,sent_at=null where user_id='$personID' and assigned_post_id='$assignedPostID'");
        mysqli_query($signup_connection,"update helli_user_max_upload_posts set numbers=3,sent_status=0,updated_at='$date' where national_code='$nationalCode'");
        $operation = "Delete Post With This Code => " . $assignedPostID;
        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    }
        header("location:" . $main_website_url . "/../../../signup_posts.php");
}
