<?php
if (isset($_POST['exp_payment_export'])){
    include_once __DIR__.'/../../../config/connection.php';
    $jashnvareh=$_POST['jashnvareh'];
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
    $objPHPExcel->getActiveSheet()->getStyle("A1:I1")->getFont()->setBold(true);

    $resultt2 = $connection->query("select * from etelaat_a inner join rater_list on etelaat_a.codearzyabtafsili2=rater_list.code where etelaat_a.nobat_arzyabi='تفصیلی دوم' and etelaat_a.codearzyabtafsili2 is not null and etelaat_a.jashnvareh='$jashnvareh' order by rater_list.code asc") or die(mysqli_connect_errno());
    $resultt3 = $connection->query("select * from etelaat_a inner join rater_list on etelaat_a.codearzyabtafsili3=rater_list.code where etelaat_a.nobat_arzyabi='تفصیلی سوم' and etelaat_a.codearzyabtafsili3 is not null and etelaat_a.jashnvareh='$jashnvareh' order by rater_list.code asc") or die(mysqli_connect_errno());
    $rowCount=2;
    foreach ($resultt2 as $row) {
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
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m1, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==2){
            $tedadsafhe=(int)$row['tedadsafhe'];
            if ($tedadsafhe<=50 and $tedadsafhe>=10){
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m2, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==3){
            $tedadsafhe=(int)$row['tedadsafhe'];
            if ($tedadsafhe<=50 and $tedadsafhe>=10){
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m3, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==4){
            $tedadsafhe=(int)$row['tedadsafhe'];
            if ($tedadsafhe<=50 and $tedadsafhe>=10){
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m4, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }
        elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==1){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k1, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==2){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k2, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==3){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k3, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==4){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k4, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='تحقیق پایانی' and $row['satharzyabi']==2){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$t2, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='پایان‌نامه' and $row['satharzyabi']==3){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$p3, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='ترجمه'){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$kt, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='تصحیح و تعلیق'){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$ktashih, 'UTF-8');
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['account_number'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['bank'], 'UTF-8');
        $rowCount++;
    }
    foreach ($resultt3 as $row) {
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
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m1, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==2){
            $tedadsafhe=(int)$row['tedadsafhe'];
            if ($tedadsafhe<=50 and $tedadsafhe>=10){
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m2, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==3){
            $tedadsafhe=(int)$row['tedadsafhe'];
            if ($tedadsafhe<=50 and $tedadsafhe>=10){
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m3, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }elseif ($row['ghalebpazhouhesh']=='مقاله' and $row['satharzyabi']==4){
            $tedadsafhe=(int)$row['tedadsafhe'];
            if ($tedadsafhe<=50 and $tedadsafhe>=10){
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $tedadsafhe*$m4, 'UTF-8');
            }elseif ($tedadsafhe>50){
                $tedadsafhe=50;
            }else{
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 0, 'UTF-8');
            }
        }
        elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==1){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k1, 'UTF-8');
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==2){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k2);
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==3){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k3);
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['satharzyabi']==4){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$k4);
        }elseif ($row['ghalebpazhouhesh']=='تحقیق پایانی' and $row['satharzyabi']==2){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$t2);
        }elseif ($row['ghalebpazhouhesh']=='پایان‌نامه' and $row['satharzyabi']==3){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$p3);
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='ترجمه'){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$kt);
        }elseif ($row['ghalebpazhouhesh']=='کتاب' and $row['noepazhouhesh']=='تصحیح و تعلیق'){
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount,$ktashih);
        }
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['account_number'], 'UTF-8');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['bank'], 'UTF-8');
        $rowCount++;
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);


    header('Content-Type: application/vnd.ms-excel'); //mime type
    header('Content-Disposition: attachment;filename="rater_payment_export.xls"'); //tell browser what's the file name
    header('Cache-Control: max-age=0'); //no cache
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
}