<?php
if (isset($_POST['exp_ejmali_keshvari'])){
    include_once __DIR__.'/../../../config/connection.php';
    $objPHPExcel = new PHPExcel();
    $jashnvareh=$_POST['jashnvareh'];
    $objPHPExcel->getActiveSheet()->setRightToLeft(true);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ردیف');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'کد ارزیاب');
    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'نام و نام خانوادگی ارزیاب');
    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'تعداد اثر ارزیابی اجمالی');

    $objPHPExcel->getActiveSheet()->getStyle("A1:D1")->getFont()->setBold(true);

    $result = $connection->query("SELECT distinct(rater_id),rater_info from rater_comments_archive inner join etelaat_a on rater_comments_archive.codeasar=etelaat_a.codeasar where etelaat_a.jashnvareh='$jashnvareh' order by rater_comments_archive.rater_id asc ") or die(mysqli_connect_errno());

    $radif=1;
    $rowCount=2;
    foreach ($result as $row) {
        $rater_id=$row['rater_id'];
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['rater_id'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['rater_info'], 'UTF-8');
        $select_temp=mysqli_query($connection,"select * from rater_comments_archive where rater_id='$rater_id'");
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, mysqli_num_rows($select_temp), 'UTF-8');
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