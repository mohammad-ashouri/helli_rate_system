<?php
include_once 'header.php';
if (isset($_POST['subset'])){
    $codeasar=$_POST['subset'];
}
elseif (isset($_POST['codeasart1'])){
    $codeasar=$_POST['codeasart1'];
}
elseif (isset($_POST['logsend'])){
	$codeasar=$_POST['codeasar'];
}
elseif ( isset($_POST['editt1k'])){
	$codeasar=$_POST['editt1k'];
}
elseif ( isset($_POST['editt1o'])){
	$codeasar=$_POST['editt1o'];
}
elseif ( isset($_POST['editt1m'])){
	$codeasar=$_POST['editt1m'];
}
elseif ( isset($_POST['tafsili1_ostan_log'])){
    $codeasar=$_POST['codeasar'];
}
elseif ( isset($_POST['tafsili1_madrese_log'])){
    $codeasar=$_POST['codeasar'];
}
switch (@$_POST['subjection']){
    case "schoolt1":
	    $result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili1_madrese='$user' and nobat_arzyabi_madrese='تفصیلی اول'");
        break;
    case "statet1":
	    $result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and codearzyabtafsili1_ostani='$user' and nobat_arzyabi_ostani='تفصیلی اول'");
        break;
    case "tafsili1ostan":
	    $result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi_ostani='تفصیلی اول' and vaziatkarnameostani='در حال ارزیابی'");
        break;
	case "tafsili1madrese":
		$result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi_madrese='تفصیلی اول' and vaziatkarnamemadrese='در حال ارزیابی'");
		break;
    case 'editt1o':
        $result=mysqli_query($connection,"select * from etelaat_a inner join tafsili1_ostan on etelaat_a.codeasar=tafsili1_ostan.codeasar where etelaat_a.codeasar='$codeasar' and ((etelaat_a.nobat_arzyabi_ostani='تفصیلی دوم' and etelaat_a.vaziatkarnameostani='در حال ارزیابی') or (etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='اتمام ارزیابی'))");
        break;
    case 'editt1m':
        $result=mysqli_query($connection,"select * from etelaat_a inner join tafsili1_madrese on etelaat_a.codeasar=tafsili1_madrese.codeasar where etelaat_a.codeasar='$codeasar' and ((etelaat_a.nobat_arzyabi_madrese='تفصیلی دوم' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی') or (etelaat_a.nobat_arzyabi_madrese='تفصیلی اول' and etelaat_a.vaziatkarnamemadrese='اتمام ارزیابی'))");
        break;
    case 'tafsili1_ostan_log':
        $result=mysqli_query($connection,"select * from etelaat_a inner join tafsili1_ostan on etelaat_a.codeasar=tafsili1_ostan.codeasar where etelaat_a.codeasar='$codeasar'");
        break;
    case 'tafsili1_madrese_log':
        $result=mysqli_query($connection,"select * from etelaat_a inner join tafsili1_madrese on etelaat_a.codeasar=tafsili1_madrese.codeasar where etelaat_a.codeasar='$codeasar'");
        break;
    default:
	    $result=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and nobat_arzyabi='تفصیلی اول' and vaziatkarname='در حال ارزیابی'");
        break;
}
foreach ($result as $item){}

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
        <div class="row" style="overflow-x: auto">
            <section class="col-lg-12 col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            <?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo 'ویرایش';}else{echo 'ثبت';} ?>
                            ارزیابی
                            <?php
                                echo $item['ghalebpazhouhesh']." سطح ".$item['satharzyabi'];
                            ?>
                        </h3>
                    </div>
    <?php
        switch ($item['ghalebpazhouhesh']){
            case "کتاب":
                switch ($item['satharzyabi']){
                    case 1:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/ketabtarjome/ketabtarjome-t1.php';
                                break;
                            case 'تصحیح و تعلیق':
                                include_once 'build/php/rate_pages/tafsili1/ketabtashihtaligh/ketabtashih-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/ketab/sath_1.php';
                                break;
                        }
                        break;
                    case 2:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/ketabtarjome/ketabtarjome-t1.php';
                                break;
                            case 'تصحیح و تعلیق':
                                include_once 'build/php/rate_pages/tafsili1/ketabtashihtaligh/ketabtashih-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/ketab/sath_2.php';
                                break;
                        }
                        break;
                    case 3:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/ketabtarjome/ketabtarjome-t1.php';
                                break;
                            case 'تصحیح و تعلیق':
                                include_once 'build/php/rate_pages/tafsili1/ketabtashihtaligh/ketabtashih-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/ketab/sath_3.php';
                                break;
                        }
                        break;
                    case 4:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/ketabtarjome/ketabtarjome-t1.php';
                                break;
                            case 'تصحیح و تعلیق':
                                include_once 'build/php/rate_pages/tafsili1/ketabtashihtaligh/ketabtashih-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/ketab/sath_4.php';
                                break;
                        }
                        break;
                }
                break;
            case "مقاله":
                switch ($item['satharzyabi']){
                    case 1:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/maghaletarjome/maghaletarjome-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/maghale/sath_1.php';
                                break;
                        }
                        break;
                    case 2:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/maghaletarjome/maghaletarjome-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/maghale/sath_2.php';
                                break;
                        }
                        break;
                    case 3:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/maghaletarjome/maghaletarjome-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/maghale/sath_3.php';
                                break;
                        }
                        break;
                    case 4:
                        switch ($item['noepazhouhesh']){
                            case 'ترجمه':
                                include_once 'build/php/rate_pages/tafsili1/maghaletarjome/maghaletarjome-t1.php';
                                break;
                            default:
                                include_once 'build/php/rate_pages/tafsili1/maghale/sath_4.php';
                                break;
                        }
                        break;
                }
                break;
            case "تحقیق پایانی":
                switch ($item['satharzyabi']){
                    case 2:
                        include_once 'build/php/rate_pages/tafsili1/tahghighpayani/tahghighpayani-sath2-t1.php';
                        break;
                }
                break;
            case "پایان‌نامه":
                switch ($item['satharzyabi']){
                    case 3:
                        include_once 'build/php/rate_pages/tafsili1/payanname/payanname-sath3-t1.php';
                        break;
                }
                break;
        }
    ?>
                </div>
            </section>
        </div>
    </section>




    <!-- /.content-wrapper -->
<?php
include_once __DIR__.'/footer.php';
?>