<?php
include_once __DIR__.'/../header.php';
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
            <div class="box box-warning">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <form action="" method="post">
                        <h3 class="box-title">
                            خروجی پرداختی به ارزیابان تفصیلی جشنواره:
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
                            <input type="submit" name="selectcosts" value="فراخوانی مبالغ" style="padding: 7px">
                        </h3>
                    </form>


                    <?php
                    if (isset($_POST['selectcosts'])):

                    $jashnvareh=$_POST['jashnvareh'];
                    $selectionfromraterscost=mysqli_query($connection,"select * from raters_payment_cost where jashnvareh='$jashnvareh'");
                    foreach ($selectionfromraterscost as $cost){}
                    ?>
                    <form method="post" target="_blank" action="/build/php/excel_export/rater_payment_with_save.php">

                    <div class="box-body">
                        <input name="jashnvareh" type="hidden" value="<?php echo $_POST['jashnvareh']?>">
                        <center>
                            <br/>
                        <table class="tableamarasar">
                            <tr>
                                <th>عنوان</th>
                                <th style="text-align: center">سطح یک</th>
                                <th style="text-align: center">سطح دو</th>
                                <th style="text-align: center">سطح سه</th>
                                <th style="text-align: center">سطح چهار</th>
                            </tr>
                            <tr>
                                <th>
                                    مقاله
                                </th>
                                <td>
                                    <input type="number" min="0" name="m1" style="width: 100px" value="<?php echo $cost['m1'] ?>">
                                </td>
                                <td>
                                    <input type="number" min="0" name="m2" style="width: 100px" value="<?php echo $cost['m2'] ?>">
                                </td>
                                <td>
                                    <input type="number" min="0" name="m3" style="width: 100px" value="<?php echo $cost['m3'] ?>">
                                </td>
                                <td>
                                    <input type="number" min="0" name="m4" style="width: 100px" value="<?php echo $cost['m4'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    کتاب
                                </th>
                                <td>
                                    <input type="number" min="0" name="k1" style="width: 100px" value="<?php echo $cost['k1'] ?>">
                                </td>
                                <td>
                                    <input type="number" min="0" name="k2" style="width: 100px" value="<?php echo $cost['k2'] ?>">
                                </td>
                                <td>
                                    <input type="number" min="0" name="k3" style="width: 100px" value="<?php echo $cost['k3'] ?>">
                                </td>
                                <td>
                                    <input type="number" min="0" name="k4" style="width: 100px" value="<?php echo $cost['k4'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    پایان‌نامه
                                </th>
                                <td></td>
                                <td></td>
                                <td>
                                    <input type="number" min="0" name="p3" style="width: 100px" value="<?php echo $cost['p3'] ?>">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    تحقیق پایانی
                                </th>
                                <td></td>
                                <td>
                                    <input type="number" min="0" name="t2" style="width: 100px" value="<?php echo $cost['t2'] ?>">
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    کتاب ترجمه
                                </th>
                                <td>
                                    <input type="number" min="0" name="kt" style="width: 100px" value="<?php echo $cost['kt'] ?>">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    کتاب تصحیح
                                </th>
                                <td>
                                    <input type="number" min="0" name="ktashih" style="width: 100px" value="<?php echo $cost['ktashih'] ?>">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>

                            <br/><br/>
                                <input type="submit" value="دریافت خروجی" name="exp_payment_export" style="padding: 6px" onclick="return confirm('با کلیک بر روی ok، آثار خروجی گرفته شده بر روی حالت پرداخت شده قرار خواهند گرفت. آیا از این عملیات مطمئن هستید؟')">
                        </center>
                    </form>
                    <?php endif;?>

                </div>
            </div>

        </section>
    </div>


    <?php
    endif;
    include_once __DIR__.'/../footer.php';
    ?>
