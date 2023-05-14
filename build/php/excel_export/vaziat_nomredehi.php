<?php
if (isset($_POST['exp_advaar_comparison'])){
    include_once __DIR__.'/../../../config/connection.php';

    $objPHPExcel = new PHPExcel();

    $objPHPExcel->getActiveSheet()->setRightToLeft(true);
    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', '');
    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'استان');
    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'دبیرخانه استانی');
    $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'دبیرخانه کشوری');
    $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'اختلاف معدل ارزیابی استان با معدل ارزیابی دبیرخانه کشوری');
    $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'کل آثار');
    $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'آثار برگزیده');
    $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'میانگین ارزیابی');
    $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'امتیاز بالای 90');
    $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'اجمالی ردی');
    $objPHPExcel->getActiveSheet()->SetCellValue('H2', 'راهیافته به ارزیابی تفصیلی');
    $objPHPExcel->getActiveSheet()->SetCellValue('I2', 'میانگین ارزیابی تفصیلی');
    $objPHPExcel->getActiveSheet()->SetCellValue('J2', 'کمتر از 5 نمره');
    $objPHPExcel->getActiveSheet()->SetCellValue('K2', 'بین 5 تا 10 نمره');
    $objPHPExcel->getActiveSheet()->SetCellValue('L2', 'بین 10 تا 20 نمره');
    $objPHPExcel->getActiveSheet()->SetCellValue('M2', 'بالای 20 نمره');
    $objPHPExcel->getActiveSheet()->getStyle("A1:J1")->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->getStyle("A2:M2")->getFont()->setBold(true);
    $objPHPExcel->getActiveSheet()->mergeCells('C1:F1');
    $objPHPExcel->getActiveSheet()->mergeCells('G1:I1');
    $objPHPExcel->getActiveSheet()->mergeCells('J1:M1');

    $jashnvareh=$_POST['jashnvareh'];
    $result = $connection->query("select distinct(vaziatostaniasar) from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null order by vaziatostaniasar asc") or die(mysqli_connect_errno());
    $radif=1;
    $rowCount=3;
    foreach ($result as $row) {
        $vaziat=$row['vaziatostaniasar'];
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $radif, 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount,substr($vaziat,29) , 'UTF-8');
        $cellostan = substr($vaziat,29);
        $result = $connection->query("select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.ostantahsili='$cellostan'");
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, mysqli_num_rows($result), 'UTF-8');
        $result = $connection->query("select count(vaziatostaniasar) from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat'");
        foreach ($result as $bargozideh) {}
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $bargozideh['count(vaziatostaniasar)'], 'UTF-8');
        $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat'");
        $avgostani=0;
        foreach ($result as $miangin) {
            $avgostani=$miangin['jamemtiazostan']+$avgostani;
        }
        $c_bargozideh=(int)$bargozideh['count(vaziatostaniasar)'];
        $c_avgostani=(float)$avgostani;
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $c_avgostani/$c_bargozideh , 'UTF-8');
        $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat' and jamemtiazostan>=90");
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount,mysqli_num_rows($result) , 'UTF-8');
        $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat' and nobat_arzyabi='اجمالی ردی'");
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,mysqli_num_rows($result) , 'UTF-8');
        $r3 = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat' and nobat_arzyabi!='اجمالی ردی'");
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,mysqli_num_rows($r3) , 'UTF-8');
        $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat' and emtiaznahaei is not null");
        $mianginkeshvari=0;
        foreach ($result as $items){
            $mianginkeshvari=$items['emtiaznahaei']+$mianginkeshvari;
        }
        $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat' and emtiaznahaei is not null");
        $c_bargozideh=(int)mysqli_num_rows($result);
        if ($c_bargozideh!=0){
            $c_avgkeshvari=(float)$mianginkeshvari;
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $c_avgkeshvari/$c_bargozideh , 'UTF-8');
        }else{
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, '0' , 'UTF-8');
        }

        $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat'");
        $zir5=0;
        $bet5ta10=0;
        $bet10ta20=0;
        $bala20=0;
        foreach ($result as $ekhtelaf){
            $ostan=$ekhtelaf['jamemtiazostan'];
            $keshvar=$ekhtelaf['emtiaznahaei'];
            $avgbet=abs($ostan-$keshvar);
            if ($avgbet>=5){
                $zir5=$zir5+1;
            }elseif ($avgbet==5 and $avgbet<10){
                $bet5ta10=$bet5ta10+1;
            }elseif ($avgbet==10 and $avgbet<20){
                $bet10ta20=$bet10ta20+1;
            }elseif ($avgbet>=20){
                $bala20=$bala20+1;
            }
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount,$zir5 , 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount,$bet5ta10 , 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount,$bet10ta20 , 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount,$bala20 , 'UTF-8');
        $rowCount++;
        $radif++;
    }
    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'مجموع' , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh'");
    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, mysqli_num_rows($result) , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!=''");
    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, mysqli_num_rows($result) , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!=''");
    $sumostani=0;
    foreach ($result as $avgostani){
        $sumostani=$avgostani['jamemtiazostan']+$sumostani;
    }
    $sumostani=(float)$sumostani;
    $countradif=(int)mysqli_num_rows($result);
    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $sumostani/$countradif , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!='' and jamemtiazostan>=90");
    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, mysqli_num_rows($result) , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!='' and nobat_arzyabi='اجمالی ردی'");
    $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, mysqli_num_rows($result) , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!='' and nobat_arzyabi!='اجمالی ردی'");
    $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, mysqli_num_rows($result) , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and emtiaznahaei is not null");
    $mianginkeshvari=0;
    foreach ($result as $items){
        $mianginkeshvari=$items['emtiaznahaei']+$mianginkeshvari;
    }
    $tedadradif=(int)mysqli_num_rows($result);
    $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $mianginkeshvari/$tedadradif , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar='$vaziat'");
    $zir5=0;
    $bet5ta10=0;
    $bet10ta20=0;
    $bala20=0;
    foreach ($result as $ekhtelaf){
        $ostan=$ekhtelaf['jamemtiazostan'];
        $keshvar=$ekhtelaf['emtiaznahaei'];
        $avgbet=abs($ostan-$keshvar);
        if ($avgbet>=5){
            $zir5=$zir5+1;
        }elseif ($avgbet==5 and $avgbet<10){
            $bet5ta10=$bet5ta10+1;
        }elseif ($avgbet==10 and $avgbet<20){
            $bet10ta20=$bet10ta20+1;
        }elseif ($avgbet>=20){
            $bala20=$bala20+1;
        }
    }
    $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $zir5 , 'UTF-8');
    $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $bet5ta10 , 'UTF-8');
    $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $bet10ta20 , 'UTF-8');
    $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $bala20 , 'UTF-8');
    $objPHPExcel->getActiveSheet()->mergeCells('A'.$rowCount.':'.'B'.$rowCount);
    $rowCount++;

    $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'درصد' , 'UTF-8');
    $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, '-' , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh'");
    $result2 = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!=''");
    $per=(mysqli_num_rows($result2)*100)/mysqli_num_rows($result);
    $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $per , 'UTF-8');
    $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, '-' , 'UTF-8');
    $result = $connection->query("select * from etelaat_a where jashnvareh='$jashnvareh' and vaziatostaniasar is not null and vaziatostaniasar!='' and jamemtiazostan>=90");
    $perplus90=(mysqli_num_rows($result)*100)/$result2;
    $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $perplus90 , 'UTF-8');



    $objPHPExcel->getActiveSheet()->mergeCells('A'.$rowCount.':'.'B'.$rowCount);
    $styleArray = array(
        'font'  => array(
            'bold'  => true,
            'color' => array('rgb' => 'Black'),
            'size'  => 12,
            'name'  => 'B Nazanin'
        ));
    $objPHPExcel->getDefaultStyle()->applyFromArray($styleArray);
    $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
    $objPHPExcel->getDefaultStyle()->applyFromArray($style);

    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);


    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="vaziat_nomredehi.xlsx"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}