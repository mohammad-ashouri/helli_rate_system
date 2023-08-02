<?php
ini_set('display_errors', 1);
include_once '../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$folderName = date("Y-m-d_H-i-s");

//start paziresh
if (isset($_POST['paziresh']) and !empty($_POST['codeasarfield']) and !empty($_SESSION['username'])) {
    $operation = "paziresh";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
//start table 1

    $codeasar = $_POST['codeasarfield'];
    $asarname = $_POST['asarname'];
    $noefaaliat = $_POST['noefaaliat'];
    $ghalebpazhouhesh = $_POST['ghalebpazhouhesh'];
    $satharzyabi = $_POST['satharzyabi'];
    $elmigroup = $_POST['elmigroup'];
    $noepazhouhesh = $_POST['noepazhoohesh'];
    $vaziatnashr = $_POST['vaziatnashr'];
    $vaziatpazireshasar = $_POST['vaziatnashr'];
    $tedadsafhe = $_POST['tedadsafhe'];
    $bakhshvizheh = $_POST['bakhshvizheh'];
    $vaziatpazireshasar = $_POST['vaziatpaziresh'];
    $sharayetavvaliehsherkatasar = $_POST['sharayetavalieh'];
    $ellat = $_POST['ellat'];
    $vaziatmadreseasar = $_POST['vaziatmadreseasar'];
    $bargozideh_madrese = $_POST['bargozideh_madrese'];
    $jamemtiazmadrese = $_POST['jamemtiazmadrese'];
    $vaziatostaniasar = $_POST['vaziatostani'];
    $bargozideh_ostani = $_POST['bargozideh_ostani'];
    $approve_sianat = $_POST['approve_sianat'];
    $jamemtiazostan = $_POST['jamemtiazostan'];
    $bargozidehkeshvariasar = $_POST['bargozidehkeshvari'];
    $emtiaznahaei = $_POST['emtiaznahaei'];
    $karbar = $_SESSION['username'];
    $bargozidehkeshvari = $_POST['bargozidehkeshvari'];
    if ($ghalebpazhouhesh == 'انتخاب کنید') {
        $ghalebpazhouhesh = null;
    }
    if ($elmigroup == 'انتخاب کنید') {
        $elmigroup = null;
    }
    if ($bargozidehkeshvariasar == "") {
        $bargozidehkeshvariasar = NULL;
    }
    if ($sharayetavvaliehsherkatasar == "انتخاب کنید") {
        $sharayetavvaliehsherkatasar = NULL;
    }
    if ($ellat == "انتخاب کنید") {
        $ellatasar = null;
    }
    if ($vaziatpazireshasar == "انتخاب کنید") {
        $vaziatpazireshasar = NULL;
    }
    if ($vaziatostaniasar == "انتخاب کنید") {
        $vaziatostaniasar = NULL;
    }
    if ($bargozideh_madrese == '') {
        $bargozideh_madrese = NULL;
    }
    if ($bargozideh_ostani == '') {
        $bargozideh_ostani = NULL;
    }
    if ($approve_sianat == '') {
        $approve_sianat = NULL;
    }

    if ($bargozidehkeshvari == '') {
        $bargozidehkeshvari = NULL;
    }
    if (is_numeric($emtiaznahaei) != 1) {
        $emtiaznahaei = NULL;
    }
    if (is_numeric($jamemtiazmadrese) != 1) {
        $jamemtiazmadrese = NULL;
    }
    if (is_numeric($jamemtiazostan) != 1) {
        $jamemtiazostan = NULL;
    }
    mysqli_query($connection, "update `etelaat_a` set
                   nameasar='$asarname',
                   noefaaliat='$noefaaliat',
                   ghalebpazhouhesh='$ghalebpazhouhesh',
                   satharzyabi='$satharzyabi',
                   groupelmi='$elmigroup',
                   noepazhouhesh='$noepazhouhesh',
                   vaziatnashr='$vaziatnashr',
                   tedadsafhe='$tedadsafhe',
                   bakhshvizheh='$bakhshvizheh',
                   vaziatpazireshasar='$vaziatpazireshasar',
                   sharayetavalliehsherkat='$sharayetavvaliehsherkatasar',
                   ellatnadashtansharayet='$ellat',
                    emtiaznahaei='$emtiaznahaei',
                    jamemtiazmadrese='$jamemtiazmadrese',
                   vaziatmadreseasar='$vaziatmadreseasar',
                   bargozideh_madrese='$bargozideh_madrese',
                   vaziatostaniasar='$vaziatostaniasar',
                   bargozideh_ostani='$bargozideh_ostani',
                   approve_sianat='$approve_sianat',
                   jamemtiazostan='$jamemtiazostan',
                   bargozidehkeshvari='$bargozidehkeshvari',
                   karbar='$karbar',
                   edit_date='$datewithtime' where codeasar='$codeasar'");
//end table 1
//	//start table 2
    $fname = $_POST['fname'];
    $family = $_POST['family'];
    $father_name = $_POST['father_name'];
    $codemelli = $_POST['codemelli'];
    $tarikhtavallod = $_POST['tarikhtavallod'];
    $gender = $_POST['gender'];
    $vaziattaahol = $_POST['vaziattaahol'];
    $state_custom = $_POST['state_custom'];
    $city_custom = $_POST['city_custom'];
    $madrese = $_POST['madrese'];
    $mobile = $_POST['mobile'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $paye = $_POST['paye'];
    $sath = $_POST['sath'];
    $term = $_POST['term'];
    $email = $_POST['email'];
    $meliat = $_POST['meliat'];
    $namekeshvar = $_POST['namekeshvar'];
    $gozarname = $_POST['gozarname'];
    $reshtetakhasosihozavi = $_POST['reshtetakhasosihozavi'];
    $markaztakhasosihozavi = $_POST['markaztakhasosihozavi'];
    $namemarkaztahsili = $_POST['namemarkaztahsili'];
    $noetahsilathozavi = $_POST['noetahsilathozavi'];
    $tahsilatghhozavi = $_POST['tahsilatghhozavi'];
    $reshtedaneshgahi = $_POST['reshtedaneshgahi'];
    $shparvandetahsili = $_POST['shparvandetahsili'];
    $salakhzmadrakghhozavi = $_POST['salakhzmadrakghhozavi'];
    $master = $_POST['master'];
    $mastercode = $_POST['mastercode'];
    mysqli_query($connection, "update etelaat_p set fname='$fname',family='$family',father_name='$father_name',codemelli='$codemelli',tarikhtavallod='$tarikhtavallod',
									gender='$gender',vaziattaahol='$vaziattaahol',ostantahsili='$state_custom',shahrtahsili='$city_custom',madrese='$madrese',
									mobile='$mobile',telephone='$telephone',address='$address',paye='$paye',sath='$sath',term='$term',email='$email',
									meliat='$meliat',namekeshvar='$namekeshvar',gozarname='$gozarname',reshtetakhasosihozavi='$reshtetakhasosihozavi',
									markaztakhasosihozavi='$markaztakhasosihozavi',namemarkaztahsili='$namemarkaztahsili',noetahsilathozavi='$noetahsilathozavi',
									tahsilatghhozavi='$tahsilatghhozavi',reshtedaneshgahi='$reshtedaneshgahi',shparvandetahsili='$shparvandetahsili',
									salakhzmadrakghhozavi='$salakhzmadrakghhozavi',master='$master',mastercode='$mastercode' where codeasar='$codeasar'");
//end table 2
//start table 3
    $nobat_arzyabi_madrese = $_POST['nobat_arzyabi_madrese'];
    $codearzyabejmali_madrese = $_POST['codearzyabejmali_madrese'];
    $codearzyabtafsili1_madrese = $_POST['codearzyabtafsili1_madrese'];
    $codearzyabtafsili2_madrese = $_POST['codearzyabtafsili2_madrese'];
    $codearzyabtafsili3_madrese = $_POST['codearzyabtafsili3_madrese'];
    $vaziatkarnamemadrese = $_POST['vaziatkarnamemadrese'];
    if ($nobat_arzyabi_madrese == '' or $nobat_arzyabi_madrese == NULL) {
        $nobat_arzyabi_madrese = NULL;
    }
    if ($codearzyabejmali_madrese == '') {
        $codearzyabejmali_madrese = NULL;
    }
    if ($codearzyabtafsili1_madrese == '') {
        $codearzyabtafsili1_madrese = NULL;
    }
    if ($codearzyabtafsili2_madrese == '') {
        $codearzyabtafsili2_madrese = NULL;
    }
    if ($codearzyabtafsili3_madrese == '') {
        $codearzyabtafsili3_madrese = NULL;
    }
    if ($vaziatkarnamemadrese == '') {
        $vaziatkarnamemadrese = NULL;
    }
    mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='$nobat_arzyabi_madrese',codearzyabejmali_madrese='$codearzyabejmali_madrese',codearzyabtafsili1_madrese='$codearzyabtafsili1_madrese',codearzyabtafsili2_madrese='$codearzyabtafsili2_madrese',codearzyabtafsili3_madrese='$codearzyabtafsili3_madrese',vaziatkarnamemadrese='$vaziatkarnamemadrese' where codeasar='$codeasar'");
//end table 3
//start table 4
    $nobat_arzyabi_ostani = $_POST['nobat_arzyabi_ostani'];
    $codearzyabejmali_ostani = $_POST['codearzyabejmali_ostani'];
    $codearzyabtafsili1_ostani = $_POST['codearzyabtafsili1_ostani'];
    $codearzyabtafsili2_ostani = $_POST['codearzyabtafsili2_ostani'];
    $codearzyabtafsili3_ostani = $_POST['codearzyabtafsili3_ostani'];
    $vaziatkarnameostani = $_POST['vaziatkarnameostani'];
    if ($nobat_arzyabi_ostani == '' or $nobat_arzyabi_ostani == NULL) {
        $nobat_arzyabi_ostani = NULL;
    }
    if ($codearzyabejmali_ostani == '') {
        $codearzyabejmali_ostani = NULL;
    }
    if ($codearzyabtafsili1_ostani == '') {
        $codearzyabtafsili1_ostani = NULL;
    }
    if ($codearzyabtafsili2_ostani == '') {
        $codearzyabtafsili2_ostani = NULL;
    }
    if ($codearzyabtafsili3_ostani == '') {
        $codearzyabtafsili3_ostani = NULL;
    }
    if ($vaziatkarnameostani == '') {
        $vaziatkarnameostani = NULL;
    }
    mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='$nobat_arzyabi_ostani',codearzyabejmali_ostani='$codearzyabejmali_ostani',codearzyabtafsili1_ostani='$codearzyabtafsili1_ostani',codearzyabtafsili2_ostani='$codearzyabtafsili2_ostani',codearzyabtafsili3_ostani='$codearzyabtafsili3_ostani',vaziatkarnameostani='$vaziatkarnameostani' where codeasar='$codeasar'");
//end table 4
//start table 5
    $nobat_arzyabi = $_POST['nobat_arzyabi'];
    $codearzyabejmali = $_POST['codearzyabejmali'];
    $codearzyabtafsili1 = $_POST['codearzyabtafsili1'];
    $codearzyabtafsili2 = $_POST['codearzyabtafsili2'];
    $codearzyabtafsili3 = $_POST['codearzyabtafsili3'];
    $vaziatkarname = $_POST['vaziatkarname'];
    if ($nobat_arzyabi == '' or $nobat_arzyabi == NULL) {
        $nobat_arzyabi = null;
    }
    if ($codearzyabejmali == '') {
        $codearzyabejmali = NULL;
    }
    if ($codearzyabtafsili1 == '') {
        $codearzyabtafsili1 = NULL;
    }
    if ($codearzyabtafsili2 == '') {
        $codearzyabtafsili2 = NULL;
    }
    if ($codearzyabtafsili3 == '') {
        $codearzyabtafsili3 = NULL;
    }
    mysqli_query($connection, "update etelaat_a set nobat_arzyabi='$nobat_arzyabi',codearzyabejmali='$codearzyabejmali',codearzyabtafsili1='$codearzyabtafsili1',codearzyabtafsili2='$codearzyabtafsili2',codearzyabtafsili3='$codearzyabtafsili3',vaziatkarname='$vaziatkarname' where codeasar='$codeasar'");
//	end table 5
    $adhesive = $_SESSION['username'];
//start table6 - pdf
    if ($_FILES['fileasar']['name'] != null) {
        $operation = "AttachFile_PDF_From_Edit";
        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
        $file_size = $_FILES['fileasar']['size'];
        $file_name = $_FILES['fileasar']['name'];
        $file_type = $_FILES['fileasar']['type'];
        $tmpname = $_FILES["fileasar"]["tmp_name"];
        $allowed_pdf = array('pdf');
        $ext_pdf = pathinfo($file_name, PATHINFO_EXTENSION);
        $filename_without_extpdf = pathinfo($file_name, PATHINFO_FILENAME);
        if ($file_size > 20971520) {
            header("location: ../../edit_asar.php?pazireshsetPDFFileTooBig&codeasar=$codeasar&nameasar=$asarname");
        } elseif ($file_size == 0) {
            header("location: ../../edit_asar.php?pazireshsetPDFFileHaveNotSize&codeasar=$codeasar&nameasar=$asarname");
        } elseif (!in_array($ext_pdf, $allowed_pdf)) {
            header("location: ../../edit_asar.php?pazireshsetFileIsNotPDF&codeasar=$codeasar&nameasar=$asarname");
        } else {
            mysqli_query($connection, "update etelaat_a set `fileasar`= 'dist/files/asar_files/$folderName/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$datewithtime' where `codeasar`='$codeasar'");
            if (!mkdir($concurrentDirectory = '../../dist/files/asar_files/' . $folderName) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            move_uploaded_file($tmpname, "../../dist/files/asar_files/" . $folderName . '/' . $file_name);
        }
    }
//end table6 - pdf

    if ($_FILES['fileasar_word']['name'] != null) {
        //start table7 - word
        $operation = "AttachFile_WORD_From_Edit";
        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
        $file_size = $_FILES['fileasar_word']['size'];
        $file_name = $_FILES['fileasar_word']['name'];
        $file_type = $_FILES['fileasar_word']['type'];
        $tmpname = $_FILES["fileasar_word"]["tmp_name"];
        $allowed_word = array('doc', 'docx');
        $ext_word = pathinfo($file_name, PATHINFO_EXTENSION);
        $filename_without_extword = pathinfo($file_name, PATHINFO_FILENAME);
        if ($file_size > 20971520) {
            header("location: ../../edit_asar.php?pazireshsetWORDFileTooBig&codeasar=$codeasar&nameasar=$asarname");
        } elseif ($file_size == 0) {
            header("location: ../../edit_asar.php?pazireshsetWORDFileHaveNotSize&codeasar=$codeasar&nameasar=$asarname");
        } elseif (!in_array($ext_word, $allowed_word)) {
            header("location: ../../edit_asar.php?pazireshsetFileIsNotWORD&codeasar=$codeasar&nameasar=$asarname");
        } else {
            mysqli_query($connection, "update etelaat_a set `fileasar_word`= 'dist/files/asar_files_word/$folderName/$file_name',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$datewithtime' where `codeasar`='$codeasar'");
            if (!mkdir($concurrentDirectory = '../../dist/files/asar_files_word/' . $folderName) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            move_uploaded_file($tmpname, "../../dist/files/asar_files_word/" . $folderName . '/' . $file_name);
        }
    }
//end table7 - word
    if ($_FILES['fileasar_word']['name'] == null and $_FILES['fileasar']['name'] == null) {
        header("location: ../../edit_asar.php?pazireshset&codeasar=$codeasar&nameasar=$asarname");
    }

    header("location: ../../edit_asar.php?pazireshset&codeasar=$codeasar&nameasar=$asarname");

}
//end paziresh

//start PazireshCity
elseif (isset($_POST['pazireshcity']) and !empty($_POST['codeasarfield']) and !empty($_SESSION['username'])) {
    $operation = "paziresh";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
//start table 1
    $codeasar = $_POST['codeasarfield'];
    $asarname = $_POST['asarname'];
    $noefaaliat = $_POST['noefaaliat'];
    $ghalebpazhouhesh = $_POST['ghalebpazhouhesh'];
    $satharzyabi = $_POST['satharzyabi'];
    $elmigroup = $_POST['elmigroup'];
    $noepazhouhesh = $_POST['noepazhoohesh'];
    $vaziatnashr = $_POST['vaziatnashr'];
    $vaziatpazireshasar = $_POST['vaziatnashr'];
    $tedadsafhe = $_POST['tedadsafhe'];
    $bakhshvizheh = $_POST['bakhshvizheh'];
    $vaziatpazireshasar = $_POST['vaziatpaziresh'];
    $sharayetavvaliehsherkatasar = $_POST['sharayetavalieh'];
    $ellat = $_POST['ellat'];
    $vaziatmadreseasar = $_POST['vaziatmadreseasar'];
    $bargozideh_madrese = $_POST['bargozideh_madrese'];
    $jamemtiazmadrese = $_POST['jamemtiazmadrese'];
    $vaziatostaniasar = $_POST['vaziatostani'];
    $bargozideh_ostani = $_POST['bargozideh_ostani'];
    $approve_sianat = $_POST['approve_sianat'];
    $jamemtiazostan = $_POST['jamemtiazostan'];
    $bargozidehkeshvariasar = $_POST['bargozidehkeshvari'];
    $emtiaznahaei = $_POST['emtiaznahaei'];
    $karbar = $_SESSION['username'];
    $bargozidehkeshvari = $_POST['bargozidehkeshvari'];
    if ($ghalebpazhouhesh == 'انتخاب کنید') {
        $ghalebpazhouhesh = null;
    }
    if ($elmigroup == 'انتخاب کنید') {
        $elmigroup = null;
    }
    mysqli_query($connection, "update `etelaat_a` set
                   nameasar='$asarname',
                   noefaaliat='$noefaaliat',
                   ghalebpazhouhesh='$ghalebpazhouhesh',
                   satharzyabi='$satharzyabi',
                   groupelmi='$elmigroup',
                   noepazhouhesh='$noepazhouhesh',
                   vaziatnashr='$vaziatnashr',
                   tedadsafhe='$tedadsafhe',
                   bakhshvizheh='$bakhshvizheh',
                   karbar='$karbar',
                   edit_date='$datewithtime' where codeasar='$codeasar'");
//end table 1
//	//start table 2
    $fname = $_POST['fname'];
    $family = $_POST['family'];
    $father_name = $_POST['father_name'];
    $codemelli = $_POST['codemelli'];
    $tarikhtavallod = $_POST['tarikhtavallod'];
    $gender = $_POST['gender'];
    $vaziattaahol = $_POST['vaziattaahol'];
    $state_custom = $_POST['state_custom'];
    $city_custom = $_POST['city_custom'];
    $madrese = $_POST['madrese'];
    $mobile = $_POST['mobile'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $paye = $_POST['paye'];
    $sath = $_POST['sath'];
    $term = $_POST['term'];
    $email = $_POST['email'];
    $meliat = $_POST['meliat'];
    $namekeshvar = $_POST['namekeshvar'];
    $gozarname = $_POST['gozarname'];
    $reshtetakhasosihozavi = $_POST['reshtetakhasosihozavi'];
    $markaztakhasosihozavi = $_POST['markaztakhasosihozavi'];
    $namemarkaztahsili = $_POST['namemarkaztahsili'];
    $noetahsilathozavi = $_POST['noetahsilathozavi'];
    $tahsilatghhozavi = $_POST['tahsilatghhozavi'];
    $reshtedaneshgahi = $_POST['reshtedaneshgahi'];
    $shparvandetahsili = $_POST['shparvandetahsili'];
    $salakhzmadrakghhozavi = $_POST['salakhzmadrakghhozavi'];
    $master = $_POST['master'];
    $mastercode = $_POST['mastercode'];
    mysqli_query($connection, "update etelaat_p set fname='$fname',family='$family',father_name='$father_name',codemelli='$codemelli',tarikhtavallod='$tarikhtavallod',
									gender='$gender',vaziattaahol='$vaziattaahol',ostantahsili='$state_custom',shahrtahsili='$city_custom',madrese='$madrese',
									mobile='$mobile',telephone='$telephone',address='$address',paye='$paye',sath='$sath',term='$term',email='$email',
									meliat='$meliat',namekeshvar='$namekeshvar',gozarname='$gozarname',reshtetakhasosihozavi='$reshtetakhasosihozavi',
									markaztakhasosihozavi='$markaztakhasosihozavi',namemarkaztahsili='$namemarkaztahsili',noetahsilathozavi='$noetahsilathozavi',
									tahsilatghhozavi='$tahsilatghhozavi',reshtedaneshgahi='$reshtedaneshgahi',shparvandetahsili='$shparvandetahsili',
									salakhzmadrakghhozavi='$salakhzmadrakghhozavi',master='$master',mastercode='$mastercode' where codeasar='$codeasar'");
//end table 2
    $adhesive = $_SESSION['username'];
    $adhesive_city = @$_SESSION['city'];
    $asar_city = @$_SESSION['state'];
    if ($_FILES['fileasar']['name'] != null) {
        //start table3 - pdf
        $operation = "AttachFile_PDF_From_Edit";
        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
        $file_size = $_FILES['fileasar']['size'];
        $file_name = $_FILES['fileasar']['name'];
        $file_type = $_FILES['fileasar']['type'];
        $tmpname = $_FILES["fileasar"]["tmp_name"];
        $allowed_pdf = array('pdf');
        $ext_pdf = pathinfo($file_name, PATHINFO_EXTENSION);
        $filename_without_extpdf = pathinfo($file_name, PATHINFO_FILENAME);
        if ($file_size > 20971520) {
            header("location: ../../edit_asar.php?pazireshsetPDFFileTooBig&codeasar=$codeasar&nameasar=$asarname");
        } elseif ($file_size == 0) {
            header("location: ../../edit_asar.php?pazireshsetPDFFileHaveNotSize&codeasar=$codeasar&nameasar=$asarname");
        } elseif (!in_array($ext_pdf, $allowed_pdf)) {
            header("location: ../../edit_asar.php?pazireshsetFileIsNotPDF&codeasar=$codeasar&nameasar=$asarname");
        } else {
            if (!mkdir($concurrentDirectory = '../../dist/files/asar_files/' . $folderName) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            mysqli_query($connection, "update etelaat_a set `fileasar`= 'dist/files/asar_files/$folderName/$file_name',fileasar_uploader='$adhesive',fileasar_upload_date='$datewithtime' where `codeasar`='$codeasar'");
            move_uploaded_file($tmpname, "../../dist/files/asar_files/" . $file_name);
        }
        //end table3 - pdf
    }
    if ($_FILES['fileasar_word']['name'] != null) {
        //start table3 - word
        $operation = "AttachFile_WORD_From_Edit";
        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");
        $file_size = $_FILES['fileasar_word']['size'];
        $file_name = $_FILES['fileasar_word']['name'];
        $file_type = $_FILES['fileasar_word']['type'];
        $tmpname = $_FILES["fileasar_word"]["tmp_name"];
        $allowed_word = array('doc', 'docx');
        $ext_word = pathinfo($file_name, PATHINFO_EXTENSION);
        $filename_without_extword = pathinfo($file_name, PATHINFO_FILENAME);
        if ($file_size > 20971520) {
            header("location: ../../edit_asar.php?pazireshsetWORDFileTooBig&codeasar=$codeasar&nameasar=$asarname");
        } elseif ($file_size == 0) {
            header("location: ../../edit_asar.php?pazireshsetWORDFileHaveNotSize&codeasar=$codeasar&nameasar=$asarname");
        } elseif (!in_array($ext_word, $allowed_word)) {
            header("location: ../../edit_asar.php?pazireshsetFileIsNotWORD&codeasar=$codeasar&nameasar=$asarname");
        }else {
            if (!mkdir($concurrentDirectory = '../../dist/files/asar_files_word/' . $folderName) && !is_dir($concurrentDirectory)) {
                throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
            }
            mysqli_query($connection, "update etelaat_a set `fileasar_word`= 'dist/files/asar_files_word/$folderName/$file_name',fileasar_word_uploader='$adhesive',fileasar_word_upload_date='$datewithtime' where `codeasar`='$codeasar'");
            move_uploaded_file($tmpname, "../../dist/files/asar_files_word/".$folderName."/" . $file_name);
        }

        //end table3 - word
    }
    header("location: ../../edit_asar.php?pazireshset&codeasar=$codeasar&nameasar=$asarname");

}
//end PazireshCity
