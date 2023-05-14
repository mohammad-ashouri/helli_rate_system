<?php
session_start();
include_once 'config/connection.php';

$year=jdate('Y');
$month=jdate('n');
$day=jdate('j');
$hour=jdate('H');
$min=jdate('i');
$sec=jdate('s');
$user=$_SESSION['username'];
$query="update log_helli set `logout_year`='$year' where `username`='$user' and `logout_year` is null";
mysqli_query($connection,$query);
$query="update log_helli set `logout_month`='$month' where `username`='$user' and `logout_month` is null";
mysqli_query($connection,$query);
$query="update log_helli set `logout_day`='$day' where `username`='$user' and `logout_day` is null";
mysqli_query($connection,$query);
$query="update log_helli set `logout_hour`='$hour' where `username`='$user' and `logout_hour` is null";
mysqli_query($connection,$query);
$query="update log_helli set `logout_minute`='$min' where `username`='$user' and `logout_minute` is null";
mysqli_query($connection,$query);
$query="update log_helli set `logout_second`='$sec' where `username`='$user' and `logout_second` is null";
mysqli_query($connection,$query);
unset($_SESSION["islogin"]);
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION['coderater']);
unset($_SESSION['head']);

header("Location: index.php");