<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];


//start send to secretariat
if (!empty($_POST['sendtosecretariat']) and isset($_FILES['fileshora']) and isset($_FILES['filesianati'])) {
    $operation = "sendtosecretariat";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

//User Variables
    $username = $_SESSION['username'];
    $query = mysqli_query($connection, "select * from rater_list where username='$username' and type=2");
    foreach ($query as $UserItems) {
    }
    $UserState = $UserItems['city_name'];
    $UserCity = $UserItems['shahr_name'];

//File Shora Variables
    $fileshora_size = $_FILES['fileshora']['size'];
    $fileshora_name = $_FILES['fileshora']['name'];
    $tmpnamefileshora = $_FILES["fileshora"]["tmp_name"];
    $extfileshora = pathinfo($fileshora_name, PATHINFO_EXTENSION);

//File Sianati Variables
    $filesianati_size = $_FILES['filesianati']['size'];
    $filesianati_name = $_FILES['filesianati']['name'];
    $tmpnamefilesianati = $_FILES["filesianati"]["tmp_name"];
    $extfilesianati = pathinfo($filesianati_name, PATHINFO_EXTENSION);

    $AllowedExt = array('docx', 'doc', 'pdf');

    if ($fileshora_size > 20971520) {
        header("location:" . $main_website_url . "Send_To_Secretariat.php?wrongfilesize");
    } elseif (!in_array($extfileshora, $AllowedExt)) {
        header("location:" . $main_website_url . "Send_To_Secretariat.php?wrongwordfiletype");
    } elseif ($filesianati_size > 20971520) {
        header("location:" . $main_website_url . "Send_To_Secretariat.php?wrongfilesize");
    } elseif (!in_array($extfilesianati, $AllowedExt)) {
        header("location:" . $main_website_url . "Send_To_Secretariat.php?wrongwordfiletype");
    } else {
        //select last festival name
        $query = mysqli_query($connection, "select * from advaar where active=0");
        foreach ($query as $last_jashnvareh) {
        }
        $last = $last_jashnvareh['advaar_cl'];
        $foldername = $username . '-' . $year . '-' . $month . '-' . $day . '-' . $hour . '-' . $min . '-' . $sec;
        if (!mkdir($concurrentDirectory = __DIR__ . "/../../dist/files/Secretariat_Files/$foldername") && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        if (!mkdir($concurrentDirectory = __DIR__ . "/../../dist/files/Secretariat_Files/$foldername/shora") && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        if (!mkdir($concurrentDirectory = __DIR__ . "/../../dist/files/Secretariat_Files/$foldername/sianat") && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        $filesianati_src = "/dist/files/Secretariat_Files/$foldername/sianat/$filesianati_name";
        $fileshora_src = "/dist/files/Secretariat_Files/$foldername/shora/$fileshora_name";
        move_uploaded_file($tmpnamefileshora, __DIR__ . "/../../dist/files/Secretariat_Files/$foldername/shora/" . $fileshora_name);
        move_uploaded_file($tmpnamefilesianati, __DIR__ . "/../../dist/files/Secretariat_Files/$foldername/sianat/" . $filesianati_name);
        mysqli_query($connection, "insert into secretariat_approves(file_type,jashnvareh,filename,src,sender,sent_date) values (1,'$last','$fileshora_name','$fileshora_src','$user','$datewithtime')");
        mysqli_query($connection, "insert into secretariat_approves(file_type,jashnvareh,filename,src,sender,sent_date) values (2,'$last','$filesianati_name','$filesianati_src','$user','$datewithtime')");

//        make dir for save sianati,shora files - make that informations to secretariat_approves

//        select last row of secreteriat informations from this sender
        $query = mysqli_query($connection, "select * from secretariat_approves where sender='$username' and file_type=2 and jashnvareh='$last' order by id desc limit 1");
        foreach ($query as $secreteriat_approves) {
        }
        $codeapprovetable = $secreteriat_approves['id'];

        //select all rows from etelaat_a where approve_sianat=0 and last festival=$last
        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        //start operation of send
        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        foreach ($query as $approve) {
            if ($approve['approve_sianat']==0 and $approve['vaziatkarnameostani'] == 'اتمام ارزیابی' and (($approve['jamemtiazostan'] >= 80 and $approve['bakhshvizheh'] == 'نیست') or ($approve['jamemtiazostan'] >= 75 and $approve['bakhshvizheh'] == 'هست'))) {
                $codeasar = $approve['codeasar'];
                mysqli_query($connection, "update etelaat_a set approve_sianat=1,approver_sianat='$username',table_approve_sianat='$codeapprovetable',vaziatpazireshasar='پذیرش شد',sharayetavalliehsherkat='دارد',nobat_arzyabi='ارزیابی اجمالی', vaziatkarname='در حال ارزیابی' where codeasar='$codeasar'");
            }
        }


        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        foreach ($query as $approve) {
            if ($approve['approve_sianat']==0 and $approve['vaziatkarnameostani'] == 'اتمام ارزیابی' and (($approve['jamemtiazostan'] < 80 and $approve['bakhshvizheh'] == 'نیست') or ($approve['jamemtiazostan'] < 75 and $approve['bakhshvizheh'] == 'هست'))) {
                $codeasar = $approve['codeasar'];
                mysqli_query($connection, "update etelaat_a set approve_sianat=2,vaziatpazireshasar='پذیرش نشد',sharayetavalliehsherkat='ندارد',ellatnadashtansharayet='اثر رتبه برگزیدگی استانی ندارد' where codeasar='$codeasar'");
            }
        }


        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        foreach ($query as $approve) {
            if ($approve['approve_sianat']==0 and $approve['fileasar'] == null or $approve['fileasar_word'] == null) {
                $codeasar = $approve['codeasar'];
                mysqli_query($connection, "update etelaat_a set approve_sianat=2,vaziatpazireshasar='پذیرش نشد',sharayetavalliehsherkat='ندارد',ellatnadashtansharayet='عدم ارسال فایل اثر توسط استان',vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese=null,nobat_arzyabi_ostani='اجمالی ردی' where codeasar='$codeasar'");
            }
        }


        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        foreach ($query as $approve) {
            if ($approve['approve_sianat']==0 and $approve['vaziatkarnameostani'] == 'در حال ارزیابی' or $approve['vaziatkarnamemadrese'] == 'در حال ارزیابی') {
                if ($approve['vaziatkarnamemadrese'] == 'در حال ارزیابی' and ($approve['nobat_arzyabi_madrese'] != null or $approve['nobat_arzyabi_madrese'] != '') and ($approve['fileasar'] != null or $approve['fileasar_word'] != null)) {
                    $codeasar = $approve['codeasar'];
                    mysqli_query($connection, "update etelaat_a set vaziatpazireshasar='پذیرش نشد',sharayetavalliehsherkat='ندارد',ellatnadashtansharayet='عدم اتمام فرایند ارزیابی در مرحله مدرسه ای',approve_sianat=2,vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی',nobat_arzyabi_ostani='اجمالی ردی',nobat_arzyabi_madrese='اجمالی ردی',vaziatpazireshasar_ostani='پذیرش نشد',bargozideh_madrese='نمی باشد',bargozideh_ostani='نمی باشد' where codeasar='$codeasar'");
                }
            }
        }


        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        foreach ($query as $approve) {
            if ($approve['approve_sianat']==0 and $approve['vaziatkarnameostani'] == 'در حال ارزیابی' or $approve['vaziatkarnamemadrese'] == 'در حال ارزیابی') {
                if ($approve['vaziatkarnameostani'] == 'در حال ارزیابی' and ($approve['fileasar'] != null or $approve['fileasar_word'] != null)) {
                    $codeasar = $approve['codeasar'];
                    mysqli_query($connection, "update etelaat_a set vaziatpazireshasar='پذیرش نشد',sharayetavalliehsherkat='ندارد',ellatnadashtansharayet='عدم اتمام فرایند ارزیابی در مرحله استانی',approve_sianat=2,vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی',nobat_arzyabi_ostani='اجمالی ردی',vaziatpazireshasar_ostani='پذیرش نشد',bargozideh_ostani='نمی باشد' where codeasar='$codeasar'");
                }
            }
        }


        if ($UserCity != null and $UserCity != '') {
            switch ($UserCity) {
                case 'کاشان':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
                case 'بناب':
                    $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$last'");
                    break;
            }
        } else {
            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$UserState' and etelaat_a.jashnvareh='$last' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.approve_sianat=0");
        }
        foreach ($query as $approve) {
            if ($approve['approve_sianat'] == 0) {
                $codeasar = $approve['codeasar'];
                mysqli_query($connection, "update etelaat_a set approve_sianat=2,vaziatpazireshasar='پذیرش نشد',sharayetavalliehsherkat='ندارد',ellatnadashtansharayet='حطای ارسال به جشنواره' where codeasar='$codeasar'");
            }
        }

        header("location:" . $main_website_url . "/../../Send_To_Secretariat.php?sent");

    }
}
//end send to secretariat