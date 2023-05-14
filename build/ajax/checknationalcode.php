<?php include_once __DIR__.'/../../config/connection.php'; ?>
<!DOCTYPE html>
<html>
<body>
<?php
$code=$_GET['nationalcode'];

$query=mysqli_query($connection,"SELECT * FROM rater_list WHERE username = '$code'");
foreach ($query as $rater_data){}

if (@$rater_data!=null){
    echo "کاربر با مشخصات وارد شده در سیستم یافت شد:".$rater_data['subject'].' '.$rater_data['city_name'];
}else{
    echo "";
}
mysqli_close($connection);
?>
</body>
</html>