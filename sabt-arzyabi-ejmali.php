<?php include_once 'header.php'; ?>

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
    <?php
    $searchResult = null;
    @$postcode = $_POST['code'];
    if (isset($postcode) && !empty($postcode)) {
        $result = mysqli_query($connection, "select * from `t_a_ejmali` where `codeasar`='$postcode' and jam is null and rater_id='" . $rows['code'] . "'");
        foreach ($result as $rows_ejmali) {
        }
        $result = mysqli_query($connection, "select * from `etelaat_a` where `codeasar`='$postcode'");
        foreach ($result as $rows_eta) {
        }
    }
    ?>

    <section class="content">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-solid box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            <?php if (isset($_POST['editeo']) or isset($_POST['editem'])): ?>
                                ویرایش ارزیابی اجمالی
                            <?php else: ?>
                                ثبت ارزیابی اجمالی
                            <?php endif; ?>

                        </h3>

                    </div>
                    <?php if ($_SESSION['head'] == 1 and (!isset($_POST['ejmali_madrese_log']) and !isset($_POST['ejmali_ostan_log']))): ?>
                        <div class="box-body">

                            <form id="myform" method="post" action="build/php/inc.php" onsubmit="return validateForm()">
                                <input type="hidden" name="karbar" value="<?php echo $rows['code']; ?>">
                                <p>کد اثر
                                    <input style="width: 120px; border-radius: 5px; padding: 5px" type="text"
                                           disabled="disabled" value="<?php
                                    if (isset($_POST['submit']) and !empty($_POST['submit'])) {
                                        echo $_POST['code'];
                                    } else {
                                        echo @$rows_eta['codeasar'];
                                    } ?>">

                                    <input name="codeasarfield" type="hidden" value="<?php
                                    if (isset($_POST['code']) and !empty($_POST['code'])) {
                                        echo $_POST['code'];
                                    } else {
                                        echo @$rows_eta['codeasar'];
                                    } ?>">
                                    <br><br/>

                                    <span>
                        نام اثر
                        <input style="width: 90%; border-radius: 5px; padding: 5px" type="text" disabled="disabled"
                               value="<?php
                               if (isset($_POST['code']) and !empty($_POST['code'])) {
                                   echo @$rows_eta['nameasar'];
                               } ?>">
                    </span>


                                </p>
                                <br/>
                                <center>
                                    نظر شما:
                                    <select style="" name="nazar" id="nazar">
                                        <option selected>انتخاب کنید</option>
                                        <option>راه‌یابی اثر به مرحله تفصیلی</option>
                                        <option>توقف اثر در مرحله اجمالی</option>
                                    </select>
                                </center>
                                <br/>
                                <div class="row">
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box box-info">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    ارزشیابی توصیفی:
                                                </h3>
                                            </div>
                                            <?php
                                            $selectfromet = mysqli_query($connection, "select * from etelaat_a where codeasar='$postcode'");
                                            foreach ($selectfromet as $itemset) {
                                            }
                                            ?>
                                            <div class="box-body">
                                <textarea name="tozihat" class="tozihat_textarea" placeholder="توضیحات را وارد کنید">
با سپاس از شرکت‌کننده محترم، این اثر در مرحله کشوری جشنواره توسط ارزیابان مختلف گروه «<?php echo $itemset['groupelmi'] ?>» بصورت جداگانه مورد بررسی قرار گرفت که برآیند نظرات ارزیابان، توقف این اثر در مرحله ارزیابی اجمالی می‌باشد.
در ادامه، نظرات و توضیحات ارزیابان جشنواره درباره اثر شما به شرح زیر است:

• ارزیاب اول:



• ارزیاب دوم:



• ارزیاب سوم:

<?php
if (isset($_POST['tozihat']) and !empty($_POST['tozihat'])) {
    $rows_ejmali['tozihat'] = $_POST['tozihat'];
}
echo @$rows_ejmali['tozihat']; ?>
</textarea>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <center>

                                    <p class="row1-ejmali">
                                        تاریخ ثبت
                                        &nbsp;&nbsp;
                                        <input class="tarikh" disabled="disabled" value="<?php echo jdate("Y/n/j") ?>">


                                </center>
                                </p>
                                <center>
                                    <p class="virayesh-ejmali-button">
                                        <input style="padding: 6px 10px 5px 10px" type="submit" name="setejmali"
                                               onclick="return confirm('ارزیاب گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                               value="ثبت">
                                    </p>
                                </center>

                            </form>
                        </div>

                    <?php
                    elseif (($_SESSION['head'] == 0 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3 or $_SESSION['head'] == 1) and $_SESSION['approved'] == 1):
                        ?>
                        <?php
                        if (isset($_POST['code'])) {
                            $codeasar = $_POST['code'];
                        } elseif (isset($_POST['editeo'])) {
                            $codeasar = $_POST['editeo'];
                        } elseif (isset($_POST['editem'])) {
                            $codeasar = $_POST['editem'];
                        } elseif (isset($_POST['ejmali_ostan_log'])) {
                            $codeasar = $_POST['codeasar'];
                        } elseif (isset($_POST['ejmali_madrese_log'])) {
                            $codeasar = $_POST['codeasar'];
                        }
                        $query = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar'");
                        foreach ($query as $asar_items) {
                        }

                        if (isset($_POST['editeo']) or isset($_POST['editem']) or isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) {
                            switch ($_SESSION['head']) {
                                case 2:
                                case 0:
                                case 1:
                                    if (isset($_POST['ejmali_ostan_log'])) {
                                        $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                    } elseif (isset($_POST['ejmali_madrese_log'])) {
                                        $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                    }else{
                                        $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                    }
                                    break;
                                case 3:
                                    $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                    break;
                            }
                            foreach ($query as $ejmali_items) {
                            }
                        }
                        ?>
                        <div class="box-body">
                            <form id="myform" method="post" action="build/php/inc.php"
                                  onsubmit="return validateFormn()">
                                <label style="background-color: #e8ecf4;padding: 7px;border-radius: 5px">کد
                                    اثر: <?php echo @$asar_items['codeasar']; ?></label>
                                <input type="hidden" name="codeasarfield"
                                       value="<?php echo $asar_items['codeasar']; ?>">
                                <hr>
                                <span>
                        <label style="background-color: #e8ecf4;padding: 7px;border-radius: 5px">نام اثر: <?php echo @$asar_items['nameasar']; ?></label>
                    </span>
                                <hr>
                                <?php if (isset($_POST['editeo']) or isset($_POST['editem']) or isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])): ?>
                                    <span>
                        <label style="background-color: #e8ecf4;padding: 7px;border-radius: 5px">این اثر در تاریخ:
                            <?php
                            echo $ejmali_items['tarikhsabt_year'] . '/' . $ejmali_items['tarikhsabt_month'] . '/' . $ejmali_items['tarikhsabt_day'];
                            @$rater = $ejmali_items['rater_id'];
                            $query = mysqli_query($connection, "select * from rater_list where username='$rater'");
                            foreach ($query as $rater_info) {
                            }
                            echo ' توسط استاد ' . $rater_info['name'] . ' ' . $rater_info['family'] . ' ارزیابی شده است.';
                            ?></label>
                </span>
                                <?php endif; ?>
                                <br/><br/>
                                <center>
                                    <table class="tableejmali">
                                        <tr>
                                            <th>1- رعایت ساختار اثر*</th>
                                            <td>
                                                <input id="t1" type="number" step="0.25" name="t1" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['reayatsakhtarasar'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 15
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>2- شیوایی و رسایی متن</th>
                                            <td>
                                                <input id="t2" type="number" step="0.25" name="t2" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['shivaeematn'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 5
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>3- رعایت آیین نگارش</th>
                                            <td>
                                                <input id="t3" type="number" step="0.25" name="t3" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['reayataeinnegaresh'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 5
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>4- تبیین دقیق مساله</th>
                                            <td>
                                                <input id="t4" type="number" step="0.25" name="t4" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['tabiinmasale'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 10
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>5- استفاده از منابع معتبر و متعدد</th>
                                            <td>
                                                <input id="t5" type="number" step="0.25" name="t5" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['manabemotabar'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 10
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>6- قابلیت علمی اثر</th>
                                            <td>
                                                <input id="t6" type="number" step="0.25" name="t6" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['ghabeliatelmiasar'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 32
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>7- سازمان دهی و ترتیب منطقی مباحث</th>
                                            <td>
                                                <input id="t7" type="number" step="0.25" name="t7" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['sazmandehimabahes'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 13
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>8- پرهیز از مطالب حاشیه ای و زائد</th>
                                            <td>
                                                <input id="t8" type="number" step="0.25" name="t8" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['parhizazmatalebzaed'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 5
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>9- کیفیت جمع بندی و نتیجه گیری</th>
                                            <td>
                                                <input id="t9" type="number" step="0.25" name="t9" class="rate_inputs"
                                                       onchange="calcular()" value="<?php if (!empty($ejmali_items)) {
                                                    echo $ejmali_items['keyfiatjambandi'];
                                                } ?>" <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?>>
                                                &nbsp;&nbsp;
                                                از 5
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="border: 0px;border-bottom-color: white;text-align: left; background-color: white">

                                            </th>
                                            <td style="border: 0px;text-align: center; ">
                                                جمع امتیازات:
                                                <label style="padding: 1px;color: blue"
                                                       id="resultado"><?php if (!empty($ejmali_items)) {
                                                        echo @$ejmali_items['jam'];
                                                    } ?></label>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                </center>
                                <br/>
                                <div class="row">
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box box-solid box-warning">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    *توضیح آیتم اول (رعایت ساختار اثر):
                                                </h3>
                                            </div>
                                            <div class="box-body">
                                                <p class="tozihat_arzyabi_paragraphs">در مقاله: عنوان مناسب، چکیده و
                                                    کلیدواژه، مقدمه، فهرست منابع - ارجاع‌دهی واضح و شفاف (هر کدام 3
                                                    امتیاز)</p>
                                                <p class="tozihat_arzyabi_paragraphs">در پایان‌نامه: عنوان مناسب، چکیده
                                                    و کلیدواژه، فهرست کامل مطالب، مقدمه، فهرست منابع، ارجاع‌دهی واضح و
                                                    شفاف (هرکدام 1.5 امتیاز) و رعایت ضوابط پایان‌نامه نویسی (6
                                                    امتیاز)</p>
                                                <p class="tozihat_arzyabi_paragraphs">در کتاب: عنوان مناسب، فهرست کامل
                                                    مطالب، مقدمه، فهرست منابع، ارجاع‌دهی واضح و شفاف (هر کدام 3
                                                    امتیاز)</p>

                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="row">
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box box-info">
                                            <div class="box-header">
                                                <h3 class="box-title">
                                                    ارزشیابی توصیفی:
                                                </h3>
                                            </div>
                                            <div class="box-body">
                                                <textarea <?php if (isset($_POST['ejmali_ostan_log']) or isset($_POST['ejmali_madrese_log'])) echo 'disabled' ?> id="tosifi"
                                                                                                                                                                 name="tozihat"
                                                                                                                                                                 class="tozihat_textarea"
                                                                                                                                                                 placeholder="توضیحات را وارد کنید. (حداقل 250 کاراکتر)"><?php if (!empty($ejmali_items)) {
                                                        echo @$ejmali_items['tozihat'];
                                                    } ?></textarea>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <center>

                                    <?php if (@$_POST['subjection'] == 'stateejmali'): ?>
                                        <p class="virayesh-ejmali-button">
                                            <input style="padding: 6px 10px 5px 10px" type="submit"
                                                   name="setejmaliostani"
                                                   onclick="return confirm('ارزیاب گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                                   value="ثبت ارزیابی">
                                        </p>
                                    <?php elseif (@$_POST['subjection'] == 'schoolejmali'): ?>
                                        <p class="virayesh-ejmali-button">
                                            <input style="padding: 6px 10px 5px 10px" type="submit"
                                                   name="setejmalimadrese"
                                                   onclick="return confirm('ارزیاب گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                                   value="ثبت ارزیابی">
                                        </p>
                                    <?php elseif ($_SESSION['head'] == 2 and !isset($_POST['subjection'])): ?>
                                        <p class="virayesh-ejmali-button">
                                            <input style="padding: 6px 10px 5px 10px" type="submit"
                                                   name="setejmalidabirostan"
                                                   onclick="return confirm('دبیر گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                                   value="ثبت ارزیابی">
                                        </p>
                                    <?php elseif ($_SESSION['head'] == 3 and !isset($_POST['subjection'])): ?>
                                        <p class="virayesh-ejmali-button">
                                            <input style="padding: 6px 10px 5px 10px" type="submit"
                                                   name="setejmalidabirmadrese"
                                                   onclick="return confirm('دبیر گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                                   value="ثبت ارزیابی">
                                        </p>
                                    <?php elseif (($_SESSION['head'] == 2 or $_SESSION['head'] == 0) and $_POST['subjection'] == 'editeo'): ?>
                                        <p class="virayesh-ejmali-button">
                                            <input style="padding: 6px 10px 5px 10px" type="submit" name="editeo"
                                                   onclick="return confirm('دبیر گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                                   value="ویرایش ارزیابی">
                                        </p>
                                    <?php elseif ($_SESSION['head'] == 3 and $_POST['subjection'] == 'editem'): ?>
                                        <p class="virayesh-ejmali-button">
                                            <input style="padding: 6px 10px 5px 10px" type="submit" name="editem"
                                                   onclick="return confirm('دبیر گرامی: لطفا در صورت صحت نمره نهایی اثر و اطمینان نسبت به نوشتن توضیحات تشریحی درباره نقاط قوت یا ضعف اثر، بر روی گزینه OK کلیک کنید')"
                                                   value="ویرایش ارزیابی">
                                        </p>
                                    <?php endif; ?>
                                </center>

                            </form>
                        </div>
                    <?php endif; ?>
            </section>
        </div>


        <!-- /.content-wrapper -->
        <?php
        include_once 'footer.php';
        ?>
        <script>
            function validateForm() {
                var n = document.forms["myform"]["nazar"].value;
                if (n == "انتخاب کنید") {
                    document.forms["myform"]["nazar"].style.backgroundColor = "yellow";
                    alert("نظر خود را انتخاب نکردید");
                    return false;
                } else if (n != "انتخاب کنید") {
                    return true;
                }
            }

            function validateFormn() {


                var t1 = document.forms["myform"]["t1"].value;
                var t2 = document.forms["myform"]["t2"].value;
                var t3 = document.forms["myform"]["t3"].value;
                var t4 = document.forms["myform"]["t4"].value;
                var t5 = document.forms["myform"]["t5"].value;
                var t6 = document.forms["myform"]["t6"].value;
                var t7 = document.forms["myform"]["t7"].value;
                var t8 = document.forms["myform"]["t8"].value;
                var t9 = document.forms["myform"]["t9"].value;


                var tosifi = document.getElementById("tosifi").value;


                if (t1 == "") {
                    document.forms["myform"]["t1"].style.backgroundColor = "yellow";
                    alert("فیلد اول وارد نشده است");
                    return false;
                } else if (t2 == "") {
                    document.forms["myform"]["t2"].style.backgroundColor = "yellow";
                    alert("فیلد دوم وارد نشده است");
                    return false;
                } else if (t3 == "") {
                    document.forms["myform"]["t3"].style.backgroundColor = "yellow";
                    alert("فیلد سوم وارد نشده است");
                    return false;
                } else if (t4 == "") {
                    document.forms["myform"]["t4"].style.backgroundColor = "yellow";
                    alert("فیلد چهارم وارد نشده است");
                    return false;
                } else if (t5 == "") {
                    document.forms["myform"]["t5"].style.backgroundColor = "yellow";
                    alert("فیلد پنجم وارد نشده است");
                    return false;
                } else if (t6 == "") {
                    document.forms["myform"]["t6"].style.backgroundColor = "yellow";
                    alert("فیلد ششم وارد نشده است");
                    return false;
                } else if (t7 == "") {
                    document.forms["myform"]["t7"].style.backgroundColor = "yellow";
                    alert("فیلد هفتم وارد نشده است");
                    return false;
                } else if (t8 == "") {
                    document.forms["myform"]["t8"].style.backgroundColor = "yellow";
                    alert("فیلد هشتم وارد نشده است");
                    return false;
                } else if (t9 == "") {
                    document.forms["myform"]["t9"].style.backgroundColor = "yellow";
                    alert("فیلد نهم وارد نشده است");
                    return false;
                }

                if (t1 > 15) {
                    document.forms["myform"]["t1"].style.backgroundColor = "yellow";
                    alert("فیلد اول بیشتر از 15 وارد شده است");
                    return false;
                } else if (t2 > 5) {
                    document.forms["myform"]["t2"].style.backgroundColor = "yellow";
                    alert("فیلد دوم بیشتر از 5 وارد شده است");
                    return false;
                } else if (t3 > 5) {
                    document.forms["myform"]["t3"].style.backgroundColor = "yellow";
                    alert("فیلد سوم بیشتر از 5 وارد شده است");
                    return false;
                } else if (t4 > 10) {
                    document.forms["myform"]["t4"].style.backgroundColor = "yellow";
                    alert("فیلد چهارم بیشتر از 10 وارد شده است");
                    return false;
                } else if (t5 > 10) {
                    document.forms["myform"]["t5"].style.backgroundColor = "yellow";
                    alert("فیلد پنجم بیشتر از 10 وارد شده است");
                    return false;
                } else if (t6 > 32) {
                    document.forms["myform"]["t6"].style.backgroundColor = "yellow";
                    alert("فیلد ششم بیشتر از 32 وارد شده است");
                    return false;
                } else if (t7 > 13) {
                    document.forms["myform"]["t7"].style.backgroundColor = "yellow";
                    alert("فیلد هفتم بیشتر از 13 وارد شده است");
                    return false;
                } else if (t8 > 5) {
                    document.forms["myform"]["t8"].style.backgroundColor = "yellow";
                    alert("فیلد هشتم بیشتر از 5 وارد شده است");
                    return false;
                } else if (t9 > 5) {
                    document.forms["myform"]["t9"].style.backgroundColor = "yellow";
                    alert("فیلد نهم بیشتر از 5 وارد شده است");
                    return false;
                }

                if (t1 < 0) {
                    document.forms["myform"]["t1"].style.backgroundColor = "yellow";
                    alert("فیلد اول کمتر از 0 وارد شده است");
                    return false;
                } else if (t2 < 0) {
                    document.forms["myform"]["t2"].style.backgroundColor = "yellow";
                    alert("فیلد دوم کمتر از 0 وارد شده است");
                    return false;
                } else if (t3 < 0) {
                    document.forms["myform"]["t3"].style.backgroundColor = "yellow";
                    alert("فیلد سوم کمتر از 0 وارد شده است");
                    return false;
                } else if (t4 < 0) {
                    document.forms["myform"]["t4"].style.backgroundColor = "yellow";
                    alert("فیلد چهارم کمتر از 0 وارد شده است");
                    return false;
                } else if (t5 < 0) {
                    document.forms["myform"]["t5"].style.backgroundColor = "yellow";
                    alert("فیلد پنجم کمتر از 0 وارد شده است");
                    return false;
                } else if (t6 < 0) {
                    document.forms["myform"]["t6"].style.backgroundColor = "yellow";
                    alert("فیلد ششم کمتر از 0 وارد شده است");
                    return false;
                } else if (t7 < 0) {
                    document.forms["myform"]["t7"].style.backgroundColor = "yellow";
                    alert("فیلد هفتم کمتر از 0 وارد شده است");
                    return false;
                } else if (t8 < 0) {
                    document.forms["myform"]["t8"].style.backgroundColor = "yellow";
                    alert("فیلد هشتم کمتر از 0 وارد شده است");
                    return false;
                } else if (t9 < 0) {
                    document.forms["myform"]["t9"].style.backgroundColor = "yellow";
                    alert("فیلد نهم کمتر از 0 وارد شده است");
                    return false;
                }

                if (tosifi == "") {
                    document.forms["myform"]["tosifi"].style.backgroundColor = "yellow";
                    alert("ارزشیابی توصیفی وارد نشده است");
                    return false;
                } else if (tosifi.length < 250) {
                    document.forms["myform"]["tosifi"].style.backgroundColor = "yellow";
                    alert("ارزشیابی توصیفی کمتر از 250 کاراکتر است");
                    return false;
                } else {
                    return true;
                }
            }

            function calcular() {
                var t1 = document.getElementById("t1").style.backgroundColor = "white";
                var t2 = document.getElementById("t2").style.backgroundColor = "white";
                var t3 = document.getElementById("t3").style.backgroundColor = "white";
                var t4 = document.getElementById("t4").style.backgroundColor = "white";
                var t5 = document.getElementById("t5").style.backgroundColor = "white";
                var t6 = document.getElementById("t6").style.backgroundColor = "white";
                var t7 = document.getElementById("t7").style.backgroundColor = "white";
                var t8 = document.getElementById("t8").style.backgroundColor = "white";
                var t9 = document.getElementById("t9").style.backgroundColor = "white";
                var t1 = parseFloat(document.getElementById('t1').value);
                var t2 = parseFloat(document.getElementById('t2').value);
                var t3 = parseFloat(document.getElementById('t3').value);
                var t4 = parseFloat(document.getElementById('t4').value);
                var t5 = parseFloat(document.getElementById('t5').value);
                var t6 = parseFloat(document.getElementById('t6').value);
                var t7 = parseFloat(document.getElementById('t7').value);
                var t8 = parseFloat(document.getElementById('t8').value);
                var t9 = parseFloat(document.getElementById('t9').value);


                if (isNaN(t1)) {
                    t1 = 0;
                }
                if (isNaN(t2)) {
                    t2 = 0;
                }
                if (isNaN(t3)) {
                    t3 = 0;
                }
                if (isNaN(t4)) {
                    t4 = 0;
                }
                if (isNaN(t5)) {
                    t5 = 0;
                }
                if (isNaN(t6)) {
                    t6 = 0;
                }
                if (isNaN(t7)) {
                    t7 = 0;
                }
                if (isNaN(t8)) {
                    t8 = 0;
                }
                if (isNaN(t9)) {
                    t9 = 0;
                }


                document.getElementById('resultado').innerHTML = t1 + t2 + t3 + t4 + t5 + t6 + t7 + t8 + t9;
            }

        </script>