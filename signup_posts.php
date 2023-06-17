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
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        تنظیمات تعداد آثار ثبت نامی هر کاربر در سامانه ثبت نام
                    </h3>
                </div>
                <div class="box-body">
                    <form method="post" id="checkShow">
                        <input required type="text" name="national_code" class="form-control col-md-3"
                               id="national_code"
                               value="<?php if (isset($_POST['national_code'])) {
                                   echo $_POST['national_code'];
                               } ?>"
                               placeholder="لطفا کد ملی را وارد نمایید"/>
                        <button name="search_posts" type="submit" class="btn btn-primary" style="margin-right:10px">
                            جستجو
                        </button>
                    </form>
                </div>
                <?php
                if (isset($_POST['search_posts']) and !empty($_POST['national_code'])):
                    $national_code = $_POST['national_code'];
                    $query = mysqli_query($signup_connection, "select * from festivals where active=1");
                    foreach ($query as $festivalInfo) {
                    }
                    $festivalInfo=$festivalInfo['title'];
                    $query = mysqli_query($signup_connection, "select * from users inner join posts on users.id = posts.user_id where users.national_code='$national_code' and posts.festival_title='$festivalInfo' order by posts.id desc");
                    foreach ($query as $check) {
                    }
                    if (!$check) {
                        ?>
                        <div class="callout callout-warning">
                            اثری با کد ملی وارد شده، در جشنواره جاری یافت نشد.
                        </div>
                        <?php
                    } else {
                        ?>
                        <form method="post" action="build/php/SignUpInc/DeleteAllUserPostsForThisFestival.php">
                            <div class="callout callout-success">
                                پاک کردن تمامی آثار ثبت شده این کاربر با کد ملی
                                <?php echo $national_code; ?>
                                و بازگشت به حالت اولیه آثار ثبت شده در دوره جاری:
                                <?php
                                $query = mysqli_query($signup_connection, "select * from festivals where active=1");
                                foreach ($query as $festivalInfo) {
                                }
                                echo $festivalInfo['title'];
                                ?>
                                <input type="hidden" value="<?php echo $national_code ?>" name="nationalCode">
                                <button onclick="return confirm('پس از تایید شما تمامی آثار ارسال شده از جشنواره جاری از پنل کاربر حذف شده و به حالت اولیه برمیگردد.' +
                         'این عملیات به هیچ وجه قابل بازگشت نیست.' +
                         'آیا مطمئن هستید؟')" class="btn btn-danger" style="margin-right: 50px" type="submit"
                                        name="deletePosts">پاک
                                    کردن آثار کاربر و حذف تمامی آثار ارسالی
                                </button>
                            </div>
                        </form>
                        <div class="box-body">
                            <center>
                                <table>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <th style="width: 10px">ردیف</th>
                                            <th>دوره</th>
                                            <th>نام اثر</th>
                                            <th>گروه علمی</th>
                                            <th>وضعیت</th>
                                            <th>تاریخ ارسال/حذف</th>
                                        </tr>
                                        <?php
                                        $r = 1;
                                        $query = mysqli_query($signup_connection, "select * from users inner join posts on users.id = posts.user_id where users.national_code='$national_code' order by posts.id desc");
                                        foreach ($query as $posts):
                                            ?>
                                            <tr>
                                                <td><?php echo $r; ?></td>
                                                <td><?php echo $posts['festival_title']; ?></td>
                                                <td>
                                                    <label>
                                                        <?php echo $posts['title']; ?>
                                                    </label>
                                                </td>
                                                <td style="text-align:center"><?php echo $posts['scientific_group']; ?></td>
                                                <td style="text-align:center"><?php
                                                    switch ($posts['sent']) {
                                                        case 0:
                                                            echo 'ورود اولیه اطلاعات';
                                                            break;
                                                        case 1:
                                                            echo 'ارسال نهایی به جشنواره';
                                                            break;
                                                        case 2:
                                                            echo 'حذف شده توسط کاربر';
                                                            break;
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align:center"><?php
                                                    if ($posts['sent'] == 1) {
                                                        $sent_date = substr($posts['sent_at'], 0, 10);
                                                        $dateParts = explode("-", $sent_date);

                                                        $year = $dateParts[0];
                                                        $month = $dateParts[1];
                                                        $day = $dateParts[2];

                                                        print_r(gregorian_to_jalali($year, $month, $day, '/'));
                                                    } elseif ($posts['deleted_at']) {
                                                        $deleted_date = substr($posts['deleted_at'], 0, 10);
                                                        $dateParts = explode("-", $deleted_date);

                                                        $year = $dateParts[0];
                                                        $month = $dateParts[1];
                                                        $day = $dateParts[2];

                                                        print_r(gregorian_to_jalali($year, $month, $day, '/'));

                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php
                                            $r++;
                                        endforeach; ?>
                                        </tbody>
                                    </table>
                                </table>
                            </center>
                        </div>
                    <?php } endif;
                ?>
            </div>
        </section>
    </div>

    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>
