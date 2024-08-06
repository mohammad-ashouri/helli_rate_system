<?php
include_once 'header.php';
if (isset($_POST['subset'])) {
    $codeasar = $_POST['subset'];
} elseif (isset($_POST['codeasart3'])) {
    $codeasar = $_POST['codeasart3'];
} elseif (isset($_POST['log'])) {
    $codeasar = $_POST['codeasar'];
} elseif (isset($_POST['logsend'])) {
    $codeasar = $_POST['codeasar'];
} elseif (isset($_POST['editt3k'])) {
    $codeasar = $_POST['editt3k'];
} elseif (isset($_POST['editt3o'])) {
    $codeasar = $_POST['editt3o'];
} elseif (isset($_POST['editt3m'])) {
    $codeasar = $_POST['editt3m'];
} elseif (isset($_POST['tafsili3_ostan_log'])) {
    $codeasar = $_POST['codeasar'];
} elseif (isset($_POST['tafsili3_madrese_log'])) {
    $codeasar = $_POST['codeasar'];
}
switch (@$_POST['subjection']) {
    case "schoolt3":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili3_madrese='$user' and nobat_arzyabi_madrese='تفصیلی سوم'");
        $item = mysqli_fetch_array($result);
        break;
    case "statet3":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili3_ostani='$user' and nobat_arzyabi_ostani='تفصیلی سوم'");
        $item = mysqli_fetch_array($result);
        break;
    case "editt3":
    case "log":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
        $item = mysqli_fetch_array($result);
        $query = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
        $tafsili3items = mysqli_fetch_array($query);
        break;
    case "editt3ostan":
    case "log":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
        $item = mysqli_fetch_array($result);
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        $tafsili3items = mysqli_fetch_array($query);
        break;
    case "editt3madrese":
    case "log":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
        $item = mysqli_fetch_array($result);
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        $tafsili3items = mysqli_fetch_array($query);
        break;
    case "tafsili3ostan":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi_ostani='تفصیلی سوم' and vaziatkarnameostani='در حال ارزیابی'");
        $item = mysqli_fetch_array($result);
        break;
    case "tafsili3madrese":
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi_madrese='تفصیلی سوم' and vaziatkarnamemadrese='در حال ارزیابی'");
        $item = mysqli_fetch_array($result);
        break;
    case "editt3o":
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili3_ostan on etelaat_a.codeasar=tafsili3_ostan.codeasar where etelaat_a.codeasar='$codeasar' and etelaat_a.nobat_arzyabi_ostani='تفصیلی سوم' and vaziatkarnameostani='اتمام ارزیابی'");
        $item = mysqli_fetch_array($result);
        break;
    case "editt3m":
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili3_madrese on etelaat_a.codeasar=tafsili3_madrese.codeasar where etelaat_a.codeasar='$codeasar' and etelaat_a.nobat_arzyabi_madrese='تفصیلی سوم' and vaziatkarnamemadrese='اتمام ارزیابی'");
        $item = mysqli_fetch_array($result);
        break;
    case 'tafsili3_ostan_log':
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili3_ostan on etelaat_a.codeasar=tafsili3_ostan.codeasar where etelaat_a.codeasar='$codeasar'");
        $item = mysqli_fetch_array($result);
        $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
        $tafsili3items = mysqli_fetch_array($query);
        break;
    case 'tafsili3_madrese_log':
        $result = mysqli_query($connection, "select * from etelaat_a inner join tafsili3_madrese on etelaat_a.codeasar=tafsili3_madrese.codeasar where etelaat_a.codeasar='$codeasar'");
        $item = mysqli_fetch_array($result);
        $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
        $tafsili3items = mysqli_fetch_array($query);
        break;
    default:
        $result = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar' ");
        $item = mysqli_fetch_array($result);
        break;
}

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
                            <?php if (!isset($_POST['logsend']) and !isset($_POST['log']) and isset($_POST['tafsili3_ostan_log']) and isset($_POST['tafsili3_madrese_log'])): ?>
                                ثبت ارزیابی
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                            <?php elseif (isset($_POST['log']) or isset($_POST['logsend'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                $ratercode = $item['codearzyabtafsili3'];
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['tarikharzyabitafsili3'] ?>
                            <?php elseif (isset($_POST['editt3k'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                $ratercode = $item['codearzyabtafsili3'];
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['tarikharzyabitafsili3'] ?>
                            <?php elseif (isset($_POST['editt3o']) or isset($_POST['tafsili3_ostan_log'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                $ratercode = $item['codearzyabtafsili3_ostani'];
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['datesabt'] ?>
                            <?php elseif (isset($_POST['editt3m']) or isset($_POST['tafsili3_madrese_log'])): ?>
                                کارنامه ارزیابی شده
                                <?php
                                echo $item['ghalebpazhouhesh'] . " سطح " . $item['satharzyabi'];
                                ?>
                                توسط استاد
                                <?php
                                $ratercode = $item['codearzyabtafsili3_madrese'];
                                $query = mysqli_query($connection, "Select name,family from rater_list where code='$ratercode'");
                                foreach ($query as $raterinfo) {
                                }
                                echo $raterinfo['name'] . ' ' . $raterinfo['family'];
                                ?>
                                در تاریخ
                                <?php echo $item['tarikharzyabitafsili3_madrese'] ?>
                            <?php endif; ?>
                        </h3>
                    </div>
                    <?php
                    if (strpos($item['ghalebpazhouhesh'], 'کتاب')) {
                        switch ($item['satharzyabi']) {
                            case 1:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtarjome/ketabtarjome-t3.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtashihtaligh/ketabtashih-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/ketab/sath_1.php';
                                        break;
                                }
                                break;
                            case 2:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtarjome/ketabtarjome-t3.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtashihtaligh/ketabtashih-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/ketab/sath_2.php';
                                        break;
                                }
                                break;
                            case 3:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtarjome/ketabtarjome-t3.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtashihtaligh/ketabtashih-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/ketab/sath_3.php';
                                        break;
                                }
                                break;
                            case 4:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtarjome/ketabtarjome-t3.php';
                                        break;
                                    case 'تصحیح و تعلیق':
                                        include_once 'build/php/rate_pages/tafsili3/ketabtashihtaligh/ketabtashih-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/ketab/sath_4.php';
                                        break;
                                }
                                break;
                        }
                    } elseif (strpos($item['ghalebpazhouhesh'], 'مقاله')) {
                        switch ($item['satharzyabi']) {
                            case 1:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/maghaletarjome/maghaletarjome-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/maghale/sath_1.php';
                                        break;
                                }
                                break;
                            case 2:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/maghaletarjome/maghaletarjome-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/maghale/sath_2.php';
                                        break;
                                }
                                break;
                            case 3:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/maghaletarjome/maghaletarjome-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/maghale/sath_3.php';
                                        break;
                                }
                                break;
                            case 4:
                                switch ($item['noepazhouhesh']) {
                                    case 'ترجمه':
                                        include_once 'build/php/rate_pages/tafsili3/maghaletarjome/maghaletarjome-t3.php';
                                        break;
                                    default:
                                        include_once 'build/php/rate_pages/tafsili3/maghale/sath_4.php';
                                        break;
                                }
                                break;
                        }
                    } elseif (strpos($item['ghalebpazhouhesh'], 'تحقیق پایانی')) {
                        switch ($item['satharzyabi']) {
                            case 2:
                                include_once 'build/php/rate_pages/tafsili3/tahghighpayani/tahghighpayani-sath2-t3.php';
                                break;
                        }
                    } elseif (strpos($item['ghalebpazhouhesh'], 'پایان‌نامه')) {
                        switch ($item['satharzyabi']) {
                            case 3:
                                include_once 'build/php/rate_pages/tafsili3/payanname/payanname-sath3-t3.php';
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