<?php
include_once __DIR__ . '/header.php';
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
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        <!--						<form method="post" action="">-->
                        <!--							آخرین بازدید کاربر با نام:-->
                        <!--							<select name="name">-->
                        <!--								--><?php
                        //									$query=mysqli_query($connection,"select distinct(name) from rater_list order by name asc");
                        //									foreach ($query as $names):
                        //
                        ?>
                        <!--										<option>-->
                        <!--											--><?php //echo $names['name']
                        ?>
                        <!--										</option>-->
                        <!--									--><?php //endforeach;
                        ?>
                        <!--							</select>-->
                        <!--							و نام خانوادگی:-->
                        <!--							<select name="family">-->
                        <!--								--><?php
                        //									$query=mysqli_query($connection,"select distinct(family) from rater_list order by family asc");
                        //									foreach ($query as $family):
                        //
                        ?>
                        <!--										<option>--><?php //echo $family['family']
                        ?><!--</option>-->
                        <!--									--><?php //endforeach;
                        ?>
                        <!--							</select>-->
                        <!--							<input type="submit" value="دریافت اطلاعات" name="exp_logins" style="padding: 6px">-->
                        <!--						</form>-->

                        <select name="users" onchange="showUser(this.value)">
                            <option disabled selected>انتخاب کنید</option>
                            <?php
                            $query = mysqli_query($connection, "select * from rater_list order by family asc");
                            foreach ($query as $items):
                                ?>
                                <option><?php echo $items['family'] . ' - ' . $items['name'] . ' - ' . $items['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </h3>
                </div>
            </div>

        </section>
    </div>

    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        <div id="txtHint">
                            <b>
                                اطلاعات در این قسمت نمایش داده می شود.
                            </b>
                        </div>

                    </h3>
                </div>
            </div>

        </section>
    </div>

    <script src="/build/js/Last_Login_Ajax_script.js"></script>
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>
