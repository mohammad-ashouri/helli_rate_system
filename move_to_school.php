<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2):
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
            <center>
                <?php if (isset($_GET['wrong'])): ?>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                خطایی در انتقال پیش آمد!
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['moved'])): ?>
                    <?php

                    ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                آثار با موفقیت به مدرسه ی مورد نظر انتقال یافت!
                                <?php
                                echo '(' . $_GET["num"] . ' اثر)';
                                ?>
                            </h3>
                        </div>
                    </div>
                <?php endif; ?>
            </center>
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
                        انتقال گروهی آثار به مدرسه مورد نظر
                    </h3>
                </div>
                <div class="box-body">
                    <center>
                        <form action="build/php/Move_Posts_To_School.php" method="post" id="myform" onsubmit="">
                                <span>
                                    مدرسه‌ای که می‌خواهید تمامی آثار ثبت شده‌اش را به آن انتقال دهید، انتخاب کنید :
                                    <select name="schoolname">
                                        <?php
                                        $state = $_SESSION['city'];
                                        $city = $_SESSION['shahr_name'];
                                        $query=mysqli_query($connection,"select distinct jashnvareh from etelaat_a order by jashnvareh");
                                        foreach ($query as $festivals){}
                                        $lastFestival=$festivals['jashnvareh'];
                                        $query = mysqli_query($connection, "select distinct (madrese),shahrtahsili from etelaat_p inner join etelaat_a on etelaat_p.codeasar=etelaat_a.codeasar where etelaat_p.madrese is not null and etelaat_p.madrese!='' and etelaat_p.madrese!='آزاد' and etelaat_p.ostantahsili='$state' and etelaat_a.approve_sianat=0 and etelaat_a.jashnvareh='$lastFestival' order by etelaat_p.madrese");
                                        foreach ($query as $items):
                                            ?>
                                            <option value="<?php
                                            echo $items['madrese'];
                                            ?>">
                                      <?php
                                      echo $items['madrese']. ' - شهرستان ' . $items['shahrtahsili'];
                                      ?>
                                    </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </span>
                            <br/><br/>
                            <input style="padding: 5px" name="move_to_school" type="submit"
                                   value="انتقال آثار به مدرسه مورد نظر"
                                   onclick="return confirm('لطفا در صورت تایید نهایی بر روی ok کلیک کنید. آثار پس از انتقال، قابل بازگشت به مرحله ی استانی نیستند')">
                        </form>
                    </center>


                </div>
            </div>

        </section>
    </div>

    <!-- Main content -->


    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>
