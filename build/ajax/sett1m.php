<?php include_once __DIR__.'/../../config/connection.php'; ?>
<?php
	session_start();
	$state=$_SESSION['city'];
	$city=$_SESSION['shahr_name'];
	$school=$_SESSION['school'];
	$registrar=$_SESSION['username'];
	$user = $_GET['ratercode'];
	$codeasar=$_GET['codeasar'];
//	switch ($city){
//		case 'بناب':
//			$query=mysqli_query($connection,"select * from rater_list where shahr_name='بناب' and code='$user'");
//			break;
//		case 'کاشان':
//			$query=mysqli_query($connection,"select * from rater_list where shahr_name='کاشان' and code='$user'");
//			break;
//		default:
//			$query=mysqli_query($connection,"select * from rater_list where city_name='$state' and code='$user'");
//			break;
//	}
//	foreach ($query as $item){}
//	if ($item!=null){
		mysqli_query($connection,"update etelaat_a set codearzyabtafsili1_madrese='$user',tahvilasararzyabitafsili1_madrese='$date',registrant_tafsili1_madrese='$registrar' where codeasar='$codeasar'");
        $dateforupdateloghelli=$year.'/'.$month.'/'.$day.' '.$hour.':'.$min.':'.$sec;
        $select=mysqli_query($connection,"select * from log_helli where logout_year is null and username='$user'");
        foreach ($select as $markforlinklogs){}
        $user=$_SESSION['username'];
        $linklog=$markforlinklogs['radif'];
        $urlofthispage=$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
        $operation="set asar tafsili1 madrese";

        mysqli_query($connection,"insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
        mysqli_close($connection);
//}
	session_abort();
?>