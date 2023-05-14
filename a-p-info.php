<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3):
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
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        نمایش اطلاعات کلی اثر
                    </h3>
                </div>
                <div class="box-body">
                    <form method="post">
                        <input style="padding: 6px" name="codeasar" value="<?php if (isset($_POST['submit'])) {
                            echo $_POST['codeasar'];
                        } ?>" type="text" placeholder="لطفا کد اثر را وارد کنید">
                        <input style="padding: 7px" name="submit" type="submit" value="جستجو">
                    </form>
                    <?php
                    if (isset($_POST['submit']) and !empty($_POST['codeasar'])):
                        $code = $_POST['codeasar'];
                        $codeasar = $_POST['codeasar'];
                        $user = $_SESSION['username'];
                        $urlofthispage=$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
                        $select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
                        foreach ($select as $markforlinklogs) {
                        }
                        $linklog = @$markforlinklogs['radif'];
                        $operation = "search_asar_info--codeasar=".$codeasar;
                        mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$linklog','$urlofthispage','$operation','$datewithtime','$user')");

                        switch ($_SESSION['head']) {
                            case 2:
                                $state = $_SESSION['city'];
                                $result_a = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_a.codeasar='$code'");
                                foreach ($result_a as $et_a) {
                                }
                                $result_p = mysqli_query($connection, "select * from etelaat_p where ostantahsili='$state' and codeasar='$code'");
                                foreach ($result_p as $et_p) {
                                }
                                break;
                            case 3:
                                $state = $_SESSION['city'];
                                $city = $_SESSION['shahr_name'];
                                $school = $_SESSION['school'];
                                $result_a = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.codeasar='$code'");
                                foreach ($result_a as $et_a) {
                                }
                                $result_p = mysqli_query($connection, "select * from etelaat_p where ostantahsili='$state' and shahrtahsili='$city' and madrese='$school' and codeasar='$code'");
                                foreach ($result_p as $et_p) {
                                }
                                break;
                            default:
                                $result_a = mysqli_query($connection, "select * from etelaat_a where `codeasar`='$code'");
                                foreach ($result_a as $et_a) {
                                }
                                $result_p = mysqli_query($connection, "select * from etelaat_p where `codeasar`='$code'");
                                foreach ($result_p as $et_p) {
                                }
                                break;
                        }
                        ?>

                    <?php endif; ?>

                </div>
            </div>

            <?php if (@$et_a!=null and isset($_POST['submit'])): ?>
                <div class="row">
                    <section class="content">
                        <div class="row">
                            <section class="col-lg-12 col-md-12">
                                <div class="box box-solid box-success">
                                    <div class="box-header">
                                        <i class="fa fa-info-circle"></i>

                                        <h3 class='box-title'>اطلاعات اثر</h3>

                                    </div>
                                    <div class="box-body">
                                        <span style="font-weight: bold">کد اثر:</span>
                                        <?php echo @$et_a['codeasar']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">نام اثر:</span>
                                        <?php echo @$et_a['nameasar']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">نوع فعالیت:</span>
                                        <?php echo @$et_a['noefaaliat']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">قالب پژوهش:</span>
                                        <?php echo @$et_a['ghalebpazhouhesh']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">سطح ارزیابی:</span>
                                        <?php echo @$et_a['satharzyabi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">گروه علمی:</span>
                                        <?php echo @$et_a['groupelmi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">نوع پژوهش:</span>
                                        <?php echo @$et_a['noepazhouhesh']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">وضعیت نشر:</span>
                                        <?php echo @$et_a['vaziatnashr']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">تعداد صفحه:</span>
                                        <?php echo @$et_a['tedadsafhe']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">بخش ویژه:</span>
                                        <?php echo @$et_a['bakhshvizheh']; ?>
                                        <?php if ($_SESSION['head'] == 1): ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">وضعیت پذیرش اثر:</span>
                                            <?php echo @$et_a['vaziatpazireshasar']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">شرایط اولیه شرکت در جشنواره:</span>
                                            <?php echo @$et_a['sharayetavalliehsherkat']; ?>
                                        <?php endif; ?>
                                        <?php if (@$et_a['sharayetavalliehsherkat'] == "ندارد"): ?>
                                            <br/><br/>
                                            <span style="font-weight: bold">علت نداشتن شرایط اولیه:</span>
                                            <?php echo @$et_a['ellatnadashtansharayet']; ?>
                                        <?php endif; ?>
                                    </div>

                            </section>
                            <?php if ($_SESSION['head'] == 2 or $_SESSION['head'] == 1): ?>
                                <section class="col-lg-12 col-md-12">
                                    <div class="box box-solid box-success">
                                        <div class="box-header">
                                            <i class="fa fa-info-circle"></i>
                                            <h3 class='box-title'>اطلاعات ارزیابی استانی</h3>
                                        </div>
                                        <?php $codeasar = @$et_a['codeasar']; ?>
                                        <div class="box-body">
                                            <span style="font-weight: bold">وضعیت ارزیابی:</span>
                                            <?php echo @$et_a['nobat_arzyabi_ostani'] . ' - ' . @$et_a['vaziatkarnameostani'] ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php if (@$et_a['jamemtiazostan'] != '' or @$et_a['jamemtiazostan'] != null): ?>
                                                <span style="font-weight: bold">جمع امتیاز استان:</span>
                                                <?php echo @$et_a['jamemtiazostan'];endif; ?>
                                            <br/><br/>
                                            <?php
                                            $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                            foreach ($query as $ejmali_ostan) {
                                            }
                                            if (@$ejmali_ostan != '' or @$ejmali_ostan != null): ?>
                                                <form target="_blank" action="/sabt-arzyabi-ejmali.php" method="post">
                                                <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی اجمالی =></span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $ejmali_ostan['jam'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $ejmali_ostan_rater = $ejmali_ostan['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$ejmali_ostan_rater'");
                                                     foreach ($query as $ejmali_ostan_info) {

                                                     }
                                                     echo 'استاد ' . $ejmali_ostan_info['name'] . ' ' . $ejmali_ostan_info['family'];
                                                     ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $ejmali_ostan['tarikhsabt_year'].'/'.$ejmali_ostan['tarikhsabt_month'].'/'.$ejmali_ostan['tarikhsabt_day'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                    <input name="subjection" value="ejmali_ostan_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="ejmali_ostan_log">مشاهده ریز نمرات ارزیابی اجمالی</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php
                                            endif;
                                            $query = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
                                            foreach ($query as $tafsili1_ostan) {
                                            }
                                            if (@$tafsili1_ostan != '' and @$tafsili1_ostan != null and @$tafsili1_ostan['jam']!=null): ?>
                                                <form target="_blank" action="/tafsili1.php" method="post">
                                                <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی تفصیلی اول =></span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $tafsili1_ostan['jam'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $tafsili1_ostan_rater = $tafsili1_ostan['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$tafsili1_ostan_rater'");
                                                     foreach ($query as $tafsili1_ostan_info) {

                                                     }
                                                     echo 'استاد ' . $tafsili1_ostan_info['name'] . ' ' . $tafsili1_ostan_info['family'];
                                                     ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $tafsili1_ostan['datesabt'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                    <input name="subjection" value="tafsili1_ostan_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="tafsili1_ostan_log">مشاهده ریز نمرات ارزیابی تفصیلی اول</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php
                                            endif;
                                            $query = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
                                            foreach ($query as $tafsili2_ostan) {
                                            }
                                            if (@$tafsili2_ostan != '' and @$tafsili2_ostan != null and @$tafsili2_ostan['jam']): ?>
                                                <form target="_blank" action="/tafsili2.php" method="post">
                                                <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی تفصیلی دوم =></span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $tafsili2_ostan['jam'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $tafsili2_ostan_rater = $tafsili2_ostan['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$tafsili2_ostan_rater'");
                                                     foreach ($query as $tafsili2_ostan_info) {

                                                     }
                                                     echo 'استاد ' . $tafsili2_ostan_info['name'] . ' ' . $tafsili2_ostan_info['family'];
                                                     ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $tafsili2_ostan['datesabt'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                    <input name="subjection" value="tafsili2_ostan_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="tafsili2_ostan_log">مشاهده ریز نمرات ارزیابی تفصیلی دوم</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php
                                            endif;
                                            $query = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar'");
                                            foreach ($query as $tafsili3_ostan) {
                                            }
                                            if (@$tafsili3_ostan != '' and @$tafsili3_ostan != null and @$tafsili3_ostan['jam']): ?>
<!--                                                <form target="_blank" action="/tafsili3.php" method="post">-->
                                                <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی تفصیلی سوم =></span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $tafsili3_ostan['jam'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $tafsili3_ostan_rater = $tafsili3_ostan['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$tafsili3_ostan_rater'");
                                                     foreach ($query as $tafsili3_ostan_info) {

                                                     }
                                                     echo 'استاد ' . $tafsili3_ostan_info['name'] . ' ' . $tafsili3_ostan_info['family'];
                                                     ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $tafsili3_ostan['datesabt'] ?>
                                                 </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="font-weight: bold">
                                                    <input name="subjection" value="tafsili3_ostan_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="tafsili3_ostan_log">مشاهده ریز نمرات ارزیابی تفصیلی سوم</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php endif; ?>
                                        </div>
                                </section>
                            <?php endif; ?>
                            <?php
                            $query=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar' and (nobat_arzyabi_madrese!='' or nobat_arzyabi_madrese!='')");
                            foreach ($query as $checkmadresehaverate){}
                            if (($_SESSION['head'] == 2 or $_SESSION['head'] == 1 or $_SESSION['head'] == 3) and @$checkmadresehaverate!=null): ?>
                                <section class="col-lg-12 col-md-12">
                                    <div class="box box-solid box-success">
                                        <div class="box-header">
                                            <i class="fa fa-info-circle"></i>
                                            <h3 class='box-title'>اطلاعات ارزیابی مدرسه ای</h3>
                                        </div>
                                        <?php $codeasar = @$et_a['codeasar']; ?>
                                        <div class="box-body">
                                            <span style="font-weight: bold">وضعیت ارزیابی:</span>
                                            <?php echo @$et_a['nobat_arzyabi_madrese'] . ' - ' . @$et_a['vaziatkarnamemadrese'] ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <?php if (@$et_a['jamemtiazmadrese'] != '' or @$et_a['jamemtiazmadrese'] != null): ?>
                                                <span style="font-weight: bold">جمع امتیاز مدرسه:</span>
                                                <?php echo @$et_a['jamemtiazmadrese'];endif; ?>
                                            <br/><br/>
                                            <?php
                                            $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                            foreach ($query as $ejmali_madrese) {
                                            }
                                            if ($ejmali_madrese != '' or $ejmali_madrese != null): ?>
                                                <form target="_blank" action="/sabt-arzyabi-ejmali.php" method="post">
                                                    <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی اجمالی =></span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $ejmali_madrese['jam'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $ejmali_madrese_rater = $ejmali_madrese['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$ejmali_madrese_rater'");
                                                     foreach ($query as $ejmali_madrese_rater_info) {

                                                     }
                                                     echo 'استاد ' . $ejmali_madrese_rater_info['name'] . ' ' . $ejmali_madrese_rater_info['family'];
                                                     ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $ejmali_madrese['tarikhsabt_year'].'/'.$ejmali_madrese['tarikhsabt_month'].'/'.$ejmali_madrese['tarikhsabt_day'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                    <input name="subjection" value="ejmali_madrese_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="ejmali_madrese_log">مشاهده ریز نمرات ارزیابی اجمالی</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php
                                            endif;
                                            $query = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
                                            foreach ($query as $tafsili1_madrese) {
                                            }
                                            if (@$tafsili1_madrese != '' and @$tafsili1_madrese != null and @$tafsili1_madrese['jam']!=null): ?>
<!--                                                <form target="_blank" action="/tafsili1.php" method="post">-->
                                                    <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی تفصیلی اول =></span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $tafsili1_madrese['jam'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $tafsili1_madrese_rater = $tafsili1_madrese['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$tafsili1_madrese_rater'");
                                                     foreach ($query as $tafsili1_madrese_info) {

                                                     }
                                                     echo 'استاد ' . $tafsili1_madrese_info['name'] . ' ' . $tafsili1_madrese_info['family'];
                                                     ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $tafsili1_madrese['datesabt'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                    <input name="subjection" value="tafsili1_madrese_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="tafsili1_madrese_log">مشاهده ریز نمرات ارزیابی تفصیلی اول</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php
                                            endif;
                                            $query = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
                                            foreach ($query as $tafsili2_madrese) {
                                            }
                                            if (@$tafsili2_madrese != '' and @$tafsili2_madrese != null and @$tafsili2_madrese['jam']!=null): ?>
<!--                                                <form target="_blank" action="/tafsili2.php" method="post">-->
                                                    <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی تفصیلی دوم =></span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $tafsili2_madrese['jam'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $tafsili2_madrese_rater = $tafsili2_madrese['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$tafsili2_madrese_rater'");
                                                     foreach ($query as $tafsili2_madrese_info) {

                                                     }
                                                     echo 'استاد ' . $tafsili2_madrese_info['name'] . ' ' . $tafsili2_madrese_info['family'];
                                                     ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $tafsili2_madrese['datesabt'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                    <input name="subjection" value="tafisli2_madrese_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="tafisli2_madrese_log">مشاهده ریز نمرات ارزیابی تفصیلی دوم</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php
                                            endif;
                                            $query = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar'");
                                            foreach ($query as $tafsili3_madrese) {
                                            }
                                            if (@$tafsili3_madrese != '' and @$tafsili3_madrese != null and @$tafsili3_madrese['jam']): ?>
<!--                                                <form target="_blank" action="/tafsili3.php" method="post">-->
                                                    <span style="font-weight: bold; background-color: #bdc3cb; padding: 7px ">ارزیابی تفصیلی سوم =></span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     امتیاز:
                                                     <?php echo $tafsili3_madrese['jam'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     ارزیاب:
                                                     <?php
                                                     $tafsili3_madrese_rater = $tafsili3_madrese['rater_id'];
                                                     $query = mysqli_query($connection, "select * from rater_list where username='$tafsili3_madrese_rater'");
                                                     foreach ($query as $tafsili3_madrese_info) {

                                                     }
                                                     echo 'استاد ' . $tafsili3_madrese_info['name'] . ' ' . $tafsili3_madrese_info['family'];
                                                     ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                     تاریخ ارزیابی:
                                                    <?php echo $tafsili3_madrese['datesabt'] ?>
                                                 </span>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <span style="font-weight: bold">
                                                    <input name="subjection" value="tafsili3_madrese_log" type="hidden">
                                                    <input name="codeasar" value="<?php echo $codeasar ?>" type="hidden">
                                                        <button class="btn btn-block btn-success" style="width: 250px; display: inline" name="tafsili3_madrese_log">مشاهده ریز نمرات ارزیابی تفصیلی سوم</button>
                                                </span>
                                                </form>
                                                <hr>
                                            <?php endif; ?>
                                        </div>
                                </section>
                            <?php endif; ?>

                        </div>
                        <section class="content">
                            <div class="row">
                                <section class="col-lg-12 col-md-12">
                                    <div class="box box-solid box-success">
                                        <div class="box-header">
                                            <i class="fa fa-info-circle"></i>

                                            <h3 class='box-title'>اطلاعات صاحب اثر</h3>
                                        </div>
                                        <div class="box-body">
                                            <span style="font-weight: bold">نام و نام خانوادگی:</span>
                                            <?php echo @$et_p['fname'] . " " . @$et_p['family']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">نام پدر:</span>
                                            <?php echo @$et_p['father_name']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">تاریخ تولد:</span>
                                            <?php echo @$et_p['tarikhtavallod']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">شماره پرونده تحصیلی:</span>
                                            <?php echo @$et_p['shparvandetahsili']; ?>
                                            <br/><br/>
                                            <span style="font-weight: bold">کد ملی:</span>
                                            <?php echo @$et_p['codemelli']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">استان مدرسه:</span>
                                            <?php echo @$et_p['ostantahsili']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">شهر مدرسه:</span>
                                            <?php echo @$et_p['shahrtahsili']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">نام مدرسه:</span>
                                            <?php echo @$et_p['madrese']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">نام مرکز تحصیلی:</span>
                                            <?php echo @$et_p['namemarkaztahsili']; ?>
                                            <br/><br/>
                                            <span style="font-weight: bold">شماره همراه:</span>
                                            <?php echo @$et_p['mobile']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">تلفن ثابت:</span>
                                            <?php echo @$et_p['telephone']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">ایمیل:</span>
                                            <?php echo @$et_p['email']; ?>
                                            <br/><br/>
                                            <span style="font-weight: bold">آدرس:</span>
                                            <?php echo @$et_p['address']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <br/><br/>
                                            <span style="font-weight: bold">پایه:</span>
                                            <?php echo @$et_p['paye']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">سطح:</span>
                                            <?php echo @$et_p['sath']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">ترم:</span>
                                            <?php echo @$et_p['term']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">تحصیلات غیر حوزوی:</span>
                                            <?php echo @$et_p['tahsilatghhozavi']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">رشته دانشگاهی:</span>
                                            <?php echo @$et_p['reshtedaneshgahi']; ?>
                                            <br/><br/>
                                            <span style="font-weight: bold">رشته تخصصی حوزوی:</span>
                                            <?php echo @$et_p['reshtetakhasosihozavi']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <span style="font-weight: bold">مرکز تخصصی حوزوی:</span>
                                            <?php echo @$et_p['markaztakhasosihozavi']; ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </div>
                                    </div>
                                </section>
                                <section class="content">
                                    <div class="row">
                                        <section class="col-lg-12 col-md-12">
                                            <div class="box box-solid box-success">
                                                <div class="box-header">
                                                    <i class="fa fa-info-circle"></i>

                                                    <h3 class='box-title'>لینک های دانلود فایل های پیوستی</h3>

                                                </div>
                                                <div class="box-body" style="text-align: center">
                                                    <?php
                                                    if (strlen(@$et_a['fileasar']) > 28):
                                                        ?>
                                                        <span style="font-weight: bold"> PDF:</span>
                                                        <a target="_blank"
                                                           href="<?php echo $main_website_url . @$et_a['fileasar']; ?>">
                                                            دانلود فایل
                                                        </a>
                                                        <br/><br/>
                                                    <?php endif; ?>
                                                    <?php
                                                    if (strlen(@$et_a['fileasar_word']) > 28):
                                                        ?>
                                                        <span style="font-weight: bold"> WORD:</span>
                                                        <a target="_blank"
                                                           href="<?php echo $main_website_url . @$et_a['fileasar_word']; ?>">
                                                            دانلود فایل
                                                        </a>
                                                        <br/><br/>
                                                    <?php endif; ?>
                                                    <?php
                                                    if (strlen(@$et_a['filetafsili1_ostan']) > 28):
                                                        ?>
                                                        <span style="font-weight: bold">فایل تفصیلی اول استان:</span>
                                                        <a target="_blank"
                                                           href="<?php echo $main_website_url . @$et_a['filetafsili1_ostan']; ?>">
                                                            <?php echo $main_website_url . @$et_a['filetafsili1_ostan']; ?>
                                                        </a>
                                                        <br/><br/>
                                                    <?php endif; ?>
                                                    <?php
                                                    if (strlen(@$et_a['filetafsili2_ostan']) > 28):
                                                        ?>
                                                        <span style="font-weight: bold">فایل تفصیلی دوم استان:</span>
                                                        <a target="_blank"
                                                           href="<?php echo $main_website_url . @$et_a['filetafsili2_ostan']; ?>">
                                                            <?php echo $main_website_url . @$et_a['filetafsili2_ostan']; ?>
                                                        </a>
                                                        <br/><br/>
                                                    <?php endif; ?>
                                                    <?php
                                                    if (strlen(@$et_a['filetafsili3_ostan']) > 28):
                                                        ?>
                                                        <span style="font-weight: bold">فایل تفصیلی سوم استان:</span>
                                                        <a target="_blank"
                                                           href="<?php echo $main_website_url . @$et_a['filetafsili3_ostan']; ?>">
                                                            <?php echo $main_website_url . @$et_a['filetafsili3_ostan']; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </section>
                            </div>
                        </section>
                    </section>
                </div>
            <?php elseif(!isset($_POST['submit'])): ?>
                <div class="row">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">
                                    اطلاعاتی برای نمایش وجود ندارد
                                </h3>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endif; ?>
        </section>
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        نمایش اطلاعات کلی صاحب اثر
                    </h3>
                </div>
                <div class="box-body">
                    <form method="post">
                        <input style="width: 250px;padding: 6px" name="codemelli" type="text"
                               placeholder="لطفا کد ملی صاحب اثر را وارد کنید">
                        <input style="padding: 7px" name="submit" type="submit" value="جستجو">
                    </form>
                    <?php
                    if (isset($_POST['submit']) and !empty($_POST['codemelli'])):
                    $code = $_POST['codemelli'];
                    switch ($_SESSION['head']) {
                        case 2:
                            $state = $_SESSION['city'];
                            if ($_SESSION['shahr_name'] == 'کاشان') {
                                $result_p = mysqli_query($connection, "select * from etelaat_p where ostantahsili='اصفهان' and shahrtahsili='کاشان' and `codemelli`='$code'");
                            } elseif ($_SESSION['shahr_name'] == 'بناب') {
                                $result_p = mysqli_query($connection, "select * from etelaat_p where ostantahsili='آذربایجان شرقی' and shahrtahsili='بناب' and `codemelli`='$code'");
                            } else {
                                $result_p = mysqli_query($connection, "select * from etelaat_p where ostantahsili='$state' and `codemelli`='$code'");
                            }
                            break;
                        case 3:
                            $state = $_SESSION['city'];
                            $city = $_SESSION['shahr_name'];
                            $school = $_SESSION['school'];
                            $result_p = mysqli_query($connection, "select * from etelaat_p where ostantahsili='$state' and shahrtahsili='$city' and madrese='$school' and `codemelli`='$code'");
                            break;
                        default:
                            $result_p = mysqli_query($connection, "select * from etelaat_p where `codemelli`='$code'");
                            break;
                    }

                    foreach ($result_p as $et_p) {
                    }
                    ?>
                    <section class="content">
                        <div class="row">
                            <section class="col-lg-12 col-md-12">
                                <div class="box box-solid box-success">
                                    <div class="box-header">
                                        <i class="fa fa-info-circle"></i>

                                        <h3 class='box-title'>اطلاعات صاحب اثر با کد
                                            ملی <?php echo @$et_p['codemelli'] ?></h3>
                                    </div>
                                    <div class="box-body">
                                        <span style="font-weight: bold">نام و نام خانوادگی:</span>
                                        <?php echo @$et_p['fname'] . " " . @$et_p['family']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">نام پدر:</span>
                                        <?php echo @$et_p['father_name']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">تاریخ تولد:</span>
                                        <?php echo @$et_p['tarikhtavallod']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">جنسیت:</span>
                                        <?php echo @$et_p['gender']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">شماره شناسنامه:</span>
                                        <?php echo @$et_p['sh_shenasnameh']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">محل صدور:</span>
                                        <?php echo @$et_p['mahalsodoor']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">وضعیت تاهل:</span>
                                        <?php echo @$et_p['vaziattaahol']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">استان سکونت:</span>
                                        <?php echo @$et_p['ostansokoonat']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">شهر سکونت:</span>
                                        <?php echo @$et_p['shahrsokoonat']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">آدرس:</span>
                                        <?php echo @$et_p['address']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">کد پستی:</span>
                                        <?php echo @$et_p['codeposti']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">تلفن ثابت:</span>
                                        <?php echo @$et_p['telephone']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">تلفن همراه:</span>
                                        <?php echo @$et_p['mobile']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">ایمیل:</span>
                                        <?php echo @$et_p['email']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">شماره پرونده تحصیلی:</span>
                                        <?php echo @$et_p['shparvandetahsili']; ?>

                                        <br/><br/>
                                        <span style="font-weight: bold">نام مدرسه:</span>
                                        <?php echo @$et_p['madrese']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">پایه:</span>
                                        <?php echo @$et_p['paye']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">سطح:</span>
                                        <?php echo @$et_p['sath']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">ترم:</span>
                                        <?php echo @$et_p['term']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">تحصیلات غیر حوزوی:</span>
                                        <?php echo @$et_p['tahsilatghhozavi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">رشته دانشگاهی:</span>
                                        <?php echo @$et_p['reshtedaneshgahi']; ?>
                                        <br/><br/>

                                        <span style="font-weight: bold">رشته تخصصی حوزوی:</span>
                                        <?php echo @$et_p['reshtetakhasosihozavi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">مرکز تخصصی حوزوی:</span>
                                        <?php echo @$et_p['markaztakhasosihozavi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">ملیت:</span>
                                        <?php echo @$et_p['meliat']; ?>
                                        <br/><br/>
                                        <span style="font-weight: bold">نام کشور:</span>
                                        <?php echo @$et_p['namekeshvar']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">شماره گذرنامه:</span>
                                        <?php echo @$et_p['gozarname']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">نام مرکز تحصیلی:</span>
                                        <?php echo @$et_p['namemarkaztahsili']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">نوع تحصیلات حوزوی:</span>
                                        <?php echo @$et_p['noetahsilathozavi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span style="font-weight: bold">سال اخذ مدرک غیر حوزوی:</span>
                                        <?php echo @$et_p['salakhzmadrakghhozavi']; ?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                                    </div>

                            </section>
                            <section class="content">
                                <div class="row">
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box box-solid box-success">
                                            <div class="box-header">
                                                <i class="fa fa-info-circle"></i>

                                                <h3 class='box-title'>آثار ثبت شده با کد
                                                    ملی <?php echo @$et_p['codemelli'] ?></h3>

                                            </div>
                                            <div class="box-body">

                                                <table class="table_p_info">
                                                    <tr>
                                                        <th>کد اثر</th>
                                                        <th>نام اثر</th>
                                                        <th>فایل اثر</th>
                                                        <th>برگزیده کشوری</th>


                                                    </tr>
                                                    <?php
                                                    foreach ($result_p as $et_p):
                                                        $codeasar = @$et_p['codeasar'];
                                                        $sql = "select * from etelaat_a where `codeasar`='$codeasar'";
                                                        $result_h = mysqli_query($connection, $sql);
                                                        foreach ($result_h as $et_h): ?>
                                                            <tr>
                                                                <td><?php echo $et_h['codeasar']; ?></td>
                                                                <td style="padding-right: 50px">
                                                                    <label style="width: 600px; font-weight: normal">
                                                                        <?php echo $et_h['nameasar']; ?>
                                                                    </label>
                                                                </td>
                                                                <td><a href="<?php echo $et_h['fileasar']; ?>">
                                                                        لینک فایل اثر
                                                                    </a>

                                                                </td>
                                                                <td><?php echo $et_h['bargozidehkeshvari']; ?></td>
                                                            </tr>


                                                        <?php
                                                        endforeach;
                                                    endforeach;
                                                    ?>
                                                </table>


                                            </div>

                                    </section>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
            </div>
            <?php endif; ?>
        </section>
    </div>


<?php
endif;
include_once __DIR__ . '/footer.php';
?>