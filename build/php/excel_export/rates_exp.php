<?php
if (isset($_POST['exp_asar_rates_excel']) and !empty($_POST['jashnvareh'])){
    include_once __DIR__.'/../../../config/connection.php';
    $objPHPExcel = new PHPExcel();
    $jashnvareh=$_POST['jashnvareh'];
    $objPHPExcel->getActiveSheet()->setRightToLeft(true);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'اطلاعات کلی آثار جشنواره '.substr($jashnvareh,3));
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'ردیف');
    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'کد اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'نام اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'قالب/سطح');
    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'گروه علمی');
	$objPHPExcel->getActiveSheet()->SetCellValue('F2', 'جنسیت شرکت کننده');
	$objPHPExcel->getActiveSheet()->SetCellValue('G2', 'استان');
    $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'وضعیت ارزیابی');
    $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'امتیاز استانی');
    $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'امتیاز تفصیلی دوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'ارزیاب تفصیلی دوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('L2', 'تاریخ ارزیابی تفصیلی دوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('M2', 'امتیاز تفصیلی سوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('N2', 'ارزیاب تفصیلی سوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('O2', 'تاریخ ارزیابی تفصیلی سوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('P2', 'امتیاز نهایی');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q2', 'برگزیده کشوری');

    $objPHPExcel->getActiveSheet()->mergeCells('A1:Q1');
    $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle("A2:Q2")->getFont()->setBold(true);
    $radif=1;
    $rowCount=3;
    $result = $connection->query("select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.emtiaznahaei is not null order by etelaat_a.emtiaznahaei desc") or die(mysqli_connect_errno());
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        $t2name=$row['codearzyabtafsili2'];
        $query=mysqli_query($connection,"select * from rater_list where username='$t2name'");
        foreach ($query as $t2fetch){}
        $t3name=$row['codearzyabtafsili3'];
        $query=mysqli_query($connection,"select * from rater_list where username='$t3name'");
        foreach ($query as $t3fetch){}
        $query=mysqli_query($connection,"select * from tafsili2 where codeasar='$codeasar'");
        foreach ($query as $t2fetchgrade){}
        $query=mysqli_query($connection,"select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $t3fetchgrade){}
		if ($t3name==null){
			$t3fetchgrade=null;
			$t3fetch=null;
			$row['tarikharzyabitafsili3']=null;
		}
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['groupelmi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['gender'], 'UTF-8');
	    $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['ostantahsili'], 'UTF-8');
	    $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['nobat_arzyabi'].' ('.$row['vaziatkarname'].')', 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['jamemtiazostan'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $t2fetchgrade['jam'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $t2fetch['name'].' '.$t2fetch['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $row['tarikharzyabitafsili2'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $t3fetchgrade['jam'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $t3fetch['name'].' '.$t3fetch['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $row['tarikharzyabitafsili3'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $row['emtiaznahaei'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $row['bargozidehkeshvari'], 'UTF-8');
		if ($row['bargozidehkeshvari']=='می باشد'){
			$objPHPExcel->getActiveSheet()
				->getStyle('Q' . $rowCount)
				->getFill()
				->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				->getStartColor()
				->setRGB('00FFAB');
		}elseif($row['bargozidehkeshvari']=='نمی باشد'){
				$objPHPExcel->getActiveSheet()
				->getStyle('Q' . $rowCount)
				->getFill()
				->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
				->getStartColor()
				->setRGB('F32424');
		}
        $rowCount++;
        $radif++;
    }
    $result = $connection->query("select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.emtiaznahaei is null order by etelaat_a.nobat_arzyabi desc") or die(mysqli_connect_errno());
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        if ($row['codearzyabtafsili2']!=null and $row['codearzyabtafsili2']!=''){
            $t2name=$row['codearzyabtafsili2'];
            $query=mysqli_query($connection,"select * from rater_list where username='$t2name'");
            foreach ($query as $t2fetch){}
        }else{
            $t2fetch=null;
        }
        if ($row['codearzyabtafsili3']!=null and $row['codearzyabtafsili3']!='') {
            $t3name=$row['codearzyabtafsili3'];
            $query=mysqli_query($connection,"select * from rater_list where username='$t3name'");
            foreach ($query as $t3fetch){}
        }else{
            $t3fetch=null;
        }
        $query=mysqli_query($connection,"select * from tafsili2 where codeasar='$codeasar'");
        foreach ($query as $t2fetchgrade){}
        $query=mysqli_query($connection,"select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $t3fetchgrade){}
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['groupelmi'], 'UTF-8');
	    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['ostantahsili'], 'UTF-8');
	    $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['ostantahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['nobat_arzyabi'].' ('.$row['vaziatkarname'].')', 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['jamemtiazostan'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $t2fetchgrade['jam'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $t2fetch['name'].' '.$t2fetch['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $row['tarikharzyabitafsili2'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $t3fetchgrade['jam'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $t3fetch['name'].' '.$t3fetch['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $row['tarikharzyabitafsili3'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $row['emtiaznahaei'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $row['bargozidehkeshvari'], 'UTF-8');
        $rowCount++;
        $radif++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $jashnvareh=substr($jashnvareh,3);
    $exportname='خروجی گزارش وضعیت ارزیابی آثار دوره '.$jashnvareh;
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header("Content-Disposition: attachment;filename=$exportname.xls"); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}