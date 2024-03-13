<?php
ini_set('display_errors', 1);
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

if (isset($_POST['querya'])) {
    $a = 1;
//    $query=mysqli_query($connection,"select * from etelaat_a inner join tafsili3_ostan on etelaat_a.codeasar=tafsili3_ostan.codeasar");
//    foreach ($query as $item){
//        $codeasar=$item['codeasar'];
//        $rater_id=$item['rater_id'];
//        mysqli_query($connection,"update etelaat_a set codearzyabtafsili3_ostani='$rater_id' where codeasar='$codeasar' ");
//    }
//    $query = mysqli_query($connection, "select * from etelaat_a inner join tafsili1_ostan on etelaat_a.codeasar=tafsili1_ostan.codeasar where tafsili1_ostan.jam<70");
//    foreach ($query as $items) {
//        echo $a . '-' . $codeasar = $items['codeasar'];
//        $query = "update etelaat_a set nobat_arzyabi_ostani='تفصیلی اول', vaziatkarnameostani='اتمام ارزیابی', bargozideh_ostani=NULL where codeasar='$codeasar'";
//        if (mysqli_query($connection, $query)) {
//            echo 'done' . '<br>';
//        }
//        $a++;
//    }
//    $query = mysqli_query($connection, "select * from etelaat_a inner join tafsili1_madrese on etelaat_a.codeasar=tafsili1_madrese.codeasar where tafsili1_madrese.jam<70");
//    foreach ($query as $items) {
//        echo $a . '-' . $items['codeasar'] . '<br>';
//        $query = "update etelaat_a set nobat_arzyabi_madrese='تفصیلی اول', vaziatkarnamemadrese='اتمام ارزیابی' where codeasar='$codeasar'";
//        if (mysqli_query($connection, $query)) {
//            echo 'done' . '<br>';
//        }
//        $a++;
//    }
} //inc for attach file admin to asar
elseif (isset($_POST['attachfileadmin']) and !empty($_POST['codeasar']) and !empty($_POST['adhesive']) and !empty($_FILES['fileasar'])) {
    $operation = "attachfileadmin";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $file_size = $_FILES['fileasar']['size'];
    $file_name = $_FILES['fileasar']['name'];
    $file_type = $_FILES['fileasar']['type'];
    $tmpname = $_FILES["fileasar"]["tmp_name"];
    $file_size_word = $_FILES['fileasar_word']['size'];
    $file_name_word = $_FILES['fileasar_word']['name'];
    $file_type_word = $_FILES['fileasar_word']['type'];
    $allowed_pdf = array('pdf');
    $ext_pdf = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed = array('docx', 'doc');
    $ext = pathinfo($file_name_word, PATHINFO_EXTENSION);
    $tmpname_word = $_FILES["fileasar_word"]["tmp_name"];
    $codeasar = $_POST['codeasar'];
    $adhesive = $_SESSION['username'];
    $asar_city = $_SESSION['state'];
    if ($file_size > 20971520 or $file_size_word > 20971520) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfilesize");
    } elseif ($file_size == 0 and $file_size_word == 0) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfile");
    } elseif (!in_array($ext_pdf, $allowed_pdf) and !in_array($ext, $allowed)) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfiletype");
    } else {
        if (!file_exists(__DIR__ . "/../../dist/files/asar_files/" . $file_name)) {
            unlink(__DIR__ . "/../../dist/files/asar_files/" . $file_name);
        }
        if (!file_exists(__DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word)) {
            unlink(__DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
        }
        if (!empty($_FILES['fileasar']) and (empty($_FILES['fileasar_word']) or $file_name_word == '')) {
            mysqli_query($connection, "update etelaat_a set `fileasar`= 'dist/files/asar_files/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$date' where `codeasar`='$codeasar' ");
            move_uploaded_file($tmpname, __DIR__ . "/../../dist/files/asar_files/" . $file_name);
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } elseif (!empty($_FILES['fileasar_word']) and (empty($_FILES['fileasar']) or $file_name == '')) {
            move_uploaded_file($tmpname_word, __DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
            mysqli_query($connection, "update etelaat_a set fileasar_word= 'dist/files/asar_files_word/$file_name_word',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$date' where codeasar='$codeasar' ");
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } elseif ((!empty($_FILES['fileasar_word']) or $file_name_word == '') and (!empty($_FILES['fileasar']) or $file_name == '')) {
            mysqli_query($connection, "update etelaat_a set `fileasar`= 'dist/files/asar_files/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$date' where `codeasar`='$codeasar' ");
            move_uploaded_file($tmpname, __DIR__ . "/../../dist/files/asar_files/" . $file_name);
            mysqli_query($connection, "update etelaat_a set fileasar_word= 'dist/files/asar_files_word/$file_name_word',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$date' where codeasar='$codeasar' ");
            move_uploaded_file($tmpname_word, __DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } else {
            header("location:" . $main_website_url . "attach_file_to_asar.php?findwithname");
        }
    }
}
//end inc attach file admin for asar

//inc for attach file type2 to asar
elseif (isset($_POST['attachfile_type2']) and !empty($_FILES['fileasar']) and !empty($_POST['codeasar'])) {
    $operation = "attachfile_type2";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $file_size = $_FILES['fileasar']['size'];
    $file_name = $_FILES['fileasar']['name'];
    $file_type = $_FILES['fileasar']['type'];
    $tmpname = $_FILES["fileasar"]["tmp_name"];
    $file_size_word = $_FILES['fileasar_word']['size'];
    $file_name_word = $_FILES['fileasar_word']['name'];
    $file_type_word = $_FILES['fileasar_word']['type'];
    $allowed_pdf = array('pdf');
    $ext_pdf = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed = array('docx', 'doc');
    $ext = pathinfo($file_name_word, PATHINFO_EXTENSION);
    $filename_without_extpdf = pathinfo($file_name, PATHINFO_FILENAME);
    $filename_without_extword = pathinfo($file_name_word, PATHINFO_FILENAME);
    $tmpname_word = $_FILES["fileasar_word"]["tmp_name"];
    $codeasar = $_POST['codeasar'];
    $nameasar = $_POST['nameasar'];
    $adhesive = $_SESSION['username'];
    $adhesive_city = $_SESSION['city'];
    $asar_city = @$_SESSION['state'];
    $query = mysqli_query($connection, "select * from rater_list inner join etelaat_p on rater_list.city_name=etelaat_p.ostantahsili where rater_list.username='$adhesive' and rater_list.city_name=etelaat_p.ostantahsili");
    foreach ($query as $selectforcheckratercity) {
    }
    if ($file_size > 20971520 or $file_size_word > 20971520) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfilesize");
    } elseif ($file_size == 0 and $file_size_word == 0) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfile");
    } elseif (!in_array($ext_pdf, $allowed_pdf) and !in_array($ext, $allowed)) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfiletype");
    } elseif ($selectforcheckratercity == NULL) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?unknownwrong");
    } elseif ($filename_without_extpdf != $codeasar and $filename_without_extword != $codeasar) {
        if ($filename_without_extword != $codeasar) {
            header("location:" . $main_website_url . "attach_file_to_asar.php?invaliddocname");
        }
        if ($filename_without_extpdf != $codeasar) {
            header("location:" . $main_website_url . "attach_file_to_asar.php?invalidpdfname");
        }
    } else {
        if (!file_exists(__DIR__ . "/../../dist/files/asar_files/" . $file_name)) {
            @unlink(__DIR__ . "/../../dist/files/asar_files/" . $file_name);
        }
        if (!file_exists(__DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word)) {
            @unlink(__DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
        }
        if (isset($_FILES['fileasar_word']) and !isset($_FILES['fileasar'])) {
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',`fileasar`= 'dist/files/asar_files/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$date' where `codeasar`='$codeasar' ");
            move_uploaded_file($tmpname, __DIR__ . "/../../dist/files/asar_files/" . $file_name);
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } elseif (!isset($_FILES['fileasar_word']) and isset($_FILES['fileasar'])) {
            move_uploaded_file($tmpname_word, __DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',fileasar_word= 'dist/files/asar_files_word/$file_name_word',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$date' where codeasar='$codeasar' ");
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } elseif (isset($_FILES['fileasar_word']) and isset($_FILES['fileasar'])) {
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',`fileasar`= 'dist/files/asar_files/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$date' where `codeasar`='$codeasar' ");
            move_uploaded_file($tmpname, __DIR__ . "/../../dist/files/asar_files/" . $file_name);
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',fileasar_word= 'dist/files/asar_files_word/$file_name_word',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$date' where codeasar='$codeasar' ");
            move_uploaded_file($tmpname_word, __DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } else {
            header("location:" . $main_website_url . "attach_file_to_asar.php?findwithname");
        }
    }
}
//end inc attach file type2 for asar

//inc for attach file type3 to asar
elseif (isset($_POST['attachfile_type3']) and !empty($_FILES['fileasar']) and !empty($_POST['codeasar'])) {
    $operation = "attachfile_type3";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
    $usercode = $_SESSION['username'];

    $file_size = $_FILES['fileasar']['size'];
    $file_name = $_FILES['fileasar']['name'];
    $file_type = $_FILES['fileasar']['type'];
    $tmpname = $_FILES["fileasar"]["tmp_name"];
    $file_size_word = $_FILES['fileasar_word']['size'];
    $file_name_word = $_FILES['fileasar_word']['name'];
    $file_type_word = $_FILES['fileasar_word']['type'];
    $allowed_pdf = array('pdf');
    $ext_pdf = pathinfo($file_name, PATHINFO_EXTENSION);
    $allowed = array('docx', 'doc');
    $ext = pathinfo($file_name_word, PATHINFO_EXTENSION);
    $tmpname_word = $_FILES["fileasar_word"]["tmp_name"];
    $codeasar = $_POST['codeasar'];
    $nameasar = $_POST['nameasar'];
    $adhesive = $_SESSION['username'];
    $adhesive_city = $_POST['adhesive_city'];
    $asar_city = $_SESSION['state'];
    $filename_without_extpdf = pathinfo($file_name, PATHINFO_FILENAME);
    $filename_without_extword = pathinfo($file_name_word, PATHINFO_FILENAME);
    $query = mysqli_query($connection, "select * from rater_list inner join etelaat_p on rater_list.city_name=etelaat_p.ostantahsili where rater_list.username='$adhesive' and rater_list.city_name=etelaat_p.ostantahsili");
    foreach ($query as $selectforcheckratercity) {
    }
    if ($file_size > 20971520 or $file_size_word > 20971520) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfilesize");
    } elseif ($file_size == 0 and $file_size_word == 0) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfile");
    } elseif (!in_array($ext_pdf, $allowed_pdf) and !in_array($ext, $allowed)) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?wrongfiletype");
    } elseif ($selectforcheckratercity == NULL) {
        header("location:" . $main_website_url . "attach_file_to_asar.php?unknownwrong");
    } elseif ($filename_without_extpdf != $codeasar and $filename_without_extword != $codeasar) {
        if ($filename_without_extword != $codeasar) {
            header("location:" . $main_website_url . "attach_file_to_asar.php?invaliddocname");
        }
        if ($filename_without_extpdf != $codeasar) {
            header("location:" . $main_website_url . "attach_file_to_asar.php?invalidpdfname");
        }
    } else {
        if (!file_exists(__DIR__ . "/../../dist/files/asar_files/" . $file_name)) {
            unlink(__DIR__ . "/../../dist/files/asar_files/" . $file_name);
        }
        if (!file_exists(__DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word)) {
            unlink(__DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
        }
        if (!empty($_FILES['fileasar']) and (empty($_FILES['fileasar_word']) or $file_name_word == '')) {
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',`fileasar`= 'dist/files/asar_files/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$date' where `codeasar`='$codeasar' ");
            move_uploaded_file($tmpname, __DIR__ . "/../../dist/files/asar_files/" . $file_name);
            mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='انتقال از استان',transporter_to_school_user='$usercode',date_transfer_to_school='$date',vaziatkarnamemadrese='در حال ارزیابی',nobat_arzyabi_madrese='ارزیابی اجمالی',nobat_arzyabi_ostani=null where codeasar='$codeasar'");
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } elseif (!empty($_FILES['fileasar_word']) and (empty($_FILES['fileasar']) or $file_name == '')) {
            move_uploaded_file($tmpname_word, __DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',fileasar_word= 'dist/files/asar_files_word/$file_name_word',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$date' where codeasar='$codeasar' ");
            mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='انتقال از استان',transporter_to_school_user='$usercode',date_transfer_to_school='$date',vaziatkarnamemadrese='در حال ارزیابی',nobat_arzyabi_madrese='ارزیابی اجمالی',nobat_arzyabi_ostani=null where codeasar='$codeasar'");
            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } elseif ((!empty($_FILES['fileasar_word']) or $file_name_word == '') and (!empty($_FILES['fileasar']) or $file_name == '')) {
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',`fileasar`= 'dist/files/asar_files/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$date' where `codeasar`='$codeasar' ");
            move_uploaded_file($tmpname, __DIR__ . "/../../dist/files/asar_files/" . $file_name);
            mysqli_query($connection, "update etelaat_a set nameasar='$nameasar',fileasar_word= 'dist/files/asar_files_word/$file_name_word',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$date' where codeasar='$codeasar' ");
            move_uploaded_file($tmpname_word, __DIR__ . "/../../dist/files/asar_files_word/" . $file_name_word);
            mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='انتقال از استان',transporter_to_school_user='$usercode',date_transfer_to_school='$date',vaziatkarnamemadrese='در حال ارزیابی',nobat_arzyabi_madrese='ارزیابی اجمالی',nobat_arzyabi_ostani=null where codeasar='$codeasar'");

            header("location:" . $main_website_url . "attach_file_to_asar.php?filesset&code=$codeasar");
        } else {
            header("location:" . $main_website_url . "attach_file_to_asar.php?findwithname");
        }
    }
}
//end inc attach file type3 for asar

//start change password
elseif (isset($_POST['changepass']) and !empty($_POST['oldpass']) and !empty($_POST['newpass']) and !empty($_POST['usercode'])) {
    $operation = "changepass";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $usercode = $_SESSION['username'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$usercode'");
    foreach ($result as $results) {
    }
    if ($oldpass != $results['password']) {
        header("location:" . $main_website_url . "/../../profile.php?wrongpass");
    } else {
        mysqli_query($connection, "update rater_list set `password`='$newpass' where `username`='$usercode'");
        header("location:" . $main_website_url . "/../../profile.php?passwordset");
    }
}
//end change password

//start upload file of export raters costs
elseif (isset($_POST['uploader']) and !empty($_FILES['uploadexpexcelraterscost']) and !empty($_POST['jashnvareh'])) {
    $operation = "uploader";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    include_once __DIR__ . '/../../config/connection.php';
    $uploader = $_POST['uploader'];
    $jashnvareh = $_POST['jashnvareh'];
    $file_size = $_FILES['uploadcvfile']['size'];
    if ($file_size > 5242880) {
        header("location:" . $main_website_url . "excel_export/excel_export_with_save_payment.php?wrongexpsize");
    } elseif (!file_exists(__DIR__ . "/../../dist/files/expexcelraterscostfiles/" . $_FILES['uploadexpexcelraterscost']["name"])) {
        $filename = $_FILES['uploadexpexcelraterscost']["name"];
        $path = "dist/files/expexcelraterscostfiles/" . $_FILES["uploadexpexcelraterscost"]["name"];
        mysqli_query($connection, "insert into uploadedexportraterscost (jashnvareh,filename,path,date_uploaded,uploader) values ('$jashnvareh','$filename','$path','$date','$uploader')");
        move_uploaded_file($_FILES['uploadexpexcelraterscost']["tmp_name"], __DIR__ . "/../../dist/files/expexcelraterscostfiles/" . $_FILES["uploadexpexcelraterscost"]["name"]);
        header("location:" . $main_website_url . "excel_export/excel_export_with_save_payment.php?expset");
    } else {
        header("location:" . $main_website_url . "excel_export/excel_export_with_save_payment.php?wrong");
    }
}
//end upload file of export raters costs

//start remove from rated ejmali asar
elseif (isset($_POST['removefromrated']) and !empty($_POST['codeasar']) and !empty($_POST['rater_id']) and !empty($_POST['remover'])) {
    $operation = "removefromrated";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasar'];
    $rater_id = $_POST['rater_id'];
    $remover = $_POST['remover'];
    mysqli_query($connection, "update rater_comments_archive set accept_or_reject=NULL,comment=NULL,rate_remover='$remover',remove_rate_date='$date' where `codeasar`='$codeasar' and `rater_id`='$rater_id'");
    header("location:" . $main_website_url . "/../../arzyabi_shode.php?removedasarfromid");
}
//end remove from rated ejmali asar

//start deactivate keshvari rater
elseif (isset($_POST['deactivateaterkeshvari']) and !empty($_POST['ratercode']) and !empty($_POST['remover'])) {
    $operation = "deactivateaterkeshvari";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $ratercode = $_POST['ratercode'];
    $deactivator = $_POST['deactivator'];
    mysqli_query($connection, "update rater_list set type=9,deactivator='$deactivator',date_deactivated='$date' where username='$ratercode' and 'type'=0 and city_name is null");
    header("location:" . $main_website_url . "/../../rater_pages/deactivate_rater.php?deactivated");
} elseif (isset($_POST['deactivateaterkeshvari']) and empty($_POST['ratercode']) and !empty($_POST['remover'])) {
    header("location:" . $main_website_url . "/../../rater_pages/deactivate_rater.php?nullcode");
}
//end deactivate keshvari rater

//start add keshvari rater
elseif (isset($_POST['addraterkeshvari']) and !empty($_POST['adhesive']) and !empty($_POST['code'])) {
    $operation = "addraterkeshvari";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codearzyab = $_POST['code'];
    $namearzyab = $_POST['name'];
    $familyarzyab = $_POST['family'];
    $sathelmiarzyab = $_POST['sath_elmi'];
    $gender = $_POST['gender'];

    @$adabiat = $_POST['adabiat'];
    @$akhlaghtarbiat = $_POST['akhlaghtarbiat'];
    @$hadisderaye = $_POST['hadisderaye'];
    @$falsafe = $_POST['falsafe'];
    @$tafsir = $_POST['tafsir'];
    @$kalaam = $_POST['kalaam'];
    @$ulumensani = $_POST['ulumensani'];
    @$feghh = $_POST['feghh'];
    @$osoolfegh = $_POST['osoolfegh'];
    @$tarikheslam = $_POST['tarikheslam'];
    @$tashihtaligh = $_POST['tashihtaligh'];
    @$tarjome = $_POST['tarjome'];

    $arzyabsamane = 'ارزیاب جشنواره';
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = convertPersianNumbersToEnglish($_POST['password']);
    $accnum = $_POST['acc_number'];
    $bankname = $_POST['bankname'];
    $inputuser = $_POST['adhesive'];

    if ($adabiat == null) {
        $adabiat = NULL;
    }
    if ($akhlaghtarbiat == null) {
        $akhlaghtarbiat = NULL;
    }
    if ($hadisderaye == null) {
        $hadisderaye = NULL;
    }
    if ($falsafe == null) {
        $falsafe = NULL;
    }
    if ($tafsir == null) {
        $tafsir = NULL;
    }
    if ($kalaam == null) {
        $kalaam = NULL;
    }
    if ($ulumensani == null) {
        $ulumensani = NULL;
    }
    if ($feghh == null) {
        $feghh = NULL;
    }
    if ($osoolfegh == null) {
        $osoolfegh = NULL;
    }
    if ($tarikheslam == null) {
        $tarikheslam = NULL;
    }
    if ($bankname == "انتخاب کنید") {
        $bankname = NULL;
    }
    if ($sathelmiarzyab == "انتخاب کنید") {
        $sathelmiarzyab = NULL;
    }
    if ($tashihtaligh == null) {
        $tashihtaligh = NULL;
    }
    if ($tarjome == null) {
        $tarjome = NULL;
    }
    $add = "insert into `rater_list` (`name`,`family`,`code`,`gender`,`sath_elmi`,`adabiat`,`akhlaghtarbiat`,`hadisderaye`,`falsafe`,`tafsir`,`kalaam`,`ulumensani`,`feghh`,`osoolfegh`,`tarikheslam`,`phone`,`address`,`username`,`password`,`account_number`,`bank`,`input_user`,`tashihtaligh`,`tarjome`,`approved`,`subject`,`type`,`date_added`)
                            values ('$namearzyab','$familyarzyab','$codearzyab','$gender','$sathelmiarzyab','$adabiat','$akhlaghtarbiat','$hadisderaye','$falsafe','$tafsir','$kalaam','$ulumensani','$feghh','$osoolfegh','$tarikheslam','$phone','$address','$codearzyab','$password','$accnum','$bankname','$inputuser','$tashihtaligh','$tarjome',1,'$arzyabsamane',0,'$date')";
    mysqli_query($connection, $add);
    header("location:" . $main_website_url . "/../../rater_pages/add_rater.php?successremove");

}
//end add keshvari rater

//start remove asar from rater keshvari panel ejmali
elseif (isset($_POST['rfek']) and !empty($_POST['asarcode']) and !empty($_POST['ratercode'])) {
    $operation = "rfek";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $rater = $_POST['ratercode'];
    mysqli_query($connection, "delete from rater_comments_archive where `codeasar`='$codeasar' and `rater_id`='$rater'");
    header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?removedasarfromid");
}
//end remove asar from rater keshvari panel ejmali

//start remove asar from rater keshvari panel tafsili1
elseif (isset($_POST['rft1k']) and !empty($_POST['asarcode'])) {
    $operation = "rft1k";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili1 is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili1=null,tarikhtahvilasar1=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili1'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?wrongrem");
    }
}
//end remove asar from rater keshvari panel tafsili1

//start remove asar from rater keshvari panel tafsili2
elseif (isset($_POST['rft2k']) and !empty($_POST['asarcode'])) {
    $operation = "rft2k";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili2 is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili2=null,tarikhtahvilasar2=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili2'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?wrongrem");
    }
}
//end remove asar from rater keshvari panel tafsili2

//start remove asar from rater keshvari panel tafsili3
elseif (isset($_POST['rft3k']) and !empty($_POST['asarcode'])) {
    $operation = "rft3k";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili3 is not null");
    foreach ($query as $item) {
    }
    if ($item['codeasar'] != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null,tarikhtahvilasar3=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili3'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?wrongrem");
    }
}
//end remove asar from rater keshvari panel tafsili3

//start remove asar from rater ostani panel ejmali
elseif (isset($_POST['rfeo']) and !empty($_POST['asarcode'])) {
    $operation = "rfeo";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabejmali_ostani is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabejmali_ostani=null,tahvilasararzyabiejmali_ostani=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?removedasarfromid");
    } elseif ($item['codearzyabejmali_ostani'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?wrongrem");
    }
}
//end remove asar from rater ostani panel ejmali

//start remove asar from rater ostani panel tafsili1
elseif (isset($_POST['rft1o']) and !empty($_POST['asarcode'])) {
    $operation = "rft1o";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili1_ostani is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili1_ostani=null,tahvilasararzyabitafsili1_ostani=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili1_ostani'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?wrongrem");
    }
}
//end remove asar from rater ostani panel tafsili1

//start remove asar from rater ostani panel tafsili2
elseif (isset($_POST['rft2o']) and !empty($_POST['asarcode'])) {
    $operation = "rft2o";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili2_ostani is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili2_ostani=null,tahvilasararzyabitafsili2_ostani=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili2_ostani'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?wrongrem");
    }
}
//end remove asar from rater ostani panel tafsili2

//start remove asar from rater ostani panel tafsili3
elseif (isset($_POST['rft3o']) and !empty($_POST['asarcode'])) {
    $operation = "rft3o";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili3_ostani is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null,tahvilasararzyabitafsili3_ostani=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili3_ostani'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?wrongrem");
    }
}
//end remove asar from rater ostani panel tafsili3

//start remove asar from rater ostani panel ejmali
elseif (isset($_POST['rfem']) and !empty($_POST['asarcode'])) {
    $operation = "rfem";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabejmali_madrese is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabejmali_madrese=null,tahvilasararzyabiejmali_madrese=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?removedasarfromid");
    } elseif ($item['codearzyabejmali_madrese'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_ejmali.php?wrongrem");
    }
}
//end remove asar from rater ostani panel ejmali

//start remove asar from rater ostani panel tafsili1
elseif (isset($_POST['rft1m']) and !empty($_POST['asarcode'])) {
    $operation = "rft1m";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili1_madrese is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili1_madrese=null,tahvilasararzyabitafsili1_madrese=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili1_madrese'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili1.php?wrongrem");
    }
}
//end remove asar from rater ostani panel tafsili1

//start remove asar from rater ostani panel tafsili2
elseif (isset($_POST['rft2m']) and !empty($_POST['asarcode'])) {
    $operation = "rft2m";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili2_madrese is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili2_madrese=null,tahvilasararzyabitafsili2_madrese=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili2_madrese'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili2.php?wrongrem");
    }
}
//end remove asar from rater ostani panel tafsili2

//start remove asar from rater ostani panel tafsili3
elseif (isset($_POST['rft3m']) and !empty($_POST['asarcode'])) {
    $operation = "rft3m";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['asarcode'];
    $query = mysqli_query($connection, "Select codeasar from etelaat_a where codeasar='$codeasar' and codearzyabtafsili3_madrese is not null");
    foreach ($query as $item) {
    }
    if ($item != null) {
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null,tahvilasararzyabitafsili3_madrese=null where codeasar='$codeasar'");
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?removedasarfromid");
    } elseif ($item['codearzyabtafsili3_madrese'] == null) {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?raternotfound");
    } else {
        header("location:" . $main_website_url . "/../../set_asar_for_rater_tafsili3.php?wrongrem");
    }

}
//end remove asar from rater ostani panel tafsili3


//start admin manager
//start country admins
//start add
elseif (isset($_POST['setadmin']) and !empty($_POST['username'])) {
    $operation = "setadmin";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeadmin = convertPersianNumbersToEnglish($_POST['username']);
    $nameadmin = $_POST['name'];
    $familyadmin = $_POST['family'];
    $useradmin = convertPersianNumbersToEnglish($_POST['username']);
    $phone = $_POST['phone'];
    $codemelli = $_POST['codemelli'];
    $password = convertPersianNumbersToEnglish($_POST['password']);
    $inputuser = $_SESSION['username'];
    $karshenas = 'کارشناس سامانه';
    $subject = $_POST['subject'];
    $ratercode = convertPersianNumbersToEnglish($_POST['username']);
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=1");
    foreach ($result as $results) {
    }
    if (empty($results['username'])) {
        $add = "insert into `rater_list` (`name`,`family`,`code`,`phone`,`username`,`password`,`input_user`,`type`,`subject`,approved,date_added)
                                                    values ('$nameadmin','$familyadmin','$codeadmin','$phone','$useradmin','$password','$inputuser',1,'$karshenas',1,'$date')";
        mysqli_query($connection, $add);
        header("location:" . $main_website_url . "/../../admin_manager.php?successadded");
    } else {
        header("location:" . $main_website_url . "/../../admin_manager.php?wasfound");
    }
}
//end add
//start disable
elseif (isset($_POST['disableadmin']) and !empty($_POST['keshvariadmincode'])) {
    $operation = "disableadmin";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $editor = $_POST['codeeditor'];
    $ratercode = $_POST['keshvariadmincode'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=1");
    foreach ($result as $results) {
    }
    if (!empty($results['username'])) {
        mysqli_query($connection, "update rater_list set approved=0,deactivator='$editor',date_deactivated='$date' where `code`='$ratercode'");
        header("location:" . $main_website_url . "/../../admin_manager.php?disabled");
    } elseif (empty($ratercode)) {
        header("location:" . $main_website_url . "/../../admin_manager.php?nullcode");
    } else {
        header("location:" . $main_website_url . "/../../admin_manager.php?notfound");
    }
}
//end disable
//start enable
elseif (isset($_POST['enableadmin']) and !empty($_POST['keshvariadmincode'])) {
    $operation = "enableadmin";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $editor = $_POST['codeeditor'];
    $ratercode = $_POST['keshvariadmincode'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=1");
    foreach ($result as $results) {
    }
    if (!empty($results['username'])) {
        mysqli_query($connection, "update rater_list set approved=1,deactivator='$editor',date_deactivated='$date' where `code`='$ratercode'");
        header("location:" . $main_website_url . "/../../admin_manager.php?enabled");
    } elseif (empty($ratercode)) {
        header("location:" . $main_website_url . "/../../admin_manager.php?nullcode");
    } else {
        header("location:" . $main_website_url . "/../../admin_manager.php?notfound");
    }
}
//end enable
//end country admins
//start state admins
//start add
elseif (isset($_POST['setadminostani']) and !empty($_POST['username'])) {
    $operation = "setadminostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $nameadmin = $_POST['name'];
    $familyadmin = $_POST['family'];
    $useradmin = convertPersianNumbersToEnglish($_POST['username']);
    $phone = $_POST['phone'];
    $state = $_POST['state_custom'];
    $password = convertPersianNumbersToEnglish($_POST['password']);
    $inputuser = $_SESSION['username'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $activation_status = $_POST['activation_status'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$useradmin'");
    foreach ($result as $results) {
    }
    if (empty($results['username'])) {
        $add = "insert into `rater_list` (`name`,`family`,`code`,`phone`,`username`,`password`,`gender`,`input_user`,`type`,`subject`,approved,date_added,codemelli,city_name)
                            values ('$nameadmin','$familyadmin','$useradmin','$phone','$useradmin','$password','$gender','$inputuser',2,'$subject','$activation_status','$date','$useradmin','$state')";
        mysqli_query($connection, $add);
        header("location:" . $main_website_url . "/../../ostani_admins.php?successadded");
    } else {
        header("location:" . $main_website_url . "/../../ostani_admins.php?wasfound");
    }
}
//end add
//start edit
elseif (isset($_POST['editadminostani']) and !empty($_POST['username'])) {
    $operation = "editadminostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $username = convertPersianNumbersToEnglish($_POST['username']);
    $nameadmin = $_POST['name'];
    $familyadmin = $_POST['family'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $state = $_POST['state_custom'];
    $user_status = $_POST['user_status'];
    $activation_status = $_POST['activation_status'];
    switch ($user_status) {
        case 0:
            $subject = 'ارزیاب جشنواره';
            break;
        case 2:
            $subject = 'دبیر جشنواره استان';
            break;
        case 3:
            $subject = 'دبیر مدرسه ای جشنواره';
            break;
    }
    $editor = $_SESSION['username'];
    $edit = "update rater_list set name='$nameadmin',family='$familyadmin',gender='$gender',phone='$phone',
                        city_name='$state',type='$user_status',subject='$subject',
                        approved='$activation_status',editor='$editor',date_edited='$datewithtime' where username='$username'";
    mysqli_query($connection, $edit);
    header("location:" . $main_website_url . "/../../ostani_admins.php?successedited&username=$username");
}
//end edit
//start deactive
elseif (isset($_POST['disableadminostani']) and !empty($_POST['disablecode'])) {
    $operation = "disableadminostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $editor = $_POST['codeeditor'];
    $ratercode = $_POST['disablecode'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=2");
    foreach ($result as $results) {
    }
    if (!empty($results['username'])) {
        mysqli_query($connection, "update rater_list set approved=0,deactivator='$editor',date_deactivated='$date' where code='$ratercode'");
        header("location:" . $main_website_url . "/../../ostani_admins.php?successdisabled");
    } elseif (empty($ratercode)) {
        header("location:" . $main_website_url . "/../../ostani_admins.php?nullcode");
    } else {
        header("location:" . $main_website_url . "/../../ostani_admins.php?notfound");
    }
}
//end deactive
//start active
elseif (isset($_POST['enableadminostani']) and !empty($_POST['disablecode'])) {
    $operation = "enableadminostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $editor = $_POST['codeeditor'];
    $ratercode = $_POST['disablecode'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=2");
    foreach ($result as $results) {
    }
    if (!empty($results['username'])) {
        mysqli_query($connection, "update rater_list set approved=1,deactivator='$editor',date_deactivated='$date' where code='$ratercode'");
        mysqli_query($connection, "update rater_list set approved=1,deactivator='$editor',date_deactivated='$date' where code='$ratercode'");
        header("location:" . $main_website_url . "/../../ostani_admins.php?successenabled");
    } elseif (empty($ratercode)) {
        header("location:" . $main_website_url . "/../../ostani_admins.php?nullcode");
    } else {
        header("location:" . $main_website_url . "/../../ostani_admins.php?notfound");
    }
}
//end active
//end state admins
//start school admins
//start add
elseif (isset($_POST['setadminmadrese']) and !empty($_POST['username'])) {
    $operation = "setadminmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeadmin = convertPersianNumbersToEnglish($_POST['username']);
    $nameadmin = $_POST['name'];
    $familyadmin = $_POST['family'];
    $useradmin = convertPersianNumbersToEnglish($_POST['username']);
    $phone = $_POST['phone'];
    $state = $_POST['state_custom'];
    $shahr = $_POST['city_custom'];
    $school = $_POST['school_custom'];
    $password = convertPersianNumbersToEnglish($_POST['password']);
    $inputuser = $_SESSION['username'];
    $gender = $_POST['gender'];
    $subject = $_POST['subject'];
    $ratercode = convertPersianNumbersToEnglish($_POST['username']);
    $subject = 'دبیر مدرسه ای جشنواره';
    $activation_status = $_POST['activation_status'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode'");
    foreach ($result as $results) {
    }
    if (empty($results['username'])) {
        $add = "insert into `rater_list` (`name`,`family`,`code`,`gender`,`phone`,`username`,`password`,`input_user`,`type`,`subject`,approved,date_added,codemelli,shahr_name,school_name,city_name)
                                                    values ('$nameadmin','$familyadmin','$ratercode','$gender','$phone','$ratercode','$password','$inputuser',3,'$subject','$activation_status','$date','$ratercode','$shahr','$school','$state')";
        if (mysqli_query($connection, $add)) {
            header("location:" . $main_website_url . "/../../madrese_admins.php?successadded&codemelli=$ratercode");
        }
    } else {
        header("location:" . $main_website_url . "/../../madrese_admins.php?wasfound");
    }
}
//end add
//start edit
elseif (isset($_POST['editadminmadrese']) and !empty($_POST['username'])) {
    $operation = "editadminmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $username = convertPersianNumbersToEnglish($_POST['username']);
    $nameadmin = $_POST['name'];
    $familyadmin = $_POST['family'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $state = $_POST['state_custom'];
    $city = $_POST['city_custom'];
    $school = $_POST['school_custom'];
    $user_status = $_POST['user_status'];
    $activation_status = $_POST['activation_status'];
    switch ($user_status) {
        case 0:
            $subject = 'ارزیاب جشنواره';
            break;
        case 2:
            $subject = 'دبیر جشنواره استان';
            break;
        case 3:
            $subject = 'دبیر مدرسه ای جشنواره';
            break;
    }
    $editor = $_SESSION['username'];
    $edit = "update rater_list set name='$nameadmin',family='$familyadmin',gender='$gender',phone='$phone',
                        city_name='$state',shahr_name='$city',school_name='$school',type='$user_status',
                        approved='$activation_status',subject='$subject',editor='$editor',date_edited='$datewithtime' where username='$username'";
    mysqli_query($connection, $edit);
    header("location:" . $main_website_url . "/../../madrese_admins.php?successedited&username=$username");
}
//end edit
//start deactive
elseif (isset($_POST['disableadminmadrese']) and !empty($_POST['disablecode'])) {
    $operation = "disableadminmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $editor = $_POST['codeeditor'];
    $ratercode = $_POST['disablecode'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=3");
    foreach ($result as $results) {
    }
    if (!empty($results['username'])) {
        mysqli_query($connection, "update rater_list set approved=0,deactivator='$editor',date_deactivated='$date' where code='$ratercode'");
        header("location:" . $main_website_url . "/../../madrese_admins.php?successdisabled");
    } elseif (empty($ratercode)) {
        header("location:" . $main_website_url . "/../../madrese_admins.php?nullcode");
    } else {
        header("location:" . $main_website_url . "/../../madrese_admins.php?notfound");
    }
}
//end deactive
//start active
elseif (isset($_POST['enableadminmadrese']) and !empty($_POST['disablecode'])) {
    $operation = "enableadminmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $editor = $_POST['codeeditor'];
    $ratercode = $_POST['disablecode'];
    $result = mysqli_query($connection, "select * from rater_list where `code`='$ratercode' and `type`=3");
    foreach ($result as $results) {
    }
    if (!empty($results['username'])) {
        mysqli_query($connection, "update rater_list set approved=1,deactivator='$editor',date_deactivated='$date' where code='$ratercode'");
        header("location:" . $main_website_url . "/../../madrese_admins.php?successdisabled");
    } elseif (empty($ratercode)) {
        header("location:" . $main_website_url . "/../../madrese_admins.php?nullcode");
    } else {
        header("location:" . $main_website_url . "/../../madrese_admins.php?notfound");
    }
}
//end active
//end school admins
//end admin manager


//start set ejmali keshvari
elseif (isset($_POST['setejmali']) && isset($_POST['codeasarfield'])) {
    $operation = "setejmali";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasarfield'];
    $query = mysqli_query($connection, "select * from t_a_ejmali where codeasar='$codeasar'");
    if (mysqli_num_rows($query)==0) {
        mysqli_query($connection, "insert into t_a_ejmali (codeasar) values ('$codeasar')");
    }
    $comment = $_POST['nazar'];
    switch ($comment) {
        case 'راه‌یابی اثر به مرحله تفصیلی':
            $t1 = 13;
            $t2 = 4;
            $t3 = 4;
            $t4 = 8;
            $t5 = 8;
            $t6 = 25;
            $t7 = 10;
            $t8 = 4;
            $t9 = 4;
            $jamnomre = 80;
            break;
        case 'توقف اثر در مرحله اجمالی':
            $t1 = 12;
            $t2 = 3;
            $t3 = 3;
            $t4 = 6;
            $t5 = 7;
            $t6 = 22;
            $t7 = 10;
            $t8 = 3;
            $t9 = 3;
            $jamnomre = 69;
            break;
    }
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $query = "update `t_a_ejmali` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                        tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                        parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                        tarikhsabt_day='$day',tarikhsabt_month='$month',tarikhsabt_year='$year',
                        secsabt='$sec',minsabt='$min',hoursabt='$hour',rater_id='$user'
                        where codeasar='$codeasar' ";
    mysqli_query($connection, $query);
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabi`='$date',codearzyabejmali='$user' where `codeasar`='$codeasar'");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "insert into `tafsili2` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی دوم',vaziatkarname='در حال ارزیابی' WHERE codeasar='$codeasar'");
    } else if ($jamnomre < 75) {
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='اجمالی ردی',vaziatkarname='اتمام ارزیابی' WHERE codeasar='$codeasar'");
    }
    header("location:" . $main_website_url . "ejmali_list.php?ejmaliregistrated");
}
//end set ejmali keshvari

//start ejmali ostani rater
elseif (isset($_POST['setejmaliostani']) && !empty($_POST['codeasarfield'])) {
    $operation = "setejmaliostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasarfield'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $t9 = $_POST['t9'];
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $jamnomre = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7 + $t8 + $t9;
    $checkEjmaliOstan = mysqli_query($connection, "select * from ejmali_ostan where codeasar = $codeasar");
    if (mysqli_num_rows($checkEjmaliOstan) < 1) {
        mysqli_query($connection, "insert into ejmali_ostan(codeasar) values ('$codeasar')");
    }
    mysqli_query($connection, "update `ejmali_ostan` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                        tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                        parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                        tarikhsabt_day='$day',tarikhsabt_month='$month',tarikhsabt_year='$year',
                        secsabt='$sec',minsabt='$min',hoursabt='$hour',rater_id='$user'
                        where `codeasar`='$codeasar' ");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1_ostan` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی اول' WHERE codeasar='$codeasar'");

    } elseif ($jamnomre < 75) {
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='اجمالی ردی',vaziatkarnameostani='اتمام ارزیابی' WHERE codeasar='$codeasar'");
    }
    header("location: ../../panel.php?ejmaliregistrated");
}
//end ejmali ostan rater

//start ejmali madrese rater
elseif (isset($_POST['setejmalimadrese']) && !empty($_POST['codeasarfield'])) {
    $operation = "setejmalimadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasarfield'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $t9 = $_POST['t9'];
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $jamnomre = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7 + $t8 + $t9;
    $checkEjmaliMadrese = mysqli_query($connection, "select * from ejmali_madrese where codeasar = $codeasar");
    if (mysqli_num_rows($checkEjmaliMadrese) < 1) {
        mysqli_query($connection, "insert into ejmali_madrese(codeasar) values ('$codeasar')");
    }
    mysqli_query($connection, "update `ejmali_madrese` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                        tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                        parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                        tarikhsabt_day='$day',tarikhsabt_month='$month',tarikhsabt_year='$year',
                        secsabt='$sec',minsabt='$min',hoursabt='$hour',rater_id='$user'
                        where `codeasar`='$codeasar' ");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1_madrese` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی اول',vaziatkarnamemadrese='در حال ارزیابی',codearzyabejmali_madrese='$user' WHERE codeasar='$codeasar'");
    } elseif ($jamnomre < 75) {
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=null,nobat_arzyabi_madrese='اجمالی ردی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی',bargozideh_madrese='نمی باشد',codearzyabejmali_madrese='$user' WHERE codeasar='$codeasar'");
    }
    header("location:" . $main_website_url . "panel.php?ejmaliregistrated");
}
//end ejmali madrese rater

//start ejmali ostani rater
elseif (isset($_POST['setejmalidabirostan']) && !empty($_POST['codeasarfield'])) {
    $operation = "setejmalidabirostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
//	echo '<pre>';
//	print_r($_POST);
//	echo '</pre>';
    $codeasar = $_POST['codeasarfield'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $t9 = $_POST['t9'];
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $jamnomre = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7 + $t8 + $t9;
    mysqli_query($connection, "insert into ejmali_ostan(codeasar) values ('$codeasar')");
    mysqli_query($connection, "update `ejmali_ostan` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                    tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                    parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                    tarikhsabt_day='$day',tarikhsabt_month='$month',tarikhsabt_year='$year',
                    secsabt='$sec',minsabt='$min',hoursabt='$hour',rater_id='$user'
                    where `codeasar`='$codeasar' ");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1_ostan` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی اول',codearzyabejmali_ostani='$user' WHERE codeasar='$codeasar'");

    } elseif ($jamnomre < 75) {
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='اجمالی ردی',vaziatkarnameostani='اتمام ارزیابی',codearzyabejmali_ostani='$user' WHERE codeasar='$codeasar'");
    }
    header("location:" . $main_website_url . "ejmali_list.php?ejmaliregistrated");
}
//end ejmali ostan rater

//start ejmali madrese rater
elseif (isset($_POST['setejmalidabirmadrese']) && !empty($_POST['codeasarfield'])) {
    $operation = "setejmalidabirmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasarfield'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $t9 = $_POST['t9'];
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $jamnomre = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7 + $t8 + $t9;
    mysqli_query($connection, "insert into ejmali_madrese(codeasar) values ('$codeasar')");
    mysqli_query($connection, "update `ejmali_madrese` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                    tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                    parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                    tarikhsabt_day='$day',tarikhsabt_month='$month',tarikhsabt_year='$year',
                    secsabt='$sec',minsabt='$min',hoursabt='$hour',rater_id='$user'
                    where `codeasar`='$codeasar' ");
    mysqli_query($connection, "update etelaat_a set codearzyabejmali_madrese='$user' where codeasar='$codeasar'");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1_madrese` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی اول',vaziatkarnamemadrese='در حال ارزیابی' WHERE codeasar='$codeasar'");
    } elseif ($jamnomre < 75) {
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='اجمالی ردی',vaziatkarnamemadrese='اتمام ارزیابی' WHERE codeasar='$codeasar'");
    }
    header("location:" . $main_website_url . "ejmali_list.php?ejmaliregistrated");
}
//end ejmali madrese rater

//start edit ejmali ostani
elseif (isset($_POST['editeo']) && !empty($_POST['codeasarfield'])) {
    $operation = "editejmalidabirostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasarfield'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $t9 = $_POST['t9'];
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $jamnomre = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7 + $t8 + $t9;
    mysqli_query($connection, "update `ejmali_ostan` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                    tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                    parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                    edit_date='$datewithtime',editor='$user'
                    where `codeasar`='$codeasar' ");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1_ostan` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی اول',vaziatkarnameostani='در حال ارزیابی' WHERE codeasar='$codeasar'");

    } elseif ($jamnomre < 75) {
        mysqli_query($connection, "delete from tafsili1_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='اجمالی ردی',vaziatkarnameostani='اتمام ارزیابی' WHERE codeasar='$codeasar'");
    }
    header("location:" . $main_website_url . "ejmali_edit.php?ejmaliregistrated");
}
//end edit ejmali ostani

//start edit ejmali madrese
elseif (isset($_POST['editem']) && !empty($_POST['codeasarfield'])) {
    $operation = "editejmalidabirmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $codeasar = $_POST['codeasarfield'];
    $t1 = $_POST['t1'];
    $t2 = $_POST['t2'];
    $t3 = $_POST['t3'];
    $t4 = $_POST['t4'];
    $t5 = $_POST['t5'];
    $t6 = $_POST['t6'];
    $t7 = $_POST['t7'];
    $t8 = $_POST['t8'];
    $t9 = $_POST['t9'];
    $tozih = $_POST['tozihat'];
    $user = $_SESSION['username'];
    $jamnomre = $t1 + $t2 + $t3 + $t4 + $t5 + $t6 + $t7 + $t8 + $t9;
    mysqli_query($connection, "update `ejmali_madrese` set reayatsakhtarasar='$t1',shivaeematn='$t2',reayataeinnegaresh='$t3',
                    tabiinmasale='$t4',manabemotabar='$t5',ghabeliatelmiasar='$t6',sazmandehimabahes='$t7',
                    parhizazmatalebzaed='$t8',keyfiatjambandi='$t9',tozihat='$tozih',jam='$jamnomre',
                    edit_date='$datewithtime',editor='$user'
                    where `codeasar`='$codeasar' ");
    if ($jamnomre >= 75) {
        mysqli_query($connection, "insert into `tafsili1_madrese` (`codeasar`) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی اول',vaziatkarnamemadrese='در حال ارزیابی' WHERE codeasar='$codeasar'");
    } elseif ($jamnomre < 75) {
        mysqli_query($connection, "delete from tafsili1_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='اجمالی ردی',vaziatkarnamemadrese='اتمام ارزیابی' WHERE codeasar='$codeasar'");
    }
    header("location:" . $main_website_url . "ejmali_edit.php?ejmaliregistrated");
}
//end edit ejmali madrese



//start approve raters
elseif (isset($_POST['set_approved']) and !empty($_POST['city_name'])) {
    $operation = "set_approved";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $city = $_POST['city_name'];
    $user = $_SESSION['username'];
    mysqli_query($connection, "update rater_list set approved=1,editor='$user',date_edited='$date' where city_name='$city' and approved=2");
    header("location:" . $main_website_url . "/../../panel.php?successapproved&city=$city");
}
//end approve raters

//start redirect
elseif (isset($_POST['makenewpage']) and !empty($_POST['pageaddress'])) {
    $address = $_POST['pageaddress'];
    $operation = "redirectpageaddress($address)";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    header("location:" . $main_website_url . "../../$address");
}
//end redirect

//start disable ostani rater
elseif (!empty($_POST['disableostanirater']) and isset($_POST['ratercode'])) {
    $ratercode = $_POST['ratercode'];
    mysqli_query($connection, "update rater_list set approved=0 where code='$ratercode'");
    header("location:" . $main_website_url . "/../../rater_pages/add_rater_ostani.php?disabled&code=$ratercode");
}
//end disable ostani rater

//start enable ostani rater
elseif (!empty($_POST['enableostanirater']) and isset($_POST['ratercode'])) {
    $ratercode = $_POST['ratercode'];
    mysqli_query($connection, "update rater_list set approved=1 where code='$ratercode'");
    header("location:" . $main_website_url . "/../../rater_pages/add_rater_ostani.php?enabled&code=$ratercode");
}
//end enable ostani rater

//start remove ostani admin
elseif (!empty($_POST['removeostaniadmin']) and isset($_POST['disablecode'])) {
    $ratercode = $_POST['disablecode'];
    mysqli_query($connection, "update rater_list set approved=0,type=8 where code='$ratercode'");
    header("location:" . $main_website_url . "/../../ostani_admins.php?removed&code=$ratercode");
}
//end remove ostani admin

//start remove ostani admin
elseif (!empty($_POST['removemadreseadmin']) and isset($_POST['disablecode'])) {
    $ratercode = $_POST['disablecode'];
    mysqli_query($connection, "update rater_list set approved=0,type=8 where code='$ratercode'");
    header("location:" . $main_website_url . "/../../madrese_admins.php?removed&code=$ratercode");
} //end remove ostani admin

else {
    header("location:" . $main_website_url . "panel.php?wronglink");
}