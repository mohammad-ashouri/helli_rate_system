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
                        تنظیمات کاربر ثبت نامی در سامانه ثبت نام
                    </h3>
                </div>
                <div class="box-body">
                    <form method="get" id="checkShow">
                        <input required type="text" name="national_code" class="form-control col-md-3"
                               id="national_code"
                               value="<?php if (isset($_GET['national_code'])) {
                                   echo $_GET['national_code'];
                               } ?>"
                               placeholder="لطفا کد ملی را وارد نمایید"/>
                        <button name="search_posts" type="submit" class="btn btn-primary" style="margin-right:10px">
                            جستجو
                        </button>
                    </form>
                </div>
                <?php
                if (isset($_GET['search_posts']) and !empty($_GET['national_code'])):
                $national_code = $_GET['national_code'];
                $query = mysqli_query($signup_connection, "select * from users WHERE national_code='$national_code' order by id desc");
                foreach ($query as $userInfo) {
                }
                if (!@$userInfo) {
                    ?>
                    <div class="callout callout-warning">
                        اثری با کد ملی وارد شده، در جشنواره جاری یافت نشد.
                    </div>
                    <?php
                } else {
                $query = mysqli_query($signup_connection, "select * from contacts WHERE national_code='$national_code' order by id desc");
                foreach ($query as $contactInfo) {
                }
                $query = mysqli_query($signup_connection, "select * from educational_infos WHERE national_code='$national_code' order by id desc");
                foreach ($query as $educationalInfo) {
                }
                $query = mysqli_query($signup_connection, "select * from teaching_infos WHERE national_code='$national_code' order by id desc");
                foreach ($query as $teachingInfo) {
                }
                ?>
                <input type="hidden" value="<?php echo $national_code; ?>" id="nationalcodeForInc">
            </div>

            <div class="box box-warning">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        اطلاعات شخصی
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped text-center">
                        <tr>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>نام پدر</th>
                            <th>کد ملی</th>
                            <th>شماره شناسنامه</th>
                            <th>تاریخ تولد</th>
                            <th>جنسیت</th>
                            <th>تاریخ اولین ورود</th>
                        </tr>
                        <tr>
                            <td><?php echo $userInfo['name']; ?></td>
                            <td><?php echo $userInfo['family']; ?></td>
                            <td><?php echo $userInfo['father_name']; ?></td>
                            <td><?php echo $userInfo['national_code']; ?></td>
                            <td><?php
                                if ($userInfo['shenasname'] == 0) {
                                    echo $userInfo['national_code'];
                                } else {
                                    echo $userInfo['shenasname'];
                                }
                                ?></td>
                            <td><?php echo $userInfo['birthdate']; ?></td>
                            <td><?php echo $userInfo['gender']; ?></td>
                            <td>
                                <?php
                                $sent_date = substr($userInfo['created_at'], 0, 10);
                                $dateParts = explode("-", $sent_date);
                                $year = $dateParts[0];
                                $month = $dateParts[1];
                                $day = $dateParts[2];
                                print_r(gregorian_to_jalali($year, $month, $day, '/'));
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        اطلاعات تماس
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped text-center">
                        <tr>
                            <th>تلفن ثابت (به همراه کد شهر)</th>
                            <th>تلفن همراه</th>
                            <th>کدپستی (بدون خط فاصله)</th>
                            <th>تاریخ ورود اطلاعات</th>
                            <th>وضعیت</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control text-left"
                                       id="phone"
                                       value="<?php if (isset($contactInfo['phone'])) {
                                           echo $contactInfo['phone'];
                                       } ?>"
                                       placeholder="شماره ثابت را وارد کنید"/>
                            </td>
                            <td>
                                <input type="text" name="mobile" class="form-control text-left"
                                       id="mobile"
                                       value="<?php if (isset($contactInfo['mobile'])) {
                                           echo $contactInfo['mobile'];
                                       } ?>"
                                       placeholder="شماره همراه را وارد کنید"/>
                            </td>
                            <td>
                                <input type="text" name="postal_code" class="form-control text-left"
                                       id="postal_code"
                                       value="<?php if (isset($contactInfo['postal_code'])) {
                                           echo $contactInfo['postal_code'];
                                       } ?>"
                                       placeholder="کدپستی را وارد کنید"/>
                            </td>
                            <td>
                                <?php
                                if ($contactInfo['updated_at'] != $contactInfo['created_at']) {
                                    $sent_date = substr($userInfo['updated_at'], 0, 10);
                                    $dateParts = explode("-", $sent_date);
                                    $year = $dateParts[0];
                                    $month = $dateParts[1];
                                    $day = $dateParts[2];
                                    print_r(gregorian_to_jalali($year, $month, $day, '/'));
                                } else {
                                    echo '';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($contactInfo['approved'] == 0) {
                                    ?>
                                    <button class="btn btn-danger" id="contactSaveTo1">ذخیره نشده</button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-success" id="contactSaveTo0">ذخیره شده</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>آدرس</th>
                            <td colspan="3">
                                <textarea class="form-control" rows="3" placeholder="آدرس را وارد کنید"
                                          id="address"><?php echo $contactInfo['address']; ?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        اطلاعات تحصیلی
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped text-center">
                        <tr>
                            <th>نام مرکز حوزوی</th>
                            <th>استان محل تحصیل</th>
                            <th>شهر محل تحصیل</th>
                            <th>مدرسه</th>
                            <th>نوع تحصیل حوزوی</th>
                            <th>تاریخ ثبت اطلاعات</th>
                            <th>وضعیت</th>
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="نام مرکز حوزوی را انتخاب کنید"
                                        style="text-align: right"
                                        id="namemarkaztahsili">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    $query = mysqli_query($signup_connection, "select distinct markaz from provinces order by markaz");
                                    foreach ($query as $markaz):
                                        ?>
                                        <option <?php if ($markaz['markaz'] == $educationalInfo['namemarkaztahsili']) echo 'selected'; ?>
                                                value="<?php echo $markaz['markaz']; ?>"> <?php echo $markaz['markaz']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="استان محل تحصیل را انتخاب کنید"
                                        style="text-align: right"
                                        id="ostantahsili">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    if ($educationalInfo['namemarkaztahsili']) {
                                        $namemarkaztahsili = $educationalInfo['namemarkaztahsili'];
                                        $query = mysqli_query($signup_connection, "select distinct ostan from provinces where markaz='$namemarkaztahsili' order by ostan");
                                    } else {
                                        $query = mysqli_query($signup_connection, "select distinct ostan from provinces order by ostan");
                                    }
                                    foreach ($query as $ostantahsili):
                                        ?>
                                        <option <?php if ($ostantahsili['ostan'] == $educationalInfo['ostantahsili']) echo 'selected'; ?>
                                                value="<?php echo $ostantahsili['ostan']; ?>"> <?php echo $ostantahsili['ostan']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="شهر محل تحصیل را انتخاب کنید"
                                        style="text-align: right"
                                        id="shahrtahsili">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    if ($educationalInfo['ostantahsili']) {
                                        $ostantahsili = $educationalInfo['ostantahsili'];
                                        $query = mysqli_query($signup_connection, "select distinct shahr from provinces where ostan='$ostantahsili' order by ostan");
                                    } else {
                                        $query = mysqli_query($signup_connection, "select distinct shahr from provinces order by shahr");
                                    }
                                    foreach ($query as $shahrtahsili):
                                        ?>
                                        <option <?php if ($shahrtahsili['shahr'] == $educationalInfo['shahrtahsili']) echo 'selected'; ?>
                                                value="<?php echo $shahrtahsili['shahr']; ?>"> <?php echo $shahrtahsili['shahr']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="مدرسه محل تحصیل را انتخاب کنید"
                                        style="text-align: right"
                                        id="madresetahsili">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    if ($educationalInfo['madresetahsili']) {
                                        $ostantahsili = $educationalInfo['ostantahsili'];
                                        $shahrtahsili = $educationalInfo['shahrtahsili'];
                                        $query = mysqli_query($signup_connection, "select distinct madrese from provinces where ostan='$ostantahsili' and shahr='$shahrtahsili' order by ostan");
                                    } else {
                                        $query = mysqli_query($signup_connection, "select distinct madrese from provinces order by shahr");
                                    }
                                    foreach ($query as $madresetahsili):
                                        ?>
                                        <option <?php if ($madresetahsili['madrese'] == $educationalInfo['madresetahsili']) echo 'selected'; ?>
                                                value="<?php echo $madresetahsili['madrese']; ?>"> <?php echo $madresetahsili['madrese']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="مدرسه محل تحصیل را انتخاب کنید"
                                        style="text-align: right"
                                        id="noetahsilhozavi">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <option <?php if ($educationalInfo['noetahsilhozavi'] == 'آزاد') echo 'selected'; ?>
                                            value="آزاد">آزاد
                                    </option>
                                    <option <?php if ($educationalInfo['noetahsilhozavi'] == 'تحت برنامه') echo 'selected'; ?>
                                            value="تحت برنامه">تحت برنامه
                                    </option>
                                </select>
                            </td>
                            <td>
                                <?php
                                if ($educationalInfo['updated_at'] != $educationalInfo['created_at']) {
                                    $sent_date = substr($educationalInfo['updated_at'], 0, 10);
                                    $dateParts = explode("-", $sent_date);
                                    $year = $dateParts[0];
                                    $month = $dateParts[1];
                                    $day = $dateParts[2];
                                    print_r(gregorian_to_jalali($year, $month, $day, '/'));
                                } else {
                                    echo '';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($educationalInfo['approved'] == 0) {
                                    ?>
                                    <button class="btn btn-danger" id="educationalSaveTo1">ذخیره نشده</button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-success" id="educationalSaveTo0">ذخیره شده</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <?php
                            if ($userInfo['gender'] == 'مرد') {
                                echo '<th>پایه</th>';
                            } elseif ($userInfo['gender'] == 'زن') {
                                echo '<th>سطح/ترم</th>';
                            }
                            ?>
                            <th>شماره پرونده حوزوی</th>
                            <th>مدرک تحصیلی دانشگاهی</th>
                            <th>رشته تحصیلی دانشگاهی</th>
                            <th colspan="2">مرکز تخصصی حوزوی (در صورت تحصیل)</th>
                            <th>رشته تخصصی حوزوی</th>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if ($userInfo['gender'] == 'مرد'):
                                    ?>
                                    <select class="form-control select2"
                                            data-placeholder="پایه را انتخاب کنید"
                                            style="text-align: right"
                                            id="paye">
                                        <option value="" disabled selected>انتخاب نشده</option>
                                        <?php
                                        $options = array(
                                            1 => '1',
                                            2 => '2',
                                            3 => '3',
                                            4 => '4',
                                            5 => '5',
                                            6 => '6',
                                            7 => '7',
                                            8 => '8',
                                            9 => '9',
                                            10 => '10',
                                            'خارج' => 'خارج'
                                        );

                                        foreach ($options as $value => $label) {
                                            $selected = ($educationalInfo['paye'] == $value) ? 'selected' : '';
                                            echo "<option value=\"$value\" $selected>$label</option>";
                                        }
                                        ?>
                                    </select>

                                <?php
                                elseif ($userInfo['gender'] == 'زن'):
                                    ?>
                                    <div style="display: flex; gap: 20px; align-items: center">
                                        <select class="form-control select2" data-placeholder="سطح را انتخاب کنید"
                                                style="text-align: right" id="sath">
                                            <option value="" disabled selected>انتخاب نشده</option>
                                            <option <?php if ($educationalInfo['sath'] == 2) echo 'selected'; ?>
                                                    value="2">2
                                            </option>
                                            <option <?php if ($educationalInfo['sath'] == 3) echo 'selected'; ?>
                                                    value="3">3
                                            </option>
                                            <option <?php if ($educationalInfo['sath'] == 4) echo 'selected'; ?>
                                                    value="4">4
                                            </option>
                                        </select>

                                        <select class="form-control select2" data-placeholder="ترم را انتخاب کنید"
                                                style="text-align: right" id="term">
                                            <option value="" disabled selected>انتخاب نشده</option>
                                            <?php
                                            if ($educationalInfo['sath'] == 2):
                                                ?>
                                                <option <?php if ($educationalInfo['term'] == 1) echo 'selected'; ?>
                                                        value="1">1
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 2) echo 'selected'; ?>
                                                        value="2">2
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 3) echo 'selected'; ?>
                                                        value="3">3
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 4) echo 'selected'; ?>
                                                        value="4">4
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 5) echo 'selected'; ?>
                                                        value="5">5
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 6) echo 'selected'; ?>
                                                        value="6">6
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 7) echo 'selected'; ?>
                                                        value="7">7
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 8) echo 'selected'; ?>
                                                        value="8">8
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 9) echo 'selected'; ?>
                                                        value="9">9
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 10) echo 'selected'; ?>
                                                        value="10">10
                                                </option>
                                            <?php
                                            elseif ($educationalInfo['sath'] == 3 or $educationalInfo['sath'] == 4):
                                                ?>
                                                <option <?php if ($educationalInfo['term'] == 1) echo 'selected'; ?>
                                                        value="1">1
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 2) echo 'selected'; ?>
                                                        value="2">2
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 3) echo 'selected'; ?>
                                                        value="3">3
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 4) echo 'selected'; ?>
                                                        value="4">4
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 5) echo 'selected'; ?>
                                                        value="5">5
                                                </option>
                                                <option <?php if ($educationalInfo['term'] == 6) echo 'selected'; ?>
                                                        value="6">6
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <input type="text" name="shparvandetahsili" class="form-control text-left"
                                       id="shparvandetahsili"
                                       value="<?php if (isset($educationalInfo['shparvandetahsili'])) {
                                           echo $educationalInfo['shparvandetahsili'];
                                       } ?>"
                                       placeholder="شماره پرونده حوزوی را وارد کنید"/>
                            </td>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="مدرک تحصیلی دانشگاهی را انتخاب کنید" style="text-align: right"
                                        id="tahsilatghhozavi">
                                    <option value="" disabled selected>انتخاب نشده</option>
                                    <option <?php if ($educationalInfo['tahsilatghhozavi'] == 'زیر دیپلم') echo 'selected'; ?>
                                            value="زیر دیپلم">زیر دیپلم
                                    </option>
                                    <option <?php if ($educationalInfo['tahsilatghhozavi'] == 'دیپلم') echo 'selected'; ?>
                                            value="دیپلم">دیپلم
                                    </option>
                                    <option <?php if ($educationalInfo['tahsilatghhozavi'] == 'فوق دیپلم') echo 'selected'; ?>
                                            value="فوق دیپلم">فوق دیپلم
                                    </option>
                                    <option <?php if ($educationalInfo['tahsilatghhozavi'] == 'لیسانس') echo 'selected'; ?>
                                            value="لیسانس">لیسانس
                                    </option>
                                    <option <?php if ($educationalInfo['tahsilatghhozavi'] == 'فوق لیسانس') echo 'selected'; ?>
                                            value="فوق لیسانس">فوق لیسانس
                                    </option>
                                    <option <?php if ($educationalInfo['tahsilatghhozavi'] == 'دکتری') echo 'selected'; ?>
                                            value="دکتری">دکتری
                                    </option>
                                </select>
                            </td>
                            <td>
                                <input style="display: <?php if ($educationalInfo['tahsilatghhozavi'] == 'زیر دیپلم' or $educationalInfo['tahsilatghhozavi'] == 'دیپلم' or !$educationalInfo['tahsilatghhozavi']) {
                                    echo 'none';
                                } else {
                                    echo '';
                                }
                                ?>" type="text" name="reshtedaneshgahi" class="form-control text-left"
                                       id="reshtedaneshgahi"
                                       value="<?php if (isset($educationalInfo['reshtedaneshgahi'])) {
                                           echo $educationalInfo['reshtedaneshgahi'];
                                       } ?>"
                                       placeholder="رشته تحصیلی دانشگاهی را وارد کنید"/>
                            </td>
                            <td colspan="2">
                                <select class="form-control select2"
                                        data-placeholder="مرکز تخصصی حوزوی را انتخاب کنید" style="text-align: right"
                                        id="markaztakhasosihozavi">
                                    <option value="" <?php if ('' == $educationalInfo['markaztakhasosihozavi']) echo 'selected'; ?>>اشتغال ندارم</option>
                                    <?php
                                    $query = mysqli_query($signup_connection, "select * from specialized_centers where active=1 order by title");
                                    foreach ($query as $specialized_centers):
                                        ?>
                                        <option value="<?php echo $specialized_centers['title']; ?>" <?php if ($specialized_centers['title'] == $educationalInfo['markaztakhasosihozavi']) echo 'selected'; ?>><?php echo $specialized_centers['title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input style="display: <?php if ($educationalInfo['reshtetakhasosihozavi'] == 'اشتغال ندارم' or !$educationalInfo['reshtetakhasosihozavi']) {
                                    echo 'none';
                                } else {
                                    echo '';
                                }
                                ?>" type="text" name="reshtetakhasosihozavi" class="form-control text-left"
                                       id="reshtetakhasosihozavi"
                                       value="<?php if (isset($educationalInfo['reshtetakhasosihozavi'])) {
                                           echo $educationalInfo['reshtetakhasosihozavi'];
                                       } ?>"
                                       placeholder="رشته تخصصی حوزوی را وارد کنید"/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="box box-comment">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        اطلاعات تدریس
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped text-center">
                        <tr>
                            <th>کاربر استاد</th>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="نام مرکز حوزوی را انتخاب کنید"
                                        style="text-align: right"
                                        id="isMaster">
                                    <option <?php if ($teachingInfo['isMaster'] == 'خیر') echo 'selected'; ?>
                                            value="خیر">خیر
                                    </option>
                                    <option <?php if ($teachingInfo['isMaster'] == 'بله') echo 'selected'; ?>
                                            value="بله">بله
                                    </option>
                                </select>
                            </td>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr id="isMasterTR1" style="<?php if ($teachingInfo['isMaster']=='خیر') echo 'display: none' ?>">
                            <th>کد استادی</th>
                            <th>استان محل تدریس</th>
                            <th>شهر محل تدریس</th>
                            <th>نام محل تدریس</th>
                            <th>تاریخ ثبت اطلاعات</th>
                            <th>وضعیت</th>
                        </tr>
                        <tr id="isMasterTR2" style="<?php if ($teachingInfo['isMaster']=='خیر') echo 'display: none' ?>">
                            <td>
                                <input type="text" class="form-control text-left"
                                       id="masterCode"
                                       value="<?php if (isset($teachingInfo['masterCode'])) {
                                           echo $teachingInfo['masterCode'];
                                       } ?>"
                                       placeholder="کد استادی را وارد کنید"/>
                            </td>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="استان محل تدریس را انتخاب کنید"
                                        style="text-align: right"
                                        id="teachingProvince">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    $query = mysqli_query($signup_connection, "select distinct ostan from provinces order by ostan");
                                    foreach ($query as $ostanTadris):
                                        ?>
                                        <option <?php if ($ostanTadris['ostan'] == $teachingInfo['teachingProvince']) echo 'selected'; ?>
                                                value="<?php echo $ostanTadris['ostan']; ?>"> <?php echo $ostanTadris['ostan']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="شهر محل تدریس را انتخاب کنید"
                                        style="text-align: right"
                                        id="teachingCity">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    $teachingProvince = $teachingInfo['teachingProvince'];
                                    $query = mysqli_query($signup_connection, "select distinct shahr from provinces where ostan='$teachingProvince' order by shahr");
                                    foreach ($query as $shahrTadris):
                                        ?>
                                        <option <?php if ($shahrTadris['shahr'] == $teachingInfo['teachingCity']) echo 'selected'; ?>
                                                value="<?php echo $shahrTadris['shahr']; ?>"> <?php echo $shahrTadris['shahr']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-control select2"
                                        data-placeholder="مدرسه محل تدریس را انتخاب کنید"
                                        style="text-align: right"
                                        id="teachingPlaceName">
                                    <option value="" selected disabled>انتخاب نشده</option>
                                    <?php
                                    if ($teachingInfo['teachingPlaceName']) {
                                        $teachingProvince = $teachingInfo['teachingProvince'];
                                        $teachingCity = $teachingInfo['teachingCity'];
                                        $query = mysqli_query($signup_connection, "select distinct madrese from provinces where ostan='$teachingProvince' and shahr='$teachingCity' order by ostan");
                                    } else {
                                        $query = mysqli_query($signup_connection, "select distinct madrese from provinces order by shahr");
                                    }
                                    foreach ($query as $teachingSchool):
                                        ?>
                                        <option <?php if ($teachingSchool['madrese'] == $teachingInfo['teachingPlaceName']) echo 'selected'; ?>
                                                value="<?php echo $teachingSchool['madrese']; ?>"> <?php echo $teachingSchool['madrese']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </td>
                            <td>
                                <?php
                                if ($teachingInfo['updated_at'] != $teachingInfo['created_at']) {
                                    $sent_date = substr($userInfo['updated_at'], 0, 10);
                                    $dateParts = explode("-", $sent_date);
                                    $year = $dateParts[0];
                                    $month = $dateParts[1];
                                    $day = $dateParts[2];
                                    print_r(gregorian_to_jalali($year, $month, $day, '/'));
                                } else {
                                    echo '';
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($teachingInfo['approved'] == 0) {
                                    ?>
                                    <button class="btn btn-danger" id="teachingSaveTo1">ذخیره نشده</button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-success" id="teachingSaveTo0">ذخیره شده</button>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php } endif;
            ?>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <script src="./build/js/SignupUsers.js"></script>
<?php
endif;
include_once __DIR__ . '/footer.php';
?>