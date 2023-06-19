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
            <div class="box box-solid box-primary">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        تنظیمات مراکز تخصصی برای انتخاب کاربران در سامانه ثبت نام
                    </h3>
                </div>
                <div class="box-body">
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                اضافه کردن مرکز
                            </h3>
                        </div>
                    </div>
                    <div class="box-body" id="inbox">
                        <div style="display: flex;">
                            <label style="margin: 5px" for="states">استان</label>
                            <select class="form-control"
                                    title="استان را انتخاب کنید"
                                    id="states">
                                <option value="" selected disabled>انتخاب کنید</option>
                                <?php
                                $query=mysqli_query($signup_connection,"Select distinct ostan from provinces order by ostan");
                                foreach ($query as $centers):
                                ?>
                                <option value="<?php echo $centers['ostan']; ?>"><?php echo $centers['ostan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label style="margin: 5px" for="cities">شهرستان</label>
                            <select class="form-control"
                                    title="شهرستان را انتخاب کنید"
                                    id="cities">
                                <option value="" selected disabled>انتخاب کنید</option>
                            </select>
                            <label style="margin: 5px" for="center">مرکز</label>
                            <input type="text" class="form-control"
                                   placeholder="نام مرکز تخصصی را وارد کنید"
                                   id="center">
                            <button id="addCenter" style="margin-right: 5px" type="button" class="btn btn-success"
                                    data-dismiss="modal">ذخیره
                            </button>
                        </div>
                    </div>
                    <div style="margin-top: 3%">
                        <div class="box box-solid box-warning">
                            <div class="box-header">
                                <i class="fa fa-info-circle"></i>
                                <h3 class="box-title">
                                    مدیریت مدارس وارد شده
                                </h3>
                            </div>
                        </div>
                        <div class="box-body">
                            <div style="display: flex;">
                                <button id="search" style="margin-right: 5px" type="button" class="btn btn-success"
                                        data-dismiss="modal">دریافت اطلاعات آخرین مراکز وارد شده در سامانه
                                </button>
                            </div>
                            <div id="result" style="margin-top: 3%">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="./build/js/Specialized_Centers_Manager.js"></script>
    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>

