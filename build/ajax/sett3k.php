<?php include_once __DIR__.'/../../config/connection.php'; ?>
<?php
    session_start();
    $registrar=$_SESSION['username'];
	$user = $_GET['ratercode'];
	$codeasar=$_GET['codeasar'];
	mysqli_query($connection,"update etelaat_a set codearzyabtafsili3='$user',tarikhtahvilasar3='$date',registrant_tafsili3='$registrar' where codeasar='$codeasar'");
	echo "ثبت شد.";
	mysqli_close($connection);
    session_abort();
?>