<?php include_once __DIR__ . '/../../config/connection.php'; ?>
<?php
session_start();
$creator = $_SESSION['username'];
$groupelmi = $_GET['GroupName'];
$ratercode = $_GET['RaterCode'];
$date = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$select = mysqli_query($connection, "select * from log_helli where logout_year is null and username='$user'");
foreach ($select as $markforlinklogs) {
}
$user = $_SESSION['username'];
$linklog = $markforlinklogs['radif'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
mysqli_query($connection, "update rater_list set GroupNameIfGroupHead=NULL where GroupNameIfGroupHead='$groupelmi'");

mysqli_query($connection, "update rater_list set GroupNameIfGroupHead='$groupelmi',HeaderCreator='$creator',HeaderCreatedTime='$date' where username='$ratercode'");

$operation = "Set Group Header";
mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$date','$creator')");
mysqli_close($connection);
session_abort();