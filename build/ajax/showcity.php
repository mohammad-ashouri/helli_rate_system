<?php include_once __DIR__.'/../../config/connection.php'; ?>
<?php
	session_start();
	$state=$_GET['statename'];
	$codeasar=$_GET['codeasar'];
	$state= mysqli_query($connection,"select * from state where name='$state' order by name asc");
	foreach ($state as $stateinfo){}
	$stateid=$stateinfo['id'];
	$city=mysqli_query($connection,"select distinct name from city where state_id='$stateid' order by name asc");
	$asar=mysqli_query($connection,"select * from etelaat_a inner join etelaat_p ep on etelaat_a.codeasar = ep.codeasar where ep.codeasar='$codeasar'");
	foreach ($asar as $asaritems){}
	$codeasar=$asaritems['codeasar'];
	echo "<option>"."</option>";
	foreach ($city as $cityinfo){
		if ($cityinfo['name']==$asaritems['shahrtahsili']) {
			$select = 'selected';
		}
		echo "<option $select>".$cityinfo['name']."</option>";
		$select=null;
	}
	
	mysqli_close($connection);
	session_abort();
?>