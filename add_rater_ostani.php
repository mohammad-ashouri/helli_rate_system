<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1):
    ?>
    <script>
        function cityshow(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("cityselect").innerHTML = this.responseText;
                    document.getElementById("citytr").style.display = '';
                    document.getElementById("schooltr").style.display = '';
                }
            }
            xmlhttp.open("GET", "./build/ajax/showcity.php?statename=" + str, true);
            xmlhttp.send();
        }
    </script>
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
        <?php if (isset($_GET['addedrater'])): ?>
            <div class="box box-solid box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ارزیاب با کد
                        <?php echo $_GET['code'] ?>
                        و مشخصات
                        <?php echo $_GET['info'] ?>
                        به سامانه جشنواره علامه حلی اضافه شد.
                    </h3>
                </div>
            </div>
        <?php elseif (isset($_GET['editedrater'])): ?>
            <div class="box box-solid box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ارزیاب با کد
                        <?php echo $_GET['code'] ?>
                        و مشخصات
                        <?php echo $_GET['info'] ?>
                        ویرایش شد.
                    </h3>
                </div>
            </div>
        <?php elseif (isset($_GET['raterfounded'])): ?>
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ارزیاب با کد
                        <?php echo $_GET['code'] ?>
                        قبلا در سامانه ثبت شده است.
                    </h3>
                </div>
            </div>
        <?php elseif (isset($_GET['raternotfounded'])): ?>
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ارزیاب با کد
                        <?php echo $_GET['code'] ?>
                        در سامانه پیدا نشد.
                    </h3>
                </div>
            </div>
        <?php elseif (isset($_GET['removed'])): ?>
            <div class="box box-solid box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ارزیاب با کد
                        <?php echo $_GET['code'] ?>
                        از سامانه ارزیابی جشنواره علامه حلی با موفقیت حذف شد.
                    </h3>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            ثبت/ویرایش ارزیاب استانی و مدرسه‌ای
                        </h3>
                    </div>
                    <div class="box-body">
                        <form method="post" onsubmit="return ratercodecheck()">
                            برای ویرایش ارزیاب، کد ارزیاب را در کادر روبرو وارد کنید:
                            <input type="text" name="ratercode" id="ratercode" placeholder="کد را وارد کنید"
                                   style="padding: 5px;border-radius: 5px">
                            <input type="submit" value="جستجو" name="subsearchostanirater"
                                   style="padding: 7px;border-radius: 5px">
                        </form>
                        در غیر این صورت برای وارد کردن ارزیاب جدید، فرم زیر را پر کنید
                        <br/><br/>
                        <?php
                        if (isset($_POST['subsearchostanirater']) and !empty($_POST['ratercode'])) {
                            $ratercode = $_POST['ratercode'];
                            $select = mysqli_query($connection, "select * from rater_list where username='$ratercode' and type=0");
                            foreach ($select as $rateritems) {
                            }
                        }
                        if (empty($rateritems) and isset($_POST['subsearchostanirater'])): ?>
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>
                                    <h3 class="box-title">ارزیاب وارد شده در پایگاه داده سامانه یافت نشد.</h3>
                                </div>
                            </div>
                        <?php endif; ?>
                        <center>
                            <form method="post" action="build/php/Manage_Ostani_Rater.php"
                                  onsubmit="return checkcodemelli()">
                                <table class="tableratermanager">
                                    <tr>
                                        <th>کد ملی (نام کاربری)</th>
                                        <td>
                                            <input required
                                                   oninput="checknationalcode(this.value)" <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                echo 'disabled';
                                            } ?>
                                                   value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                       echo @$ratercode;
                                                   } ?>" autofocus class="inputratermanager" type="text" name="code"
                                                   id="code">
                                            <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)): ?>
                                                <input type="hidden" name="editratercode"
                                                       value="<?php echo $ratercode; ?>"> <?php endif; ?>
                                        </td>
                                        <div id="checkcodemelli" style="color: red;font-weight: bold"></div>
                                        <br/>
                                        <script>
                                            function checknationalcode(nationalcode) {
                                                if (nationalcode == "") {
                                                    document.getElementById("checkcodemelli").innerHTML = "";
                                                    return;
                                                }
                                                var xmlhttp = new XMLHttpRequest();
                                                xmlhttp.onreadystatechange = function () {
                                                    if (this.readyState == 4 && this.status == 200) {
                                                        document.getElementById("checkcodemelli").innerHTML = this.responseText;
                                                    }
                                                }
                                                xmlhttp.open("GET", "build/ajax/checknationalcode.php?nationalcode=" + nationalcode, true);
                                                xmlhttp.send();
                                            }
                                        </script>
                                    </tr>
                                    <tr>
                                        <th>رمز عبور</th>
                                        <td>
                                            <input required
                                                   value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                       echo @$rateritems['password'];
                                                   } else {
                                                       123456;
                                                   } ?>" class="inputratermanager" type="text" name="password"></td>
                                    </tr>
                                    <tr>
                                        <th>نام</th>
                                        <td><input required class="inputratermanager" type="text"
                                                   value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                       echo @$rateritems['name'];
                                                   } ?>" name="name"></td>
                                    </tr>
                                    <tr>
                                        <th>نام خانوادگی</th>
                                        <td><input required class="inputratermanager" type="text"
                                                   value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                       echo @$rateritems['family'];
                                                   } ?>" name="family"></td>
                                    </tr>
                                    <tr>
                                        <th>سطح علمی</th>
                                        <td>
                                            <?php
                                            if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                $sath_elmi = explode('-', $rateritems['sath_elmi']);
                                            }
                                            ?>
                                            <input class="inputratermanager"
                                                   type="checkbox" <?php if (!empty($sath_elmi[0])) {
                                                echo 'checked';
                                            } ?> name="arshad" id="arshad">
                                            <label for="arshad">کارشناسی ارشد</label>
                                            <br/>
                                            <input class="inputratermanager"
                                                   type="checkbox" <?php if (!empty($sath_elmi[1])) {
                                                echo 'checked';
                                            } ?> name="doctor" id="doctor">
                                            <label for="doctor">دکتری</label>
                                            <br/>
                                            <input class="inputratermanager"
                                                   type="checkbox" <?php if (!empty($sath_elmi[2])) {
                                                echo 'checked';
                                            } ?> name="sath3" id="sath3">
                                            <label for="sath3">سطح 3 حوزه</label>
                                            <br/>
                                            <input class="inputratermanager"
                                                   type="checkbox" <?php if (!empty($sath_elmi[3])) {
                                                echo 'checked';
                                            } ?> name="sath4" id="sath4">
                                            <label for="sath4">سطح 4 حوزه</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>جنسیت</th>
                                        <td>
                                            <select name="gender">
                                                <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['gender'] == 'مرد') {
                                                    echo 'selected';
                                                } ?>>مرد
                                                </option>
                                                <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['gender'] == 'زن') {
                                                    echo 'selected';
                                                } ?>>زن
                                                </option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>تلفن</th>
                                        <td>
                                            <input
                                                    value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                        echo @$rateritems['phone'];
                                                    } ?>" class="inputratermanager" type="text" name="phone"></td>
                                    </tr>
                                    <tr>
                                        <th>استان</th>
                                        <td>
                                            <select required name="state_custom" id="statecustom"
                                                    onchange="cityshow(this.value)">
                                                <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and (@$rateritems['city_name'] == '' or @$rateritems['city_name'] == null)) {
                                                    echo 'selected';
                                                } ?>></option>
                                                <?php
                                                $resultstates = mysqli_query($connection, "select distinct ostantahsili from etelaat_p where ostantahsili!='' and ostantahsili is not null order by ostantahsili");
                                                foreach ($resultstates as $state_info):
                                                    ?>
                                                    <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['city_name'] == $state_info['ostantahsili']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $state_info['ostantahsili']; ?>">
                                                        <?php echo $state_info['ostantahsili']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php if (!isset($_POST['subsearchostanirater']) and empty($rateritems)): ?>
                                        <tr id="citytr" style='display: none;'>
                                            <th>شهر</th>
                                            <td>
                                                <select id="cityselect" name="city_custom"> </select>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <th>شهر</th>
                                            <td>
                                                <input
                                                        value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                            echo @$rateritems['shahr_name'];
                                                        } ?>" class="inputratermanager" type="text" name="city_custom">
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr id="schooltr">
                                        <th>مدرسه</th>
                                        <td>
                                            <input
                                                    value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                                        echo @$rateritems['school_name'];
                                                    } ?>" type="text" name="school" class="inputratermanager">
                                        </td>
                                    </tr>
                                    <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)): ?>
                                        <tr>
                                            <th>تغییر وضعیت کاربری</th>
                                            <td>
                                                <select
                                                        onchange="alert('با تغییر این گزینه، کاربر از وضعیت ارزیاب خارج شده و از لیست حذف می گردد.')"
                                                        name="user_status" id="user_status">
                                                    <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['type'] == 0) {
                                                        echo 'selected';
                                                    } ?> value="0">ارزیاب جشنواره
                                                    </option>
                                                    <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['type'] == 2) {
                                                        echo 'selected';
                                                    } ?> value="2">دبیر جشنواره استان
                                                    </option>
                                                    <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['type'] == 3) {
                                                        echo 'selected';
                                                    } ?> value="3">دبیر مدرسه ای جشنواره
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>فعال/غیر فعال</th>
                                            <td>
                                                <select name="active_status" id="active_status">
                                                    <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['approved'] == 0) {
                                                        echo 'selected';
                                                    } ?> value="0">غیر فعال
                                                    </option>
                                                    <option <?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems) and @$rateritems['approved'] == 1) {
                                                        echo 'selected';
                                                    } ?> value="1">فعال
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <input type="hidden" name="user" value="<?php echo $user ?>">


                                </table>
                                <br/>
                                <input name="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                    echo 'subeditnonkeshvarirater';
                                } else {
                                    echo 'subsetnonkeshvarirater';
                                } ?>" style="padding: 8px" type="submit"
                                       value="<?php if (isset($_POST['subsearchostanirater']) and !empty($rateritems)) {
                                           echo 'ویرایش ارزیاب';
                                       } else {
                                           echo 'اضافه کردن ارزیاب';
                                       } ?>"
                                       onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات ارزیاب، بر روی گزینه OK کلیک کنید')">
                                <input name="makenewpage" style="padding: 8px" type="submit"
                                       value="اضافه کردن ارزیاب جدید"
                                       onclick="return confirm('اگر اطلاعاتی وارد شده باشد از بین خواهد رفت، آیا ادامه می دهید؟')">
                                <input type="hidden" name="pageaddress" value="<?php echo $_SERVER['PHP_SELF'] ?>">
                            </form>

                        </center>
                    </div>
                </div>


                <form method="post">
                    <div class="row">
                        <section class="col-lg-12 col-md-12">
                            <div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>
                                    <h3 class="box-title">
                                        نمایش فهرست ارزیابان استانی -- استان
                                        <select name="state">
                                            <?php
                                            $resultraters = mysqli_query($connection, "select DISTINCT(city_name) from rater_list where city_name is not null and city_name!='' order by city_name asc");
                                            foreach ($resultraters as $rater_info):
                                                ?>
                                                <option <?php if (@$_POST['state'] == $rater_info['city_name']) {
                                                    echo 'selected';
                                                } ?>><?php echo $rater_info['city_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="submit" name="search" value="جستجو" style="padding: 7px">
                                    </h3>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>

                <?php if (isset($_POST['search']) and !empty($_POST['state'])): ?>
                    <div class="row">
                        <section class="col-lg-12 col-md-12">
                            <div class="box box-success">
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>
                                    <h3 class="box-title">
                                        فهرست ارزیابان استان
                                        <?php
                                        $city = $_POST['state'];
                                        $resultraters = mysqli_query($connection, "select * from rater_list where `type`=0 and city_name='$city' order by family asc");
                                        foreach ($resultraters as $rater_info) {
                                        }
                                        echo $city;
                                        ?>
                                    </h3>
                                </div>
                                <div class="box-body">
                                    <center>
                                        <table class="arzyabinashodetable">
                                            <tr>
                                                <th>
                                                    ردیف
                                                </th>
                                                <th>
                                                    کد کاربری(کد ملی)
                                                </th>
                                                <th>
                                                    رمز عبور
                                                </th>
                                                <th>
                                                    نام و نام خانوادگی
                                                </th>
                                                <th>
                                                    سطح علمی
                                                </th>
                                                <th>
                                                    شماره همراه
                                                </th>
                                                <th>
                                                    استان
                                                </th>
                                                <th>
                                                    شهرستان
                                                </th>
                                                <th>
                                                    مدرسه
                                                </th>
                                                <th>
                                                    فایل رزومه
                                                </th>
                                                <th>
                                                    عملیات
                                                </th>
                                            </tr>

                                            <?php
                                            $a = 1;
                                            foreach ($resultraters as $raters): ?>
                                                <tr>
                                                    <td><?php echo $a;
                                                        $a++; ?></td>
                                                    <td>
                                                        <?php echo $raters['code'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $raters['password'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $raters['name'] . " " . $raters['family'] ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (isset($raters['sath_elmi'])) {
                                                            $sath = explode('-', $raters['sath_elmi']);
                                                            foreach ($sath as $item) {
                                                                if ($item) {
                                                                    echo $item . ' - ';
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $raters['phone'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $raters['city_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $raters['shahr_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $raters['school_name'] ?>
                                                    </td>
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
                                                    <td>
                                                        <?php if ($raters['cv_filepath'] != ''): ?>
                                                            <a href="<?php
                                                            echo $raters['cv_filepath'] ?>">
                                                                دانلود فایل رزومه
                                                            </a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <form action="../build/php/inc.php" method="post">
                                                            <input type="hidden" name="ratercode"
                                                                   value="<?php echo $raters['code'] ?>">
                                                            <input style="padding: 5px" type="submit"
                                                                   name="<?php if ($raters['approved'] == 1) {
                                                                       echo 'disableostanirater';
                                                                   } else {
                                                                       echo 'enableostanirater';
                                                                   } ?>" value="<?php if ($raters['approved'] == 1) {
                                                                echo 'غیر فعالسازی';
                                                            } else {
                                                                echo 'فعالسازی';
                                                            } ?>"/>
                                                        </form>
                                                        <br>
                                                        <form action="../build/php/Remove_Ostani_Rater.php"
                                                              method="post" onsubmit="return confirm('پس از حذف نهایی دیگر نمی توانید با این کد، ارزیاب دیگری تعریف نمایید' +
                                                         '\n' +
                                                          'آیا مطمئن هستید؟')">
                                                            <input type="hidden" name="ratercode"
                                                                   value="<?php echo $raters['username'] ?>">
                                                            <input style="color:red;padding: 5px;margin-top: 1px"
                                                                   type="submit"
                                                                   name="removeostanirater" value="حذف دائمی ارزیاب"/>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </center>
                                </div>
                            </div>
                        </section>
                    </div>
                <?php endif; ?>
            </section>
        </div>
        <script>
            // function showanotherfields(){
            //     var madrese = document.getElementById("madreserater");
            //     var citytr = document.getElementById("citytr");
            //     var schooltr = document.getElementById("schooltr");
            //     if (madrese.checked==true){
            //         citytr.style.display='';
            //         schooltr.style.display='';
            //     }else{
            //         citytr.style.display='none';
            //         schooltr.style.display='none';
            //     }
            // }
            <?php if (!isset($_POST['subsearchostanirater'])): ?>
            function checkcodemelli() {
                var codemellilength = document.getElementById("code").value.length;
                var codemelli = document.getElementById("code").value;
                if (codemelli == '') {
                    alert("کد ملی وارد نشده است");
                    return false;
                } else if (codemellilength != 10) {
                    alert("کد ملی اشتباه وارد شده است");
                    return false;
                } else {
                    return true;
                }
            }
            <?php endif; ?>
            function ratercodecheck() {
                var ratercode = document.getElementById("ratercode").value;
                if (ratercode == '') {
                    alert("کد ارزیاب وارد نشده است");
                    return false;
                } else {
                    return true;
                }
            }
        </script>
<?php
endif;
include_once __DIR__ . '/footer.php';
?>