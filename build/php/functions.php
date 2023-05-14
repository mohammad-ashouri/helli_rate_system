<?php
//start function for show last seen time in navbar
function showlastseentimeonnavbar($connection,$user){
    $showlastlogindatequery=mysqli_query($connection,"select * from log_helli where username='$user' and logout_year is not null");
    foreach ($showlastlogindatequery as $showlastlogindate){}
    if (@$showlastlogindate!=null){
        echo @$showlastlogindate['login_year']."/".@$showlastlogindate['login_month']."/".@$showlastlogindate['login_day'].' '.@$showlastlogindate['login_hour'].":".@$showlastlogindate['login_minute'];
    }
    else{
        echo 'اولین ورود شما';
    }

}
//end function for show last seen time in navbar

//start function get user ip address
function getIPAddress(){
		//whether ip is from the share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} //whether ip is from the proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} //whether ip is from the remote address
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
}
//end function get user ip address
