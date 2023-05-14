<?php
$codeasar = $_POST['codeasarfield'];
include_once 'config/connection.php';
session_start();
$user = $_SESSION['username'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$linklog = @$markforlinklogs['radif'];
if (isset($_POST['subt1ketab']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $emtiazatvizheh = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1ketab";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabtarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $emtiazatvizheh = $_POST['t13'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1ketabtarjome";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1maghaletarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1maghaletarjome";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabtashih']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etebarelmi = $_POST['t1'];
    $mizantasallot = $_POST['t2'];
    $ahamiatmobtanibarniaz = $_POST['t3'];
    $takhrijmasader = $_POST['t4'];
    $ghedmatmatnmosaheh = $_POST['t5'];
    $entekhabmonasebasli = $_POST['t6'];
    $fahmsahihnoskheasli = $_POST['t7'];
    $afzoodantalighat = $_POST['t8'];
    $moghadamejamemosaheh = $_POST['t9'];
    $fehrestnevisi = $_POST['t10'];
    $virayeshvaestefadealaemnegareshi = $_POST['t11'];
    $nadashtansabeghetashih = $_POST['t12'];
    $hajmmatnmosaheh = $_POST['t13'];
    $emtiazatvizheh = $_POST['t14'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1ketabtashih";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1payanname']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1payanname";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1tahghighpayani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1tahghighpayani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1maghale']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $adamreayatakhlagh = $_POST['t15'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] - $_POST['t15'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi='تفصیلی دوم' where `codeasar`='$codeasar'");
    $query = "update tafsili1 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    mysqli_query($connection, "insert into tafsili2 (codeasar) values ('$codeasar')");
    $operation = "subt1maghale";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $emtiazatvizheh = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }
    $operation = "subt1ketabostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabtarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $emtiazatvizheh = $_POST['t13'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "subt1ketabtarjomeostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1maghaletarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "subt1maghaletarjomeostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabtashihostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etebarelmi = $_POST['t1'];
    $mizantasallot = $_POST['t2'];
    $ahamiatmobtanibarniaz = $_POST['t3'];
    $takhrijmasader = $_POST['t4'];
    $ghedmatmatnmosaheh = $_POST['t5'];
    $entekhabmonasebasli = $_POST['t6'];
    $fahmsahihnoskheasli = $_POST['t7'];
    $afzoodantalighat = $_POST['t8'];
    $moghadamejamemosaheh = $_POST['t9'];
    $fehrestnevisi = $_POST['t10'];
    $virayeshvaestefadealaemnegareshi = $_POST['t11'];
    $nadashtansabeghetashih = $_POST['t12'];
    $hajmmatnmosaheh = $_POST['t13'];
    $emtiazatvizheh = $_POST['t14'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "subt1ketabtashihostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1payannameostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "subt1payannameostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1tahghighpayaniostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "subt1tahghighpayaniostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1maghaleostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $adamreayatakhlagh = $_POST['t15'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] - $_POST['t15'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
            noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
            dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
            adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "subt1maghaleostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1ketabostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $emtiazatvizheh = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }
    $operation = "editt1ketabostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1ketabtarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $emtiazatvizheh = $_POST['t13'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "editt1ketabtarjomeostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1maghaletarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "editt1maghaletarjomeostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1ketabtashihostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etebarelmi = $_POST['t1'];
    $mizantasallot = $_POST['t2'];
    $ahamiatmobtanibarniaz = $_POST['t3'];
    $takhrijmasader = $_POST['t4'];
    $ghedmatmatnmosaheh = $_POST['t5'];
    $entekhabmonasebasli = $_POST['t6'];
    $fahmsahihnoskheasli = $_POST['t7'];
    $afzoodantalighat = $_POST['t8'];
    $moghadamejamemosaheh = $_POST['t9'];
    $fehrestnevisi = $_POST['t10'];
    $virayeshvaestefadealaemnegareshi = $_POST['t11'];
    $nadashtansabeghetashih = $_POST['t12'];
    $hajmmatnmosaheh = $_POST['t13'];
    $emtiazatvizheh = $_POST['t14'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "editt1ketabtashihostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1payannameostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "editt1payannameostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1tahghighpayaniostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "editt1tahghighpayaniostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1maghaleostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {

    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $adamreayatakhlagh = $_POST['t15'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] - $_POST['t15'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
            noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
            dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
            adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_ostani='تفصیلی دوم',vaziatkarnameostani='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_ostan (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_ostan where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی' where `codeasar`='$codeasar'");
    }

    $operation = "editt1maghaleostani";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {

    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $emtiazatvizheh = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1ketabmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabtarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $emtiazatvizheh = $_POST['t13'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1ketabtarjomemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1maghaletarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1maghaletarjomemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1ketabtashihmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etebarelmi = $_POST['t1'];
    $mizantasallot = $_POST['t2'];
    $ahamiatmobtanibarniaz = $_POST['t3'];
    $takhrijmasader = $_POST['t4'];
    $ghedmatmatnmosaheh = $_POST['t5'];
    $entekhabmonasebasli = $_POST['t6'];
    $fahmsahihnoskheasli = $_POST['t7'];
    $afzoodantalighat = $_POST['t8'];
    $moghadamejamemosaheh = $_POST['t9'];
    $fehrestnevisi = $_POST['t10'];
    $virayeshvaestefadealaemnegareshi = $_POST['t11'];
    $nadashtansabeghetashih = $_POST['t12'];
    $hajmmatnmosaheh = $_POST['t13'];
    $emtiazatvizheh = $_POST['t14'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1ketabtashihmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1payannamemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1payannamemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1tahghighpayanimadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1tahghighpayanimadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['subt1maghalemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $adamreayatakhlagh = $_POST['t15'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] - $_POST['t15'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "subt1maghalemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1ketabmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $emtiazatvizheh = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }
    $operation = "editt1ketabmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1ketabtarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $emtiazatvizheh = $_POST['t13'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "editt1ketabtarjomemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1maghaletarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etghan = $_POST['t1'];
    $doshvarimatn = $_POST['t2'];
    $nadashtansabeghe = $_POST['t3'];
    $hajmmatntarjome = $_POST['t4'];
    $ahamiatasar = $_POST['t5'];
    $mizandarksahih = $_POST['t6'];
    $moadelyabi = $_POST['t7'];
    $tavanmandimotarjem = $_POST['t8'];
    $vafadaritarjome = $_POST['t9'];
    $shivaeenasrmeyar = $_POST['t10'];
    $reayataeinnegaresh = $_POST['t11'];
    $tozihattalighat = $_POST['t12'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "editt1maghaletarjomemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1ketabtashihmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $etebarelmi = $_POST['t1'];
    $mizantasallot = $_POST['t2'];
    $ahamiatmobtanibarniaz = $_POST['t3'];
    $takhrijmasader = $_POST['t4'];
    $ghedmatmatnmosaheh = $_POST['t5'];
    $entekhabmonasebasli = $_POST['t6'];
    $fahmsahihnoskheasli = $_POST['t7'];
    $afzoodantalighat = $_POST['t8'];
    $moghadamejamemosaheh = $_POST['t9'];
    $fehrestnevisi = $_POST['t10'];
    $virayeshvaestefadealaemnegareshi = $_POST['t11'];
    $nadashtansabeghetashih = $_POST['t12'];
    $hajmmatnmosaheh = $_POST['t13'];
    $emtiazatvizheh = $_POST['t14'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }

    $operation = "editt1ketabtashihmadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1payannamemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);

    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }
    $operation = "editt1payannamemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1tahghighpayanimadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $noboodanmasale = $_POST['t15'];
    $adamreayatakhlagh = $_POST['t16'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] + $_POST['t15'] - $_POST['t16'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }
    $operation = "editt1tahghighpayanimadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} elseif (isset($_POST['editt1maghalemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
    $reayatsakhtarasar = $_POST['t1'];
    $shivaeematn = $_POST['t2'];
    $reayataeinnegaresh = $_POST['t3'];
    $tabiinmasale = $_POST['t4'];
    $sazmandehi = $_POST['t5'];
    $parhizazmatalebzaed = $_POST['t6'];
    $manabemotabar = $_POST['t7'];
    $keyfiattabiinmataleb = $_POST['t8'];
    $ahamiatmasale = $_POST['t9'];
    $noavari = $_POST['t10'];
    $raveshmandi = $_POST['t11'];
    $pardazeshmohtava = $_POST['t12'];
    $keyfiatestentaj = $_POST['t13'];
    $naghdvanoavari = $_POST['t14'];
    $adamreayatakhlagh = $_POST['t15'];
    $tozihat = $_POST['tozihat'];
    $jamnomre = $_POST['t1'] + $_POST['t2'] + $_POST['t3'] + $_POST['t4'] + $_POST['t5'] + $_POST['t6'] + $_POST['t7'] + $_POST['t8'] + $_POST['t9'] + $_POST['t10'] + $_POST['t11'] + $_POST['t12'] + $_POST['t13'] + $_POST['t14'] - $_POST['t15'];
    $datesabt = $year . "/" . $month . "/" . $day;
    $timesabt = $hour . ":" . $min . ":" . $sec;
    $rater_id = $user;
    $query = "update tafsili1_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
            noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
            dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
            adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',date_time='$datesabt $timesabt',editor_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    if ($jamnomre >= 70) {
        mysqli_query($connection, "update `etelaat_a` set nobat_arzyabi_madrese='تفصیلی دوم',vaziatkarnamemadrese='در حال ارزیابی' where `codeasar`='$codeasar'");
        mysqli_query($connection, "insert into tafsili2_madrese (codeasar) values ('$codeasar')");
    } else {
        mysqli_query($connection, "delete from tafsili2_madrese where codeasar='$codeasar'");
        mysqli_query($connection, "update `etelaat_a` set vaziatkarnameostani='اتمام ارزیابی',vaziatkarnamemadrese='اتمام ارزیابی',vaziatmadreseasar='رد اثر در مدرسه' where `codeasar`='$codeasar'");
    }
    $operation = "editt1maghalemadrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili1_edit.php?tafsili1registrated&code=$codeasar");
} else {
    header("location:" . $main_website_url . "panel.php?wrong");
}