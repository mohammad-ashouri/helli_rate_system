<?php
	if (isset($_POST['exp_all_admins']) and $_SESSION['head']==1 and $_SESSION['full_access']==1){
		include_once __DIR__.'/../../../config/connection.php';
//    $style = array(
//        'alignment' => array(
//            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//        )
//    );
//    $objPHPExcel->getStyle("A1:AL1")->applyFromArray($style);
		$objPHPExcel = new PHPExcel();
		$jashnvareh=$_POST['jashnvareh'];
		$objPHPExcel->getActiveSheet()->setRightToLeft(true);
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ردیف');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'استان');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'شهرستان');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'مدرسه');
		
		
		$objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold(true);
		
		$result = $connection->query("SELECT distinct (madrese),shahrtahsili,ostantahsili from etelaat_p where jashnvareh='$jashnvareh' order by ostantahsili asc,shahrtahsili asc,madrese asc") or die(mysqli_connect_errno());
		
		$radif=1;
		$rowCount=2;
		foreach ($result as $row) {
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['ostantahsili'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['shahrtahsili'], 'UTF-8');
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['madrese'], 'UTF-8');
			$rowCount++;
			$radif++;
		}
		
		$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
		$jashnvareh=substr($jashnvareh,3);
		$exportname='مدارس ثبت شده در جشنواره '.$jashnvareh.'.xls';
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header("Content-Disposition: attachment;filename=$exportname"); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}