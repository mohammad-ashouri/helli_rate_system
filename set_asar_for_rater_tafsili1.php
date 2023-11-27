<?php
include_once 'header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['city'] == 'قم' or $_SESSION['groupname'] != null)):
if ((@$_SESSION['city'] == 'قم' or @$_SESSION['groupname'] != null) and $_SESSION['head'] == 0) {
    $state = 'قم';
    $city = 'قم';
    @$groupname = $_SESSION['groupname'];
} else {
    @$state = $_SESSION['city'];
    @$city = $_SESSION['shahr_name'];
    @$school = $_SESSION['school'];
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
    <?php if (isset($_GET['removedasarfromid'])): ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <center>
                            <h3 class='box-title'>
                                اثر با موفقیت از پنل ارزیاب مربوطه حذف شد
                            </h3>
                        </center>

                    </div>
            </section>
            <?php elseif (isset($_GET['wrongrem'])): ?>
            <section class="content">
                <div class="row">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <center>
                                    <h3 class='box-title'>
                                        خطا در حذف اثر از پنل ارزیاب (مشکل در پیدا کردن اثر مربوطه)
                                    </h3>
                                </center>
                            </div>
                    </section>
                    <?php elseif (isset($_GET['raternotfound'])): ?>
                    <section class="content">
                        <div class="row">
                            <section class="col-lg-12 col-md-12">
                                <div class="box box-solid box-danger">
                                    <div class="box-header">
                                        <i class="fa fa-info-circle"></i>
                                        <center>
                                            <h3 class='box-title'>
                                                خطا در حذف اثر از پنل ارزیاب (این اثر به ارزیاب اختصاص نیافته است)
                                            </h3>
                                        </center>
                                    </div>
                            </section>
                            <?php endif; ?>


                            <div class="row">
                                <section class="col-lg-12 col-md-12">
                                    <div class="box box-success">
                                        <div class="box-header">
                                            <i class="fa fa-info-circle"></i>
                                            <h3 class="box-title">
                                                حذف ارزیاب از یک اثر خاص
                                            </h3>
                                        </div>
                                        <div class="box-body">
                                            <center>
                                                <form method="post" action="build/php/inc.php"
                                                      onsubmit="return removeratervalidate()">
                                                    <input id="remcodeasar" name="asarcode" type="text"
                                                           placeholder="کد اثر را وارد کنید"
                                                           style="padding: 5px;border-radius: 5px">
                                                    <br/><br/>
                                                    <?php
                                                    switch ($_SESSION['head']) {
                                                        case 1: ?>
                                                            <input name="rft1k" type="submit"
                                                                   value="حذف اثر از پنل ارزیاب"
                                                                   style="padding: 5px; font-weight: bold">
                                                            <?php break;
                                                        case 2: ?>
                                                            <input name="rft1o" type="submit"
                                                                   value="حذف اثر از پنل ارزیاب"
                                                                   style="padding: 5px; font-weight: bold">
                                                            <?php break;
                                                        case 3: ?>
                                                            <input name="rft1m" type="submit"
                                                                   value="حذف اثر از پنل ارزیاب"
                                                                   style="padding: 5px; font-weight: bold">
                                                            <?php break;
                                                    }
                                                    if ($_SESSION['head'] == 0 and (@$_SESSION['city'] == 'قم' or @$_SESSION['groupname'] != null)):
                                                        ?>
                                                        <input name="rft1o" type="submit" value="حذف اثر از پنل ارزیاب"
                                                               style="padding: 5px; font-weight: bold">
                                                    <?php endif; ?>
                                                </form>


                                            </center>


                                        </div>
                                    </div>
                                </section>
                            </div>


                            <!-- Main content -->

                            <?php //if (isset($_GET['successset'])):
                            ?>
                            <!--<section class="content">-->
                            <!--<div class="row">-->
                            <!--<section class="col-lg-12 col-md-12">-->
                            <!--<div class="box box-solid box-success">-->
                            <!--<div class="box-header">-->
                            <!--<i class="fa fa-info-circle"></i>-->
                            <!--<center>-->
                            <!--<h3 class='box-title'>-->
                            <!--اثر با موفقیت در پنل ارزیاب مربوطه قرار داده شد-->
                            <!--</h3>-->
                            <!--</center>-->
                            <!---->
                            <!--</div>-->
                            <!--</section>-->
                            <?php //endif;
                            ?>
                            <?php //if (isset($_GET['wrong'])):
                            ?>
                            <!--<section class="content">-->
                            <!--<div class="row">-->
                            <!--<section class="col-lg-12 col-md-12">-->
                            <!--<div class="box box-solid box-danger">-->
                            <!--<div class="box-header">-->
                            <!--<i class="fa fa-info-circle"></i>-->
                            <!--<center>-->
                            <!--<h3 class='box-title'>-->
                            <!--    خطا در اختصاص اثر به ارزیاب-->
                            <!--</h3>-->
                            <!--</center>-->
                            <!--</div>-->
                            <!--</section>-->
                            <?php //endif;
                            ?>
                            <?php //if (isset($_GET['emptyratercode'])):
                            ?>
                            <!--<section class="content">-->
                            <!--<div class="row">-->
                            <!--<section class="col-lg-12 col-md-12">-->
                            <!--<div class="box box-solid box-danger">-->
                            <!--<div class="box-header">-->
                            <!--    <i class="fa fa-info-circle"></i>-->
                            <!--    <center>-->
                            <!--        <h3 class='box-title'>-->
                            <!--            لطفا کد ارزیاب را وارد کنید-->
                            <!--        </h3>-->
                            <!--    </center>-->
                            <!---->
                            <!---->
                            <!--</div>-->
                            <!--</section>-->
                            <?php //endif;
                            ?>
                            <section class="content">
                                <div class="row">
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box box-solid box-warning">
                                            <div class="box-header">
                                                <i class="fa fa-info-circle"></i>

                                                <h3 class='box-title'>لیست آثار راه یافته به مرحله تفصیلی اول برای
                                                    اختصاص به ارزیاب</h3>

                                                <!-- tools box -->
                                                <div class="pull-left box-tools">
                                                    <button type="button" class="btn bg-info btn-sm"
                                                            data-widget="collapse"><i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <!-- /. tools -->
                                            </div>
                                            <div class="box-body">
                                                <input type="text" id="codeasar" style="padding: 7px"
                                                       onkeyup="searchcodeasar()" placeholder="جستجو در کد اثر"
                                                       title="جستجو در کد اثر" style="padding: 5px;border-radius: 5px">
                                                <input type="text" id="nameasar" style="padding: 7px"
                                                       onkeyup="searchnameasar()" placeholder="جستجو در نام اثر"
                                                       title="جستجو در نام اثر" style="padding: 5px;border-radius: 5px">
                                                <input type="text" id="myinput" style="padding: 7px"
                                                       onkeyup="searchfunction()" placeholder="جستجو در گروه علمی"
                                                       title="جستجو در گروه علمی"
                                                       style="padding: 5px;border-radius: 5px">
                                                <center>
                                                    <table id="myTable3" class="arzyabinashodetable">
                                                        <tr>
                                                            <th>
                                                                ردیف
                                                            </th>
                                                            <th onclick="sortTable1(0)">
                                                                کد اثر
                                                            </th>
                                                            <th onclick="sortTable1(1)">
                                                                نام اثر
                                                            </th>
                                                            <th onclick="sortTable1(2)">
                                                                قالب پژوهش و سطح ارزیابی
                                                            </th>
                                                            <th onclick="sortTable1(3)">
                                                                گروه علمی
                                                            </th>
                                                            <th>
                                                                وضعیت تدریس
                                                            </th>
                                                            <th>
                                                                ارزیاب و امتیاز ارزیابی اجمالی
                                                            </th>
                                                            <th>
                                                                اختصاص به ارزیاب
                                                            </th>
                                                        </tr>

                                                        <?php
                                                        switch ($_SESSION['head']) {
                                                            case 1:
                                                                $resultat1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `nobat_arzyabi`='تفصیلی اول' and bargozidehkeshvari='نمی باشد' and vaziatkarname='در حال ارزیابی' and sharayetavalliehsherkat='دارد' and approve_sianat=1 order by groupelmi asc");
                                                                break;
                                                            case 2:
                                                                $resultat1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state')) and etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.bargozideh_ostani='نمی باشد' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_a.approve_sianat=0 order by etelaat_a.groupelmi asc");
                                                                break;
                                                            case 3:
                                                                $school = $_SESSION['school'];
                                                                $resultat1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where (etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school') and etelaat_a.nobat_arzyabi_madrese='تفصیلی اول' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and etelaat_a.approve_sianat=0 order by etelaat_a.groupelmi asc");
                                                                break;
                                                        }
                                                        if (@$_SESSION['head'] == 0 and @$_SESSION['groupname'] != null) {
                                                            $resultat1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='قم' and etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_a.groupelmi='$groupname' and etelaat_a.approve_sianat=0 order by etelaat_a.groupelmi asc");
                                                        }

                                                        $a = 1;
                                                        foreach ($resultat1 as $bin):
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $a;
                                                                    $a++; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    echo $bin['codeasar']; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                                        echo $bin['fileasar_word'];
                                                                    } else {
                                                                        echo $bin['fileasar'];
                                                                    } ?>" target="_blank">
                                                                        <label style="width: 300px">
                                                                            <?php echo $bin['nameasar']; ?>
                                                                        </label>
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $bin['groupelmi']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($bin['master'] == 'هست') {
                                                                        echo 'استاد می باشد';
                                                                    } elseif ($bin['master'] == 'نیست') {
                                                                        echo 'استاد نمی باشد';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    $codeasar = $bin['codeasar'];
                                                                    if ($_SESSION['head'] == 2 or ($_SESSION['head'] == 0 and ($_SESSION['city'] == 'قم' or $_SESSION['groupname'] != null))) {
                                                                        $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                                                    } elseif ($_SESSION['head'] == 3) {
                                                                        $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                                                    }
                                                                    foreach ($query as $ejmalipoint) {
                                                                    }
                                                                    $rater = $ejmalipoint['rater_id'];
                                                                    $query = mysqli_query($connection, "select * from rater_list where username='$rater'");
                                                                    foreach ($query as $rater_items) {
                                                                    }
                                                                    echo $rater_items['name'] . ' ' . $rater_items['family'] . ' - ' . @$ejmalipoint['jam'];
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <select style="font-size: small;padding: 5px; width: 100%"
                                                                            onchange="sendcode(this.value,<?php echo $bin['codeasar'] ?>)">
                                                                        <option disabled selected
                                                                                style="color: #aeaeae;">نام خانوادگی
                                                                            ارزیاب را تایپ کنید
                                                                        </option>
                                                                        <?php
                                                                        $user = $_SESSION['username'];
                                                                        switch ($_SESSION['head']) {
                                                                            case 1:
                                                                                $query = mysqli_query($connection, "select * from rater_list where city_name is null and approved=1 and type=0 order by family asc");
                                                                                break;
                                                                            case 2:
                                                                            case 0:
                                                                            case 3:
                                                                                switch ($city) {
                                                                                    case "قم":
                                                                                        $query = mysqli_query($connection, "select * from rater_list where (shahr_name='قم' or city_name is null) and approved=1 and type!=1 order by family asc");
                                                                                        break;
                                                                                    default:
                                                                                        $query = mysqli_query($connection, "select * from rater_list where city_name='$state' and approved=1 order by family asc");
                                                                                        break;
                                                                                }
                                                                                break;
                                                                        }
                                                                        foreach ($query as $raters):
                                                                            if ($_SESSION['head'] == 1):?>
                                                                                <option style="color: black;font-size: medium" <?php if ($raters['username'] == $bin['codearzyabtafsili1']) {
                                                                                    echo 'selected';
                                                                                } ?>
                                                                                        value="<?php echo $raters['username']; ?>"><?php echo $raters['family'] . ' - ' . $raters['name'] . ' کد: ' . $raters['username']; ?></option>
                                                                            <?php elseif ($_SESSION['head'] == 2 or ($_SESSION['head'] == 0 and ($_SESSION['city'] == 'قم' or $_SESSION['groupname'] != null))): ?>
                                                                                <option style="color: black;font-size: medium" <?php if ($raters['username'] == $bin['codearzyabtafsili1_ostani']) {
                                                                                    echo 'selected';
                                                                                } ?>
                                                                                        value="<?php echo $raters['username']; ?>"><?php echo $raters['family'] . ' - ' . $raters['name'] . ' کد: ' . $raters['username']; ?></option>
                                                                            <?php elseif ($_SESSION['head'] == 3): ?>
                                                                                <option style="color: black;font-size: medium" <?php if ($raters['username'] == $bin['codearzyabtafsili1_madrese']) {
                                                                                    echo 'selected';
                                                                                } ?>
                                                                                        value="<?php echo $raters['username']; ?>"><?php echo $raters['family'] . ' - ' . $raters['name'] . ' کد: ' . $raters['username']; ?></option>
                                                                            <?php endif; endforeach; ?>
                                                                    </select>
                                                                </td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                        <?php
                                                        switch ($_SESSION['head']) {
                                                        case 1:
                                                            ?>
                                                            <script>
                                                                function sendcode(coderater, codeasar) {
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.open("GET", "/build/ajax/sett1k.php?ratercode=" + coderater + "&codeasar=" + codeasar, true);
                                                                    xmlhttp.send();
                                                                }
                                                            </script>
                                                        <?php break;
                                                        case 2:case 0: ?>
                                                            <script>
                                                                function sendcode(coderater, codeasar) {
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.open("GET", "/build/ajax/sett1o.php?ratercode=" + coderater + "&codeasar=" + codeasar, true);
                                                                    xmlhttp.send();
                                                                }
                                                            </script>
                                                        <?php break;
                                                        case 3: ?>
                                                            <script>
                                                                function sendcode(coderater, codeasar) {
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.open("GET", "/build/ajax/sett1m.php?ratercode=" + coderater + "&codeasar=" + codeasar, true);
                                                                    xmlhttp.send();
                                                                }
                                                            </script>
                                                            <?php break;
                                                        }
                                                        if ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null):?>
                                                            <script>
                                                                function sendcode(coderater, codeasar) {
                                                                    var xmlhttp = new XMLHttpRequest();
                                                                    xmlhttp.open("GET", "/build/ajax/sett1o.php?ratercode=" + coderater + "&codeasar=" + codeasar, true);
                                                                    xmlhttp.send();
                                                                }
                                                            </script>
                                                        <?php endif; ?>
                                                    </table>
                                                </center>
                                            </div>
                                    </section>
                                    <section class="content">
                                        <div class="row">
                                            <section class="col-lg-12 col-md-12">
                                                <div class="box box-solid box-warning collapsed-box">
                                                    <div class="box-header">
                                                        <i class="fa fa-info-circle"></i>

                                                        <h3 class='box-title'>لیست ارزیابان جشنواره</h3>

                                                        <!-- tools box -->
                                                        <div class="pull-left box-tools">
                                                            <button type="button" class="btn bg-info btn-sm"
                                                                    data-widget="collapse"><i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                        <!-- /. tools -->
                                                    </div>
                                                    <div class="box-body">
                                                        <center>
                                                            <table class="arzyabinashodetable">
                                                                <tr>
                                                                    <th>
                                                                        کد
                                                                    </th>
                                                                    <th>
                                                                        نام و نام خانوادگی
                                                                    </th>
                                                                    <th>
                                                                        شماره همراه
                                                                    </th>
                                                                    <?php if ($_SESSION['head'] == 1): ?>
                                                                        <th>
                                                                            گروه علمی
                                                                        </th>
                                                                    <?php elseif ($_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['city'] == 'قم' or $_SESSION['groupname'] != null)): ?>
                                                                        <th>
                                                                            استان
                                                                        </th>
                                                                        <th>
                                                                            شهرستان
                                                                        </th>
                                                                        <th>
                                                                            مدرسه
                                                                        </th>
                                                                    <?php endif; ?>

                                                                </tr>

                                                                <?php
                                                                if ($city == 'قم') {
                                                                    $resultraters = mysqli_query($connection, "select * from rater_list WHERE `type`=0 and (shahr_name='قم' or city_name is null) and approved=1 order by family asc");
                                                                } else {
                                                                    $resultraters = mysqli_query($connection, "select * from rater_list WHERE `type`=0 and city_name='$state' and approved=1 order by family");
                                                                }
                                                                foreach ($resultraters as $raters): ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $raters['code'] ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo $raters['cv_filepath'] ?>">
                                                                                <?php echo $raters['name'] . " " . $raters['family'] ?>
                                                                            </a>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $raters['phone'] ?>
                                                                        </td>
                                                                        <?php if ($_SESSION['head'] == 1): ?>
                                                                            <td>
                                                                                <?php
                                                                                $a1 = $raters['adabiat'];
                                                                                $a2 = $raters['akhlaghtarbiat'];
                                                                                $a3 = $raters['hadisderaye'];
                                                                                $a4 = $raters['falsafe'];
                                                                                $a5 = $raters['tafsir'];
                                                                                $a6 = $raters['kalaam'];
                                                                                $a7 = $raters['ulumensani'];
                                                                                $a8 = $raters['feghh'];
                                                                                $a9 = $raters['osoolfegh'];
                                                                                $a10 = $raters['tarikheslam'];
                                                                                if ($a1 == NULL) {
                                                                                    $a1 = "";
                                                                                } else {
                                                                                    echo $a1 = $raters['adabiat'] . "/";
                                                                                }
                                                                                if ($a2 == NULL) {
                                                                                    $a2 = "";
                                                                                } else {
                                                                                    echo $a2 = $raters['akhlaghtarbiat'] . "/";
                                                                                }
                                                                                if ($a3 == NULL) {
                                                                                    $a3 = "";
                                                                                } else {
                                                                                    echo $a3 = $raters['hadisderaye'] . "/";
                                                                                }
                                                                                if ($a4 == NULL) {
                                                                                    $a4 = "";
                                                                                } else {
                                                                                    echo $a4 = $raters['falsafe'] . "/";
                                                                                }
                                                                                if ($a5 == NULL) {
                                                                                    $a5 = "";
                                                                                } else {
                                                                                    echo $a5 = $raters['tafsir'] . "/";
                                                                                }
                                                                                if ($a6 == NULL) {
                                                                                    $a6 = "";
                                                                                } else {
                                                                                    echo $a6 = $raters['kalaam'] . "/";
                                                                                }
                                                                                if ($a7 == NULL) {
                                                                                    $a7 = "";
                                                                                } else {
                                                                                    echo $a7 = $raters['ulumensani'] . "/";
                                                                                }
                                                                                if ($a8 == NULL) {
                                                                                    $a8 = "";
                                                                                } else {
                                                                                    echo $a8 = $raters['feghh'] . "/";
                                                                                }
                                                                                if ($a9 == NULL) {
                                                                                    $a9 = "";
                                                                                } else {
                                                                                    echo $a9 = $raters['osoolfegh'] . "/";
                                                                                }
                                                                                if ($a10 == NULL) {
                                                                                    $a10 = "";
                                                                                } else {
                                                                                    echo $a10 = $raters['tarikheslam'] . "/";
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                        <?php elseif ($_SESSION['head'] == 2 or $_SESSION['head'] == 3): ?>
                                                                            <td>
                                                                                <?php echo $raters['city_name'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $raters['shahr_name'] ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $raters['school_name'] ?>
                                                                            </td>
                                                                        <?php endif; ?>
                                                                    </tr>


                                                                <?php
                                                                endforeach;
                                                                ?>
                                                            </table>
                                                        </center>

                                                    </div>
                                            </section>
                                        </div>
                                    </section>


                                    <!-- /.content-wrapper -->
                                    <?php
                                    endif;
                                    include_once 'footer.php';
                                    ?>
                                    <script>
                                        function removeratervalidate() {
                                            var r = document.getElementById("remcodeasar");
                                            if (r.value == '') {
                                                alert("لطفا کد اثر را وارد کنید");
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        }

                                        function sortTable1(n) {
                                            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                                            table = document.getElementById("myTable3");
                                            switching = true;
// Set the sorting direction to ascending:
                                            dir = "asc";
                                            /* Make a loop that will continue until
                                            no switching has been done: */
                                            while (switching) {
// Start by saying: no switching is done:
                                                switching = false;
                                                rows = table.rows;
                                                /* Loop through all table rows (except the
                                                first, which contains table headers): */
                                                for (i = 1; i < (rows.length - 1); i++) {
// Start by saying there should be no switching:
                                                    shouldSwitch = false;
                                                    /* Get the two elements you want to compare,
                                                    one from current row and one from the next: */
                                                    x = rows[i].getElementsByTagName("TD")[n];
                                                    y = rows[i + 1].getElementsByTagName("TD")[n];
                                                    /* Check if the two rows should switch place,
                                                    based on the direction, asc or desc: */
                                                    if (dir == "asc") {
                                                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                                            // If so, mark as a switch and break the loop:
                                                            shouldSwitch = true;
                                                            break;
                                                        }
                                                    } else if (dir == "desc") {
                                                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                                            // If so, mark as a switch and break the loop:
                                                            shouldSwitch = true;
                                                            break;
                                                        }
                                                    }
                                                }
                                                if (shouldSwitch) {
                                                    /* If a switch has been marked, make the switch
                                                    and mark that a switch has been done: */
                                                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                                    switching = true;
// Each time a switch is done, increase this count by 1:
                                                    switchcount++;
                                                } else {
                                                    /* If no switching has been done AND the direction is "asc",
                                                    set the direction to "desc" and run the while loop again. */
                                                    if (switchcount == 0 && dir == "asc") {
                                                        dir = "desc";
                                                        switching = true;
                                                    }
                                                }
                                            }
                                        }

                                        function searchfunction() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("myinput");
                                            filter = input.value;
                                            table = document.getElementById("myTable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[4];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }

                                        function searchnameasar() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("nameasar");
                                            filter = input.value;
                                            table = document.getElementById("myTable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[2];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }

                                        function searchcodeasar() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("codeasar");
                                            filter = input.value;
                                            table = document.getElementById("myTable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[1];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }

                                    </script>
