<?php
	if (isset($_POST['exp_avg_items'])){
		include_once __DIR__.'/../../../config/connection.php';
		
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and satharzyabi=1") or die(mysqli_connect_errno());
		$m1num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and satharzyabi=2") or die(mysqli_connect_errno());
		$m2num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and satharzyabi=3") or die(mysqli_connect_errno());
		$m3num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and satharzyabi=4") or die(mysqli_connect_errno());
		$m4num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and satharzyabi=1") or die(mysqli_connect_errno());
		$k1num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and satharzyabi=2") or die(mysqli_connect_errno());
		$k2num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and satharzyabi=3") or die(mysqli_connect_errno());
		$k3num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and satharzyabi=4") or die(mysqli_connect_errno());
		$k4num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and satharzyabi=2") or die(mysqli_connect_errno());
		$t2num=mysqli_num_rows($result);
		$result = $connection->query("select * from etelaat_a where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='پایان‌نامه' and satharzyabi=3") or die(mysqli_connect_errno());
		$p3num=mysqli_num_rows($result);
		
		
		$resultt2m1 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=1") or die(mysqli_connect_errno());
		foreach ($resultt2m1 as $t2m1){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=1");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2m1=(($t2m1['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2m1;
			$keyfiattabiint2m1=(($t2m1['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2m1;
			$ahammiatmasalet2m1=(($t2m1['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2m1;
			$noavaridartanzimt2m1=(($t2m1['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2m1;
			$raveshmandiasart2m1=(($t2m1['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2m1;
			$dastyabibeahdaft2m1=(($t2m1['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2m1;
			$naghdvanoavarielmit2m1=(($t2m1['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2m1;
		}
		
		$resultt2m2 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=2") or die(mysqli_connect_errno());
		foreach ($resultt2m2 as $t2m2){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=2");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2m2=(($t2m2['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2m2;
			$keyfiattabiint2m2=(($t2m2['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2m2;
			$ahammiatmasalet2m2=(($t2m2['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2m2;
			$noavaridartanzimt2m2=(($t2m2['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2m2;
			$raveshmandiasart2m2=(($t2m2['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2m2;
			$dastyabibeahdaft2m2=(($t2m2['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2m2;
			$naghdvanoavarielmit2m2=(($t2m2['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2m2;
		}
		
		$resultt2m3 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=3") or die(mysqli_connect_errno());
		foreach ($resultt2m3 as $t2m3){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=3");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2m3=(($t2m3['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2m3;
			$keyfiattabiint2m3=(($t2m3['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2m3;
			$ahammiatmasalet2m3=(($t2m3['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2m3;
			$noavaridartanzimt2m3=(($t2m3['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2m3;
			$raveshmandiasart2m3=(($t2m3['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2m3;
			$dastyabibeahdaft2m3=(($t2m3['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2m3;
			$naghdvanoavarielmit2m3=(($t2m3['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2m3;
		}
		
		$resultt2m4 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=4") or die(mysqli_connect_errno());
		foreach ($resultt2m4 as $t2m4){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=4");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2m4=(($t2m4['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2m4;
			$keyfiattabiint2m4=(($t2m4['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2m4;
			$ahammiatmasalet2m4=(($t2m4['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2m4;
			$noavaridartanzimt2m4=(($t2m4['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2m4;
			$raveshmandiasart2m4=(($t2m4['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2m4;
			$dastyabibeahdaft2m4=(($t2m4['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2m4;
			$naghdvanoavarielmit2m4=(($t2m4['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2m4;
		}
		
		$resultt2k1 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=1") or die(mysqli_connect_errno());
		foreach ($resultt2k1 as $t2k1){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=1");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2k1=(($t2k1['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2k1;
			$keyfiattabiint2k1=(($t2k1['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2k1;
			$ahammiatmasalet2k1=(($t2k1['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2k1;
			$noavaridartanzimt2k1=(($t2k1['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2k1;
			$raveshmandiasart2k1=(($t2k1['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2k1;
			$dastyabibeahdaft2k1=(($t2k1['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2k1;
			$naghdvanoavarielmit2k1=(($t2k1['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2k1;
		}
		
		$resultt2k2 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=2") or die(mysqli_connect_errno());
		foreach ($resultt2k2 as $t2k2){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=2");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2k2=(($t2k2['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2k2;
			$keyfiattabiint2k2=(($t2k2['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2k2;
			$ahammiatmasalet2k2=(($t2k2['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2k2;
			$noavaridartanzimt2k2=(($t2k2['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2k2;
			$raveshmandiasart2k2=(($t2k2['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2k2;
			$dastyabibeahdaft2k2=(($t2k2['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2k2;
			$naghdvanoavarielmit2k2=(($t2k2['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2k2;
		}
		
		$resultt2k3 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=3") or die(mysqli_connect_errno());
		foreach ($resultt2k3 as $t2k3){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=3");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2k3=(($t2k3['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2k3;
			$keyfiattabiint2k3=(($t2k3['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2k3;
			$ahammiatmasalet2k3=(($t2k3['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2k3;
			$noavaridartanzimt2k3=(($t2k3['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2k3;
			$raveshmandiasart2k3=(($t2k3['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2k3;
			$dastyabibeahdaft2k3=(($t2k3['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2k3;
			$naghdvanoavarielmit2k3=(($t2k3['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2k3;
		}
		
		$resultt2k4 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=4") or die(mysqli_connect_errno());
		foreach ($resultt2k4 as $t2k4){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=4");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2k4=(($t2k4['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2k4;
			$keyfiattabiint2k4=(($t2k4['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2k4;
			$ahammiatmasalet2k4=(($t2k4['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2k4;
			$noavaridartanzimt2k4=(($t2k4['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2k4;
			$raveshmandiasart2k4=(($t2k4['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2k4;
			$dastyabibeahdaft2k4=(($t2k4['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2k4;
			$naghdvanoavarielmit2k4=(($t2k4['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2k4;
		}
		
		$resultt2t2 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi=2") or die(mysqli_connect_errno());
		foreach ($resultt2t2 as $t2t2){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='تحقیق پایانی' and sath_elmi=2");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2t2=(($t2t2['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2t2;
			$keyfiattabiint2t2=(($t2t2['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2t2;
			$ahammiatmasalet2t2=(($t2t2['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2t2;
			$noavaridartanzimt2t2=(($t2t2['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2t2;
			$raveshmandiasart2t2=(($t2t2['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2t2;
			$dastyabibeahdaft2t2=(($t2t2['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2t2;
			$naghdvanoavarielmit2t2=(($t2t2['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2t2;
		}
		
		$resultt2p3 = $connection->query("select * from etelaat_a inner join tafsili2 on etelaat_a.codeasar=tafsili2.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili2 is not null and etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi=3") or die(mysqli_connect_errno());
		foreach ($resultt2p3 as $t2p3){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='پایان‌نامه' and sath_elmi=3");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart2p3=(($t2p3['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart2p3;
			$keyfiattabiint2p3=(($t2p3['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint2p3;
			$ahammiatmasalet2p3=(($t2p3['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet2p3;
			$noavaridartanzimt2p3=(($t2p3['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt2p3;
			$raveshmandiasart2p3=(($t2p3['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart2p3;
			$dastyabibeahdaft2p3=(($t2p3['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft2p3;
			$naghdvanoavarielmit2p3=(($t2p3['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit2p3;
		}
		
		$resultt3m1 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=1") or die(mysqli_connect_errno());
		foreach ($resultt3m1 as $t3m1){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=1");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3m1=(($t3m1['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3m1;
			$keyfiattabiint3m1=(($t3m1['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3m1;
			$ahammiatmasalet3m1=(($t3m1['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3m1;
			$noavaridartanzimt3m1=(($t3m1['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3m1;
			$raveshmandiasart3m1=(($t3m1['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3m1;
			$dastyabibeahdaft3m1=(($t3m1['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3m1;
			$naghdvanoavarielmit3m1=(($t3m1['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3m1;
		}
		
		$resultt3m2 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=2") or die(mysqli_connect_errno());
		foreach ($resultt3m2 as $t3m2){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=2");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3m2=(($t3m2['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3m2;
			$keyfiattabiint3m2=(($t3m2['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3m2;
			$ahammiatmasalet3m2=(($t3m2['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3m2;
			$noavaridartanzimt3m2=(($t3m2['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3m2;
			$raveshmandiasart3m2=(($t3m2['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3m2;
			$dastyabibeahdaft3m2=(($t3m2['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3m2;
			$naghdvanoavarielmit3m2=(($t3m2['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3m2;
		}
		
		$resultt3m3 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=3") or die(mysqli_connect_errno());
		foreach ($resultt3m3 as $t3m3){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=3");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3m3=(($t3m3['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3m3;
			$keyfiattabiint3m3=(($t3m3['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3m3;
			$ahammiatmasalet3m3=(($t3m3['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3m3;
			$noavaridartanzimt3m3=(($t3m3['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3m3;
			$raveshmandiasart3m3=(($t3m3['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3m3;
			$dastyabibeahdaft3m3=(($t3m3['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3m3;
			$naghdvanoavarielmit3m3=(($t3m3['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3m3;
		}
		
		$resultt3m4 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=4") or die(mysqli_connect_errno());
		foreach ($resultt3m4 as $t3m4){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='مقاله' and sath_elmi=4");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3m4=(($t3m4['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3m4;
			$keyfiattabiint3m4=(($t3m4['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3m4;
			$ahammiatmasalet3m4=(($t3m4['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3m4;
			$noavaridartanzimt3m4=(($t3m4['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3m4;
			$raveshmandiasart3m4=(($t3m4['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3m4;
			$dastyabibeahdaft3m4=(($t3m4['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3m4;
			$naghdvanoavarielmit3m4=(($t3m4['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3m4;
		}
		
		$resultt3k1 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=1") or die(mysqli_connect_errno());
		foreach ($resultt3k1 as $t3k1){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=1");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3k1=(($t3k1['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3k1;
			$keyfiattabiint3k1=(($t3k1['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3k1;
			$ahammiatmasalet3k1=(($t3k1['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3k1;
			$noavaridartanzimt3k1=(($t3k1['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3k1;
			$raveshmandiasart3k1=(($t3k1['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3k1;
			$dastyabibeahdaft3k1=(($t3k1['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3k1;
			$naghdvanoavarielmit3k1=(($t3k1['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3k1;
		}
		
		$resultt3k2 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=2") or die(mysqli_connect_errno());
		foreach ($resultt3k2 as $t3k2){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=2");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3k2=(($t3k2['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3k2;
			$keyfiattabiint3k2=(($t3k2['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3k2;
			$ahammiatmasalet3k2=(($t3k2['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3k2;
			$noavaridartanzimt3k2=(($t3k2['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3k2;
			$raveshmandiasart3k2=(($t3k2['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3k2;
			$dastyabibeahdaft3k2=(($t3k2['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3k2;
			$naghdvanoavarielmit3k2=(($t3k2['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3k2;
		}
		
		$resultt3k3 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=3") or die(mysqli_connect_errno());
		foreach ($resultt3k3 as $t3k3){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=3");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3k3=(($t3k3['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3k3;
			$keyfiattabiint3k3=(($t3k3['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3k3;
			$ahammiatmasalet3k3=(($t3k3['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3k3;
			$noavaridartanzimt3k3=(($t3k3['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3k3;
			$raveshmandiasart3k3=(($t3k3['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3k3;
			$dastyabibeahdaft3k3=(($t3k3['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3k3;
			$naghdvanoavarielmit3k3=(($t3k3['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3k3;
		}
		
		$resultt3k4 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='کتاب' and etelaat_a.satharzyabi=4") or die(mysqli_connect_errno());
		foreach ($resultt3k4 as $t3k4){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='کتاب' and sath_elmi=4");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3k4=(($t3k4['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3k4;
			$keyfiattabiint3k4=(($t3k4['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3k4;
			$ahammiatmasalet3k4=(($t3k4['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3k4;
			$noavaridartanzimt3k4=(($t3k4['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3k4;
			$raveshmandiasart3k4=(($t3k4['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3k4;
			$dastyabibeahdaft3k4=(($t3k4['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3k4;
			$naghdvanoavarielmit3k4=(($t3k4['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3k4;
		}
		
		$resultt3t2 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi=2") or die(mysqli_connect_errno());
		foreach ($resultt3t2 as $t3t2){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='تحقیق پایانی' and sath_elmi=2");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3t2=(($t3t2['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3t2;
			$keyfiattabiint3t2=(($t3t2['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3t2;
			$ahammiatmasalet3t2=(($t3t2['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3t2;
			$noavaridartanzimt3t2=(($t3t2['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3t2;
			$raveshmandiasart3t2=(($t3t2['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3t2;
			$dastyabibeahdaft3t2=(($t3t2['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3t2;
			$naghdvanoavarielmit3t2=(($t3t2['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3t2;
		}
		
		$resultt3p3 = $connection->query("select * from etelaat_a inner join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.tarikharzyabitafsili3 is not null and etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi=3") or die(mysqli_connect_errno());
		foreach ($resultt3p3 as $t3p3){
			$query=mysqli_query($connection,"select * from form_criteria where ghalebpazhouhesh='پایان‌نامه' and sath_elmi=3");
			foreach ($query as $criteria){}
			$cri=explode('-',$criteria['criteria']);
			$sakhtarasart3p3=(($t3p3['reayatsakhtarasar']*100)/$cri[0])+$sakhtarasart3p3;
			$keyfiattabiint3p3=(($t3p3['keyfiattabiinmataleb']*100)/$cri[7])+$keyfiattabiint3p3;
			$ahammiatmasalet3p3=(($t3p3['ahammiatmasale']*100)/$cri[8])+$ahammiatmasalet3p3;
			$noavaridartanzimt3p3=(($t3p3['noavaridartanzim']*100)/$cri[9])+$noavaridartanzimt3p3;
			$raveshmandiasart3p3=(($t3p3['raveshmandiasar']*100)/$cri[10])+$raveshmandiasart3p3;
			$dastyabibeahdaft3p3=(($t3p3['dastyabibeahdaf']*100)/$cri[12])+$dastyabibeahdaft3p3;
			$naghdvanoavarielmit3p3=(($t3p3['naghdvanoavarielmi']*100)/$cri[13])+$naghdvanoavarielmit3p3;
		}
		
		$m1tnum=mysqli_num_rows($resultt2m1)+mysqli_num_rows($resultt3m1);
		$m2tnum=mysqli_num_rows($resultt2m2)+mysqli_num_rows($resultt3m2);
		$m3tnum=mysqli_num_rows($resultt2m3)+mysqli_num_rows($resultt3m3);
		$m4tnum=mysqli_num_rows($resultt2m4)+mysqli_num_rows($resultt3m4);
		$k1tnum=mysqli_num_rows($resultt2k1)+mysqli_num_rows($resultt3k1);
		$k2tnum=mysqli_num_rows($resultt2k2)+mysqli_num_rows($resultt3k2);
		$k3tnum=mysqli_num_rows($resultt2k3)+mysqli_num_rows($resultt3k3);
		$k4tnum=mysqli_num_rows($resultt2k4)+mysqli_num_rows($resultt3k4);
		$t2tnum=mysqli_num_rows($resultt2t2)+mysqli_num_rows($resultt3t2);
		$p3tnum=mysqli_num_rows($resultt2p3)+mysqli_num_rows($resultt3p3);
		
		$objPHPExcel = new PHPExcel();
		$jashnvareh=$_POST['jashnvareh'];
		$objPHPExcel->getActiveSheet()->setRightToLeft(true);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', '');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', 'مقاله سطح 1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A3', 'مقاله سطح 2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A4', 'مقاله سطح 3');
		$objPHPExcel->getActiveSheet()->SetCellValue('A5', 'مقاله سطح 4');
		$objPHPExcel->getActiveSheet()->SetCellValue('A6', 'کتاب سطح 1');
		$objPHPExcel->getActiveSheet()->SetCellValue('A7', 'کتاب سطح 2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A8', 'کتاب سطح 3');
		$objPHPExcel->getActiveSheet()->SetCellValue('A9', 'کتاب سطح 4');
		$objPHPExcel->getActiveSheet()->SetCellValue('A10', 'تحقیق پایانی سطح 2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A11', 'پایان‌نامه سطح 3');
		
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'تعداد کل');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'رعایت ساختار اثر');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'کیفیت تببین و تحلیل مطالب و صحت استدلال');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'اهمیت مساله و ابتناء آن بر نیاز');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'نوآوری در تنظیم و ارائه مطلب');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'روشمندی اثر');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'کیفیت استنتاج و دستیابی به اهداف پژوهش');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'نقد و نوآوری علمی');
		
		$objPHPExcel->getActiveSheet()->SetCellValue('B2', $m1num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B3', $m2num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B4', $m3num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B5', $m4num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B6', $k1num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B7', $k2num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B8', $k3num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B9', $k4num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B10', $t2num);
		$objPHPExcel->getActiveSheet()->SetCellValue('B11', $p3num);
		
		$objPHPExcel->getActiveSheet()->getStyle("A2:A11")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("B1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("C1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("D1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("E1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("F1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("G1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("H1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->getStyle("I1")->getFont()->setBold(true);
		
		$objPHPExcel->getActiveSheet()
			->getStyle('A1')
			->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()
			->setRGB('000000');
		
		$sakhtarasarm1=(($sakhtarasart2m1+$sakhtarasart3m1))/$m1tnum;
		$sakhtarasarm2=(($sakhtarasart2m2+$sakhtarasart3m2))/$m2tnum;
		$sakhtarasarm3=(($sakhtarasart2m3+$sakhtarasart3m3))/$m3tnum;
		$sakhtarasarm4=(($sakhtarasart2m4+$sakhtarasart3m4))/$m4tnum;
		$sakhtarasark1=(($sakhtarasart2k1+$sakhtarasart3k1))/$k1tnum;
		$sakhtarasark2=(($sakhtarasart2k2+$sakhtarasart3k2))/$k2tnum;
		$sakhtarasark3=(($sakhtarasart2k3+$sakhtarasart3k3))/$k3tnum;
		$sakhtarasark4=(($sakhtarasart2k4+$sakhtarasart3k4))/$k4tnum;
		$sakhtarasart2=(($sakhtarasart2t2+$sakhtarasart3t2))/$t2tnum;
		$sakhtarasarp3=(($sakhtarasart2p3+$sakhtarasart3p3))/$p3tnum;
		
		$keyfiattabiinm1=(($keyfiattabiint2m1+$keyfiattabiint3m1))/$m1tnum;
		$keyfiattabiinm2=(($keyfiattabiint2m2+$keyfiattabiint3m2))/$m2tnum;
		$keyfiattabiinm3=(($keyfiattabiint2m3+$keyfiattabiint3m3))/$m3tnum;
		$keyfiattabiinm4=(($keyfiattabiint2m4+$keyfiattabiint3m4))/$m4tnum;
		$keyfiattabiink1=(($keyfiattabiint2k1+$keyfiattabiint3k1))/$k1tnum;
		$keyfiattabiink2=(($keyfiattabiint2k2+$keyfiattabiint3k2))/$k2tnum;
		$keyfiattabiink3=(($keyfiattabiint2k3+$keyfiattabiint3k3))/$k3tnum;
		$keyfiattabiink4=(($keyfiattabiint2k4+$keyfiattabiint3k4))/$k4tnum;
		$keyfiattabiint2=(($keyfiattabiint2t2+$keyfiattabiint3t2))/$t2tnum;
		$keyfiattabiinp3=(($keyfiattabiint2p3+$keyfiattabiint3p3))/$p3tnum;
		
		$ahammiatmasalem1=(($ahammiatmasalet2m1+$ahammiatmasalet3m1))/$m1tnum;
		$ahammiatmasalem2=(($ahammiatmasalet2m2+$ahammiatmasalet3m2))/$m2tnum;
		$ahammiatmasalem3=(($ahammiatmasalet2m3+$ahammiatmasalet3m3))/$m3tnum;
		$ahammiatmasalem4=(($ahammiatmasalet2m4+$ahammiatmasalet3m4))/$m4tnum;
		$ahammiatmasalek1=(($ahammiatmasalet2k1+$ahammiatmasalet3k1))/$k1tnum;
		$ahammiatmasalek2=(($ahammiatmasalet2k2+$ahammiatmasalet3k2))/$k2tnum;
		$ahammiatmasalek3=(($ahammiatmasalet2k3+$ahammiatmasalet3k3))/$k3tnum;
		$ahammiatmasalek4=(($ahammiatmasalet2k4+$ahammiatmasalet3k4))/$k4tnum;
		$ahammiatmasalet2=(($ahammiatmasalet2t2+$ahammiatmasalet3t2))/$t2tnum;
		$ahammiatmasalep3=(($ahammiatmasalet2p3+$ahammiatmasalet3p3))/$p3tnum;
		
		$noavaridartanzimm1=(($noavaridartanzimt2m1+$noavaridartanzimt3m1))/$m1tnum;
		$noavaridartanzimm2=(($noavaridartanzimt2m2+$noavaridartanzimt3m2))/$m2tnum;
		$noavaridartanzimm3=(($noavaridartanzimt2m3+$noavaridartanzimt3m3))/$m3tnum;
		$noavaridartanzimm4=(($noavaridartanzimt2m4+$noavaridartanzimt3m4))/$m4tnum;
		$noavaridartanzimk1=(($noavaridartanzimt2k1+$noavaridartanzimt3k1))/$k1tnum;
		$noavaridartanzimk2=(($noavaridartanzimt2k2+$noavaridartanzimt3k2))/$k2tnum;
		$noavaridartanzimk3=(($noavaridartanzimt2k3+$noavaridartanzimt3k3))/$k3tnum;
		$noavaridartanzimk4=(($noavaridartanzimt2k4+$noavaridartanzimt3k4))/$k4tnum;
		$noavaridartanzimt2=(($noavaridartanzimt2t2+$noavaridartanzimt3t2))/$t2tnum;
		$noavaridartanzimp3=(($noavaridartanzimt2p3+$noavaridartanzimt3p3))/$p3tnum;
		
		$raveshmandiasarm1=(($raveshmandiasart2m1+$raveshmandiasart3m1))/$m1tnum;
		$raveshmandiasarm2=(($raveshmandiasart2m2+$raveshmandiasart3m2))/$m2tnum;
		$raveshmandiasarm3=(($raveshmandiasart2m3+$raveshmandiasart3m3))/$m3tnum;
		$raveshmandiasarm4=(($raveshmandiasart2m4+$raveshmandiasart3m4))/$m4tnum;
		$raveshmandiasark1=(($raveshmandiasart2k1+$raveshmandiasart3k1))/$k1tnum;
		$raveshmandiasark2=(($raveshmandiasart2k2+$raveshmandiasart3k2))/$k2tnum;
		$raveshmandiasark3=(($raveshmandiasart2k3+$raveshmandiasart3k3))/$k3tnum;
		$raveshmandiasark4=(($raveshmandiasart2k4+$raveshmandiasart3k4))/$k4tnum;
		$raveshmandiasart2=(($raveshmandiasart2t2+$raveshmandiasart3t2))/$t2tnum;
		$raveshmandiasarp3=(($raveshmandiasart2p3+$raveshmandiasart3p3))/$p3tnum;
		
		$dastyabibeahdafm1=(($dastyabibeahdaft2m1+$dastyabibeahdaft3m1))/$m1tnum;
		$dastyabibeahdafm2=(($dastyabibeahdaft2m2+$dastyabibeahdaft3m2))/$m2tnum;
		$dastyabibeahdafm3=(($dastyabibeahdaft2m3+$dastyabibeahdaft3m3))/$m3tnum;
		$dastyabibeahdafm4=(($dastyabibeahdaft2m4+$dastyabibeahdaft3m4))/$m4tnum;
		$dastyabibeahdafk1=(($dastyabibeahdaft2k1+$dastyabibeahdaft3k1))/$k1tnum;
		$dastyabibeahdafk2=(($dastyabibeahdaft2k2+$dastyabibeahdaft3k2))/$k2tnum;
		$dastyabibeahdafk3=(($dastyabibeahdaft2k3+$dastyabibeahdaft3k3))/$k3tnum;
		$dastyabibeahdafk4=(($dastyabibeahdaft2k4+$dastyabibeahdaft3k4))/$k4tnum;
		$dastyabibeahdaft2=(($dastyabibeahdaft2t2+$dastyabibeahdaft3t2))/$t2tnum;
		$dastyabibeahdafp3=(($dastyabibeahdaft2p3+$dastyabibeahdaft3p3))/$p3tnum;
		
		$naghdvanoavarielmim1=(($naghdvanoavarielmit2m1+$naghdvanoavarielmit3m1))/$m1tnum;
		$naghdvanoavarielmim2=(($naghdvanoavarielmit2m2+$naghdvanoavarielmit3m2))/$m2tnum;
		$naghdvanoavarielmim3=(($naghdvanoavarielmit2m3+$naghdvanoavarielmit3m3))/$m3tnum;
		$naghdvanoavarielmim4=(($naghdvanoavarielmit2m4+$naghdvanoavarielmit3m4))/$m4tnum;
		$naghdvanoavarielmik1=(($naghdvanoavarielmit2k1+$naghdvanoavarielmit3k1))/$k1tnum;
		$naghdvanoavarielmik2=(($naghdvanoavarielmit2k2+$naghdvanoavarielmit3k2))/$k2tnum;
		$naghdvanoavarielmik3=(($naghdvanoavarielmit2k3+$naghdvanoavarielmit3k3))/$k3tnum;
		$naghdvanoavarielmik4=(($naghdvanoavarielmit2k4+$naghdvanoavarielmit3k4))/$k4tnum;
		$naghdvanoavarielmit2=(($naghdvanoavarielmit2t2+$naghdvanoavarielmit3t2))/$t2tnum;
		$naghdvanoavarielmip3=(($naghdvanoavarielmit2p3+$naghdvanoavarielmit3p3))/$p3tnum;
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C2', $sakhtarasarm1);
		$objPHPExcel->getActiveSheet()->SetCellValue('D2', $keyfiattabiinm1);
		$objPHPExcel->getActiveSheet()->SetCellValue('E2', $ahammiatmasalem1);
		$objPHPExcel->getActiveSheet()->SetCellValue('F2', $noavaridartanzimm1);
		$objPHPExcel->getActiveSheet()->SetCellValue('G2', $raveshmandiasarm1);
		$objPHPExcel->getActiveSheet()->SetCellValue('H2', $dastyabibeahdafm1);
		$objPHPExcel->getActiveSheet()->SetCellValue('I2', $naghdvanoavarielmim1);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C3', $sakhtarasarm2);
		$objPHPExcel->getActiveSheet()->SetCellValue('D3', $keyfiattabiinm2);
		$objPHPExcel->getActiveSheet()->SetCellValue('E3', $ahammiatmasalem2);
		$objPHPExcel->getActiveSheet()->SetCellValue('F3', $noavaridartanzimm2);
		$objPHPExcel->getActiveSheet()->SetCellValue('G3', $raveshmandiasarm2);
		$objPHPExcel->getActiveSheet()->SetCellValue('H3', $dastyabibeahdafm2);
		$objPHPExcel->getActiveSheet()->SetCellValue('I3', $naghdvanoavarielmim2);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C4', $sakhtarasarm3);
		$objPHPExcel->getActiveSheet()->SetCellValue('D4', $keyfiattabiinm3);
		$objPHPExcel->getActiveSheet()->SetCellValue('E4', $ahammiatmasalem3);
		$objPHPExcel->getActiveSheet()->SetCellValue('F4', $noavaridartanzimm3);
		$objPHPExcel->getActiveSheet()->SetCellValue('G4', $raveshmandiasarm3);
		$objPHPExcel->getActiveSheet()->SetCellValue('H4', $dastyabibeahdafm3);
		$objPHPExcel->getActiveSheet()->SetCellValue('I4', $naghdvanoavarielmim3);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C5', $sakhtarasarm4);
		$objPHPExcel->getActiveSheet()->SetCellValue('D5', $keyfiattabiinm4);
		$objPHPExcel->getActiveSheet()->SetCellValue('E5', $ahammiatmasalem4);
		$objPHPExcel->getActiveSheet()->SetCellValue('F5', $noavaridartanzimm4);
		$objPHPExcel->getActiveSheet()->SetCellValue('G5', $raveshmandiasarm4);
		$objPHPExcel->getActiveSheet()->SetCellValue('H5', $dastyabibeahdafm4);
		$objPHPExcel->getActiveSheet()->SetCellValue('I5', $naghdvanoavarielmim4);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C6', $sakhtarasark1);
		$objPHPExcel->getActiveSheet()->SetCellValue('D6', $keyfiattabiink1);
		$objPHPExcel->getActiveSheet()->SetCellValue('E6', $ahammiatmasalek1);
		$objPHPExcel->getActiveSheet()->SetCellValue('F6', $noavaridartanzimk1);
		$objPHPExcel->getActiveSheet()->SetCellValue('G6', $raveshmandiasark1);
		$objPHPExcel->getActiveSheet()->SetCellValue('H6', $dastyabibeahdafk1);
		$objPHPExcel->getActiveSheet()->SetCellValue('I6', $naghdvanoavarielmik1);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C7', $sakhtarasark2);
		$objPHPExcel->getActiveSheet()->SetCellValue('D7', $keyfiattabiink2);
		$objPHPExcel->getActiveSheet()->SetCellValue('E7', $ahammiatmasalek2);
		$objPHPExcel->getActiveSheet()->SetCellValue('F7', $noavaridartanzimk2);
		$objPHPExcel->getActiveSheet()->SetCellValue('G7', $raveshmandiasark2);
		$objPHPExcel->getActiveSheet()->SetCellValue('H7', $dastyabibeahdafk2);
		$objPHPExcel->getActiveSheet()->SetCellValue('I7', $naghdvanoavarielmik2);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C8', $sakhtarasark3);
		$objPHPExcel->getActiveSheet()->SetCellValue('D8', $keyfiattabiink3);
		$objPHPExcel->getActiveSheet()->SetCellValue('E8', $ahammiatmasalek3);
		$objPHPExcel->getActiveSheet()->SetCellValue('F8', $noavaridartanzimk3);
		$objPHPExcel->getActiveSheet()->SetCellValue('G8', $raveshmandiasark3);
		$objPHPExcel->getActiveSheet()->SetCellValue('H8', $dastyabibeahdafk3);
		$objPHPExcel->getActiveSheet()->SetCellValue('I8', $naghdvanoavarielmik3);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C9', $sakhtarasark4);
		$objPHPExcel->getActiveSheet()->SetCellValue('D9', $keyfiattabiink4);
		$objPHPExcel->getActiveSheet()->SetCellValue('E9', $ahammiatmasalek4);
		$objPHPExcel->getActiveSheet()->SetCellValue('F9', $noavaridartanzimk4);
		$objPHPExcel->getActiveSheet()->SetCellValue('G9', $raveshmandiasark4);
		$objPHPExcel->getActiveSheet()->SetCellValue('H9', $dastyabibeahdafk4);
		$objPHPExcel->getActiveSheet()->SetCellValue('I9', $naghdvanoavarielmik4);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C10', $sakhtarasart2);
		$objPHPExcel->getActiveSheet()->SetCellValue('D10', $keyfiattabiint2);
		$objPHPExcel->getActiveSheet()->SetCellValue('E10', $ahammiatmasalet2);
		$objPHPExcel->getActiveSheet()->SetCellValue('F10', $noavaridartanzimt2);
		$objPHPExcel->getActiveSheet()->SetCellValue('G10', $raveshmandiasart2);
		$objPHPExcel->getActiveSheet()->SetCellValue('H10', $dastyabibeahdaft2);
		$objPHPExcel->getActiveSheet()->SetCellValue('I10', $naghdvanoavarielmit2);
		
		$objPHPExcel->getActiveSheet()->SetCellValue('C11', $sakhtarasarp3);
		$objPHPExcel->getActiveSheet()->SetCellValue('D11', $keyfiattabiinp3);
		$objPHPExcel->getActiveSheet()->SetCellValue('E11', $ahammiatmasalep3);
		$objPHPExcel->getActiveSheet()->SetCellValue('F11', $noavaridartanzimp3);
		$objPHPExcel->getActiveSheet()->SetCellValue('G11', $raveshmandiasarp3);
		$objPHPExcel->getActiveSheet()->SetCellValue('H11', $dastyabibeahdafp3);
		$objPHPExcel->getActiveSheet()->SetCellValue('I11', $naghdvanoavarielmip3);
		
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$jashnvareh=substr($jashnvareh,3);
		$filename='میانگین آیتم های ارزیابی جشنواره '.$jashnvareh;
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header("Content-Disposition: attachment;filename=$filename.xlsx"); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}