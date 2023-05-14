<?php
if (isset($_POST['exp_vaziat_asar_elmigroup'])){
    include_once __DIR__.'/../../../config/connection.php';

    $objPHPExcel = new PHPExcel();
    $jashnvareh=$_POST['jashnvareh'];
    $objPHPExcel->getActiveSheet()->setRightToLeft(true);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'اطلاعات برگزیدگان جشنواره '.substr($jashnvareh,3));
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'ردیف');
    $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'کد اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'نام اثر');
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'قالب/سطح');
    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'نوع فعالیت');
    $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'گروه علمی');
    $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'بخش ویژه');
    $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'نوع پژوهش');
    $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'وضعیت نشر');
    $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'تعداد صفحه');
    $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'تعداد کلمات');
    $objPHPExcel->getActiveSheet()->SetCellValue('L2', 'تاریخ ارزیابی تفصیلی دوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('M2', 'تاریخ ارزیابی تفصیلی سوم');
    $objPHPExcel->getActiveSheet()->SetCellValue('N2', 'جمع امتیاز استان');
    $objPHPExcel->getActiveSheet()->SetCellValue('O2', 'نام');
    $objPHPExcel->getActiveSheet()->SetCellValue('P2', 'نام خانوادگی');
    $objPHPExcel->getActiveSheet()->SetCellValue('Q2', 'نام پدر');
    $objPHPExcel->getActiveSheet()->SetCellValue('R2', 'تاریخ تولد');
    $objPHPExcel->getActiveSheet()->SetCellValue('S2', 'جنسیت');
    $objPHPExcel->getActiveSheet()->SetCellValue('T2', 'وضعیت تاهل');
    $objPHPExcel->getActiveSheet()->SetCellValue('U2', 'تلفن');
    $objPHPExcel->getActiveSheet()->SetCellValue('V2', 'استان تحصیلی');
    $objPHPExcel->getActiveSheet()->SetCellValue('W2', 'شهر تحصیلی');
    $objPHPExcel->getActiveSheet()->SetCellValue('X2', 'مدرسه');
    $objPHPExcel->getActiveSheet()->SetCellValue('Y2', 'پایه');
    $objPHPExcel->getActiveSheet()->SetCellValue('Z2', 'سطح');
    $objPHPExcel->getActiveSheet()->SetCellValue('AA2', 'ترم');
    $objPHPExcel->getActiveSheet()->SetCellValue('AB2', 'تحصیلات غیر حوزوی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AC2', 'رشته دانشگاهی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AD2', 'شماره پرونده تحصیلی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AE2', 'شماره شناسنامه');
    $objPHPExcel->getActiveSheet()->SetCellValue('AF2', 'رشته تخصصی حوزوی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AG2', 'مرکز تخصصی حوزوی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AH2', 'ملیت');
    $objPHPExcel->getActiveSheet()->SetCellValue('AI2', 'نام کشور');
    $objPHPExcel->getActiveSheet()->SetCellValue('AJ2', 'نام مرکز تحصیلی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AK2', 'نوع تحصیلات حوزوی');
    $objPHPExcel->getActiveSheet()->SetCellValue('AL2', 'سال اخذ مدرک تحصیلی غیر حوزوی');
    $objPHPExcel->getActiveSheet()->mergeCells('A1:AL1');


    $objPHPExcel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle("A2:AL2")->getFont()->setBold(true);

    $result = $connection->query("SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.bargozidehkeshvari='می باشد'") or die(mysqli_connect_errno());

    $radif=1;
    $rowCount=3;
    foreach ($result as $row) {
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['codeasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['nameasar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['ghalebpazhouhesh'].' '.$row['satharzyabi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['noefaaliat'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['groupelmi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['bakhshvizheh'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['noepazhouhesh'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['vaziatnashr'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $row['tedadsafhe'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $row['tedadkalamat'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $row['tarikharzyabitafsili2'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $row['tarikharzyabitafsili3'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $row['jamemtiazostan'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $row['fname'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $row['family'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $row['father_name'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $row['tarikhtavallod'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $row['gender'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $row['vaziattaahol'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $row['mobile'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $row['ostantahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $row['shahrtahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $row['madrese'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $row['paye'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $row['sath'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $row['term'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $row['tahsilatghhozavi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $row['reshtedaneshgahi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $row['shparvandetahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $row['sh_shenasnameh'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $row['reshtetakhasosihozavi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $row['markaztakhasosihozavi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $row['meliat'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $row['namekeshvar'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $row['namemarkaztahsili'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $row['noetahsilathozavi'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('AL' . $rowCount, $row['salakhzmadrakghhozavi'], 'UTF-8');
        $rowCount++;
        $radif++;
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);


    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="bargozideh_advaar.xlsx"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}