<?php
if (isset($_POST['exp_advaar_selected'])){
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
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'اطلاعات برگزیدگان جشنواره '.substr($jashnvareh,3));
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'ردیف');
    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'جنسیت');
    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'نام');
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'نام خانوادگی');
    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'کد اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'نام اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'گروه علمی');
    $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'قالب');
    $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'سطح');
    $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'نمره استان');
    $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'ارزیاب تفصیلی 2');
    $objPHPExcel->getActiveSheet()->SetCellValue('L2', 'نمره تفصیلی 2');
    $objPHPExcel->getActiveSheet()->SetCellValue('M2', 'ارزیاب تفصیلی 3');
    $objPHPExcel->getActiveSheet()->SetCellValue('N2', 'نمره تفصیلی 3');
    $objPHPExcel->getActiveSheet()->SetCellValue('O2', 'نمره نهایی');
    $objPHPExcel->getActiveSheet()->SetCellValue('P2', 'رتبه برگزیدگی');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q2', 'استان');
    $objPHPExcel->getActiveSheet()->SetCellValue('R2', 'شهر');
    $objPHPExcel->getActiveSheet()->SetCellValue('S2', 'مدرسه');
    $objPHPExcel->getActiveSheet()->SetCellValue('T2', 'کد طلبگی');
    $objPHPExcel->getActiveSheet()->SetCellValue('U2', 'کد ملی');
    $objPHPExcel->getActiveSheet()->SetCellValue('V2', 'موبایل');
    $objPHPExcel->getActiveSheet()->SetCellValue('W2', 'تلفن');
    $objPHPExcel->getActiveSheet()->SetCellValue('X2', 'جایزه پرداختی');
    $objPHPExcel->getActiveSheet()->mergeCells('A1:X1');


    $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle("A2:X2")->getFont()->setBold(true);

    $result = $connection->query("SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.bargozidehkeshvari='می باشد'") or die(mysqli_connect_errno());

    $radif=1;
    $rowCount=3;
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
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['gender'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['fname'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['groupelmi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['ghalebpazhouhesh'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $row['jamemtiazostan'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $t2fetch['name'].' '.$t2fetch['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $t2fetchgrade['jam'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, @$t3fetch['name'].' '.@$t3fetch['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, @$t3fetchgrade['jam'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $row['emtiaznahaei'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $row['rotbe_bargozidegi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $row['ostantahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $row['shahrtahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $row['madrese'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $row['shparvandetahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $row['codemelli'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $row['mobile'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $row['telephone'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $row['jayeze_pardakhti'], 'UTF-8');
        $rowCount++;
        $radif++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
    $jashnvareh=substr($jashnvareh,3);
    $exportname='خروجی برگزیدگان دوره '.$jashnvareh.'.xls';
    header('Content-Type: application/vnd.ms-excel'); //mime type
    header("Content-Disposition: attachment;filename=$exportname"); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}