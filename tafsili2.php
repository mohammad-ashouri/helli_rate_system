<?php
include_once 'header.php';
if (isset($_POST['subset'])) {
    $codeasar = $_POST['subset'];
} elseif (isset($_POST['codeasart2'])) {
    $codeasar = $_POST['codeasart2'];
} elseif (isset($_POST['logsend'])) {
    $codeasar = $_POST['codeasar'];
} elseif (isset($_POST['tafsili2_ostan_log'])) {
    $codeasar = $_POST['codeasar'];
} elseif (isset($_POST['tafsili2_madrese_log'])) {
    $codeasar = $_POST['codeasar'];
} elseif (isset($_POST['editt2k'])) {
    $codeasar = $_POST['editt2k'];
} elseif (isset($_POST['editt2o'])) {
    $codeasar = $_POST['editt2o'];
} elseif (isset($_POST['editt2m'])) {
    $codeasar = $_POST['editt2m'];
} else {
    $codeasar = $_POST['codeasar'];
}
if (@$_POST['subjection'] == null or @$_POST['subjection'] == '') {
    $_POST['subjection'] = null;
}
switch (@$_POST['subjection']) {
    case "schoolt2":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili2_madrese='$user' and nobat_arzyabi_madrese='تفصیلی دوم'");
        break;
    case "statet2":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili2_ostani='$user' and nobat_arzyabi_ostani='تفصیلی دوم'");
        break;
    case "editt2k":
    case "log":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
        $query = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
        $tafsili2items = mysqli_fetch_array($query);
        break;
    case "editt2o":
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili2_ostan on etelaat_a.codeasar=tafsili2_ostan.codeasar where etelaat_a.codeasar='$codeasar'");
        break;
    case "editt2m":
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili2_madrese on etelaat_a.codeasar=tafsili2_madrese.codeasar where etelaat_a.codeasar='$codeasar'");
        break;
    case 'log_tafsili2_ostan':
    case 'tafsili2_ostan_log':
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili2_ostan on etelaat_a.codeasar=tafsili2_ostan.codeasar where etelaat_a.codeasar='$codeasar'");
        $query = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
        $tafsili2items = mysqli_fetch_array($query);
        break;
    case 'log_tafsili2_madrese':
    case 'tafsili2_madrese_log':
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili2_madrese on etelaat_a.codeasar=tafsili2_madrese.codeasar where etelaat_a.codeasar='$codeasar'");
        $query = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
        $tafsili2items = mysqli_fetch_array($query);
        break;
//		case "tafsili2ostan":
//			$result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi_ostani='تفصیلی دوم' and vaziatkarnameostani='در حال ارزیابی'");
//			foreach ($result as $item){}
//			break;
//		case "tafsili2madrese":
//			$result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi_madrese='تفصیلی دوم' and vaziatkarnamemadrese='در حال ارزیابی'");
//			foreach ($result as $item){}
//			break;
    default:
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
        $_POST['subjection']=null;
        break;
}
$item = mysqli_fetch_array($result);
$query = mysqli_query($connection, "select master from etelaat_p where codeasar='$codeasar'");
$etelaat_p = mysqli_fetch_array($query);
switch ($etelaat_p['master']) {
    case 'نیست':
        $alertMessage = 'طلاب جوان';
        break;
    case 'هست':
        $alertMessage = 'اساتید';
        break;
    default:
        $alertMessage = Null;
}
?>

    <div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        این نکات خوانده شود:
                    </h3>
                </div>
                <div class="box-body">
                    <p>لطفا پس از اتمام کار با سامانه، از حساب کاربری خود خارج شوید.</p>
                    <p>لطفا در حفظ و نگهداری نام کاربری و رمز عبور خود نهایت دقت را داشته باشید.</p>

                </div>
            </div>
        </section>
    </div>

    <!-- Content Header (Page header) -->
    <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
        <div class="box box-solid box-danger">
            <div class="box-header">
                <p>
                    <i class="fa fa-info-circle"></i>
                    ارزیاب گرامی توجه داشته باشید که این اثر در بخش
                    <u><?php echo $alertMessage; ?></u> جشنواره شرکت کرده است.
                </p>
            </div>
        </div>
        <div class="row" style="overflow-x: auto">
            <section class="col-lg-12 col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            <?php if (!isset($_POST['logsend']) and !isset($_POST['log'])): ?>
                                <?php if (@$_POST['subjection'] == 'editt2o' or @$_POST['subjection'] == 'editt2m') {
                                    echo 'ویرایش';
                                } else {
                                    echo '';
                                } ?>
                                ارزیابی
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>

                            <?php elseif (isset($_POST['logsend']) or isset($_POST['log'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                switch ($_SESSION['head']) {
                                    case 1:
                                        $ratercode = $item['codearzyabtafsili2'];
                                        break;
                                    case 2:
                                        $ratercode = $item['codearzyabtafsili2_ostani'];
                                        break;
                                    case 3:
                                        $ratercode = $item['codearzyabtafsili2_madrese'];
                                        break;
                                }

                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php
                                switch ($_SESSION['head']) {
                                    case 1:
                                        $datesabt = $item['tarikharzyabitafsili2'];
                                        break;
                                    case 2:
                                    case 3:
                                        $datesabt = $item['datesabt'];
                                        break;
                                }
                                echo $datesabt;
                                ?>


                            <?php
                            elseif (isset($_POST['editt2k']) or isset($_POST['logt2o']) or isset($_POST['logt2m'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                switch ($_SESSION['head']) {
                                    case 1:
                                        $ratercode = $item['codearzyabtafsili2'];
                                        break;
                                    case 2:
                                        $ratercode = $item['codearzyabtafsili2_ostani'];
                                        break;
                                    case 3:
                                        $ratercode = $item['codearzyabtafsili2_madrese'];
                                        break;
                                }
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['tarikharzyabitafsili2'] ?>


                            <?php elseif (isset($_POST['logt2o'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                $ratercode = $item['rater_id'];
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['tarikharzyabitafsili2_ostani'] ?>


                            <?php elseif (isset($_POST['logt2m'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                $ratercode = $item['rater_id'];
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['tarikharzyabitafsili2_madrese'] ?>
                            <?php endif; ?>
                        </h3>
                    </div>
                    <?php
                    if (strstr($item['ghalebpazhouhesh'], 'کتاب')) {
                        switch ($item['satharzyabi']) {
                            case 1:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtarjome/ketabtarjome-t2.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtashihtaligh/ketabtashih-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/ketab/sath_1.php';
                                        break;
                                }
                                break;
                            case 2:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtarjome/ketabtarjome-t2.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtashihtaligh/ketabtashih-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/ketab/sath_2.php';
                                        break;
                                }
                                break;
                            case 3:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtarjome/ketabtarjome-t2.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtashihtaligh/ketabtashih-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/ketab/sath_3.php';
                                        break;
                                }
                                break;
                            case 4:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtarjome/ketabtarjome-t2.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili2/ketabtashihtaligh/ketabtashih-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/ketab/sath_4.php';
                                        break;
                                }
                                break;
                        }
                    } elseif (strstr($item['ghalebpazhouhesh'], 'مقاله')) {
                        switch ($item['satharzyabi']) {
                            case 1:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/maghaletarjome/maghaletarjome-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/maghale/sath_1.php';
                                        break;
                                }
                                break;
                            case 2:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/maghaletarjome/maghaletarjome-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/maghale/sath_2.php';
                                        break;
                                }
                                break;
                            case 3:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/maghaletarjome/maghaletarjome-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/maghale/sath_3.php';
                                        break;
                                }
                                break;
                            case 4:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili2/maghaletarjome/maghaletarjome-t2.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili2/maghale/sath_4.php';
                                        break;
                                }
                                break;
                        }
                    } elseif (strstr($item['ghalebpazhouhesh'], 'تحقیق پایانی')) {
                        switch ($item['satharzyabi']) {
                            case 2:
                                include_once 'build/php/rate_pages/tafsili2/tahghighpayani/tahghighpayani-sath2-t2.php';
                                break;
                        }
                    } elseif (strstr($item['ghalebpazhouhesh'], 'پایان‌نامه')) {
                        switch ($item['satharzyabi']) {
                            case 3:
                                include_once 'build/php/rate_pages/tafsili2/payanname/payanname-sath3-t2.php';
                                break;
                        }
                    }
                    ?>
                </div>
            </section>
        </div>
    </section>


    <!-- /.content-wrapper -->
<?php
include_once __DIR__ . '/footer.php';
?>