<?php
$user = $_SESSION['username'];
$urlofthispage=$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$linklog = @$markforlinklogs['radif'];
$operation = "";
mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");