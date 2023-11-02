<?php include_once __DIR__ . '/../../config/connection.php'; ?>
<?php
session_start();
$state = $_SESSION['city'];
$city = $_SESSION['shahr_name'];
$school = $_SESSION['school'];
$registrar = $_SESSION['username'];
$user = $_GET['ratercode'];
$codeasar = $_GET['codeasar'];
mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese='$user',tahvilasararzyabitafsili3_madrese='$date',registrant_tafsili3_madrese='$registrar' where codeasar='$codeasar'");
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$select = mysqli_query($connection, "select * from log_helli where logout_year is null and username='$user'");
foreach ($select as $markforlinklogs) {
}
$user = $_SESSION['username'];
$linklog = $markforlinklogs['radif'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$operation = "set asar tafsili3 madrese";

mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
mysqli_close($connection);
session_abort();
?>