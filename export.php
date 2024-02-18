<?php
include_once __DIR__.'/header.php';
if ($_SESSION['head']==1):
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
                        <form method="post" target="_blank" action="build/php/excel_export/arzeshyabi_tosifi.php">
                        خروجی اکسل از ارزشیابی‌های توصیفی گروه علمی:
                            <select name="elmigroup">
                                <?php
                                $selectionfromelmigroup=mysqli_query($connection,"select * from elmigroup_option");
                                foreach ($selectionfromelmigroup as $items):
                                ?>
                                <option>
                                    <?php echo $items['elmigroup'] ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_ejmali" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/vaziat_nomredehi.php">
                            وضعیت نمره‌دهی دبیرخانه‌های استانی جشنواره در مقایسه با دبیرخانه مرکزی در جشنواره
                            <select name="jashnvareh">
                                <?php
                                $selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_p");
                                foreach ($selectionfromelmigroup as $items):
                                    ?>
                                    <option>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_advaar_comparison" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/advaar_bargozide.php">
                            اطلاعات کلی برگزیدگان کشوری دوره:
                            <select name="jashnvareh">
                                <?php
                                $selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_p");
                                foreach ($selectionfromelmigroup as $items):
                                    ?>
                                    <option>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_advaar_selected" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/vaziat_asar_elmigroup.php">
                            وضعیت آثار بر اساس گروه علمی در دوره:
                            <select name="jashnvareh">
                                <?php
                                $selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_p");
                                foreach ($selectionfromelmigroup as $items):
                                    ?>
                                    <option>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_vaziat_asar_elmigroup" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="build/php/excel_export/export_ejmali_keshvari.php">
                            خروجی ارزیابی اجمالی ارزیابان کشوری جشنواره:
                            <select name="jashnvareh">
                                <?php
                                $selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a");
                                foreach ($selectionfromelmigroup as $items):
                                    ?>
                                    <option>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_ejmali_keshvari" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/export_selected_rater.php">
                            وضعیت ارزیاب با کد
                            <input type="text" name="rater_code" style="width: 150px">
                            در جشنواره:
                            <select name="jashnvareh">
                                <?php
                                $selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a");
                                foreach ($selectionfromelmigroup as $items):
                                    ?>
                                    <option>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_selected_rater" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/avg_items.php">
                            میانگین آیتم های ارزیابی
                            در جشنواره:
                            <select name="jashnvareh">
								<?php
									$selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a");
									foreach ($selectionfromelmigroup as $items):
										?>
                                        <option>
											<?php echo $items['jashnvareh'] ?>
                                        </option>
									<?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_avg_items" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/exp_all_schools.php">
                            خروجی تمامی مدارس صاحبان ثبت شده در سامانه با حذف تکراری‌ها در جشنواره:
                            <select name="jashnvareh">
							    <?php
								    $selectionfromelmigroup=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a");
								    foreach ($selectionfromelmigroup as $items):
									    ?>
                                        <option>
										    <?php echo $items['jashnvareh'] ?>
                                        </option>
								    <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت خروجی" name="exp_all_schools" style="padding: 6px">
                        </form>
                    </h3>
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
                        <form method="post" target="_blank" action="/build/php/excel_export/exp_all_admins.php">
                            خروجی اطلاعات تمامی ادمین‌های استانی و مدرسه‌ای ثبت شده در جشنواره با حذف تکراری‌ها:
                            <input type="submit" value="دریافت خروجی" name="exp_all_admins" style="padding: 6px">
                        </form>
                    </h3>
                </div>
            </div>

        </section>
    </div>
        <?php
        endif;
        include_once __DIR__.'/footer.php';
        ?>
