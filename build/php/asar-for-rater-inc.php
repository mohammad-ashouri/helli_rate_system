<?php
include_once __DIR__.'/../../config/connection.php';
session_start();
$registerar=$_SESSION['username'];
$ratercode=$_POST['ratercode'];
$asarcode=$_POST['a_code'];
$asarname=$_POST['a_name'];
$rater_city=$_POST['rater_city'];
$madrese=$_POST['rater_madrese'];
$sql=mysqli_query($connection,"select * from `rater_list` where `code`='$ratercode'");
foreach ($sql as $mask){}
$selectforcheckratercity=mysqli_query($connection,"select * from rater_list where username='$ratercode' and city_name='$rater_city'");
foreach ($selectforcheckratercity as $rater_ostan_items){}
$selectforcheckratermadrese=mysqli_query($connection,"select * from rater_list where username='$ratercode' and type=0 and approved=1 and city_name='$rater_city' and school_name='$madrese'");
foreach ($selectforcheckratermadrese as $rater_madrese_items){}

//condition for ejmali keshvari
if (isset($_POST['subsetejmali']) and !empty($_POST['ratercode'])){
    if ($ratercode!=$mask['code']){
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wontfindrater");
    }else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into `rater_comments_archive`(`codeasar`,`asarname`,`rater_id`,`rater_info`,`Registrant_user`)
                                values ('$asarcode','$asarname','$ratercode','$raternamefamily','$registerar') ");
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?successset");
    }
}
//condition for tafsili2 keshvari
elseif (isset($_POST['subsettafsili2']) and !empty($_POST['ratercode'])){
    if ($ratercode!=$mask['code']){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili2.php?wontfindrater");
    }else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili2='$ratercode',tarikhtahvilasar2='$date',registrant_tafsili2='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili2.php?successset");
    }
}
//condition for tafsili3 keshvari
elseif (isset($_POST['subsettafsili3']) and !empty($_POST['ratercode'])){
    if ($ratercode!=$mask['code']){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili3.php?wontfindrater");
    }else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili3='$ratercode',tarikhtahvilasar3='$date',registrant_tafsili3='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili3.php?successset");
    }
}
//condition for ejmali_ostani
elseif (isset($_POST['subsetejmali_ostan']) and !empty($_POST['ratercode'])){
    $query=mysqli_query($connection,"SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_ostani='ارزیابی اجمالی' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_a.codeasar='$asarcode'");
    foreach ($query as $checkforasardetails){}
    $query=mysqli_query($connection,"select * from rater_list where username='$ratercode'");
    foreach ($query as $checkforregisterardetails){}
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wontfindrater");
    }
    elseif ($checkforasardetails==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wontfindasar");
    }
    elseif ($checkforregisterardetails['city_name']!=$checkforasardetails['ostantahsili']){
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into ejmali_ostan (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabejmali_ostani='$ratercode',registrant_ejmali_ostani='$registerar',vaziatkarnamemadrese='-',vaziatmadreseasar='-' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?successset");
    }
}
//condition for tafsili1_ostani

elseif (isset($_POST['subsettafsili1_ostan']) and !empty($_POST['ratercode'])){
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili1.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into tafsili1_ostan (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili1_ostani='$ratercode',registrant_tafsili1_ostani='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili1.php?successset");
    }
}
//condition for tafsili2_ostani

elseif (isset($_POST['subsettafsili2_ostan']) and !empty($_POST['ratercode'])){
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili2.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into tafsili2_ostan (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili2_ostani='$ratercode',registrant_tafsili2_ostani='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili2.php?successset");
    }
}
//condition for tafsili3_ostani

elseif (isset($_POST['subsettafsili3_ostan']) and !empty($_POST['ratercode'])){
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili3.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into tafsili3_ostan (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili3_ostani='$ratercode',registrant_tafsili3_ostani='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili3.php?successset");
    }
}
//condition for ejmali_madrese
elseif (isset($_POST['subsetejmali_madrese']) and !empty($_POST['ratercode'])){
    $query=mysqli_query($connection,"select * from etelaat_a where codeasar='$asarcode' and nobat_arzyabi_madrese='ارزیابی اجمالی' and vaziatmadreseasar is null and vaziatostaniasar is null");
    foreach ($query as $checkforasardetails){}
    if ($rater_madrese_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wontfindrater");
    }
    elseif ($checkforasardetails==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wontfindasar");
    }
    else{
        mysqli_query($connection,"insert into ejmali_madrese (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabejmali_madrese='$ratercode',registrant_ejmali_madrese='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?successset");
    }
}
//condition for tafsili1_madrese

elseif (isset($_POST['subsettafsili1_madrese']) and !empty($_POST['ratercode'])){
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili1.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into tafsili1_madrese (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili1_madrese='$ratercode',registrant_ejmali_tafsili1='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili1.php?successset");
    }
}
//condition for tafsili2_madrese

elseif (isset($_POST['subsettafsili2_madrese']) and !empty($_POST['ratercode'])){
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili2.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into tafsili2_madrese (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili2_madrese='$ratercode',registrant_tafsili2_madrese ='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili2.php?successset");
    }
}
//condition for tafsili3_madrese

elseif (isset($_POST['subsettafsili3_madrese']) and !empty($_POST['ratercode'])){
    if ($rater_ostan_items==NULL){
        header("location:".$main_website_url ."set_asar_for_rater_tafsili3.php?wontfindrater");
    }
    else{
        $raternamefamily=$mask['name']." ".$mask['family'];
        mysqli_query($connection,"insert into tafsili3_madrese (codeasar) values ('$asarcode') ");
        mysqli_query($connection,"update etelaat_a set codearzyabtafsili3_madrese='$ratercode',registrant_tafsili3_madrese='$registerar' where codeasar='$asarcode'");
        header("location:".$main_website_url ."set_asar_for_rater_tafsili3.php?successset");
    }
}


elseif (isset($_POST['subset']) and empty($_POST['ratercode'])){
    header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?emptyratercode");
}else{
    header("location:".$main_website_url ."set_asar_for_rater_ejmali.php?wrong");
}


