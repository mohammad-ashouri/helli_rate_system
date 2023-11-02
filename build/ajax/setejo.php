<?php include_once __DIR__ . '/../../config/connection.php';
session_start();
$state = $_SESSION['city'];
$city = $_SESSION['shahr_name'];
$registrar = $_SESSION['username'];
$user = $_GET['ratercode'];
$codeasar = $_GET['codeasar'];
switch ($city) {
    case 'قم':
        $query = mysqli_query($connection, "select * from rater_list where (city_name='قم' or city_name is null) and code='$user'");
        break;
    default:
        $query = mysqli_query($connection, "select * from rater_list where city_name='$state' and code='$user'");
        break;
}
if ($_SESSION['city'] == 'قم' or @$_SESSION['groupname'] != null) {
    $query = mysqli_query($connection, "select * from rater_list where (city_name='قم' or city_name is null) and code='$user'");
}
foreach ($query as $item) {
}
if ($item != null) {
    mysqli_query($connection, "update etelaat_a set codearzyabejmali_ostani='$user',tahvilasararzyabiejmali_ostani='$date',registrant_ejmali_ostani='$registrar' where codeasar='$codeasar'");
    $dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
    $select = mysqli_query($connection, "select * from log_helli where logout_year is null and username='$user'");
    foreach ($select as $markforlinklogs) {
    }
    $user = $_SESSION['username'];
    $linklog = $markforlinklogs['radif'];
    $urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $operation = "set asar ejmali ostan";

    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
    mysqli_close($connection);
}
session_abort();
?>