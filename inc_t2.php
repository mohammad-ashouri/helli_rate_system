<?php
include_once 'config/connection.php';
session_start();
$rater_id = $_SESSION['username'];
$school = @$_SESSION['school'];
$city = @$_SESSION['shahr_name'];
$state = @$_SESSION['city'];
$codeasar = $_POST['codeasarfield'];
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$linklog = @$markforlinklogs['radif'];
if (isset($_POST['subt2ketab']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");
    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabtarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2maghaletarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabtashih']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2payanname']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2tahghighpayani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2maghale']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "settafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketab']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabtarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2maghaletarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabtashih']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2payanname']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2tahghighpayani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2maghale']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $editor = $_POST['rater_id'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili2`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili2 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat',editor='$editor' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jamemtiazostan'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi='تفصیلی سوم',bargozidehkeshvari='نمی باشد',vaziatkarname='در حال ارزیابی',emtiaznahaei=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='می باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3 where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',bargozidehkeshvari='نمی باشد',vaziatkarname='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabtarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2maghaletarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabtashihostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2payannameostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2tahghighpayaniostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] != 'هست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2maghaleostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asar['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabtarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2maghaletarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabtashihostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2payannameostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2tahghighpayaniostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2maghaleostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_ostan(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_ostani='تفصیلی سوم',bargozideh_ostani='نمی باشد',vaziatkarnameostani='در حال ارزیابی',jamemtiazostan=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='می باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        if ($city == 'بناب' or $city == 'کاشان') {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب منطقه $city' where codeasar='$codeasar'");
        } else {
            mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
        }
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_ostan where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_ostani=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',bargozideh_ostani='نمی باشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabtarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2maghaletarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی,vaziatpazireshasar_ostani='پذیرش شد'' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2ketabtashihmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_madrese set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2payannamemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2tahghighpayanimadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['subt2maghalemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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

    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];
    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabtarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2maghaletarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2ketabtashihmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_madrese set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2payannamemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2tahghighpayanimadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} elseif (isset($_POST['editt2maghalemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $date_edit = $year . "/" . $month . "/" . $day;
    $time_edit = $hour . ":" . $min . ":" . $sec;
    $rater_id = $_SESSION['username'];

    $query = "update tafsili2_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    foreach ($resultselect as $valueselect) {
    }
    $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    foreach ($query as $asarselect) {
    }
    $tafazol = $jamnomre - $valueselect['jam'];
    $menha = abs($tafazol);
    $avg = ($valueselect['jam'] + $jamnomre) / 2;
    if ($menha > 20) {
        mysqli_query($connection, "insert into tafsili3_madrese(codeasar) values ('$codeasar')");
        mysqli_query($connection, "update etelaat_a set nobat_arzyabi_madrese='تفصیلی سوم',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='در حال ارزیابی',jamemtiazmadrese=null where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='می باشد',vaziatkarnamemadrese='اتمام ارزیابی',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی',vaziatpazireshasar_ostani='پذیرش شد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($menha <= 20 and $asarselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        foreach ($query as $item) {
        }
        if ($item != null) {
            mysqli_query($connection, "delete from tafsili3_madrese where codeasar='$codeasar'");
        }
        mysqli_query($connection, "update etelaat_a set codearzyabtafsili3_madrese=null where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',bargozideh_madrese='نمی باشد',vaziatkarnamemadrese='اتمام ارزیابی',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "edittafsili2madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili2_edit.php?tafsili2registrated&code=$codeasar");
} else {
    header("location:" . $main_website_url . "panel.php?wrong");
}