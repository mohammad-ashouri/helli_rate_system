<?php
if (isset($_POST['exp_selected_rater']) and !empty($_POST['rater_code'])){
    include_once __DIR__.'/../../../config/connection.php';
    $objPHPExcel = new PHPExcel();
    $jashnvareh=$_POST['jashnvareh'];
    $ratercode=$_POST['rater_code'];
    $objPHPExcel->getActiveSheet()->setRightToLeft(true);
    $objPHPExcel->setActiveSheetIndex(0);
    $query=mysqli_query($connection,"select * from rater_list where code='$ratercode'");
    foreach ($query as $item){}
    $temp_a1="وضعیت ارزیابی آقای/خانم".$item['name'].' '.$item['family'].' در جشنواره'.substr($jashnvareh,3);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', $temp_a1);
    $objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'ردیف');
    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'کد اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'نام اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'قالب/سطح');
    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'گروه علمی');
    $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'نوبت ارزیابی');
    $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'مبلغ پرداختی');
    $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'تاریخ پرداخت');
    $objPHPExcel->getActiveSheet()->getStyle("B2:H2")->getFont()->setBold(true);

    $resultt1 = $connection->query("SELECT * from etelaat_a where codearzyabtafsili1='$ratercode' and jashnvareh='$jashnvareh'") or die(mysqli_connect_errno());
    $resultt2 = $connection->query("SELECT * from etelaat_a where codearzyabtafsili2='$ratercode' and jashnvareh='$jashnvareh'") or die(mysqli_connect_errno());
    $resultt3 = $connection->query("SELECT * from etelaat_a where codearzyabtafsili3='$ratercode' and jashnvareh='$jashnvareh'") or die(mysqli_connect_errno());

    $radif=1;
    $rowCount=3;
    foreach ($resultt1 as $row) {
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['groupelmi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['nobat_arzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['jayeze_pardakhti'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['pay_date'], 'UTF-8');

        $rowCount++;
        $radif++;
    }
    foreach ($resultt2 as $row) {
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['groupelmi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['nobat_arzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['jayeze_pardakhti'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['pay_date'], 'UTF-8');
        $rowCount++;
        $radif++;
    }
    foreach ($resultt3 as $row) {
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['groupelmi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['nobat_arzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['jayeze_pardakhti'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['pay_date'], 'UTF-8');
        $rowCount++;
        $radif++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);


    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="export_ejmali_keshvari.xlsx"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}