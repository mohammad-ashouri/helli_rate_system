<?php
	if (isset($_POST['exp_payment_export']) and !empty($_POST['jashnvareh'])){
		include_once __DIR__.'/../../../config/connection.php';
		$jashnvareh=$_POST['jashnvareh'];
		$total_amount=0;
		$payer=$_POST['payer'];
		$m1=(int)$_POST['m1'];
		$m2=(int)$_POST['m2'];
		$m3=(int)$_POST['m3'];
		$m4=(int)$_POST['m4'];
		$k1=(int)$_POST['k1'];
		$k2=(int)$_POST['k2'];
		$k3=(int)$_POST['k3'];
		$k4=(int)$_POST['k4'];
		$t2=(int)$_POST['t2'];
		$p3=(int)$_POST['p3'];
		$kt=(int)$_POST['kt'];
		$ktashih=(int)$_POST['ktashih'];
		$select=mysqli_query($connection,"select * from raters_payment_cost where jashnvareh='$jashnvareh'");
		foreach ($select as $value){}
		if ($value['jashnvareh']!=NULL){
			mysqli_query($connection,"update raters_payment_cost set m1='$m1',m2='$m2',m3='$m3',m4='$m4',k1='$k1',k2='$k2',k3='$k3',k4='$k4',kt='$kt',ktashih='$ktashih',t2='$t2',p3='$p3' where jashnvareh='$jashnvareh'");
		}elseif ($value['jashnvareh']==NULL){
			mysqli_query($connection,"insert into raters_payment_cost(jashnvareh,m1,m2,m3,m4,k1,k2,k3,k4,ktashih,kt,t2,p3) values ('$jashnvareh','$m1','$m2','$m3','$m4','$k1','$k2','$k3','$k4','$ktashih','$kt','$t2','$p3') ");
		}
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->setRightToLeft(true);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'مشخصات ارزیاب ');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'مدرک');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'نام اثر');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'قالب/سطح');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'تعداد صفحه');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'مبلغ ارزیابی (ریال)');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'جمع حق الزحمه(ریال)');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'شماره حساب');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'بانک');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'نوبت ارزیابی');
		
		$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->freezePane('A2');
		
		$resultt2 = $connection->query("select * from etelaat_a inner join rater_list on etelaat_a.codearzyabtafsili2=rater_list.code where etelaat_a.codearzyabtafsili2 is not null and etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.rater_payment_mode_tafsili2='پرداخت نشده' order by rater_list.code asc") or die(mysqli_connect_errno());
		$resultt3 = $connection->query("select * from etelaat_a inner join rater_list on etelaat_a.codearzyabtafsili3=rater_list.code where etelaat_a.codearzyabtafsili3 is not null and etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.rater_payment_mode_tafsili3='پرداخت نشده' order by rater_list.code asc") or die(mysqli_connect_errno());
		$rowCount=2;
		foreach ($resultt2 as $row) {
			$code=$row['codeasar'];
			mysqli_query($connection,"update etelaat_a set rater_payment_mode_tafsili2='پرداخت شده', pay_to_rater_date_tafsili2='$date',payer_to_rater_tafsili2='$payer' where codeasar='$code'");
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['name']." ".$row['family'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['sath_elmi'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
			if ($row['ghalebpazhouhesh']=='مقاله'){
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['tedadsafhe'], 'UTF-8');
			}else{
				$tedadsafhe_n=1;
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $tedadsafhe_n);
			}
			if ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==1){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m1, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==2){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m2, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==3){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m3, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==4){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m4, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==1){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k1, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==2){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k2, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==3){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k3, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==4){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k4, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='تحقیق پایانی' and $row['satharzyabi']==2){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$t2, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='پایان‌نامه' and $row['satharzyabi']==3){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$p3, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='ترجمه'){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$kt, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='تصحیح و تعلیق'){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$ktashih, 'UTF-8');
			}
			if ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==1){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m1;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m1;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==2){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m2;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m2;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==3){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m3;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m3;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==4){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m4;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount );
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m4;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}
			elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==1){
				$amount=$k1;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==2){
				$amount=$k2;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==3){
				$amount=$k3;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==4){
				$amount=$k4;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='تحقیق پایانی' and $row['satharzyabi']==2){
				$amount=$t2;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='پایان‌نامه' and $row['satharzyabi']==3){
				$amount=$p3;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='ترجمه'){
				$amount=$kt;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='تصحیح و تعلیق'){
				$amount=$ktashih;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili2='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['account_number'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['bank'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'تفصیلی دوم', 'UTF-8');
			
			$total_amount=$amount+$total_amount;
			$rowCount++;
		}
		foreach ($resultt3 as $row) {
			$code=$row['codeasar'];
			mysqli_query($connection,"update etelaat_a set rater_payment_mode_tafsili3='پرداخت شده', pay_to_rater_date_tafsili3='$date',payer_to_rater_tafsili3='$payer' where codeasar='$code'");
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['name']." ".$row['family'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['sath_elmi'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
			if ($row['ghalebpazhouhesh']=='مقاله'){
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['tedadsafhe'], 'UTF-8');
			}else{
				$tedadsafhe_n=1;
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $tedadsafhe_n);
			}
			if ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==1){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m1, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==2){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m2, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==3){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m3, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==4){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$m4, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==1){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k1, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==2){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k2, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==3){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k3, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==4){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$k4, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='تحقیق پایانی' and $row['satharzyabi']==2){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$t2, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='پایان‌نامه' and $row['satharzyabi']==3){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$p3, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='ترجمه'){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$kt, 'UTF-8');
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='تصحیح و تعلیق'){
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,$ktashih, 'UTF-8');
			}
			if ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==1){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m1;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m1;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==2){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m2;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m2;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==3){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m3;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m3;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==4){
				$tedadsafhe=(int)$row['tedadsafhe'];
				if ($tedadsafhe<=50 and $tedadsafhe>=10){
					$amount=$tedadsafhe*$m4;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount );
				}elseif ($tedadsafhe>50){
					$tedadsafhe=50;
					$amount=$tedadsafhe*$m4;
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $amount);
				}else{
					mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3=0 where codeasar='$code'");
					$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0);
				}
			}
			elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==1){
				$amount=$k1;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==2){
				$amount=$k2;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==3){
				$amount=$k3;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==4){
				$amount=$k4;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='تحقیق پایانی' and $row['satharzyabi']==2){
				$amount=$t2;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='پایان‌نامه' and $row['satharzyabi']==3){
				$amount=$p3;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='ترجمه'){
				$amount=$kt;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='تصحیح و تعلیق'){
				$amount=$ktashih;
				mysqli_query($connection,"update etelaat_a set how_much_payed_to_rater_tafsili3='$amount' where codeasar='$code'");
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$amount);
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['account_number'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['bank'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'تفصیلی سوم', 'UTF-8');
			
			$total_amount=$amount+$total_amount;
			$rowCount++;
		}
		
		//total cells down of sheet
		$rowCount++;
		$query=mysqli_query($connection,"select * from raters_payment_cost where jashnvareh='$jashnvareh'");
		foreach ($query as $selectlasttotal){}
		$lasttotal=$selectlasttotal['total_cost'];
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'جمع کل واریزی های این خروجی', 'UTF-8');
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $total_amount, 'UTF-8');
		$rowCount++;
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'جمع کل واریزی های قبلی این دوره', 'UTF-8');
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $lasttotal, 'UTF-8');
		$rowCount++;
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'جمع کل واریزی های این دوره', 'UTF-8');
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $lasttotal+$total_amount, 'UTF-8');
		
		//update last total cost in raters_payment_cost
		$query=mysqli_query($connection,"select * from raters_payment_cost where jashnvareh='$jashnvareh'");
		foreach ($query as $selectlasttotal){}
		$lasttotal=$selectlasttotal['total_cost']+$total_amount;
		mysqli_query($connection,"update raters_payment_cost set last_pay_date='$date',total_cost='$lasttotal' where jashnvareh='$jashnvareh'");
		//export file codes
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$date=$year.'.'.$month.'.'.$day;
		$jashnvareh=substr($jashnvareh,3);
		$exportname='خروجی پرداختی به ارزیابان تا تاریخ '.$date.' جشنواره '.$jashnvareh;
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header("Content-Disposition: attachment;filename=$exportname.xls"); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	
	elseif (isset($_POST['paymentall'])){
		include_once __DIR__.'/../../../config/connection.php';
		$jashnvareh=$_POST['jashnvareh'];
		
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->setRightToLeft(true);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'مشخصات ارزیاب ');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'مدرک');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'کد اثر');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'نام اثر');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'قالب/سطح');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'تعداد صفحه');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'جمع حق الزحمه(ریال)');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'تاریخ پرداخت');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'کاربر پرداخت کننده');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'شماره حساب');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'بانک');
		$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'نوبت ارزیابی');


		$objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->freezePane('A2');
		
		$resultt2 = $connection->query("select * from etelaat_a where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.rater_payment_mode_tafsili2='پرداخت شده' order by codearzyabtafsili2 asc") or die(mysqli_connect_errno());
		$resultt3 = $connection->query("select * from etelaat_a where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.rater_payment_mode_tafsili3='پرداخت شده' order by codearzyabtafsili2 asc") or die(mysqli_connect_errno());
		$rowCount=2;
		foreach ($resultt2 as $row) {
			$ratercode=$row['codearzyabtafsili2'];
			$query=mysqli_query($connection,"select * from rater_list where username='$ratercode'");
			foreach ($query as $raterinfo){}
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $raterinfo['name']." ".$raterinfo['family'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $raterinfo['sath_elmi'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['codeasar'], 'UTF-8');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['nameasar'], 'UTF-8');
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['tedadsafhe'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['how_much_payed_to_rater_tafsili2'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['pay_to_rater_date_tafsili2'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['payer_to_rater_tafsili2'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $raterinfo['account_number'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $raterinfo['bank'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, 'تفصیلی دوم', 'UTF-8');
			$rowCount++;
		}
		foreach ($resultt3 as $row) {
			$ratercode=$row['codearzyabtafsili3'];
			$query=mysqli_query($connection,"select * from rater_list where username='$ratercode'");
			foreach ($query as $raterinfo){}
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $raterinfo['name']." ".$raterinfo['family'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $raterinfo['sath_elmi'], 'UTF-8');
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['codeasar'], 'UTF-8');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['nameasar'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['tedadsafhe'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['how_much_payed_to_rater_tafsili3'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['pay_to_rater_date_tafsili3'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['payer_to_rater_tafsili3'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $raterinfo['account_number'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $raterinfo['bank'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, 'تفصیلی سوم', 'UTF-8');
			$rowCount++;
		}
		
		//total cells down of sheet
		$rowCount++;
		$query=mysqli_query($connection,"select * from raters_payment_cost where jashnvareh='$jashnvareh'");
		foreach ($query as $selectlasttotal){}
		$rowCount++;
		$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'جمع کل واریزی های این دوره', 'UTF-8');
		$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $selectlasttotal['total_cost'], 'UTF-8');
		
		//export file codes
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$date=$year.'.'.$month.'.'.$day;
		$jashnvareh=substr($jashnvareh,3);
		$exportname='خروجی کل پرداختی به ارزیابان دوره '.$jashnvareh;
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header("Content-Disposition: attachment;filename=$exportname.xls"); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	else{
		echo "hi";
	}