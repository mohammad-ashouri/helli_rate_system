<?php
include_once 'header.php';
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
<?php
if (!empty($_GET)):
    ?>
    <?php
    if (isset($_GET['wrongfield']) or isset($_GET['ejmaliregistrated'])):
    ?>
    <section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <?php if (isset($_GET['wrongfield'])): ?>
            <div class="box box-solid box-danger">
                <?php elseif (isset($_GET['ejmaliregistrated'])): ?>
                <div class="box box-solid box-success">
                    <?php endif; ?>

                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <center>
                            <?php if (isset($_GET['wrongfield'])): ?>
                                <h3 class='box-title'>یک فیلد اشتباه وارد شده است. لطفا دوباره بر روی کد اثر خود
                                    کلیک کرده و ثبت ارزیابی اجمالی انجام دهید</h3>
                            <?php elseif (isset($_GET['ejmaliregistrated'])): ?>
                                <h3 class='box-title'>ارزیابی اجمالی شما با موفقیت ثبت شد</h3>
                            <?php endif; ?>
                        </center>
                    </div>
                </div>

        </section>
    </div>

    <?php
    elseif (isset($_GET['wrongcvsize']) or isset($_GET['cvset']) or isset($_GET['wrongcvset']) or isset($_GET['incompatibilitynames']) or isset($_GET['incompatibilityext'])):
    ?>
    <section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <?php if (isset($_GET['wrongcvsize'])): ?>
            <div class="box box-solid box-danger">
                <?php elseif (isset($_GET['cvset'])): ?>
                <div class="box box-solid box-success">
                    <?php elseif (isset($_GET['wrongcvset'])): ?>
                    <div class="box box-solid box-danger">
                        <?php elseif (isset($_GET['incompatibilitynames'])): ?>
                        <div class="box box-solid box-danger">
                            <?php elseif (isset($_GET['incompatibilityext'])): ?>
                            <div class="box box-solid box-danger">
                                <?php endif; ?>
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>
                                    <center>
                                        <?php if (isset($_GET['incompatibilitynames'])): ?>
                                            <h3 class='box-title'>نام فایل ارسالی با کد ملی شما متفاوت است. لطفا
                                                پس از اصلاح، دوباره فایل خود را آپلود نمایید.</h3>
                                        <?php elseif (isset($_GET['incompatibilityext'])): ?>
                                            <h3 class='box-title'>پسوند فایل ارسالی باید doc یا docx باشد.</h3>
                                        <?php elseif (isset($_GET['wrongcvsize'])): ?>
                                            <h3 class='box-title'>سایز فایل رزومه ی شما بالاتر از 5 مگابایت
                                                است!</h3>
                                        <?php elseif (isset($_GET['cvset'])): ?>
                                            <h3 class='box-title'>فایل رزومه ی شما در سیستم جشنواره علامه حلی
                                                (ره) ثبت شد. پس از تایید توسط مدیر سایت، حساب کاربری شما فعال
                                                خواهد شد. با تشکر</h3>
                                        <?php elseif (isset($_GET['wrongcvset'])): ?>
                                            <h3 class='box-title'>مشکل در ثبت فایل رزومه! لطفا با مدیر خود تماس
                                                گرفته و اطلاع رسانی کنید.</h3>
                                        <?php endif; ?>
                                    </center>
                                </div>
                            </div>
        </section>
    </div>
    <?php
    elseif (isset($_GET['wrong']) or isset($_GET['tafsili1registrated'])):
    ?>
    <section class="content">
    <div class="row">
    <section class="col-lg-12 col-md-12">
    <?php if (isset($_GET['wrong'])): ?>
    <div class="box box-solid box-danger">
        <?php elseif (isset($_GET['tafsili1registrated'])): ?>
        <div class="box box-solid box-success">
            <?php endif; ?>

            <div class="box-header">
                <i class="fa fa-info-circle"></i>
                <center>
                    <?php if (isset($_GET['wrong'])): ?>
                        <h3 class='box-title'>خطا در ثبت ارزیابی تفصیلی</h3>
                    <?php elseif (isset($_GET['tafsili1registrated'])): ?>
                        <h3 class='box-title'>ارزیابی تفصیلی شما با موفقیت ثبت شد</h3>
                    <?php endif; ?>
                </center>
            </div>
        </div>
    </div>
    <?php
    elseif (isset($_GET['wrong']) or isset($_GET['tafsili3registrated'])):
    ?>
    <section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <?php if (isset($_GET['wrong'])): ?>
            <div class="box box-solid box-danger">
                <?php endif; ?>
                <?php if (isset($_GET['tafsili3registrated'])): ?>
                <div class="box box-solid box-success">
                    <?php endif; ?>

                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <center>
                            <?php if (isset($_GET['wrong'])): ?>
                                <h3 class='box-title'>خطا در ثبت ارزیابی تفصیلی</h3>
                            <?php elseif (isset($_GET['tafsili3registrated'])): ?>
                                <h3 class='box-title'>ارزیابی تفصیلی شما با موفقیت ثبت شد</h3>
                            <?php endif; ?>
                        </center>
                    </div>
                </div>

        </section>
    </div>
    <?php
    elseif (isset($_GET['wrong']) or isset($_GET['tafsili2registrated'])):
    ?>
    <section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <?php if (isset($_GET['wrong'])): ?>
            <div class="box box-solid box-danger">
                <?php endif; ?>
                <?php if (isset($_GET['tafsili2registrated'])): ?>
                <div class="box box-solid box-success">
                    <?php endif; ?>

                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <center>
                            <?php if (isset($_GET['wrong'])): ?>
                                <h3 class='box-title'>خطا در ثبت ارزیابی تفصیلی</h3>
                            <?php elseif (isset($_GET['tafsili2registrated'])): ?>
                                <h3 class='box-title'>ارزیابی تفصیلی شما با موفقیت ثبت
                                    شد</h3>
                            <?php endif; ?>
                        </center>
                    </div>
                </div>

        </section>
    </div>
    <?php
    elseif (isset($_GET['successapproved'])):
    ?>
    <section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-success">
                <div class="box-header">
                    <center>
                        <h3 class='box-title'>
                            تایید ارزیابان استان
                            <?php echo $_GET['city'] ?>
                            با موفقیت انجام شد.
                        </h3>
                    </center>
                </div>
            </div>

        </section>
    </div>
<?php
endif;
endif; ?>
<?php
$coderater = $_SESSION['coderater'];
$approved = mysqli_query($connection, "select * from rater_list where code='$coderater'");
foreach ($approved as $approved1) {
}
if ($approved1['approved'] == 0 and $approved1['type'] == 0):
    ?>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        صفحه کاربری شما تایید نشده است:
                    </h3>
                </div>
                <div class="box-body">
                    <center>
                        <h4 style="background-color: #9affc6; padding: 5px">لطفا در
                            صورت صحت اطلاعات زیر، بر روی گزینه اطلاعات خود را تایید
                            می کنم کلیک کرده و رزومه ی خود را بارگذاری نمایید </h4>
                        <h4 style="background-color: #9affc6;color: red; padding: 5px">
                            اگر اطلاعات نمایش داده شده صحیح نبود، لطفا برای تصحیح
                            اطلاعات از طریق دبیرخانه خود، پیگیری نمایید.
                            <br/><br/>
                            توجه داشته باشید که پس از تایید شما، اطلاعات قابل تغییر
                            نیست.</h4>
                        <p style="font-size: 17px">
                            نام و نام خانوادگی:
                            <?php echo $rows['name'] . ' ' . $rows['family'] ?>
                        </p>
                        <p style="font-size: 17px">
                            جنسیت:
                            <?php echo $rows['gender'] ?>
                        </p>
                        <p style="font-size: 17px">
                            کد ملی:
                            <?php echo $rows['codemelli'] ?>
                        </p>
                        <p style="font-size: 17px">
                            شماره همراه:
                            <?php echo $rows['phone'] ?>
                        </p>
                        <p style="font-size: 17px">
                            استان:
                            <?php echo $rows['city_name'] ?>
                        </p>
                        <?php if ($rows['shahr_name'] != null and $rows['school_name'] != ''): ?>
                            <p style="font-size: 17px">
                                شهر:
                                <?php echo $rows['shahr_name'] ?>
                            </p>
                            <p style="font-size: 17px">
                                مدرسه:
                                <?php echo $rows['school_name'] ?>
                            </p>
                        <?php endif; ?>
                        <label style="border: 3px solid black; padding: 5px">
                            <form action="build/php/rater_cv.php" method="post"
                                  enctype="multipart/form-data" onsubmit="return validatefileisselected()">
                                <input type="checkbox" name="accept_data"
                                       id="accept_data" onchange="checkaccept()">
                                اطلاعات خود را تایید می‌کنم
                        </label>

                    </center>
                </div>

                <div class="box-body" id="resume" style="display: none ">
                    <p>لطفا فایل نمونه رزومه را دانلود کنید و پس از تکمیل و ذخیره
                        کردن آن، در قسمت زیر آپلود نموده و به دبیرخانه خود اطلاع
                        دهید.(حداکثر حجم فایل، 5 مگابایت و فرمت فایل docx)</p>
                    <p>توجه فرمایید که پس از تکمیل اطلاعات خود و ذخیره کردن فایل،
                        حتما نام فایل را نام کاربری(کد ملی خودتان) قرار دهید. </p>
                    <center>
                        <a href="dist/files/example_cv_file/لطفا نام این فایل را کد ملی خودتان قرار دهید.docx">فایل
                            نمونه رزومه</a>
                        <br><br/>
                        <input type="file" accept=".docx,.doc" name="uploadcvfile"
                               id="uploadFile">
                        <br/>
                        <input type="hidden" name="coderater"
                               value="<?php echo $user ?>">
                        <input type="submit" name="uploadcv" value="ارسال رزومه"
                               style="padding: 10px;width: 150px;font-weight: bold" class="btn btn-block btn-success">
                        </form>
                    </center>
                </div>
            </div>
        </section>
    </div>
<?php elseif ($approved1['approved'] == 2): ?>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        وضعیت تایید پنل کاربری شما در حال بررسی است. با تشکر
                    </h3>
                </div>
            </div>
        </section>
    </div>
<?php
elseif (($_SESSION['head'] == 0 and $_SESSION['approved'] == 1) or ($_SESSION['head'] == 0 and $_SESSION['approved'] == 1 and ($_SESSION['city'] == 'قم' or $_SESSION['groupname'] != null))):
    include_once 'main_panels/rater_panel.php';
elseif ($_SESSION['head'] == 1):
    include_once 'main_panels/admin-panel.php';
elseif ($_SESSION['head'] == 2 and $_SESSION['approved'] == 1):
    include_once 'main_panels/dabir_ostan_panel.php';
elseif ($_SESSION['head'] == 3 and $_SESSION['approved'] == 1):
    include_once 'main_panels/dabir_madrese_panel.php';
//                                    elseif ($_SESSION['head'] == 0 and):
//                                        include_once 'main_panels/rater_keshvari_panel.php';
endif;
?>

    <!-- /.content-wrapper -->
<?php
include_once 'footer.php';
?>