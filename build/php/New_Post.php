<?php
$user = $_SESSION['username'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
$markforlinklogs = mysqli_fetch_array($select);
$linklog = @$markforlinklogs['radif'];

//start setting new asar
if (isset($_POST['set_new_asar']) and !empty($_SESSION['username']) and !empty($_POST['codemelli']) and !empty($_POST['advaar'])) {
    $operation = "set_new_asar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $dore = $_POST['advaar'];
    if ($dore == "انتخاب کنید") {
        $dore = NULL;
    }
    $asarname = $_POST['asarname'];
    $noefaaliat = $_POST['noefaaliat'];
    if ($noefaaliat == "انتخاب کنید") {
        $noefaaliat = NULL;
    }
    $ghalebpazhouhesh = $_POST['ghalebpazhouhesh'];
    if ($ghalebpazhouhesh == "انتخاب کنید") {
        $ghalebpazhouhesh = NULL;
    }
    $satharzyabi = $_POST['satharzyabi'];
    if ($satharzyabi == "انتخاب کنید") {
        $satharzyabi = NULL;
    }
    $elmigroup = $_POST['elmigroup'];
    if ($elmigroup == "انتخاب کنید") {
        $elmigroup = NULL;
    }
    $noepazhouhesh = $_POST['noepazhouhesh'];
    if ($noepazhouhesh == "انتخاب کنید") {
        $noepazhouhesh = NULL;
    }
    $vaziatnashr = $_POST['vaziatnashr'];
    if ($vaziatnashr == "انتخاب کنید") {
        $vaziatnashr = NULL;
    }
    $tedadsafhe = $_POST['tedadsafhe'];
    $bakhshvizheh = $_POST['bakhshvizheh'];
    if ($bakhshvizheh == "انتخاب کنید") {
        $bakhshvizheh = NULL;
    }
    $vaziatostani = $_POST['vaziatostani'];
    if ($vaziatostani == "انتخاب کنید") {
        $vaziatostani = NULL;
    }
    $sharayet = $_POST['sharayetavvalie'];
    if ($sharayet == "انتخاب کنید") {
        $sharayet = NULL;
    }
    $ellat = $_POST['ellatnadashtansharayet'];
    if ($ellat == "انتخاب کنید") {
        $ellat = NULL;
    }
    $bargozide = $_POST['bargozide'];
    if ($bargozide == "انتخاب کنید") {
        $bargozide = NULL;
    }
    $namesahebasar = $_POST['namesahebasar'];
    $familysahebasar = $_POST['familysahebasar'];
    $fathername = $_POST['fathersahebasar'];
    $codemelli = $_POST['codemelli'];
    $gender = $_POST['gender'];
    if ($gender == "انتخاب کنید") {
        $gender = NULL;
    }
    $shartsenni = $_POST['shartsenni'];
    if ($shartsenni == "انتخاب کنید") {
        $shartsenni = NULL;
    }
    $vaziattaahol = $_POST['vaziattaahol'];
    if ($vaziattaahol == "") {
        $vaziattaahol = NULL;
    }
    $ostansokoonat = $_POST['ostansokoonat'];
    $shahrsokoonat = $_POST['shahrsokoonat'];
    $address = $_POST['address'];
    $codeposti = $_POST['codeposti'];
    $codeshahr = $_POST['codeshahr'];
    $telephone = $_POST['telephone'];
    $ostantahsil = $_POST['ostantahsil'];
    $shahrtahsil = $_POST['shahrtahsil'];
    $madrese = $_POST['namemadrese'];
    $paye = $_POST['paye'];
    $sath = $_POST['sath'];
    $term = $_POST['term'];
    $tarikhtavallod = $_POST['t_year'] . "/" . $_POST['t_month'] . "/" . $_POST['t_day'];
    $tahsilatghhozavi = $_POST['tahsilatgheirhozavi'];
    $reshtedaneshgahi = $_POST['reshtedaneshgahi'];
    $id_parvande = $_POST['id_parvandetahsili'];
    $id_shenasname = $_POST['id_shenasname'];
    $mahalsodoor = $_POST['mahalsodoor'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $reshtetakhasosihozavi = $_POST['reshtetakhasosihozavi'];
    $markaztakhasosihozavi = $_POST['markaztakhasosihozavi'];
    $meliat = $_POST['meliat'];
    $namekeshvar = $_POST['namekeshvar'];
    $gozarname = $_POST['gozarname'];
    $namemarkaztahsili = $_POST['namemarkaztahsili'];
    $noetahsilathozavi = $_POST['noetahsilathozavi'];
    $akhzmadrak = $_POST['akhzmadrakgheirhozavi'];
    $usersabt = $_SESSION['username'];
    $query2 = mysqli_query($connection, "select max(codeasar) from etelaat_a");
    $selectmax = mysqli_fetch_array($query2);
    $codeasar = $selectmax['max(codeasar)'] + 1;
    $insertintoet_a = "insert into etelaat_a(karbar,vaziatostaniasar,codeasar,nameasar,noefaaliat,ghalebpazhouhesh
                        ,groupelmi,bakhshvizheh,noepazhouhesh,vaziatnashr,tedadsafhe,sharayetavalliehsherkat,
                      ellatnadashtansharayet,satharzyabi,bargozidehkeshvari,jashnvareh)
                      values ('$usersabt','$vaziatostani','$codeasar','$asarname','$noefaaliat','$ghalebpazhouhesh','$elmigroup',
                              '$bakhshvizheh','$noepazhouhesh','$vaziatnashr','$tedadsafhe','$sharayet','$ellat','$satharzyabi',
                              '$bargozide','$dore')";
    $insertEta = mysqli_query($connection, $insertintoet_a);

    if ($insertEta) {
        $insertintoet_p = "insert into etelaat_p(jashnvareh,codeasar,codemelli,fname,family,father_name,
                      tarikhtavallod,gender,shartsenni,vaziattaahol,ostansokoonat,shahrsokoonat,
                      address,codeposti,codeshahr,telephone,ostantahsili,shahrtahsili,madrese,
                      paye,sath,term,tahsilatghhozavi,reshtedaneshgahi,shparvandetahsili,sh_shenasnameh,
                      mahalsodoor,mobile,email,reshtetakhasosihozavi,markaztakhasosihozavi,meliat,namekeshvar,
                      gozarname,namemarkaztahsili,noetahsilathozavi,salakhzmadrakghhozavi)
                       values ('$dore','$codeasar','$codemelli','$namesahebasar','$familysahebasar','$fathername',
                               '$tarikhtavallod','$gender','$shartsenni','$vaziattaahol','$ostansokoonat',
                               '$shahrsokoonat','$address','$codeposti','$codeshahr','$telephone','$ostantahsil',
                               '$shahrtahsil','$madrese','$paye','$sath','$term','$tahsilatghhozavi','$reshtedaneshgahi',
                               '$id_parvande','$id_shenasname','$mahalsodoor','$mobile','$email','$reshtetakhasosihozavi',
                               '$markaztakhasosihozavi','$meliat','$namekeshvar','$gozarname','$namemarkaztahsili','$noetahsilathozavi',
                               '$akhzmadrak')";
        mysqli_query($connection, $insertintoet_p);
        $operation = "New Post Added => $codeasar";
        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
        header("location: ../../new_info.php?created&code=$codeasar&name=$asarname");
    }
}
//end setting new asar
