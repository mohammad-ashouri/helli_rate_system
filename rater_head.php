<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1):

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
        if (isset($_GET['successremove'])):?>
            <h4 style=" background-color: green; color: white; font-weight: bold">
                <br/>
                ارزیاب با موفقیت حذف شد
                <br/>
            </h4>
        <?php
        elseif (isset($_GET['nullcode'])): ?>
        <h4 style=" background-color: red; color: white; font-weight: bold">
            <br/>
            لطفا کد ارزیاب را وارد کنید
            <br/>
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
                        تعیین ارزیاب به عنوان سرگروه
                    </h3>
                </div>
                <div class="box-body">

                    <center>
                        <table class="tablegroupheader">
                            <tr>
                                <th style="text-align: center">گروه علمی</th>
                                <th style="text-align: center">کاربر</th>
                            </tr>
                            <tr>
                                <th>اخلاق و تربیت</th>
                                <td>
                                    <select onchange="sendcode(this.value,'اخلاق و تربیت')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'اخلاق و تربیت') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>ادبیات</th>
                                <td>
                                    <select onchange="sendcode(this.value,'ادبیات')">
                                        <option value=""></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'ادبیات') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>اصول فقه</th>
                                <td>
                                    <select onchange="sendcode(this.value,'اصول فقه')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'اصول فقه') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>تاریخ اسلام</th>
                                <td>
                                    <select onchange="sendcode(this.value,'تاریخ اسلام')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'تاریخ اسلام') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>تفسیر و علوم قرآنی</th>
                                <td>
                                    <select onchange="sendcode(this.value,'تفسیر و علوم قرآنی')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'تفسیر و علوم قرآنی') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>علوم انسانی</th>
                                <td>
                                    <select onchange="sendcode(this.value,'علوم انسانی')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'علوم انسانی') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>علوم حدیث و درایه</th>
                                <td>
                                    <select onchange="sendcode(this.value,'علوم حدیث و درایه')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'علوم حدیث و درایه') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>فقه و حقوق اسلامی</th>
                                <td>
                                    <select onchange="sendcode(this.value,'فقه و حقوق اسلامی')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'فقه و حقوق اسلامی') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>فلسفه و منطق</th>
                                <td>
                                    <select onchange="sendcode(this.value,'فلسفه و منطق')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'فلسفه و منطق') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>کلام</th>
                                <td>
                                    <select onchange="sendcode(this.value,'کلام')">
                                        <option></option>
                                        <?php
                                        $raters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                                        foreach ($raters as $ratersinfo):
                                            ?>
                                            <option <?php if ($ratersinfo['GroupNameIfGroupHead'] == 'کلام') {
                                                echo 'selected';
                                            } ?> value="<?php echo $ratersinfo['username'] ?>">
                                                <?php echo $ratersinfo['family'] . ' - ' . $ratersinfo['name'] . ' - کد= ' . $ratersinfo['username']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
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
                        فهرست ارزیابان
                    </h3>
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
                                    تخصص
                                </th>
                                <th>
                                    شماره همراه
                                </th>
                                <th>
                                    سرگروه
                                </th>
                            </tr>

                            <?php
                            $resultraters = mysqli_query($connection, "select * from rater_list where (city_name is null or city_name='قم') and type=0 and approved=1 order by family asc");
                            foreach ($resultraters as $raters): ?>
                                <tr>
                                    <td>
                                        <?php echo $raters['code'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['name'] . " " . $raters['family'] ?>
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
                                        <?php echo $raters['phone'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['GroupNameIfGroupHead'] ?>
                                    </td>
                                </tr>


                            <?php
                            endforeach;
                            ?>
                        </table>
                    </center>
                </div>
            </div>

        </section>
    </div>
    <script>
        function sendcode(RaterCode, GroupName) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "build/ajax/SetGroupHeader.php?RaterCode=" + RaterCode + "&GroupName=" + GroupName, true);
            xmlhttp.send();
        }
    </script>
    <!-- /.content-wrapper -->
<?php
endif;
include_once __DIR__ . '/footer.php';
?>