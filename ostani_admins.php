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
<!--                    <form method="post" action="build/php/inc.php">-->
<!--                        <input type="submit" value="ext" name="querya" style="padding: 7px;border-radius: 5px">-->
<!--                    </form>-->
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
                ادمین با موفقیت غیر فعال شد
                <br/>
            </h4>
	    <?php
		    elseif (isset($_GET['successenabled'])):?>
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
        <?php
        elseif (isset($_GET['removed'])): ?>
        <h4 style=" background-color: red; color: white; font-weight: bold">
            <br/>
            ادمین با موفقیت حذف شد
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
                        ثبت/ویرایش ادمین جدید استانی
                    </h3>
                </div>
                <div class="box-body">
                    <form method="post" onsubmit="return admincodecheck()">
                        برای ویرایش ادمین استان، کد را در کادر روبرو وارد کنید:
                        <input type="text" name="dabirostancode" id="dabirostancode" placeholder="کد را وارد کنید" style="padding: 5px;border-radius: 5px">
                        <input type="submit" value="جستجو" name="subsearchostaniadmin" style="padding: 7px;border-radius: 5px">
                    </form>
                    در غیر این صورت برای وارد کردن ادمین جدید، فرم زیر را پر کنید
                    <br/><br/>
                    <?php
                    if (isset($_POST['subsearchostaniadmin']) and !empty($_POST['dabirostancode'])){
                        $ostaniadmincode=$_POST['dabirostancode'];
                        $select=mysqli_query($connection,"select * from rater_list where username='$ostaniadmincode' and type=2");
                        foreach ($select as $ostaniadmin) {}
                    }
                    if (empty($ostaniadmin) and isset($_POST['subsearchostaniadmin'])): ?>
                        <div class="box box-solid box-danger">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">ادمین وارد شده در پایگاه داده سامانه یافت نشد.</h3>
                            </div>
                        </div>
                    <?php endif;?>
                    <center>
                        <form id="myform" onsubmit="return validateForm()" method="post" action="build/php/inc.php">

                            <table class="tableratermanager">
                                <tr>
                                    <th>کد ملی (نام کاربری)</th>
                                    <td>
                                        <input <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)) {echo 'disabled';}?> value="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)) {echo $_POST['dabirostancode'];}?>" autofocus id="username" class="inputratermanager" type="text" name="<?php if (!isset($_POST['subsearchostaniadmin'])) {echo 'username';}?>">
                                        <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)): ?>
                                        <input  value="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)) {echo $_POST['dabirostancode'];}?>" type="hidden" name="username">
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php if (!isset($_POST['subsearchostaniadmin'])): ?>
                                <tr>
                                    <th>رمز عبور</th>
                                    <td><input value="123456" id="password" class="inputratermanager" type="text" name="password"></td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>نام</th>
                                    <td><input id="name" class="inputratermanager" type="text" name="name" value="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)) {echo $ostaniadmin['name'];}?>"></td>
                                </tr>
                                <tr>
                                    <th>نام خانوادگی</th>
                                    <td><input id="family" class="inputratermanager" type="text" name="family" value="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)) {echo $ostaniadmin['family'];}?>"></td>
                                </tr>
                                <tr>
                                    <th>جنسیت</th>
                                    <td>
                                        <select name="gender">
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and $ostaniadmin['gender']=='مرد') {echo 'selected';}?>>مرد</option>
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and $ostaniadmin['gender']=='زن') {echo 'selected';}?>>زن</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>تلفن</th>
                                    <td><input  class="inputratermanager" type="text" name="phone" value="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)) {echo $ostaniadmin['phone'];}?>"></td>
                                </tr>
                                <tr>
                                    <th>استان</th>
                                    <td>
                                        <select name="state_custom">
                                            <?php
                                            $query=mysqli_query($connection,"select * from state order by name asc");
                                            foreach ($query as $item):
                                                ?>
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and $ostaniadmin['city_name']==$item['name']) {echo 'selected';}?>><?php echo $item['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </td>
                                </tr>
                                <?php if (!isset($_POST['subsearchostaniadmin'])):?>
                                <tr>
                                    <th>نوع کاربری</th>
                                    <td>
                                        <select name="subject">
                                            <option>دبیر جشنواره استان</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <tr>
                                    <th>تغییر وضعیت کاربری</th>
                                    <td>
                                        <select onchange="alert('با تغییر این گزینه، کاربر از وضعیت دبیر استانی خارج شده و از لیست حذف می گردد.')" name="user_status" id="user_status">
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and @$ostaniadmin['type']==0){echo 'selected';}?> value="0">ارزیاب جشنواره</option>
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and @$ostaniadmin['type']==2){echo 'selected';}?> value="2">دبیر جشنواره استان</option>
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and @$ostaniadmin['type']==3){echo 'selected';}?> value="3">دبیر مدرسه ای جشنواره</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th>فعال/غیر فعال</th>
                                    <td>
                                        <select name="activation_status">
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and $ostaniadmin['approved']==1) {echo 'selected';}?> value="1"> فعال</option>
                                            <option <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin) and $ostaniadmin['approved']==0) {echo 'selected';}?> value="0">غیر فعال</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                            <br/>
                            <input type="hidden" name="namefamily" value="<?php echo $_SESSION['namefamily'] ?>">
                            <input name="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)){echo 'editadminostani';}else{echo 'setadminostani';} ?>" style="padding: 8px" type="submit" value="<?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)){echo 'ویرایش ادمین';}else{echo 'اضافه کردن ادمین';} ?>" onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات ادمین، بر روی گزینه OK کلیک کنید')">
                            <?php if (isset($_POST['subsearchostaniadmin']) and !empty($ostaniadmin)):?>
                            <input name="makenewpage" style="padding: 8px" type="submit" value="اضافه کردن ادمین استانی جدید" onclick="return confirm('اگر اطلاعاتی وارد شده باشد از بین خواهد رفت، آیا ادامه می دهید؟')">
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
                        لیست ادمین های استانی
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
                                    استان
                                </th>
                                <th>
                                    شهرستان
                                </th>
                                <th>
                                    عملیات
                                </th>
                            </tr>

                            <?php
                            $a=1;
                            $resultraters=mysqli_query($connection,"select * from rater_list where `type`=2 order by `city_name` asc");
                            foreach ($resultraters as $raters): ?>
                                <tr>
                                    <td>
                                        <?php echo $a;$a++; ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['username'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['password'] ?>
                                    </td>
                                    <td>
                                        <?php echo $raters['name']." ".$raters['family'] ?>
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
                                        <span>
                                           <form method="post" action="build/php/inc.php">
                                            <input type="hidden" value="<?php echo $user ?>" name="codeeditor">
                                            <input type="hidden" value="<?php echo $raters['code'] ?>" name="disablecode">
                                            <input type="submit" style="padding: 7px" value="<?php if ($raters['type']==2 and $raters['approved']==1){echo 'غیرفعالسازی';}elseif ($raters['type']==2 and $raters['approved']==0){echo 'فعالسازی';} ?>" name="<?php if ($raters['type']==2 and $raters['approved']==1){echo 'disableadminostani';}elseif ($raters['type']==2 and $raters['approved']==0){echo 'enableadminostani';} ?>">
                                            <input type="submit" style="padding: 7px;color: red" value="حذف دائمی کاربر" name="removeostaniadmin" onclick="return confirm('آیا مطمئن هستید؟ این عملیات قابل بازگشت نیست')">
                                        </form>
                                        </span>
                                        
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

                if (username == ""){
                    document.forms["myform"]["username"].style.backgroundColor="yellow";
                    alert("نام کاربری وارد نشده است");
                    return false;
                }
                else if (password == "") {
                    document.forms["myform"]["password"].style.backgroundColor="yellow";
                    alert("رمز عبور وارد نشده است");
                    return false;
                }else if (codeadmin == "") {
                    document.forms["myform"]["codeadmin"].style.backgroundColor="yellow";
                    alert("کد ادمین وارد نشده است");
                    return false;
                }
                else if (name == "") {
                    document.forms["myform"]["name"].style.backgroundColor="yellow";
                    alert("نام ادمین وارد نشده است");
                    return false;
                }
                else if (family == "") {
                    document.forms["myform"]["family"].style.backgroundColor="yellow";
                    alert("نام خانوادگی ادمین وارد نشده است");
                    return false;
                }

                else{
                    return true;
                }
            }
            function admincodecheck(){
                var dabirostancode=document.getElementById("dabirostancode").value;
                if (dabirostancode==''){
                    alert("کد ادمین وارد نشده است");
                    return false;
                }else{
                    return true;
                }
            }

        </script>
