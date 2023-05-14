<?php
if (isset($_POST['exp_ejmali'])){
    include_once __DIR__.'/../../../config/connection.php';

$objPHPExcel = new PHPExcel();
$groupelmi=$_POST['elmigroup'];

$objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setRightToLeft(true);
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'ردیف');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'کد اثر');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'نام اثر');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'قالب/سطح');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'استان');

$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'نظر گروه');
$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'توضیحات');


$objPHPExcel->getActiveSheet()->getStyle("A1:L1")->getFont()->setBold(true);
    $result = $connection->query("SELECT distinct(etelaat_a.codeasar),etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.vaziatostaniasar from etelaat_a inner join rater_comments_archive on etelaat_a.codeasar=rater_comments_archive.codeasar where etelaat_a.groupelmi='$groupelmi' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatostaniasar!='' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' order by etelaat_a.codeasar asc") or die(mysqli_connect_errno());

$radif=1;
$rowCount=2;
foreach ($result as $row) {
$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, mb_strtoupper($radif, 'UTF-8'));
$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, mb_strtoupper($row['codeasar'], 'UTF-8'));
$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, mb_strtoupper($row['nameasar'], 'UTF-8'));
$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, mb_strtoupper($row['ghalebpazhouhesh'].' سطح '.$row['satharzyabi'], 'UTF-8'));
$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, mb_strtoupper(substr($row['vaziatostaniasar'],28) , 'UTF-8'));
$rowCount++;
$radif++;
}


    $result = $connection->query("SELECT distinct(etelaat_a.codeasar),etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.vaziatostaniasar from etelaat_a inner join rater_comments_archive on etelaat_a.codeasar=rater_comments_archive.codeasar where etelaat_a.groupelmi='$groupelmi' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatostaniasar!='' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' order by etelaat_a.codeasar asc") or die(mysqli_connect_errno());
    $rowCount=2;
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        $result = $connection->query("SELECT * from rater_comments_archive where codeasar='$codeasar' ORDER by rater_id");
        foreach ($result as $rater1){}
        if ($rater1['accept_or_reject']=='توقف اثر در مرحله اجمالی'){$rater1['accept_or_reject']='توقف';}elseif ($rater1['accept_or_reject']=='راه‌یابی اثر به مرحله تفصیلی'){$rater1['accept_or_reject']='ارجاع';}else{$rater1['accept_or_reject']='';}
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $rater1['accept_or_reject'], 'UTF-8');
        $rater1code=$rater1['rater_id'];
        $rowCount++;
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'نظر استاد '.$rater1['rater_info']);

    }


    $result = $connection->query("SELECT distinct(etelaat_a.codeasar),etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.vaziatostaniasar from etelaat_a inner join rater_comments_archive on etelaat_a.codeasar=rater_comments_archive.codeasar where etelaat_a.groupelmi='$groupelmi' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatostaniasar!='' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' order by etelaat_a.codeasar asc") or die(mysqli_connect_errno());
    $rowCount=2;
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        $result = $connection->query("SELECT * from rater_comments_archive where codeasar='$codeasar' and rater_id!='$rater1code' ORDER by rater_id asc");
        foreach ($result as $rater2){}
        if ($rater2['accept_or_reject']=='توقف اثر در مرحله اجمالی'){$rater2['accept_or_reject']='توقف';}elseif ($rater2['accept_or_reject']=='راه‌یابی اثر به مرحله تفصیلی'){$rater2['accept_or_reject']='ارجاع';}else{$rater2['accept_or_reject']='';}
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $rater2['accept_or_reject'], 'UTF-8');
        $rater2code=$rater2['rater_id'];
        $rowCount++;
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'نظر استاد '.$rater2['rater_info']);

    }

    $result = $connection->query("SELECT distinct(etelaat_a.codeasar),etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.vaziatostaniasar from etelaat_a inner join rater_comments_archive on etelaat_a.codeasar=rater_comments_archive.codeasar where etelaat_a.groupelmi='$groupelmi' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatostaniasar!='' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' order by etelaat_a.codeasar asc") or die(mysqli_connect_errno());
    $rowCount=2;
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        $result = $connection->query("SELECT * from rater_comments_archive where codeasar='$codeasar' and rater_id!='$rater1code' and rater_id!='$rater2code' ORDER by rater_id asc");
        foreach ($result as $rater3){}
        if ($rater3['accept_or_reject']=='توقف اثر در مرحله اجمالی'){$rater3['accept_or_reject']='توقف';}elseif ($rater3['accept_or_reject']=='راه‌یابی اثر به مرحله تفصیلی'){$rater3['accept_or_reject']='ارجاع';}else{$rater3['accept_or_reject']='';}
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $rater3['accept_or_reject'], 'UTF-8');
        $rater3code=$rater3['rater_id'];
        $rowCount++;
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'نظر استاد '.$rater3['rater_info']);

    }

    $result = $connection->query("SELECT distinct(etelaat_a.codeasar),etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.vaziatostaniasar from etelaat_a inner join rater_comments_archive on etelaat_a.codeasar=rater_comments_archive.codeasar where etelaat_a.groupelmi='$groupelmi' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatostaniasar!='' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' order by etelaat_a.codeasar asc") or die(mysqli_connect_errno());
    $rowCount=2;
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        $result = $connection->query("SELECT * from rater_comments_archive where codeasar='$codeasar' and rater_id!='$rater1code' and rater_id!='$rater2code' and rater_id!='$rater3code' ORDER by rater_id asc");
        foreach ($result as $rater4){}
        if ($rater4['accept_or_reject']=='توقف اثر در مرحله اجمالی'){$rater4['accept_or_reject']='توقف';}elseif ($rater4['accept_or_reject']=='راه‌یابی اثر به مرحله تفصیلی'){$rater4['accept_or_reject']='ارجاع';}else{$rater4['accept_or_reject']='';}
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $rater4['accept_or_reject'], 'UTF-8');
        $rater4code=$rater4['rater_id'];
        $rowCount++;
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'نظر استاد '.$rater4['rater_info']);

    }

    $result = $connection->query("SELECT distinct(etelaat_a.codeasar),etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.vaziatostaniasar from etelaat_a inner join rater_comments_archive on etelaat_a.codeasar=rater_comments_archive.codeasar where etelaat_a.groupelmi='$groupelmi' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatostaniasar!='' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' order by etelaat_a.codeasar asc") or die(mysqli_connect_errno());
    $rowCount=2;
    foreach ($result as $row) {
        $codeasar=$row['codeasar'];
        $result = $connection->query("SELECT * from rater_comments_archive where codeasar='$codeasar' and rater_id!='$rater1code' and rater_id!='$rater2code' and rater_id!='$rater3code' and rater_id!='$rater4code' ORDER by rater_id asc");
        foreach ($result as $rater5){}
        if ($rater5['accept_or_reject']=='توقف اثر در مرحله اجمالی'){$rater5['accept_or_reject']='توقف';}elseif ($rater5['accept_or_reject']=='راه‌یابی اثر به مرحله تفصیلی'){$rater5['accept_or_reject']='ارجاع';}else{$rater5['accept_or_reject']='';}
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $rater5['accept_or_reject'], 'UTF-8');
        $rowCount++;
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'نظر استاد '.$rater5['rater_info']);

    }
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="rater_comments.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
}