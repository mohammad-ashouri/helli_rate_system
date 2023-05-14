<?php
$hostname = "localhost";
$db = "";
$password = "";
$user = "";
$mysqli = new mysqli($hostname, $user, $password, $db);
mysqli_set_charset($mysqli, 'utf8');
?>