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

    <!-- Content Wrapper. Contains page content -->
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        تنظیمات استان / شهرستان / مدارس وارد شده برای انتخاب کاربران در سامانه ثبت نام
                    </h3>
                </div>
                <div class="box-body d-inner-block">
                    <p class="d-inner-block">
                        استان
                    </p>

                    <select class="form-control d-inner-block"
                            title="مدرک مدیر اجرایی را انتخاب کنید"
                            id="administration_manager_degree"
                            name="administration_manager_degree">
                        <option selected disabled>انتخاب کنید</option>
                    </select>
                </div>
            </div>
        </section>
    </div>
<script src="/build/js/provinces_manager.js"></script>
    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>
