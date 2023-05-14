<?php
include_once __DIR__.'/header.php';
if ($_SESSION['head']==1 and $_SESSION['full_access']==1):
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
<?php if (isset($_GET['expset'])): ?>
<section class="content">
<div class="row">
<section class="col-lg-12 col-md-12">
<div class="box box-solid box-success">
<div class="box-header">
<i class="fa fa-info-circle"></i>
<center>
<h3 class='box-title'>
    فایل با موفقیت آپلود شد.
    <br><br>
    برای دانلود فایل، وارد دوره ی مورد نظر شوید.
</h3>
</center>

</div>
</section>
<?php endif; ?>
<?php if (isset($_GET['wrong'])): ?>
<section class="content">
<div class="row">
<section class="col-lg-12 col-md-12">
<div class="box box-solid box-danger">
<div class="box-header">
    <i class="fa fa-info-circle"></i>
    <center>
        <h3 class='box-title'>
            خطا در آپلود فایل. لطفا دوباره تلاش کنید
        </h3>
    </center>

</div>
</section>
<?php endif; ?>
<?php if (isset($_GET['wrongexpsize'])): ?>
<section class="content">
<div class="row">
<section class="col-lg-12 col-md-12">
    <div class="box box-solid box-danger">
        <div class="box-header">
            <i class="fa fa-info-circle"></i>
            <center>
                <h3 class='box-title'>
                    فایل شما بالاتر از 5 مگابایت است.
                </h3>
            </center>

        </div>
</section>
<?php endif; ?>
<?php if (isset($_GET['expremoved'])): ?>
<section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <center>
                        <h3 class='box-title'>
                            فایل انتخاب شده با موفقیت حذف شد.
                        </h3>
                    </center>

                </div>
        </section>
        <?php endif; ?>
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
                                    <h4 style="color: red">توجه داشته باشید که تمامی مبالغ وارد شده شما باید به ریال باشند.</h4>

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
                                    <h4 style="color: red">پس از کلیک بر روی دکمه زیر، تمامی آثاری که ارزیابی شده‌اند به وضعیت پرداخت شده خواهند رفت. این عملیات قابل بازگشت نیست.</h4>
                                    <input type="hidden" value="<?php echo $jashnvareh; ?>" name="jashnvareh">
                                    <input type="submit" value="دریافت خروجی تا این دوره" name="exp_payment_export" style="padding: 6px" onclick="return confirm('با کلیک بر روی ok، آثار خروجی گرفته شده بر روی حالت پرداخت شده قرار خواهند گرفت. آیا از این عملیات مطمئن هستید؟')">
                                    <form method="post" target="_blank" action="/build/php/excel_export/rater_payment_with_save.php">
                                        <input type="hidden" value="<?php echo $jashnvareh; ?>" name="jashnvareh">
                                        <input type="hidden" value="jashnvareh" name="paymentall">
                                        <input type="submit" value="دریافت خروجی همه پرداخت شده ها" name="=allpayment" style="padding: 6px">
                                    </form>
                                    <h4 style="color: black;background-color: #00E466;padding: 7px;border-radius: 5px">برای دسترسی بهتر به فایل خود، لطفا خروجی خود را پس از دریافت، از طریق کادر زیر آپلود کنید.</h4>
                                    <h4 style="color: black;background-color: #00E466;padding: 7px;border-radius: 5px">توجه داشته باشید که خروجی وارد شده شما حتما برای دوره‌ی جشنواره انتخاب شده باشد. <br>(مثلا اگر شما دوره سیزدهم را انتخاب کردید، حتما باید فقط خروجی دوره سیزدهم را آپلود کنید.)</h4>
                                    <h4 style="color: black;background-color: #00E466;padding: 7px;border-radius: 5px">توجه داشته باشید که فایل آپلود شده تکراری نباشد.</h4>

                                </center>
                        </form>


                    </div>
                </div>
                <div class="box-body">
                    <center>
                        <form method="post" enctype="multipart/form-data" action="/build/php/inc.php">
                            <input type="hidden" value="<?php echo $user; ?>" name="uploader">
                            <input name="jashnvareh" type="hidden" value="<?php echo $_POST['jashnvareh']?>">
                            <input type="file" name="uploadexpexcelraterscost" accept="application/vnd.ms-excel">
                            <br/>
                            <input type="submit" name="uploadsub" value="آپلود فایل خروجی" style="padding: 5px;">
                        </form>
                        <br>
                        <table>
                            <tr>
                                <th>ردیف</th>
                                <th>نام فایل</th>
                                <th>تاریخ آپلود</th>
                                <th>کاربر آپلود کننده</th>
                                <th>حذف فایل</th>
                            </tr>
                            <?php
                                $a=1;
                                $query=mysqli_query($connection,"select * from uploadedexportraterscost where jashnvareh='$jashnvareh' and remover is null and date_deleted is null");
                                foreach ($query as $showpaths):
                                    ?>
                                    <tr>
                                        <th><?php echo $a; ?></th>
                                        <th>
                                            <a href="<?php echo $main_website_url.$showpaths['path']; ?>">
                                                <?php echo $showpaths['filename']; ?>
                                            </a>
                                        </th>
                                        <th><?php echo $showpaths['date_uploaded']; ?></th>
                                        <th>
                                            <?php
                                                $codeselected=$showpaths['uploader'];
                                                $selectfromusers=mysqli_query($connection,"select * from rater_list where username='$codeselected'");
                                                foreach ($selectfromusers as $items){}
                                                echo $items['name'].' '.$items['family'] ?>
                                        </th>
                                        <th>
                                            <form method="post" action="/../dist/files/expexcelraterscostfiles/remexpexcelraterscost.php">
                                                <input type="hidden" name="remover" value="<?php echo $user; ?>">
                                                <input type="hidden" name="filename" value="<?php echo $showpaths['filename']; ?>">
                                                <input type="submit" name="remuploadedfile" value="حذف" style="padding: 5px" onclick="return confirm('آیا نسبت به حذف فایل مطمئن هستید؟')">
                                            </form>
                                        </th>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </center>


                </div>
                
                <?php endif;?>
            </section>
        </div>
        <?php
            endif;
            include_once __DIR__.'/footer.php';
        ?>
