<?php
include_once __DIR__.'/../../../config/connection.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['exp_ejmali_keshvari'])){

    $objPHPExcel = new Spreadsheet();
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
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif);
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['rater_id']);
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['rater_info']);
        $select_temp=mysqli_query($connection,"select * from rater_comments_archive inner join etelaat_a on rater_comments_archive.codeasar=etelaat_a.codeasar where rater_id='$rater_id' and etelaat_a.jashnvareh='$jashnvareh'");
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, mysqli_num_rows($select_temp));
        $rowCount++;
        $radif++;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="rater_comments.xlsx"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($objPHPExcel, 'Xlsx');
    $objWriter->save('php://output');
}