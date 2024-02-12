<?php
include_once 'header.php';

if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3):
    $ghalebpazhoohesh = mysqli_query($connection, "select * from `ghalebpazhouhesh_option`");
    $elmigroup = mysqli_query($connection, "select * from `elmigroup_option`");
    $noepazhouhesh1 = mysqli_query($connection, "select * from `noepazhouhesh_option`");
    $ellat = mysqli_query($connection, "select * from `ellatnadashtansharayet_option`");
    $vaziatostani = mysqli_query($connection, "select * from `vaziatostaniasar_option` order by `vaziatostaniasar` asc");
    $searchResult = null;
    @$postcode = $_POST['code'];
    if (isset($postcode) && !empty($postcode)) {
        switch ($_SESSION['head']) {
            case 1:
                @$QueryAsar = mysqli_query($connection, "select * from `etelaat_a` where `codeasar`='$postcode'");
                @$QueryPerson = mysqli_query($connection, "select * from `etelaat_p` where `codeasar`='$postcode'");
                break;
            case 2:
                $state = $_SESSION['city'];
                $city = $_SESSION['shahr_name'];
                @$QueryAsar = mysqli_query($connection, "select * from `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codeasar='$postcode' and ((master='نیست' and ostantahsili='$state') or (master='هست' and teachingProvince='$state')) and etelaat_a.approve_sianat!=1");
                @$QueryPerson = mysqli_query($connection, "select * from `etelaat_p` where `codeasar`='$postcode' and ((master='نیست' and ostantahsili='$state') or (master='هست' and teachingProvince='$state'))");
                break;
            case 3:
                $state = $_SESSION['city'];
                $city = $_SESSION['shahr_name'];
                $school = $_SESSION['school'];
                @$QueryAsar = mysqli_query($connection, "select * from `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codeasar='$postcode' and etelaat_p.madrese='$school' and ostantahsili='$state' and etelaat_a.approve_sianat!=1");
                @$QueryPerson = mysqli_query($connection, "select * from `etelaat_p` where `codeasar`='$postcode' and ostantahsili='$state' and etelaat_p.madrese='$school'");
                break;
        }
        $searchResult = mysqli_fetch_array($QueryAsar);
        $searchResultPerson = mysqli_fetch_array($QueryPerson);
    }
    ?>
    <style>
        .wrap {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .subpaziresh {
            font-family: "Vazir";
            width: 140px;
            height: 45px;
            font-size: 13px;
            font-weight: 500;
            font-weight: bold;
            color: #000;
            background-color: #00e765;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }

        .subpaziresh:hover {
            background-color: #2EE59D;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
    </style>

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
                <?php if (isset($_GET['pazireshset'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetPDFFileTooBig'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگذاری فایل: سایز فایل PDF بیشتر از 20 مگابایت است.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetPDFFileHaveNotSize'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگزاری فایل: سایز فایل انتخاب شده اشتباه می باشد.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetFileIsNotPDF'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگذاری فایل: پسوند فایل PDF نمی باشد.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetPDFFileNotEq'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگذاری فایل: نام فایل PDF با کد اثر برابر نمی باشد.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetWORDFileTooBig'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگذاری فایل: سایز فایل WORD بیشتر از 20 مگابایت است.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetWORDFileHaveNotSize'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگزاری فایل: سایز فایل انتخاب شده اشتباه می باشد.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetFileIsNotWORD'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگذاری فایل: پسوند فایل WORD نمی باشد.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['pazireshsetWORDFileNotEq'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                ویرایش اثر با کد
                                '<?php echo $_GET['codeasar'] ?>'
                                و نام
                                '<?php echo $_GET['nameasar'] ?>'
                                با موفقیت صورت گرفت!
                            </h3>
                        </div>
                    </div>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطا در بارگذاری فایل: نام فایل WORD با کد اثر برابر نمی باشد.
                            </h3>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="box-body">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-solid box-info">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">
                                    ویرایش اطلاعات اثر
                                </h3>
                            </div>
                            <script>
                                function cityshow(str, codeasar) {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.onreadystatechange = function () {
                                        if (this.readyState == 4 && this.status == 200) {
                                            document.getElementById("cityselect").innerHTML = this.responseText;
                                            document.getElementById("citytr").style.display = '';
                                            document.getElementById("schooltr").style.display = '';
                                        }
                                    }
                                    xmlhttp.open("GET", "/build/ajax/showcity.php?statename=" + str + "&codeasar=" + codeasar, true);
                                    xmlhttp.send();
                                }
                            </script>
                            <div class="box-body">
                                <form method="post" onsubmit="return validatesearch()">
                                    <input value="<?php if (isset($_POST['code'])) {
                                        echo $_POST['code'];
                                    } ?>" id="searchinput" type="text" name="code" maxlength="20" size="30"
                                           placeholder="لطفا کد اثر را وارد کنید" style="width: 150px; padding: 5px">
                                    <input type="submit" value="جستجو" style="width: 100px; padding: 7px">
                                    <?php if (empty($searchResultPerson) and isset($_POST['code'])): ?><label
                                            style="color: red;">این اثر در سیستم یافت نشد</label> <?php endif; ?>
                                </form>
                                <?php if (isset($_POST['code']) and !empty($searchResult) and !empty($searchResultPerson)): ?>
                                    <br/><br/>
                                    <form method="post" enctype="multipart/form-data" action="./build/php/edit_post.php"
                                          id="pazireshform" onsubmit="return validatepaziresh()">
                                        <p>کد اثر
                                            <input style="padding: 8px;border-radius: 7px;text-align: left;width: 100px"
                                                   type="text" disabled="disabled"
                                                   value="<?php echo @$searchResult['codeasar']; ?>">
                                            <input name="codeasarfield" type="hidden"
                                                   value="<?php echo @$searchResult['codeasar']; ?>">
                                            نام اثر
                                            <input style="padding: 8px;width: 700px;border-radius: 7px" type="text"
                                                   id="nameasar" name="asarname"
                                                   value="<?php echo @$searchResult['nameasar']; ?>">

                                        </p>
                                        <center>
                                            <br/>
                                            <h4 style="background-color: #5BB318; padding:10px;color:white;border-radius: 5px">
                                                اطلاعات اثر</h4>
                                            <table class="tablepaziresh">
                                                <tr>
                                                    <th>نوع فعالیت</th>
                                                    <td>
                                                        <select class="pazireshselections" name="noefaaliat">
                                                            <option selected></option>
                                                            <option <?php if (@$searchResult['noefaaliat'] == 'فردی') {
                                                                echo 'selected';
                                                            } ?>>
                                                                فردی
                                                            </option>
                                                            <option <?php if (@$searchResult['noefaaliat'] == 'مشترک') {
                                                                echo 'selected';
                                                            } ?>>
                                                                مشترک
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>قالب پژوهش</th>
                                                    <td>
                                                        <select id="ghalebpazhouhesh" class="pazireshselections"
                                                                name="ghalebpazhouhesh">
                                                            <option selected></option>
                                                            <?php foreach ($ghalebpazhoohesh as $result): ?>
                                                                <option <?php if (@$searchResult['ghalebpazhouhesh'] == $result['ghalebpazhouhesh']) {
                                                                    echo 'selected';
                                                                } ?>>
                                                                    <?php echo ($result['ghalebpazhouhesh']) ? $result['ghalebpazhouhesh'] : '' ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>سطح ارزیابی</th>
                                                    <td>
                                                        <select class="pazireshselections" name="satharzyabi">
                                                            <option selected></option>
                                                            <option <?php if (@$searchResult['satharzyabi'] == 1) {
                                                                echo 'selected';
                                                            } ?>>
                                                                1
                                                            </option>
                                                            <option <?php if (@$searchResult['satharzyabi'] == 2) {
                                                                echo 'selected';
                                                            } ?>>
                                                                2
                                                            </option>
                                                            <option <?php if (@$searchResult['satharzyabi'] == 3) {
                                                                echo 'selected';
                                                            } ?>>
                                                                3
                                                            </option>
                                                            <option <?php if (@$searchResult['satharzyabi'] == 4) {
                                                                echo 'selected';
                                                            } ?>>
                                                                4
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>گروه علمی</th>
                                                    <td>
                                                        <select class="pazireshselections" name="elmigroup">
                                                            <option selected></option>
                                                            <?php foreach ($elmigroup as $result): ?>
                                                                <option <?php if (@$searchResult['groupelmi'] == $result['elmigroup']) {
                                                                    echo 'selected';
                                                                } ?>>
                                                                    <?php echo ($result['elmigroup']) ? $result['elmigroup'] : '' ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>نوع پژوهش</th>
                                                    <td>
                                                        <select class="pazireshselections" name="noepazhoohesh">
                                                            <option selected></option>
                                                            <?php foreach ($noepazhouhesh1 as $result): ?>
                                                                <option <?php if (@$searchResult['noepazhouhesh'] == $result['noepazhouhesh']) {
                                                                    echo 'selected';
                                                                } ?>>
                                                                    <?php echo ($result['noepazhouhesh']) ? $result['noepazhouhesh'] : '' ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>وضعیت نشر</th>
                                                    <td>
                                                        <select class="pazireshselections" name="vaziatnashr">
                                                            <option selected></option>
                                                            <option <?php if (@$searchResult['vaziatnashr'] == 'منتشر شده') {
                                                                echo 'selected';
                                                            } ?>>
                                                                منتشر شده
                                                            </option>
                                                            <option <?php if (@$searchResult['vaziatnashr'] == 'منتشر نشده') {
                                                                echo 'selected';
                                                            } ?>>
                                                                منتشر نشده
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>تعداد صفحه</th>
                                                    <td>
                                                        <input placeholder="تعداد صفحه را وارد کنید"
                                                               class="pazireshselections" type="text" name="tedadsafhe"
                                                               value="<?php echo @$searchResult['tedadsafhe']; ?>"
                                                               id="tedadsafhe">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>بخش ویژه</th>
                                                    <td>
                                                        <select id="bakhshvizheh" class="pazireshselections"
                                                                name="bakhshvizheh">
                                                            <option <?php if (@$searchResult['bakhshvizheh'] == "نیست") {
                                                                echo "selected";
                                                            } ?>>نیست
                                                            </option>
                                                            <option <?php if (@$searchResult['bakhshvizheh'] == "هست") {
                                                                echo "selected";
                                                            } ?>>هست
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php if ($_SESSION['head'] == 1): ?>
                                                    <tr>
                                                        <th>وضعیت پذیرش اثر</th>
                                                        <td>
                                                            <select onchange="checkvaziat()" id="vaziatpaziresh"
                                                                    class="pazireshselections" name="vaziatpaziresh">
                                                                <option <?php if (@$searchResult['vaziatpazireshasar'] == "پذیرش نشد") {
                                                                    echo "selected";
                                                                } ?>>پذیرش نشد
                                                                </option>
                                                                <option <?php if (@$searchResult['vaziatpazireshasar'] == "پذیرش شد") {
                                                                    echo "selected";
                                                                } ?>>پذیرش شد
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="sharayetavaliehtr">
                                                        <th>شرایط اولیه شرکت در جشنواره</th>
                                                        <td>
                                                            <select onchange="checksharayet()" id="sharayetavalieh"
                                                                    class="pazireshselections" name="sharayetavalieh">
                                                                <option <?php if (@$searchResult['sharayetavalliehsherkat'] == "دارد") {
                                                                    echo "selected";
                                                                } ?>>دارد
                                                                </option>
                                                                <option <?php if (@$searchResult['sharayetavalliehsherkat'] == "ندارد") {
                                                                    echo "selected";
                                                                } ?>>ندارد
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="ellattr">
                                                        <th>علت نداشتن شرایط اولیه</th>
                                                        <td>
                                                            <select id="ellat" class="pazireshselections" name="ellat">
                                                                <option selected></option>
                                                                <?php foreach ($ellat as $result): ?>
                                                                    <option <?php if (@$searchResult['ellatnadashtansharayet'] == $result['ellatnadashtansharayet']) {
                                                                        echo 'selected';
                                                                    } else echo ""; ?>>
                                                                        <?php echo ($result['ellatnadashtansharayet']) ? $result['ellatnadashtansharayet'] : '' ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="vaziatostanitr">
                                                        <th>وضعیت برگزیدگی مدرسه ای اثر</th>
                                                        <td>
                                                            <input placeholder="وضعیت برگزیدگی مدرسه ای اثر را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="vaziatmadreseasar"
                                                                   value="<?php echo @$searchResult['vaziatmadreseasar']; ?>"
                                                                   id="vaziatmadreseasar">
                                                        </td>
                                                    </tr>
                                                    <tr id="bargozidehtr">
                                                        <th>برگزیده مدرسه ای</th>
                                                        <td>
                                                            <select class="pazireshselections"
                                                                    name="bargozideh_madrese">
                                                                <option></option>
                                                                <option <?php if (@$searchResult['bargozideh_madrese'] == "می باشد") {
                                                                    echo "selected";
                                                                } ?>>می باشد
                                                                </option>
                                                                <option <?php if (@$searchResult['bargozideh_madrese'] == "نمی باشد") {
                                                                    echo "selected";
                                                                } ?>>نمی باشد
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="emtiaznahaeitr">
                                                        <th> امتیاز نهایی مدرسه</th>
                                                        <td>
                                                            <input id="emtiaznahaei"
                                                                   placeholder="امتیاز نهایی مدرسه را وارد کنید"
                                                                   class="pazireshselections" type="number"
                                                                   name="jamemtiazmadrese"
                                                                   value="<?php echo @$searchResult['jamemtiazmadrese']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr id="vaziatostanitr">
                                                        <th>وضعیت برگزیدگی استانی اثر</th>
                                                        <td>
                                                            <select id="vaziatostani" class="pazireshselections"
                                                                    name="vaziatostani">
                                                                <option selected></option>
                                                                <?php foreach ($vaziatostani as $result): ?>
                                                                    <option <?php if (@$searchResult['vaziatostaniasar'] == $result['vaziatostaniasar']) {
                                                                        echo 'selected';
                                                                    } ?>>
                                                                        <?php echo ($result['vaziatostaniasar']) ? $result['vaziatostaniasar'] : '' ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="bargozidehtr">
                                                        <th>برگزیده استانی</th>
                                                        <td>
                                                            <select class="pazireshselections" name="bargozideh_ostani">
                                                                <option></option>
                                                                <option <?php if (@$searchResult['bargozideh_ostani'] == "می باشد") {
                                                                    echo "selected";
                                                                } ?>>می باشد
                                                                </option>
                                                                <option <?php if (@$searchResult['bargozideh_ostani'] == "نمی باشد") {
                                                                    echo "selected";
                                                                } ?>>نمی باشد
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="bargozidehtr">
                                                        <th>وضعیت صیانتی استان</th>
                                                        <td>
                                                            <select class="pazireshselections" name="approve_sianat">
                                                                <option></option>
                                                                <option value="1" <?php if (@$searchResult['approve_sianat'] == "1") {
                                                                    echo "selected";
                                                                } ?>>تایید شده
                                                                </option>
                                                                <option value="0" <?php if (@$searchResult['approve_sianat'] == "0") {
                                                                    echo "selected";
                                                                } ?>>تایید نشده
                                                                </option>
                                                                <option value="9" <?php if (@$searchResult['approve_sianat'] == "9") {
                                                                    echo "selected";
                                                                } ?>>در حال ثبت نام
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="emtiaznahaeitr">
                                                        <th> امتیاز نهایی استان</th>
                                                        <td>
                                                            <input id="emtiaznahaei"
                                                                   placeholder="امتیاز نهایی استان را وارد کنید"
                                                                   class="pazireshselections" type="number"
                                                                   name="jamemtiazostan"
                                                                   value="<?php echo @$searchResult['jamemtiazostan']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr id="bargozidehtr">
                                                        <th>برگزیده کشوری</th>
                                                        <td>
                                                            <select class="pazireshselections"
                                                                    name="bargozidehkeshvari">
                                                                <option></option>
                                                                <option <?php if (@$searchResult['bargozidehkeshvari'] == "می باشد") {
                                                                    echo "selected";
                                                                } ?>>می باشد
                                                                </option>
                                                                <option <?php if (@$searchResult['bargozidehkeshvari'] == "نمی باشد") {
                                                                    echo "selected";
                                                                } ?>>نمی باشد
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr id="emtiaznahaeitr">
                                                        <th> امتیاز نهایی کشور</th>
                                                        <td>
                                                            <input id="emtiaznahaei"
                                                                   placeholder="امتیاز نهایی کشور را وارد کنید"
                                                                   class="pazireshselections" type="number"
                                                                   name="emtiaznahaei"
                                                                   value="<?php echo @$searchResult['emtiaznahaei']; ?>">
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <!--                    <tr id="filet1">-->
                                                <!--                        <th>فایل ارزیابی تفصیلی اول استان</th>-->
                                                <!--                        <td>-->
                                                <!--                            <input type="file" name="filerate1" accept="application/pdf"/>-->
                                                <!--                        </td>-->
                                                <!--                    </tr>-->
                                                <!--                    <tr id="filet2">-->
                                                <!--                        <th>فایل ارزیابی تفصیلی دوم استان</th>-->
                                                <!--                        <td>-->
                                                <!--                            <input type="file" name="filerate2" accept="application/pdf"/>-->
                                                <!--                        </td>-->
                                                <!--                    </tr>-->
                                                <!--                    <tr id="filet3">-->
                                                <!--                        <th>فایل ارزیابی تفصیلی سوم استان</th>-->
                                                <!--                        <td>-->
                                                <!--                            <input type="file" name="filerate3" accept="application/pdf"/>-->
                                                <!--                        </td>-->
                                                <!--                    </tr>-->
                                                <!--                    <tr id="fileasar">-->
                                                <!--                        <th>فایل اثر</th>-->
                                                <!--                        <td>-->
                                                <!--                            <input type="file" name="fileasar" accept="application/pdf"/>-->
                                                <!--                        </td>-->
                                                <!--                    </tr>-->


                                            </table>
                                            <br/><br/>
                                            <h4 style="background-color: #5BB318; padding:10px;color:white;border-radius: 5px">
                                                اطلاعات صاحب اثر</h4>
                                            <table class="tablepaziresh">
                                                <tr>
                                                    <th>نام</th>
                                                    <td>
                                                        <input placeholder="نام را وارد کنید" class="pazireshselections"
                                                               type="text" name="fname"
                                                               value="<?php echo @$searchResultPerson['fname']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>نام خانوادگی</th>
                                                    <td>
                                                        <input placeholder="نام خانوادگی را وارد کنید"
                                                               class="pazireshselections" type="text" name="family"
                                                               value="<?php echo @$searchResultPerson['family']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>نام پدر</th>
                                                    <td>
                                                        <input placeholder="نام پدر را وارد کنید"
                                                               class="pazireshselections" type="text" name="father_name"
                                                               value="<?php echo @$searchResultPerson['father_name']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>کد ملی</th>
                                                    <td>
                                                        <input placeholder="کد ملی را وارد کنید"
                                                               class="pazireshselections" type="text" name="codemelli"
                                                               value="<?php echo @$searchResultPerson['codemelli']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>تاریخ تولد</th>
                                                    <td>
                                                        <input placeholder="تاریخ تولد را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="tarikhtavallod"
                                                               value="<?php echo @$searchResultPerson['tarikhtavallod']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>جنسیت</th>
                                                    <td>
                                                        <select name="gender">
                                                            <option <?php if (@$searchResultPerson['gender'] == '') echo 'selected'; ?>></option>
                                                            <option <?php if (@$searchResultPerson['gender'] == 'مرد') echo 'selected'; ?>>
                                                                مرد
                                                            </option>
                                                            <option <?php if (@$searchResultPerson['gender'] == 'زن') echo 'selected'; ?>>
                                                                زن
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>وضعیت تاهل</th>
                                                    <td>
                                                        <select name="vaziattaahol">
                                                            <option <?php if (@$searchResultPerson['vaziattaahol'] == '') echo 'selected'; ?>></option>
                                                            <option <?php if (@$searchResultPerson['vaziattaahol'] == 'مجرد') echo 'selected'; ?>>
                                                                مجرد
                                                            </option>
                                                            <option <?php if (@$searchResultPerson['vaziattaahol'] == 'متاهل') echo 'selected'; ?>>
                                                                متاهل
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>استان</th>
                                                    <td>
                                                        <select name="state_custom" id="statecustom">
                                                            <option></option>
                                                            <?php

                                                            $resultstates = mysqli_query($connection, "select distinct name from state order by name asc");
                                                            foreach ($resultstates as $state_info):
                                                                ?>
                                                                <option <?php if (@$state_info['name'] == @$searchResultPerson['ostantahsili']) {
                                                                    echo 'selected';
                                                                } ?> value="<?php echo @$state_info['name']; ?>"><?php echo $state_info['name']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr id="citytr">
                                                    <th>شهر</th>
                                                    <td>
                                                        <input placeholder="شهر تحصیلی را وارد کنید"
                                                               class="pazireshselections" type="text" name="city_custom"
                                                               value="<?php echo @$searchResultPerson['shahrtahsili']; ?>">
                                                    </td>
                                                </tr>
                                                <tr id="schooltr">
                                                    <th>مدرسه</th>
                                                    <td>
                                                        <input placeholder="نام مدرسه را وارد کنید"
                                                               class="pazireshselections" type="text" name="madrese"
                                                               value="<?php echo @$searchResultPerson['madrese']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>تلفن همراه</th>
                                                    <td>
                                                        <input placeholder="تلفن همراه را وارد کنید"
                                                               class="pazireshselections" type="text" name="mobile"
                                                               value="<?php echo @$searchResultPerson['mobile']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>تلفن ثابت</th>
                                                    <td>
                                                        <input placeholder="تلفن ثابت را وارد کنید"
                                                               class="pazireshselections" type="text" name="telephone"
                                                               value="<?php echo @$searchResultPerson['telephone']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>آدرس</th>
                                                    <td>
                                                        <textarea
                                                                name="address"><?php echo @$searchResultPerson['address'] ?></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>پایه</th>
                                                    <td>
                                                        <input placeholder="پایه را وارد کنید"
                                                               class="pazireshselections" type="text" name="paye"
                                                               value="<?php echo @$searchResultPerson['paye']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>سطح</th>
                                                    <td>
                                                        <input placeholder="سطح را وارد کنید" class="pazireshselections"
                                                               type="text" name="sath"
                                                               value="<?php echo @$searchResultPerson['sath']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>ترم</th>
                                                    <td>
                                                        <input placeholder="ترم را وارد کنید" class="pazireshselections"
                                                               type="text" name="term"
                                                               value="<?php echo @$searchResultPerson['term']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>ایمیل</th>
                                                    <td>
                                                        <input placeholder="ایمیل را وارد کنید"
                                                               class="pazireshselections" type="email" name="email"
                                                               value="<?php echo @$searchResultPerson['email']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>ملیت</th>
                                                    <td>
                                                        <input placeholder="ملیت را وارد کنید"
                                                               class="pazireshselections" type="text" name="meliat"
                                                               value="<?php echo @$searchResultPerson['meliat']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>نام کشور</th>
                                                    <td>
                                                        <input placeholder="نام کشور را وارد کنید"
                                                               class="pazireshselections" type="text" name="namekeshvar"
                                                               value="<?php echo @$searchResultPerson['namekeshvar']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>شماره گذرنامه</th>
                                                    <td>
                                                        <input placeholder="شماره گذرنامه را وارد کنید"
                                                               class="pazireshselections" type="text" name="gozarname"
                                                               value="<?php echo @$searchResultPerson['gozarname']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>رشته تخصصی حوزوی</th>
                                                    <td>
                                                        <input placeholder="رشته تخصصی حوزوی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="reshtetakhasosihozavi"
                                                               value="<?php echo @$searchResultPerson['reshtetakhasosihozavi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>مرکز تخصصی حوزوی</th>
                                                    <td>
                                                        <input placeholder="مرکز تخصصی حوزوی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="markaztakhasosihozavi"
                                                               value="<?php echo @$searchResultPerson['markaztakhasosihozavi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>نام مرکز تحصیلی</th>
                                                    <td>
                                                        <input placeholder="نام مرکز تحصیلی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="namemarkaztahsili"
                                                               value="<?php echo @$searchResultPerson['namemarkaztahsili']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>نوع تحصیلات حوزوی</th>
                                                    <td>
                                                        <input placeholder="نوع تحصیلات حوزوی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="noetahsilathozavi"
                                                               value="<?php echo @$searchResultPerson['noetahsilathozavi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>تحصیلات غیر حوزوی</th>
                                                    <td>
                                                        <input placeholder="تحصیلات غیر حوزوی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="tahsilatghhozavi"
                                                               value="<?php echo @$searchResultPerson['tahsilatghhozavi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>رشته دانشگاهی</th>
                                                    <td>
                                                        <input placeholder="رشته دانشگاهی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="reshtedaneshgahi"
                                                               value="<?php echo @$searchResultPerson['reshtedaneshgahi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>شماره پرونده تحصیلی</th>
                                                    <td>
                                                        <input placeholder="شماره پرونده تحصیلی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="shparvandetahsili"
                                                               value="<?php echo @$searchResultPerson['shparvandetahsili']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>سال اخذ مدرک غیر حوزوی</th>
                                                    <td>
                                                        <input placeholder="سال اخذ مدرک غیر حوزوی را وارد کنید"
                                                               class="pazireshselections" type="text"
                                                               name="salakhzmadrakghhozavi"
                                                               value="<?php echo @$searchResultPerson['salakhzmadrakghhozavi']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>استاد می باشد یا خیر؟</th>
                                                    <td>
                                                        <select name="master">
                                                            <option <?php if (@$searchResultPerson['master'] == 'هست') echo 'selected'; ?>>
                                                                هست
                                                            </option>
                                                            <option <?php if (@$searchResultPerson['master'] == 'نیست') echo 'selected'; ?>>
                                                                نیست
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>کد استادی</th>
                                                    <td>
                                                        <input placeholder="کد استادی را وارد کنید"
                                                               class="pazireshselections" type="text" name="mastercode"
                                                               value="<?php echo @$searchResultPerson['mastercode']; ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                            <?php if ($_SESSION['head'] == 1): ?>
                                                <br/><br/>
                                                <h4 style="background-color: #5BB318; padding:10px;color:white;border-radius: 5px">
                                                    وضعیت مرحله ای ارزیابی مدرسه ای (حتی المقدور از تغییر در فیلد های
                                                    این بخش اجتناب نمایید)</h4>
                                                <table class="tablepaziresh">
                                                    <?php
                                                    $selection = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$postcode'");
                                                    foreach ($selection as $ejmalimadrese) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili1madrese) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili2madrese) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili3madrese) {
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th>نوبت ارزیابی</th>
                                                        <td>
                                                            <select name="nobat_arzyabi_madrese">
                                                                <option <?php if (@$searchResult['nobat_arzyabi_madrese'] == '') echo 'selected'; ?>></option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_madrese'] == 'ارزیابی اجمالی') echo 'selected'; ?>>
                                                                    ارزیابی اجمالی
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_madrese'] == 'اجمالی ردی') echo 'selected'; ?>>
                                                                    اجمالی ردی
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_madrese'] == 'تفصیلی اول') echo 'selected'; ?>>
                                                                    تفصیلی اول
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_madrese'] == 'تفصیلی دوم') echo 'selected'; ?>>
                                                                    تفصیلی دوم
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_madrese'] == 'تفصیلی سوم') echo 'selected'; ?>>
                                                                    تفصیلی سوم
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>وضعیت ارزیابی</th>
                                                        <td>
                                                            <select name="vaziatkarnamemadrese">
                                                                <option <?php if (@$searchResult['vaziatkarnamemadrese'] == '') echo 'selected'; ?>></option>
                                                                <option <?php if (@$searchResult['vaziatkarnamemadrese'] == 'در حال ارزیابی') echo 'selected'; ?>>
                                                                    در حال ارزیابی
                                                                </option>
                                                                <option <?php if (@$searchResult['vaziatkarnamemadrese'] == 'اتمام ارزیابی') echo 'selected'; ?>>
                                                                    اتمام ارزیابی
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب اجمالی</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب اجمالی را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabejmali_madrese"
                                                                   value="<?php if (@$ejmalimadrese['rater_id'] == null or @$ejmalimadrese['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabejmali_madrese'];
                                                                   } else {
                                                                       echo @$ejmalimadrese['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز اجمالی</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$ejmalimadrese['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی اول</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی اول را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili1_madrese"
                                                                   value="<?php if (@$tafsili1madrese['rater_id'] == null or @$tafsili1madrese['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabtafsili1_madrese'];
                                                                   } else {
                                                                       echo @$tafsili1madrese['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی اول</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$tafsili1madrese['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی دوم</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی دوم را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili2_madrese"
                                                                   value="<?php if (@$tafsili2madrese['rater_id'] == null or @$tafsili2adrese['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabtafsili2_madrese'];
                                                                   } else {
                                                                       echo @$tafsili2madrese['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی دوم</th>
                                                        <td>
                                                            <label>
                                                                <?php
                                                                echo @$tafsili2madrese['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی سوم</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی سوم را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili3_madrese"
                                                                   value="<?php if (@$tafsili3madrese['rater_id'] == null or @$tafsili3madrese['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabtafsili3_madrese'];
                                                                   } else {
                                                                       echo @$tafsili3madrese['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی سوم</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$tafsili3madrese['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: black">
                                                        <th style="text-align: left; color: aliceblue">جمع امتیاز
                                                            مدرسه
                                                        </th>
                                                        <td>
                                                            <label>
                                                                <?php
                                                                echo @$searchResult['jamemtiazmadrese'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br/><br/>
                                                <h4 style="background-color: #5BB318; padding:10px;color:white;border-radius: 5px">
                                                    وضعیت مرحله ای ارزیابی استانی (حتی المقدور از تغییر در فیلد های این
                                                    بخش اجتناب نمایید)</h4>
                                                <table class="tablepaziresh">
                                                    <?php
                                                    $selection = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$postcode'");
                                                    foreach ($selection as $ejmaliostan) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili1ostan) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili2ostan) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili3ostan) {
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th>نوبت ارزیابی</th>
                                                        <td>
                                                            <select name="nobat_arzyabi_ostani">
                                                                <option <?php if (@$searchResult['nobat_arzyabi_ostani'] == '') echo 'selected'; ?>></option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_ostani'] == 'ارزیابی اجمالی') echo 'selected'; ?>>
                                                                    ارزیابی اجمالی
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_ostani'] == 'اجمالی ردی') echo 'selected'; ?>>
                                                                    اجمالی ردی
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_ostani'] == 'تفصیلی اول') echo 'selected'; ?>>
                                                                    تفصیلی اول
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_ostani'] == 'تفصیلی دوم') echo 'selected'; ?>>
                                                                    تفصیلی دوم
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi_ostani'] == 'تفصیلی سوم') echo 'selected'; ?>>
                                                                    تفصیلی سوم
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>وضعیت ارزیابی</th>
                                                        <td>
                                                            <select name="vaziatkarnameostani">
                                                                <option <?php if (@$searchResult['vaziatkarnameostani'] == '') echo 'selected'; ?>></option>
                                                                <option <?php if (@$searchResult['vaziatkarnameostani'] == 'در حال ارزیابی') echo 'selected'; ?>>
                                                                    در حال ارزیابی
                                                                </option>
                                                                <option <?php if (@$searchResult['vaziatkarnameostani'] == 'اتمام ارزیابی') echo 'selected'; ?>>
                                                                    اتمام ارزیابی
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب اجمالی</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب اجمالی را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabejmali_ostani"
                                                                   value="<?php if (@$ejmaliostan['rater_id'] == null or @$ejmaliostan['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabejmali_ostani'];
                                                                   } else {
                                                                       echo @$ejmaliostan['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز اجمالی</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$ejmaliostan['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی اول</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی اول را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili1_ostani"
                                                                   value="<?php if (@$tafsili1ostan['rater_id'] == null or @$tafsili1ostan['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabtafsili1_ostani'];
                                                                   } else {
                                                                       echo @$tafsili1ostan['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی اول</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$tafsili1ostan['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی دوم</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی دوم را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili2_ostani"
                                                                   value="<?php if (@$tafsili2ostan['rater_id'] == null or @$tafsili2ostan['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabtafsili2_ostani'];
                                                                   } else {
                                                                       echo @$tafsili2ostan['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی دوم</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$tafsili2ostan['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی سوم</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی سوم را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili3_ostani"
                                                                   value="<?php if (@$tafsili3ostan['rater_id'] == null or @$tafsili3ostan['rater_id'] == '') {
                                                                       echo $searchResult['codearzyabtafsili3_ostani'];
                                                                   } else {
                                                                       echo @$tafsili3ostan['rater_id'];
                                                                   } ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی سوم</th>
                                                        <td>
                                                            <label>
                                                                <?php

                                                                echo @$tafsili3ostan['jam'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: black">
                                                        <th style="text-align: left; color: aliceblue">جمع امتیاز
                                                            استان
                                                        </th>
                                                        <td>
                                                            <label>
                                                                <?php
                                                                echo @$searchResult['jamemtiazostan'];
                                                                ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br/><br/>
                                                <h4 style="background-color: #5BB318; padding:10px;color:white;border-radius: 5px">
                                                    وضعیت مرحله ای ارزیابی کشوری (حتی المقدور از تغییر در فیلد های این
                                                    بخش اجتناب نمایید)</h4>
                                                <table class="tablepaziresh">
                                                    <?php
                                                    $selection = mysqli_query($connection, "select * from t_a_ejmali where codeasar='$postcode'");
                                                    foreach ($selection as $ejmalikeshvar) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili1 where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili1keshvar) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili2 where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili2keshvar) {
                                                    }
                                                    $selection = mysqli_query($connection, "select * from tafsili3 where codeasar='$postcode'");
                                                    foreach ($selection as $tafsili3keshvar) {
                                                    }
                                                    ?>
                                                    <tr>
                                                        <th>نوبت ارزیابی</th>
                                                        <td>
                                                            <select name="nobat_arzyabi">
                                                                <option <?php if (@$searchResult['nobat_arzyabi'] == '') echo 'selected'; ?>></option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi'] == 'ارزیابی اجمالی') echo 'selected'; ?>>
                                                                    ارزیابی اجمالی
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi'] == 'اجمالی ردی') echo 'selected'; ?>>
                                                                    اجمالی ردی
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi'] == 'تفصیلی اول') echo 'selected'; ?>>
                                                                    تفصیلی اول
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi'] == 'تفصیلی دوم') echo 'selected'; ?>>
                                                                    تفصیلی دوم
                                                                </option>
                                                                <option <?php if (@$searchResult['nobat_arzyabi'] == 'تفصیلی سوم') echo 'selected'; ?>>
                                                                    تفصیلی سوم
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>وضعیت ارزیابی</th>
                                                        <td>
                                                            <select name="vaziatkarname">
                                                                <option <?php if (@$searchResult['vaziatkarname'] == '') echo 'selected'; ?>></option>
                                                                <option <?php if (@$searchResult['vaziatkarname'] == 'در حال ارزیابی') echo 'selected'; ?>>
                                                                    در حال ارزیابی
                                                                </option>
                                                                <option <?php if (@$searchResult['vaziatkarname'] == 'اتمام ارزیابی') echo 'selected'; ?>>
                                                                    اتمام ارزیابی
                                                                </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب اجمالی</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب اجمالی را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabejmali"
                                                                   value="<?php echo @$searchResult['codearzyabejmali']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز اجمالی</th>
                                                        <td>
                                                            <label>
                                                                <?php echo @$ejmalikeshvar['jam']; ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی اول</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی اول را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili1"
                                                                   value="<?php echo @$searchResult['codearzyabtafsili1']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی اول</th>
                                                        <td>
                                                            <label>
                                                                <?php echo @$tafsili1keshvar['jam']; ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی دوم</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی دوم را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili2"
                                                                   value="<?php echo @$searchResult['codearzyabtafsili2']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی دوم</th>
                                                        <td>
                                                            <label>
                                                                <?php echo @$tafsili2keshvar['jam']; ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>ارزیاب تفصیلی سوم</th>
                                                        <td>
                                                            <input placeholder="کد ارزیاب تفصیلی سوم را وارد کنید"
                                                                   class="pazireshselections" type="text"
                                                                   name="codearzyabtafsili3"
                                                                   value="<?php echo @$searchResult['codearzyabtafsili3']; ?>">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>امتیاز تفصیلی سوم</th>
                                                        <td>
                                                            <label>
                                                                <?php echo @$tafsili3keshvar['jam']; ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: black">
                                                        <th style="text-align: left; color: aliceblue">جمع امتیاز کشور
                                                        </th>
                                                        <td>
                                                            <label>
                                                                <?php echo @$searchResult['emtiaznahaei']; ?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br/><br/>
                                            <?php endif; ?>
                                            <h4 style="background-color: #5BB318; padding:10px;color:white;border-radius: 5px">
                                                فایل های اثر</h4>
                                            <table class="tablepazireshlinks">
                                                <?php
                                                $selection = mysqli_query($connection, "select * from etelaat_a where codeasar='$postcode'");
                                                foreach ($selection as $etelaat_a_files) {
                                                }
                                                @$pdf = $etelaat_a_files['fileasar'];
                                                @$word = $etelaat_a_files['fileasar_word'];
                                                ?>
                                                <tr>
                                                    <th>فایل PDF</th>
                                                    <td>
                                                        <label>
                                                            <?php
                                                            if ($pdf != null and $pdf != 'dist/files/asar_files/') {
                                                                echo "<a style='color: #0a58ca' target='_blank' href='$pdf'>" . 'دانلود فایل PDF' . "</a>";
                                                            } else {
                                                                echo 'موجود نیست';
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <th>برای تغییر فایل بر روی گزینه روبرو کلیک کرده و فایل جدید را
                                                        انتخاب کنید.(فرمت PDF)
                                                    </th>
                                                    <td><input name="fileasar" value="" type="file"
                                                               accept="application/pdf"></td>
                                                </tr>
                                                <tr>
                                                    <th>فایل WORD</th>
                                                    <td>
                                                        <label>
                                                            <?php
                                                            if ($word != null and $word != 'dist/files/asar_files_word/') {
                                                                echo "<a style='color: #0a58ca' target='_blank' href='$word'>" . 'دانلود فایل WORD' . "</a>";
                                                            } else {
                                                                echo 'موجود نیست';
                                                            }
                                                            ?>
                                                        </label>
                                                    </td>
                                                    <th>برای تغییر فایل بر روی گزینه روبرو کلیک کرده و فایل جدید را
                                                        انتخاب کنید.(فرمت DOC یا DOCX)
                                                    </th>
                                                    <td><input name="fileasar_word" value="" type="file"
                                                               accept=".docx,.doc"></td>

                                                </tr>
                                            </table>
                                            <br/><br/>
                                            <p>
                                                تاریخ ثبت:
                                                &nbsp;&nbsp;
                                                <label><?php echo $date ?></label>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </p>
                                            <br/>
                                            <div id="wrap">

                                                <input class="subpaziresh" type="submit"
                                                       name="<?php if ($_SESSION['head'] == 1) {
                                                           echo 'paziresh';
                                                       } else {
                                                           echo 'pazireshcity';
                                                       } ?>" value="ویرایش اثر"
                                                       onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات اثر، بر روی گزینه OK کلیک کنید')">
                                            </div>

                                        </center>

                                    </form>
                                <?php endif; ?>
                            </div>
                    </section>
                </div>

            </div>
        </section>
    </div>
    <script>
        function validatesearch() {
            var searchinput = document.getElementById("searchinput").value;
            if (searchinput == '' || searchinput == null) {
                alert("کد اثر را وارد کنید");
                return false;
            } else {
                return true;
            }
        }

        function validatepaziresh() {
            var nameasar = document.getElementById("nameasar").value;
            if (nameasar == '' || nameasar == null) {
                alert('نام اثر وارد نشده است');
                return false;
            } else {
                return true;
            }

        }

        // window.onload= function checkvaziatpaziresh(){
        //     var vaziatpaziresh = document.getElementById("vaziatpaziresh").value;
        //     if (vaziatpaziresh=="پذیرش نشد"){
        //         document.getElementById("sharayetavaliehtr").style.display="none";
        //         var sharayetavaliehtr = document.getElementById("sharayetavaliehtr").style.display="none";
        //         var ellattr = document.getElementById("ellattr").style.display="none";
        //         var vaziatostanitr = document.getElementById("vaziatostanitr").style.display="none";
        //         var emtiaznahaeitr = document.getElementById("emtiaznahaeitr").style.display="none";
        //         var bargozidehtr = document.getElementById("bargozidehtr").style.display="none";
        //         var filet1 = document.getElementById("filet1").style.display="none";
        //         var filet2 = document.getElementById("filet2").style.display="none";
        //         var filet3 = document.getElementById("filet3").style.display="none";
        //         var fileasar = document.getElementById("fileasar").style.display="none";
        //     }else if (vaziatpaziresh=="پذیرش شد"){
        //         document.getElementById("sharayetavaliehtr").style.display="";
        //         var sharayetavaliehtr = document.getElementById("sharayetavaliehtr").style.display="";
        //         var ellattr = document.getElementById("ellattr").style.display="";
        //         var vaziatostanitr = document.getElementById("vaziatostanitr").style.display="";
        //         var emtiaznahaeitr = document.getElementById("emtiaznahaeitr").style.display="";
        //         var bargozidehtr = document.getElementById("bargozidehtr").style.display="";
        //         var filet1 = document.getElementById("filet1").style.display="";
        //         var filet2 = document.getElementById("filet2").style.display="";
        //         var filet3 = document.getElementById("filet3").style.display="";
        //         var fileasar = document.getElementById("fileasar").style.display="";
        //         var sharayetavalieh = document.getElementById("sharayetavalieh").value;
        //         if (sharayetavalieh=="دارد"){
        //             document.getElementById("ellattr").style.display="none";
        //         }else if (sharayetavalieh=="ندارد"){
        //             document.getElementById("ellattr").style.display="";
        //         }
        //     }
        //
        // }
        // function checkvaziat(){
        //     var sharayetavalieh=document.getElementById("sharayetavalieh");
        //     var ellattr=document.getElementById("ellattr")
        //     if (sharayetavalieh=='پذیرش شد'){
        //
        //     }
        // }
        // function checksharayet(){
        //     if (sharayetavalieh=="دارد"){
        //         document.getElementById("ellattr").style.display="none";
        //     }else if (sharayetavalieh=="ندارد"){
        //         document.getElementById("ellattr").style.display="";
        //     }
        // }
        // function validatepaziresh(){
        //     var vaziatpaziresh = document.getElementById("vaziatpaziresh").value;
        //     var sharayetavalieh = document.getElementById("sharayetavalieh").value;
        //     var ellat = document.getElementById("ellat").value;
        //     var vaziatostani = document.getElementById("vaziatostani").value;
        //     var emtiaznahaei = document.getElementById("emtiaznahaei").value;
        //     var bakhshvizheh = document.getElementById("bakhshvizheh").value;
        //     var ghalebpazhouhesh = document.getElementById("ghalebpazhouhesh").value;
        //     var tedadsafhe = document.getElementById("tedadsafhe").value;
        //
        //     if (vaziatpaziresh=="پذیرش شد"){
        //         if (ghalebpazhouhesh=="مقاله"){
        //             if (tedadsafhe==null || tedadsafhe=='' || tedadsafhe<5){
        //                 alert("تعداد صفحه کمتر از 5 است")
        //                 return false;
        //             }
        //         }
        //         else if (sharayetavalieh=="ندارد" && ellat=="انتخاب کنید"){
        //             alert("علت نداشتن شرایط اولیه را انتخاب کنید");
        //             return false;
        //         }
        //         else if (sharayetavalieh=="دارد" && vaziatostani=="انتخاب کنید"){
        //             alert("وضعیت استانی اثر را انتخاب کنید");
        //             return false;
        //         }
        //         else if (sharayetavalieh=="دارد" && vaziatostani != "انتخاب کنید"){
        //             if (bakhshvizheh=="هست" && emtiaznahaei<=75){
        //                 alert(" نمره استانی بالای 75 نیست");
        //                 return false;
        //             }
        //             else if (bakhshvizheh=="نیست" && emtiaznahaei<=80){
        //                 alert(" نمره استانی بالای 80 نیست");
        //                 return false;
        //             }
        //         }
        //         else{
        //             return true;
        //         }
        //     }else{
        //         return true;
        //     }
        //
        // }
        function changecolor() {
            document.getElementById("linkfile").style.color = "blue";
        }
    </script>
<?php
endif;
include_once 'footer.php';
?>