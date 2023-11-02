<?php
include_once 'header.php';
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
        xmlhttp.open("GET", "/build/ajax/showcity.php?statename=" + str, true);
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
    <center>
        <br/>
        <?php
        if (isset($_GET['successdisabled'])):?>
            <h4 style=" background-color: green; color: white; font-weight: bold">
                <br/>
                ادمین مدرسه با موفقیت غیر فعال شد
                <br/>
            </h4>
        <?php endif; ?>
        <?php
        if (isset($_GET['nullcode'])): ?>
        <h4 style=" background-color: red; color: white; font-weight: bold">
            <br/>
            لطفا کد ادمین را وارد کنید
            <br/>
            <?php endif; ?>
            <?php
            if (isset($_GET['notfound'])): ?>
            <h4 style=" background-color: red; color: white; font-weight: bold">
                <br/>
                ادمین با کد وارد شده پیدا نشد
                <br/>
                <?php
                elseif (isset($_GET['successadded'])): ?>
                <h4 style=" background-color: green; color: white; font-weight: bold">
                    <br/>
                    کاربر
                    با کد ملی
                    <?php echo $_GET['codemelli']; ?>
                    با موفقیت در سامانه جشنواره علامه حلی اضافه شد
                    <br/>
                    <?php
                    elseif (isset($_GET['successedited'])): ?>
                    <h4 style=" background-color: green; color: white; font-weight: bold">
                        <br/>
                        کاربر
                        با کد ملی
                        <?php echo $_GET['username']; ?>
                        با موفقیت در سامانه جشنواره علامه حلی ویرایش شد
                        <br/>
                        <?php
                        elseif (isset($_GET['wasfound'])): ?>
                        <h4 style=" background-color: red; color: white; font-weight: bold">
                            <br/>
                            کد ملی تکراری است
                            <br/>
                            <?php
                            elseif (isset($_GET['removed'])): ?>
                            <h4 style=" background-color: red; color: white; font-weight: bold">
                                <br/>
                                ادمین با کد کاربری
                                <?php echo $_GET['code']; ?>
                                با موفقیت حذف شد.
                                <br/><br/>
                                <?php endif; ?>


    </center>


    <!-- Content Header (Page header) -->
    <!-- Content Wrapper. Contains page content -->
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ثبت/ویرایش ادمین جدید مدرسه‌ای
                    </h3>
                </div>
                <div class="box-body">
                    <form method="post" onsubmit="return admincodecheck()">
                        برای ویرایش ادمین مدرسه، کد را در کادر روبرو وارد کنید:
                        <input type="text" name="dabirmadresecode" id="dabirmadresecode" placeholder="کد را وارد کنید"
                               style="padding: 5px;border-radius: 5px">
                        <input type="submit" value="جستجو" name="subsearchmadreseadmin"
                               style="padding: 7px;border-radius: 5px">
                    </form>
                    در غیر این صورت برای وارد کردن ارزیاب جدید، فرم زیر را پر کنید
                    <br/><br/>
                    <?php
                    if (isset($_POST['subsearchmadreseadmin']) and !empty($_POST['dabirmadresecode'])) {
                        $madreseadmincode = $_POST['dabirmadresecode'];
                        $select = mysqli_query($connection, "select * from rater_list where username='$madreseadmincode' and type=3 order by city_name asc,shahr_name asc,school_name asc");
                        foreach ($select as $madreseadmin) {
                        }
                    }
                    if (empty($madreseadmin) and isset($_POST['subsearchmadreseadmin'])): ?>
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">ادمین وارد شده در پایگاه داده سامانه یافت نشد.</h3>
                            </div>
                        </div>
                    <?php endif; ?>
                    <center>
                        <form id="myform" onsubmit="return validateForm()" method="post" action="build/php/inc.php">

                            <table class="tableratermanager">
                                <tr>
                                    <th>کد ملی (نام کاربری)</th>
                                    <td>
                                        <input <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                            echo 'disabled';
                                        } ?> value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                            echo $_POST['dabirmadresecode'];
                                        } ?>" autofocus id="username" class="inputratermanager" type="text"
                                             name="<?php if (!isset($_POST['subsearchmadreseadmin'])) {
                                                 echo 'username';
                                             } ?>">
                                        <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)): ?>
                                            <input value="<?php echo $_POST['dabirmadresecode']; ?>" type="hidden"
                                                   name="username">
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if (!isset($_POST['subsearchmadreseadmin'])): ?>
                                    <tr>
                                        <th>رمز عبور</th>
                                        <td><input value="123456" id="password" class="inputratermanager" type="text"
                                                   name="password"></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>نام</th>
                                    <td><input id="name" class="inputratermanager" type="text" name="name"
                                               value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                                   echo $madreseadmin['name'];
                                               } ?>"></td>
                                </tr>
                                <tr>
                                    <th>نام خانوادگی</th>
                                    <td><input id="family" class="inputratermanager" type="text" name="family"
                                               value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                                   echo $madreseadmin['family'];
                                               } ?>"></td>
                                </tr>
                                <tr>
                                    <th>جنسیت</th>
                                    <td>
                                        <select name="gender">
                                            <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and $madreseadmin['gender'] == 'مرد') {
                                                echo 'selected';
                                            } ?>>مرد
                                            </option>
                                            <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and $madreseadmin['gender'] == 'زن') {
                                                echo 'selected';
                                            } ?>>زن
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>شماره همراه</th>
                                    <td><input class="inputratermanager" type="text" name="phone"
                                               value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                                   echo $madreseadmin['phone'];
                                               } ?>"></td>
                                </tr>
                                <tr>
                                    <th>استان</th>
                                    <td>
                                        <select name="state_custom" id="statecustom" onchange="cityshow(this.value)">
                                            <option></option>
                                            <?php
                                            $resultstates = mysqli_query($connection, "select distinct name from state order by name asc");
                                            foreach ($resultstates as $state_info):
                                                ?>
                                                <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and $madreseadmin['city_name'] == $state_info['name']) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $state_info['name']; ?>"><?php echo $state_info['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <?php if (!isset($_POST['subsearchmadreseadmin'])): ?>
                                    <tr id="citytr" style="display: none;">
                                        <th>شهر</th>
                                        <td>
                                            <select id="cityselect" name="city_custom"> </select>
                                        </td>
                                    <tr id="schooltr" style="display: none;">
                                        <th>مدرسه</th>
                                        <td><input class="inputratermanager" type="text" name="school_custom"
                                                   value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                                       echo $madreseadmin['school_name'];
                                                   } ?>"></td>
                                        </td>
                                    </tr>
                                    </tr>
                                <?php elseif (isset($_POST['subsearchmadreseadmin'])): ?>
                                    <tr>
                                        <th>شهر</th>
                                        <td><input class="inputratermanager" type="text" name="city_custom"
                                                   value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                                       echo $madreseadmin['shahr_name'];
                                                   } ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>مدرسه</th>
                                        <td><input class="inputratermanager" type="text" name="school_custom"
                                                   value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                                       echo $madreseadmin['school_name'];
                                                   } ?>"></td>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (!isset($_POST['subsearchmadreseadmin'])): ?>
                                    <tr>
                                        <th>نوع کاربری</th>
                                        <td>
                                            <select name="subject">
                                                <option>دبیر مدرسه ای جشنواره</option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <th>تغییر وضعیت کاربری</th>
                                        <td>
                                            <select onchange="alert('با تغییر این گزینه، کاربر از وضعیت دبیر مدرسه ای خارج شده و از لیست حذف می گردد.')"
                                                    name="user_status" id="user_status">
                                                <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and @$madreseadmin['type'] == 0) {
                                                    echo 'selected';
                                                } ?> value="0">ارزیاب جشنواره
                                                </option>
                                                <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and @$madreseadmin['type'] == 2) {
                                                    echo 'selected';
                                                } ?> value="2">دبیر جشنواره استان
                                                </option>
                                                <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and @$madreseadmin['type'] == 3) {
                                                    echo 'selected';
                                                } ?> value="3">دبیر مدرسه ای جشنواره
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>فعال/غیر فعال</th>
                                    <td>
                                        <select name="activation_status">
                                            <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and $madreseadmin['approved'] == 1) {
                                                echo 'selected';
                                            } ?> value="1">فعال
                                            </option>
                                            <option <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin) and $madreseadmin['approved'] == 0) {
                                                echo 'selected';
                                            } ?> value="0">غیر فعال
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <br/>
                            <input name="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                echo 'editadminmadrese';
                            } else {
                                echo 'setadminmadrese';
                            } ?>" style="padding: 8px" type="submit"
                                   value="<?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)) {
                                       echo 'ویرایش ادمین';
                                   } else {
                                       echo 'اضافه کردن ادمین';
                                   } ?>"
                                   onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات ادمین، بر روی گزینه OK کلیک کنید')">
                            <?php if (isset($_POST['subsearchmadreseadmin']) and !empty($madreseadmin)): ?>
                                <input name="makenewpage" style="padding: 8px" type="submit"
                                       value="اضافه کردن ادمین مدرسه ای جدید"
                                       onclick="return confirm('اگر اطلاعاتی وارد شده باشد از بین خواهد رفت، آیا ادامه می دهید؟')">
                                <input type="hidden" name="pageaddress" value="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <?php endif; ?>
                        </form>

                    </center>
                </div>
            </div>

        </section>
    </div>

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        <form method="post">
                            لیست ادمین های مدرسه‌ای استان
                            <select name="state">
                                <option <?php if (isset($_POST['state']) and $_POST['state'] == 'همه استان‌ها') echo 'selected'; ?>>
                                    همه استان‌ها
                                </option>
                                <?php
                                $query = mysqli_query($connection, "select distinct city_name from rater_list where city_name is not null and city_name!='' order by city_name asc");
                                foreach ($query as $states):
                                    ?>
                                    <option <?php if (isset($_POST['state']) and $_POST['state'] == $states['city_name']) echo 'selected'; ?>><?php echo $states['city_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" name="search" style="padding: 8px" value="جستجو">
                        </form>
                    </h3>
                </div>
                <?php if (isset($_POST['state'])): ?>
                    <div class="box-body">
                        <center>
                            <table class="arzyabinashodetable">
                                <tr>
                                    <th>
                                        ردیف
                                    </th>
                                    <th>
                                        نام کاربری
                                    </th>
                                    <th>
                                        رمز عبور
                                    </th>
                                    <th>
                                        نام و نام خانوادگی
                                    </th>
                                    <th>
                                        شماره همراه
                                    </th>
                                    <th>
                                        استان
                                    </th>
                                    <th>
                                        شهر
                                    </th>
                                    <th>
                                        مدرسه
                                    </th>
                                    <th>
                                        فعال/غیرفعال کردن
                                    </th>
                                </tr>

                                <?php
                                $a = 1;
                                $state = $_POST['state'];
                                $resultraters = mysqli_query($connection, "select * from rater_list where `type`=3 and city_name='$state' order by city_name asc,shahr_name asc,school_name asc, family asc");
                                foreach ($resultraters as $raters): ?>
                                    <tr>
                                        <td>
                                            <?php echo $a;
                                            $a++; ?>
                                        </td>
                                        <td>
                                            <?php echo $raters['username'] ?>
                                        </td>
                                        <td>
                                            <?php echo $raters['password'] ?>
                                        </td>
                                        <td>
                                            <?php echo $raters['name'] . " " . $raters['family'] ?>
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
                                            <form method="post" action="build/php/inc.php">
                                                <input type="hidden" value="<?php echo $user ?>" name="codeeditor">
                                                <input type="hidden" value="<?php echo $raters['code'] ?>"
                                                       name="disablecode">
                                                <input type="submit" style="padding: 7px"
                                                       value="<?php if ($raters['type'] == 3 and $raters['approved'] == 1) {
                                                           echo 'غیرفعالسازی';
                                                       } elseif ($raters['type'] == 3 and $raters['approved'] == 0) {
                                                           echo 'فعالسازی';
                                                       } ?>"
                                                       name="<?php if ($raters['type'] == 3 and $raters['approved'] == 1) {
                                                           echo 'disableadminmadrese';
                                                       } elseif ($raters['type'] == 3 and $raters['approved'] == 0) {
                                                           echo 'enableadminmadrese';
                                                       } ?>">
                                                <input type="submit" style="padding: 7px;color: red"
                                                       value="حذف دائمی کاربر" name="removemadreseadmin"
                                                       onclick="return confirm('آیا مطمئن هستید؟ این عملیات قابل بازگشت نیست')">
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </table>
                        </center>
                    </div>
                <?php endif; ?>
            </div>

        </section>
    </div>

    <?php
    endif;
    include_once 'footer.php';
    ?>
    <script>
        function validateForm() {
            var username = document.getElementById("username");
            var password = document.getElementById("password");
            var codeadmin = document.getElementById("codeadmin");
            var name = document.getElementById("name");
            var family = document.getElementById("family");

            if (username.value == "") {
                alert("نام کاربری وارد نشده است");
                return false;
            } else if (username.value.length != 10) {
                alert("کدملی اشتباه وارد شده است");
                return false;

            } else if (password.value == "") {
                alert("رمز عبور وارد نشده است");
                return false;
            } else if (codeadmin.value == "") {
                alert("کد ادمین وارد نشده است");
                return false;
            } else if (name.value == "") {
                alert("نام ادمین وارد نشده است");
                return false;
            } else if (family.value == "") {
                alert("نام خانوادگی ادمین وارد نشده است");
                return false;
            } else {
                return true;
            }
        }

        function admincodecheck() {
            var dabirmadresecode = document.getElementById("dabirmadresecode").value;
            if (dabirmadresecode == '') {
                alert("کد ادمین وارد نشده است");
                return false;
            } else {
                return true;
            }
        }
    </script>
