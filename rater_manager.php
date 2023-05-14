<?php
include_once 'header.php';
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
                            ثبت ارزیاب
                        </h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if(isset($_POST['subset'])) {
                            $codearzyab=$_POST['code'];
                            $namearzyab=$_POST['name'];
                            $familyarzyab=$_POST['family'];
                            $sathelmiarzyab=$_POST['sath_elmi'];

                            $adabiat=$_POST['adabiat'];
                            $akhlaghtarbiat=$_POST['akhlaghtarbiat'];
                            $hadisderaye=$_POST['hadisderaye'];
                            $falsafe=$_POST['falsafe'];
                            $tafsir=$_POST['tafsir'];
                            $kalaam=$_POST['kalaam'];
                            $ulumensani=$_POST['ulumensani'];
                            $feghh=$_POST['feghh'];
                            $osoolfegh=$_POST['osoolfegh'];
                            $tarikheslam=$_POST['tarikheslam'];
                            $tashihtaligh=$_POST['tashihtaligh'];
                            $tarjome=$_POST['tarjome'];

                            $phone=$_POST['phone'];
                            $address=$_POST['address'];
                            $password=$_POST['password'];
                            $accnum=$_POST['acc_number'];
                            $bankname=$_POST['bankname'];
                            $inputuser=$_SESSION['namefamily'];

                            if ($adabiat==null){
                                $adabiat= NULL;
                            }
                            if ($akhlaghtarbiat==null){
                                $akhlaghtarbiat= NULL;
                            }
                            if ($hadisderaye==null){
                                $hadisderaye= NULL;
                            }
                            if ($falsafe==null){
                                $falsafe= NULL;
                            }
                            if ($tafsir==null){
                                $tafsir= NULL;
                            }
                            if ($kalaam==null){
                                $kalaam= NULL;
                            }
                            if ($ulumensani==null){
                                $ulumensani= NULL;
                            }
                            if ($feghh==null){
                                $feghh= NULL;
                            }
                            if ($osoolfegh==null){
                                $osoolfegh= NULL;
                            }
                            if ($tarikheslam==null){
                                $tarikheslam= NULL;
                            }
                            if ($bankname=="انتخاب کنید"){
                                $bankname=NULL;
                            }
                            if ($sathelmiarzyab=="انتخاب کنید"){
                                $sathelmiarzyab=NULL;
                            }
                            if ($tashihtaligh==null){
                                $tashihtaligh=NULL;
                            }
                            if ($tarjome==null){
                                $tarjome=NULL;
                            }
                            $add = "insert into `rater_list` (`name`,`family`,`code`,`sath_elmi`,`adabiat`,`akhlaghtarbiat`,`hadisderaye`,`falsafe`,`tafsir`,`kalaam`,`ulumensani`,`feghh`,`osoolfegh`,`tarikheslam`,`phone`,`address`,`username`,`password`,`account_number`,`bank`,`input_user`,`tashihtaligh`,`tarjome`)
                                                    values ('$namearzyab','$familyarzyab','$codearzyab','$sathelmiarzyab','$adabiat','$akhlaghtarbiat','$hadisderaye','$falsafe','$tafsir','$kalaam','$ulumensani','$feghh','$osoolfegh','$tarikheslam','$phone','$address','$codearzyab','$password','$accnum','$bankname','$inputuser','$tashihtaligh','$tarjome')";
                            mysqli_query($connection, $add);
                            echo "<center>"."ارزیاب با موفقیت به پایگاه داده اضافه گردید"."</center>";
                        }

                        ?>
                        <center>
                            <form method="post">

                                <table class="tableratermanager">
                                    <tr>
                                        <th>کد ارزیاب (نام کاربری)</th>
                                        <td><input class="inputratermanager" type="text" name="code"></td>
                                    </tr>
                                    <tr>
                                        <th>رمز عبور</th>
                                        <td><input  class="inputratermanager" type="text" name="password"></td>
                                    </tr>
                                    <tr>
                                        <th>نام</th>
                                        <td><input class="inputratermanager" type="text" name="name"></td>
                                    </tr>
                                    <tr>
                                        <th>نام خانوادگی</th>
                                        <td><input class="inputratermanager" type="text" name="family"></td>
                                    </tr>
                                    <tr>
                                        <th>سطح علمی</th>
                                        <td>
                                            <select name="sath_elmi">
                                                <option>انتخاب کنید</option>
                                                <option>کارشناسی ارشد</option>
                                                <option>دکتری</option>
                                                <option>سطح 3 حوزه</option>
                                                <option>سطح 4 حوزه</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>تخصص و گرایش</th>
                                        <td>
                                            <input type="checkbox" value="ادبیات" id="adabiat" name="adabiat">
                                            <label for="adabiat">ادبیات</label>
                                            <br/>
                                            <input type="checkbox" value="اخلاق و تربیت" id="akhlaghtarbiat" name="akhlaghtarbiat">
                                            <label for="akhlaghtarbiat">اخلاق و تربیت</label>
                                            <br/>
                                            <input type="checkbox" value="علوم حدیث و درایه" id="hadisderaye" name="hadisderaye">
                                            <label for="hadisderaye">علوم حدیث و درایه</label>
                                            <br/>
                                            <input type="checkbox" value="فلسفه و منطق" id="falsafe" name="falsafe" >
                                            <label for="falsafe">فلسفه و منطق</label>
                                            <br/>
                                            <input type="checkbox" value="تفسیر و علوم قرآنی" id="tafsir" name="tafsir">
                                            <label for="tafsir">تفسیر و علوم قرآنی</label>
                                            <br/>
                                            <input type="checkbox" value="کلام" id="kalaam" name="kalaam">
                                            <label for="kalaam">کلام</label>
                                            <br/>
                                            <input type="checkbox" value="تاریخ اسلام" id="tarikheslam" name="tarikheslam">
                                            <label for="tarikheslam">تاریخ اسلام</label>
                                            <br/>
                                            <input type="checkbox" value="علوم انسانی" id="ulumensani" name="ulumensani">
                                            <label for="ulumensani">علوم انسانی</label>
                                            <br/>
                                            <input type="checkbox" value="فقه و حقوق اسلام" id="feghh" name="feghh">
                                            <label for="feghh">فقه و حقوق اسلامی</label>
                                            <br/>
                                            <input type="checkbox" value="اصول فقه" id="osoolfegh" name="osoolfegh">
                                            <label for="osoolfegh">اصول فقه</label>
                                            <br/>
                                            <input type="checkbox" value="تصحیح و تعلیق" id="tashihtaligh" name="tashihtaligh">
                                            <label for="tashihtaligh">تصحیح و تعلیق</label>
                                            <br/>
                                            <input type="checkbox" value="ترجمه" id="tarjome" name="tarjome">
                                            <label for="tarjome">ترجمه</label>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>تلفن</th>
                                        <td><input  class="inputratermanager" type="text" name="phone"></td>
                                    </tr>
                                    <tr>
                                        <th>آدرس</th>
                                        <td><textarea style="width: 250px; height: 100px" type="text" name="address"> </textarea></td>
                                    </tr>
                                    <tr>
                                        <th>شماره حساب</th>
                                        <td><input  class="inputratermanager" type="text" name="acc_number"></td>
                                    </tr>
                                    <tr>
                                        <th>نام بانک</th>
                                        <td>
                                            <select name="bankname">
                                                <option selected>انتخاب کنید</option>
                                                <?php
                                                $sql="select * from `bank_list`";
                                                $querybank=mysqli_query($connection,$sql);
                                                foreach ( $querybank as $result):
                                                ?>
                                                    <option>
                                                        <?php echo $result['name']; ?>
                                                    </option>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                        </td>
                                    </tr>



                                </table>
                                <br/>
                                    <input name="subset" class="set" type="submit" value="ثبت" onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات ارزیاب جدید، بر روی گزینه OK کلیک کنید')">

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
                                    شماره حساب
                                </th>
                                <th>
                                    بانک
                                </th>
                            </tr>

                            <?php
                            $queryrater="select * from rater_list where `type`=0";
                            $resultraters=mysqli_query($connection,$queryrater);
                            foreach ($resultraters as $raters): ?>
                                <tr>
                                    <td>
                                        <?php echo $raters['code'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['name']." ".$raters['family'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        $a1=$raters['adabiat'];
                                        $a2=$raters['akhlaghtarbiat'];
                                        $a3=$raters['hadisderaye'];
                                        $a4=$raters['falsafe'];
                                        $a5=$raters['tafsir'];
                                        $a6=$raters['kalaam'];
                                        $a7=$raters['ulumensani'];
                                        $a8=$raters['feghh'];
                                        $a9=$raters['osoolfegh'];
                                        $a10=$raters['tarikheslam'];
                                        if ($a1==NULL){
                                            $a1="";
                                        }else{
                                            echo $a1=$raters['adabiat']."/";
                                        }
                                        if ($a2==NULL){
                                            $a2="";
                                        }else{
                                            echo $a2=$raters['akhlaghtarbiat']."/";
                                        }
                                        if ($a3==NULL){
                                            $a3="";
                                        }else{
                                            echo $a3=$raters['hadisderaye']."/";
                                        }
                                        if ($a4==NULL){
                                            $a4="";
                                        }else{
                                            echo $a4=$raters['falsafe']."/";
                                        }
                                        if ($a5==NULL){
                                            $a5="";
                                        }else{
                                            echo $a5=$raters['tafsir']."/";
                                        }
                                        if ($a6==NULL){
                                            $a6="";
                                        }else{
                                            echo $a6=$raters['kalaam']."/";
                                        }
                                        if ($a7==NULL){
                                            $a7="";
                                        }else{
                                            echo $a7=$raters['ulumensani']."/";
                                        }
                                        if ($a8==NULL){
                                            $a8="";
                                        }else{
                                            echo $a8=$raters['feghh']."/";
                                        }
                                        if ($a9==NULL){
                                            $a9="";
                                        }else{
                                            echo $a9=$raters['osoolfegh']."/";
                                        }
                                        if ($a10==NULL){
                                            $a10="";
                                        }else{
                                            echo $a10=$raters['tarikheslam']."/";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['phone'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['account_number'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['bank'] ?>
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
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        حذف ارزیاب
                    </h3>
                </div>
                <div class="box-body">
                    <center>
                        <form action="build/php/removerater.php" method="post">
                            <input type="text" name="remove" placeholder="کد ارزیاب را وارد کنید">
                            <br/><br/>
                            <input type="submit" style="background-color: red" value="حذف ارزیاب" name="removerater" onclick="return confirm('کاربر گرامی: لطفا در صورت تایید حذف ارزیاب، بر روی گزینه OK کلیک کنید')">

                        </form>

                    </center>
                </div>
            </div>

        </section>
    </div>

    <!-- Main content -->
    <section class="content">




    <!-- /.content-wrapper -->
<?php
endif;
include_once 'footer.php';
?>