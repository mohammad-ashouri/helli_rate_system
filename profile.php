<?php
include_once __DIR__ . '/header.php';
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
                <?php if (isset($_GET['wrongpass'])): ?>
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>

                            <h3 class="box-title">

                                رمز عبور فعلی شما نادرست است!
                            </h3>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($_GET['passwordset'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>

                            <h3 class="box-title">
                                رمز عبور حساب کاربری شما با موفقیت ویرایش شد!
                                <br/><br/>
                                لطفا از حساب کاربری خود خارج شده و مجددا وارد شوید
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
                        تغییر رمز عبور
                    </h3>
                </div>
                <div class="box-body">
                    <center>
                        <form onsubmit="return validateForm()" action="/build/php/inc.php" method="post" id="myform">
                                <span>
                                    رمز عبور فعلی را وارد کنید:
                                    <input style="padding: 7px;border-radius: 8px" value="" type="text" id="oldpass"
                                           name="oldpass" placeholder="رمز عبور فعلی">
                                </span>
                            <br/><br/>
                            <span>
                                    رمز عبور جدید را وارد کنید:
                                    <input style="padding: 7px;border-radius: 8px" value="" type="password" id="newpass"
                                           name="newpass" placeholder="رمز عبور جدید">
                                </span>
                            <br/><br/>
                            <span>
                                    تکرار رمز عبور جدید را وارد کنید:
                                    <input style="padding: 7px;border-radius: 8px" value="" type="password"
                                           id="repnewpass" name="repnewpass" placeholder="تکرار رمز عبور جدید">
                                </span>
                            <br/><br/>
                            <input type="hidden" value="<?php echo $_SESSION['coderater'] ?>" name="usercode">
                            <input name="changepass" type="submit" value="تغییر رمز عبور" style="padding: 7px">
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
        include_once __DIR__ . '/footer.php';
        ?>
        <script>
            function validateForm() {
                var oldpass = document.forms["myform"]["oldpass"].value;
                var newpass = document.forms["myform"]["newpass"].value;
                var repnewpass = document.forms["myform"]["repnewpass"].value;

                if (oldpass == "") {
                    document.forms["myform"]["oldpass"].style.backgroundColor = "yellow";
                    alert("رمز عبور فعلی وارد نشده است");
                    return false;
                } else if (newpass == "") {
                    document.forms["myform"]["newpass"].style.backgroundColor = "yellow";
                    alert("رمز عبور جدید وارد نشده است");
                    return false;
                } else if (repnewpass == "") {
                    document.forms["myform"]["repnewpass"].style.backgroundColor = "yellow";
                    alert("تکرار رمز عبور جدید وارد نشده است");
                    return false;
                } else if (newpass != repnewpass) {
                    alert("رمز عبور جدید با تکرار آن برابر نیست");
                    return false;
                } else {
                    return true;
                }
            }

        </script>
