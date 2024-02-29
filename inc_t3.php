<?php
include_once 'config/connection.php';
session_start();
$user = $rater_id = $editor = $_SESSION['username'];
$school = @$_SESSION['school'];
$city = @$_SESSION['shahr_name'];
$state = $_SESSION['city'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$codeasar = $_POST['codeasarfield'];
$query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
$valueselect = mysqli_fetch_array($query);
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
$markforlinklogs = mysqli_fetch_array($select);
$linklog = @$markforlinklogs['radif'];
$datesabt = $date_edit = $year . "/" . $month . "/" . $day;
$timesabt = $time_edit = $hour . ":" . $min . ":" . $sec;

if (isset($_POST['subt3ketab']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabtarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3maghaletarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabtashih']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3payanname']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
            noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
            dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
            adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3tahghighpayani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3maghale']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$datesabt' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketab']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['editt3ketabtarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['editt3maghaletarjome']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['editt3ketabtashih']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['editt3payanname']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
            noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
            dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
            adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['editt3tahghighpayani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['editt3maghale']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $rater_id = $_SESSION['username'];

    mysqli_query($connection, "update `etelaat_a` set `tarikharzyabitafsili3`='$date_edit' where `codeasar`='$codeasar'");
    $query = "update tafsili3 set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
    $valueselect = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselect['jamemtiazostan'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselect['jamemtiazostan'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselect['jamemtiazostan']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='می باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set emtiaznahaei='$avg',vaziatkarname='اتمام ارزیابی',bargozidehkeshvari='نمی باشد' where codeasar='$codeasar'");
    }
    $operation = "edittafsili3keshvar";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "tafsili3edit.php?tafsili3registrated&code=$codeasar?code=$codeasar");
} elseif (isset($_POST['subt3ketabostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabtarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3maghaletarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabtashihostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3payannameostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3tahghighpayaniostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3maghaleostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketabostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketabtarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3maghaletarjomeostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketabtashihostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3payannameostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3tahghighpayaniostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3maghaleostani']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_ostan set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        $query = "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'";
        mysqli_query($connection, $query);
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='می باشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar='اثر منتخب استان $state' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazostan='$avg',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatostaniasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3ostan";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabtarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3maghaletarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3ketabtashihmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3payannamemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3tahghighpayanimadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['subt3maghalemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',timesabt='$timesabt',datesabt='$datesabt',rater_id='$rater_id',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
    }
    $operation = "subtafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketabmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',emtiazatvizheh='$emtiazatvizheh',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketabtarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);


    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3maghaletarjomemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set etghanvaetebarelmiasar='$etghan',pichidegimatntarjome='$doshvarimatn',nadashtansabeghetarome='$nadashtansabeghe',
            hajmmatntarjomeshode='$hajmmatntarjome',ahamiatasarvaebtenabarniaz='$ahamiatasar',mizandarksahihmotarjem='$mizandarksahih',
            moadelyabivazhegan='$moadelyabi',tavanmandimotarjemdarenteghal='$tavanmandimotarjem',vafadaritarjomebematnasli='$vafadaritarjome',
                    reayatnasrmeyar='$shivaeenasrmeyar',reayataeinnegaresh='$reayataeinnegaresh',tozihatvatalighatmonaseb='$tozihattalighat',
                    jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3ketabtashihmadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set etebarvaarzeshelmiasar_matnmosaheh='$etebarelmi',mizantasallotmosahehbarmozoo='$mizantasallot',ahamiatvamobtanibarniazasar_matnmosaheh='$ahamiatmobtanibarniaz',
            takhrijmasader='$takhrijmasader',ghedmatmatnmosaheh='$ghedmatmatnmosaheh',entekhabmonasebnoskheasli='$entekhabmonasebasli',
            fahmsahihnoskheasli='$fahmsahihnoskheasli',afzoodantalighat='$afzoodantalighat',moghadamejamemosaheh='$moghadamejamemosaheh',
                    fehrestnevisivaonvanbandi='$fehrestnevisi',virayeshvaestefadeazalaem='$virayeshvaestefadealaemnegareshi',nadashtanesabaeghetashih_matnmosaheh='$nadashtansabeghetashih',
                    hajmmatnmosaheh='$hajmmatnmosaheh',emtiazatvizheh='$emtiazatvizheh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3payannamemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3tahghighpayanimadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',noboodanmozoo='$noboodanmasale',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} elseif (isset($_POST['editt3maghalemadrese']) and isset($_POST['codeasarfield']) and !empty($_POST['codeasarfield'])) {
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
    $query = "update tafsili3_madrese set reayatsakhtarasar='$reayatsakhtarasar',shivaeematn='$shivaeematn',reayataeinnegaresh='$reayataeinnegaresh',
            tabiinmasale='$tabiinmasale',sazmandehimabahes='$sazmandehi',parhizazmatalebzaed='$parhizazmatalebzaed',
            estefadeazmanabe='$manabemotabar',keyfiattabiinmataleb='$keyfiattabiinmataleb',ahammiatmasale='$ahamiatmasale',
                    noavaridartanzim='$noavari',raveshmandiasar='$raveshmandi',pardazeshmohtava='$pardazeshmohtava',
                    dastyabibeahdaf='$keyfiatestentaj',naghdvanoavarielmi='$naghdvanoavari',
                    adamreayatakhlaghpazhooheshi='$adamreayatakhlagh',jam='$jamnomre',time_edit='$time_edit',date_edit='$date_edit',editor='$editor',tozihat='$tozihat' where codeasar='$codeasar'";
    mysqli_query($connection, $query);
    $resultselect = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
    $valueselectt1 = mysqli_fetch_array($resultselect);
    $resultselect = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
    $valueselectt2 = mysqli_fetch_array($resultselect);

    $menhat1 = $valueselectt1['jam'] - $jamnomre;
    $tafazol3va1 = abs($menhat1);
    $menhat2 = $valueselectt2['jam'] - $jamnomre;
    $tafazol3va2 = abs($menhat2);

    if ($tafazol3va1 < $tafazol3va2) {
        $avg = ($valueselectt1['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va2 < $tafazol3va1) {
        $avg = ($valueselectt2['jam'] + $jamnomre) / 2;
    } elseif ($tafazol3va1 == $tafazol3va2) {
        $avg = (max($valueselectt2['jam'], $valueselectt1['jam']) + $jamnomre) / 2;
    }

    if ($valueselect['bakhshvizheh'] == 'نیست' and $avg >= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg >= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='می باشد',vaziatpazireshasar_ostani='پذیرش شد',nobat_arzyabi_ostani='ارزیابی اجمالی',vaziatkarnameostani='در حال ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar='اثر منتخب مدرسه $school' where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'نیست' and $avg <= 80) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    } elseif ($valueselect['bakhshvizheh'] == 'هست' and $avg <= 75) {
        mysqli_query($connection, "update etelaat_a set jamemtiazmadrese='$avg',vaziatkarnamemadrese='اتمام ارزیابی',bargozideh_madrese='نمی باشد',vaziatkarnameostani='اتمام ارزیابی',bargozideh_ostani='نمی باشد',bargozidehkeshvari='نمی باشد',vaziatpazireshasar='پذیرش نشد',vaziatkarnameostani='اتمام ارزیابی' where codeasar='$codeasar'");
        mysqli_query($connection, "update etelaat_a set vaziatmadreseasar=NULL where codeasar='$codeasar'");
    }
    $operation = "edittafsili3madrese";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

    header("location:" . $main_website_url . "panel.php?tafsili3registrated&code=$codeasar");
} else {
    header("location:" . $main_website_url . "panel.php?wrong");
}
