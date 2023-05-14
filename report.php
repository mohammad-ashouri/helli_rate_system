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
            </div></section>
    </div>

    <div class="box-body">
        <?php

        ?>
        <form method="post">
            <select name="selectjashnvare" style="padding: 5px">
                <?php
                $selectfromadvaar=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_p order by jashnvareh asc");
                foreach ($selectfromadvaar as $items):
                ?>
                <option <?php if ($items['jashnvareh']==@$_POST['selectjashnvare']) echo 'selected' ?>><?php echo $items['jashnvareh'] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="checkbox" id="1" name="amar_adadi_ghaleb_sath" <?php if (@$_POST['amar_adadi_ghaleb_sath']!=NULL) echo "checked"?>>
            <label for="1">
                آمار عددی بر اساس قالب و سطح ارزیابی
            </label>
            <input type="checkbox" id="2" name="tedad_asar_sabtnami_ostan" <?php if (@$_POST['tedad_asar_sabtnami_ostan']!=NULL) echo "checked"?>>
            <label for="2">
                تعداد آثار ثبت نامی در هر استان
            </label>
            <input type="checkbox" id="3" name="tedad_nafarat_sabtnami_ostan" <?php if (@$_POST['tedad_nafarat_sabtnami_ostan']!=NULL) echo "checked"?>>
            <label for="3">
                تعداد نفرات ثبت نامی در هر استان
            </label>
            <input type="checkbox" id="4" name="vaziat_asar_group_elmi" <?php if (@$_POST['vaziat_asar_group_elmi']!=NULL) echo "checked"?>>
            <label for="4">
                وضعیت آثار بر اساس گروه علمی
            </label>
            &nbsp;&nbsp;&nbsp;
            <input type="submit" name="subselect" style="padding: 6px" value="نمایش دوره مورد نظر">
        </form>
        <?php
        if (isset($_POST['subselect']) and !empty($_POST['selectjashnvare'])):
            $jashnvareh=$_POST['selectjashnvare'];
        $pazhooheshgaran =mysqli_query($connection,"SELECT distinct (codemelli) from etelaat_p where jashnvareh='$jashnvareh'") ;
        $kolleasar=mysqli_query($connection,"SELECT distinct (codeasar),jashnvareh from etelaat_p where jashnvareh='$jashnvareh'") ;
        $asarpazireshshode=mysqli_query($connection,"SELECT * from etelaat_a where vaziatpazireshasar='پذیرش شد' and sharayetavalliehsherkat='دارد' and jashnvareh='$jashnvareh'") ;
        $asarsharayetdar=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar WHERE vaziatpazireshasar='پذیرش شد' and sharayetavalliehsherkat='دارد' and jashnvareh='$jashnvareh'") ;
        $tedadmardan=mysqli_query($connection,"SELECT distinct (codemelli) from etelaat_p where `gender`='مرد' and jashnvareh='$jashnvareh' ") ;
        $tedadzanan=mysqli_query($connection,"SELECT distinct (codemelli) from etelaat_p where `gender`='زن' and jashnvareh='$jashnvareh'") ;
        $tedadostan=mysqli_query($connection,"SELECT distinct (ostantahsili) from etelaat_p where ostantahsili != 'ندارد' and jashnvareh='$jashnvareh'") ;
        $ejmaliradi=mysqli_query($connection,"SELECT * from t_a_ejmali inner join etelaat_p on t_a_ejmali.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and jam<75") ;
        $ejmalighabool=mysqli_query($connection,"SELECT * from t_a_ejmali inner join etelaat_p on t_a_ejmali.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and jam>75") ;
        $kolleejmalisabtshode=mysqli_num_rows($ejmalighabool)+mysqli_num_rows($ejmaliradi) ;
        $arzyabiostanisabtshode=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and filetafsili1_ostan is not null") ;
        $arzyabitafsili2rahyafte=mysqli_query($connection, "SELECT * from tafsili2 inner join etelaat_p on tafsili2.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and jam is null ");
        $arzyabitafsili2sabtshode=mysqli_query($connection,"SELECT * from tafsili2 inner join etelaat_p on tafsili2.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and jam is not null ") ;
        $arzyabitafsili3rahyafte=mysqli_query($connection,"SELECT * from tafsili3 inner join etelaat_p on tafsili3.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and jam is null ") ;
        $arzyabitafsili3sabtshode=mysqli_query($connection,"SELECT * from tafsili3 inner join etelaat_p on tafsili3.codeasar=etelaat_p.codeasar WHERE jashnvareh='$jashnvareh' and jam is not null ") ;
        $ostan=mysqli_query($connection,"select count(ostantahsili),distinct ostantahsili from etelaat_p where jashnvareh='$jashnvareh'");


        ?>
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        اطلاعات آماری-عددی دوره
                        <?php
                        echo substr($items['jashnvareh'],3);
                        ?>
                        جشنواره علامه حلی
                    </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>

                <div class="box-body">
                    <table class="tableamar">
                        <tr>
                            <th>تعداد پژوهشگران ثبت شده در سامانه</th>
                            <td> <?php printf(mysqli_num_rows($pazhooheshgaran)) ?> </td>
                            <th>تعداد برادران</th>
                            <td> <?php printf(mysqli_num_rows($tedadmardan)) ?> </td>
                            <th>تعداد خواهران</th>
                            <td> <?php printf(mysqli_num_rows($tedadzanan)) ?> </td>

                        </tr>
                        <tr>
                            <th>تعداد استان های پذیرش شده</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($tedadostan)) ?> </td>
                        </tr>
                        <tr>
                            <th>تعداد آثار ثبت شده در سامانه</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($kolleasar)) ?> </td>
                            <th>تعداد آثار پذیرش شده</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($asarpazireshshode)) ?> </td>
                        </tr>
                        <tr>
                            <th>تعداد ارزیابی اجمالی ثبت شده(قبول+ردی)</th>
                            <td style="text-align: center"> <?php printf($kolleejmalisabtshode) ?> </td>
                            <th>اجمالی ردی</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($ejmaliradi)) ?> </td>
                            <th>اجمالی قبول</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($ejmalighabool)) ?> </td>
                        </tr>
                        <tr>
                            <th>تعداد آثار راه یافته به ارزیابی تفصیلی دوم</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($arzyabitafsili2rahyafte)) ?> </td>
                            <th>تعداد ارزیابی های دوم ثبت شده</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($arzyabitafsili2sabtshode)) ?> </td>
                        </tr>
                        <tr>
                            <th>تعداد آثار راه یافته به ارزیابی تفصیلی سوم</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($arzyabitafsili3rahyafte)) ?> </td>
                            <th>تعداد ارزیابی های سوم ثبت شده</th>
                            <td style="text-align: center"> <?php printf(mysqli_num_rows($arzyabitafsili3sabtshode)) ?> </td>
                        </tr>
                    </table>
                    <?php
                    if (@$_POST['amar_adadi_ghaleb_sath']!=NULL){
                        include_once 'build/php/report_queries/amar_adadi_ghaleb_sath_arzyabi.php';
                    }
                    if (@$_POST['tedad_asar_sabtnami_ostan']!=NULL){
                        include_once 'build/php/report_queries/tedad_asar_sabtenami_har_ostan.php';
                    }
                    if (@$_POST['tedad_nafarat_sabtnami_ostan']!=NULL){
                        include_once 'build/php/report_queries/tedad_nafarat_sabtenami_har_ostan.php';
                    }
                    if (@$_POST['vaziat_asar_group_elmi']!=NULL){
                        include_once 'build/php/report_queries/vaziat_asar_group_elmi.php';
                    }

                    ?>


                </div>
        </section>
        <?php
    endif;
    ?>
    </div>

    <?php
endif;
include_once __DIR__.'/footer.php';
?>

