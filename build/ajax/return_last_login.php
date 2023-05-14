<?php include_once __DIR__.'/../../config/connection.php'; ?>
<!DOCTYPE html>
<html>
<body>
<?php
	$user = explode(' - ',$_GET['loginuser']);
	$counter=1;
	$name=$user[1];
	$family=$user[0];
	$username=$user[2];
	$query=mysqli_query($connection,"SELECT * FROM log_helli WHERE username = '$username'");
    foreach ($query as $login_data){}

    if (@$login_data!=null){
        $query=mysqli_query($connection,"select * from rater_list where username='$username'");
        foreach ($query as $userdata){}
        if ($userdata['type']==1){
            echo "بیست بازدید آخر کاربر با مشخصات: " . $name . ' ' . $family . ' و کد کاربری ' . $userdata['username'] . '  <br><br>در تاریخ ها و ساعات زیر می باشد: '.'<br><br>';
        }else{
            echo "بیست بازدید آخر کاربر با مشخصات: " . $name . ' ' . $family . ' کد کاربری ' . $username . ' استان ' . $userdata['city_name'] . '  شهرستان ' . $userdata['shahr_name'] . '  مدرسه ' . $userdata['school_name'] . '  <br><br>در تاریخ ها و ساعات زیر می باشد: '.'<br><br>';
        }
        $query=mysqli_query($connection,"SELECT * FROM log_helli WHERE username = '$username' order by radif desc limit 20 ");
        foreach ($query as $login_data){
            echo $counter.'- '.@$login_data['login_year'].'/'.@$login_data['login_month'].'/'.@$login_data['login_day'].' ساعت ' . @$login_data['login_hour'].':'.@$login_data['login_minute'].':'.@$login_data['login_second']. ' آی پی ' . @$login_data['ip_address'].'<br><br>';
            $counter++;
        }
    }else{
	    echo "آخرین بازدید کاربر با مشخصات: " . $name . ' ' . $family . ' با کد کاربری ' . $username . ' بدون ورود به سامانه می باشد. ';

    }
	mysqli_close($connection);
?>
</body>
</html>