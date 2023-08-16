<?php
include_once 'header.php';
if ($_SESSION['head'] == 1 and $_SESSION['full_access'] == 1):

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
    <center>
        <br/>
        <?php
        if (isset($_GET['disabled'])):?>
            <h4 style=" background-color: green; color: white; font-weight: bold">
                <br/>
                ادمین با موفقیت غیرفعال شد
                <br/>
            </h4>
        <?php
        elseif (isset($_GET['enabled'])):?>
            <h4 style=" background-color: green; color: white; font-weight: bold">
                <br/>
                ادمین با موفقیت فعال شد
                <br/>
            </h4>
        <?php
        elseif (isset($_GET['nullcode'])): ?>
        <h4 style=" background-color: red; color: white; font-weight: bold">
            <br/>
            لطفا کد ادمین را وارد کنید
            <br/>
            <?php
            elseif (isset($_GET['notfound'])): ?>
            <h4 style=" background-color: red; color: white; font-weight: bold">
                <br/>
                ادمین با کد وارد شده پیدا نشد
                <br/>
                <?php
                elseif (isset($_GET['successadded'])): ?>
                <h4 style=" background-color: green; color: white; font-weight: bold">
                    <br/>
                    ادمین با موفقیت اضافه شد
                    <br/>
                    <?php
                    elseif (isset($_GET['wasfound'])): ?>
                    <h4 style=" background-color: red; color: white; font-weight: bold">
                        <br/>
                        کد ادمین تکراری است
                        <br/>
                        <?php endif; ?>
    </center>

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ثبت ادمین جدید
                        <!--                            <form method="post" action="build/php/inc.php">-->
                        <!--                        <input type="submit" name="querya">-->
                        <!--                            </form>-->
                    </h3>
                </div>
                <div class="box-body">


                    <form id="myform" onsubmit="return validateForm()" method="post" action="build/php/inc.php">
                        برای ویرایش ارزیاب، کد ارزیاب را در کادر روبرو وارد کنید:
                        <input type="text" name="ratercode" id="ratercode" placeholder="کد را وارد کنید"
                               style="padding: 5px;border-radius: 5px">
                        <input type="submit" value="جستجو" name="subsearchadmin"
                               style="padding: 7px;border-radius: 5px">
                    </form>
                    <br/>
                    در غیر این صورت برای وارد کردن ارزیاب جدید، فرم زیر را پر کنید
                    <br/><br/>
                    <center>
                        <form onsubmit="return validateForm()" method="post" action="build/php/inc.php">
                            <table class="tableratermanager">
                                <tr>
                                    <th>نام کاربری</th>
                                    <td><input id="username" class="inputratermanager" type="text" name="username"></td>
                                </tr>
                                <tr>
                                    <th>رمز عبور</th>
                                    <td><input value="<?php if (isset($_POST['subsearchadmin'])) {
                                        } else {
                                            echo 123456;
                                        } ?>" id="password" class="inputratermanager" type="text" name="password"></td>
                                </tr>
                                <tr>
                                    <th>نام</th>
                                    <td><input id="name" class="inputratermanager" type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <th>نام خانوادگی</th>
                                    <td><input id="family" class="inputratermanager" type="text" name="family"></td>
                                </tr>
                                <tr>
                                    <th>تلفن</th>
                                    <td><input class="inputratermanager" type="text" name="phone"></td>
                                </tr>
                                <tr>
                                    <th>کد ملی</th>
                                    <td><input class="inputratermanager" type="text" name="codemelli"></td>
                                </tr>

                            </table>
                            <br/>
                            <input name="setadmin" class="set" type="submit" value="ثبت"
                                   onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات ادمین جدید، بر روی گزینه OK کلیک کنید')">
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
                        لیست ادمین ها
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
                                    عملیات
                                </th>
                            </tr>

                            <?php
                            $a = 1;
                            $resultraters = mysqli_query($connection, "select * from rater_list where `type`=1 order by `username` asc");
                            foreach ($resultraters as $raters): ?>
                                <form action="build/php/inc.php" method="post">
                                    <tr>
                                        <td><?php echo $a;
                                            $a++; ?></td>
                                        <td>
                                            <?php echo $raters['username'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($raters['username'] != 'ashouri') {
                                                echo $raters['password'];
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $raters['name'] . " " . $raters['family'] ?>
                                        </td>
                                        <td>
                                            <?php echo $raters['phone'] ?>
                                        </td>
                                        <td>
                                            <input type="hidden" value="<?php echo $user ?>" name="codeeditor">
                                            <input type="hidden" value="<?php echo $raters['code'] ?>"
                                                   name="keshvariadmincode">
                                            <input type="submit" style="padding: 7px"
                                                   value="<?php if ($raters['approved'] == 1) {
                                                       echo "غیرفعال";
                                                   } else {
                                                       echo "فعال";
                                                   } ?>" name="<?php if ($raters['approved'] == 1) {
                                                echo "disableadmin";
                                            } else {
                                                echo "enableadmin";
                                            } ?>">
                                        </td>
                                    </tr>

                                </form>
                            <?php
                            endforeach;
                            ?>
                        </table>
                    </center>
                </div>
            </div>

        </section>
    </div>

    <?php
    endif;
    include_once 'footer.php';
    ?>
    <script>
        function validateForm() {
            var username = document.forms["myform"]["username"].value;
            var password = document.forms["myform"]["password"].value;
            var codeadmin = document.forms["myform"]["codeadmin"].value;
            var name = document.forms["myform"]["name"].value;
            var family = document.forms["myform"]["family"].value;

            if (username == "") {
                document.forms["myform"]["username"].style.backgroundColor = "yellow";
                alert("نام کاربری وارد نشده است");
                return false;
            }
            <?php if (isset($_POST['subsearchadmin'])):?>
            else if (password == "") {
                document.forms["myform"]["password"].style.backgroundColor = "yellow";
                alert("رمز عبور وارد نشده است");
                return false;
            }
            <?php endif; ?>
            else if (codeadmin == "") {
                document.forms["myform"]["codeadmin"].style.backgroundColor = "yellow";
                alert("کد ادمین وارد نشده است");
                return false;
            } else if (name == "") {
                document.forms["myform"]["name"].style.backgroundColor = "yellow";
                alert("نام ادمین وارد نشده است");
                return false;
            } else if (family == "") {
                document.forms["myform"]["family"].style.backgroundColor = "yellow";
                alert("نام خانوادگی ادمین وارد نشده است");
                return false;
            } else {
                return true;
            }
        }

    </script>
