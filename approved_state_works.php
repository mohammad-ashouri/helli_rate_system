<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1):
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
        <form method="post" id="submit">
            <section class="col-lg-12 col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            نمایش فایل های تاییدیه استان ها در جشنواره:
                        </h3>
                        <select id="jashnvareh" class="form-control" style="width: 200px; display: inline-flex"
                                name="jashnvareh">
                            <option selected disabled>انتخاب کنید</option>
                            <?php
                            $query = mysqli_query($connection, "select DISTINCT jashnvareh from secretariat_approves inner join rater_list on secretariat_approves.sender=rater_list.username");
                            foreach ($query as $festival):
                                ?>
                                <option <?php if (isset($_POST['jashnvareh']) and $_POST['jashnvareh']==$festival['jashnvareh']){echo 'selected';} ?> value="<?php echo $festival['jashnvareh']; ?>"><?php echo $festival['jashnvareh']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input style="width: 100px;display: inline; " name="submit" type="submit"
                               class="btn btn-success btn-block" value="نمایش">
                    </div>
                </div>
            </section>
        </form>
    </div>
    <?php if (isset($_POST['jashnvareh']) and $_POST['jashnvareh']!='انتخاب کنید'): ?>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        فهرست فایل های تاییدیه استان ها در جشنواره
                        <?php echo substr(@$jashnvareh = $_POST['jashnvareh'], 3) ?>
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped" style="text-align: center">
                        <tr>
                            <th>ردیف</th>
                            <th>استان</th>
                            <th>کاربر</th>
                            <th>تاریخ بارگزاری</th>
                            <th>فایل شورای علمی</th>
                            <th>فایل امور صیانتی</th>
                        </tr>
                        <?php
                        $query = mysqli_query($connection, "select distinct sender from secretariat_approves inner join rater_list on secretariat_approves.sender=rater_list.username where secretariat_approves.jashnvareh='$jashnvareh' order by rater_list.city_name asc");
                        $a = 1;
                        foreach ($query as $secretariat_items):
                            ?>
                            <tr>
                                <td><?php echo $a;
                                    $a++; ?></td>
                                <td><?php
                                    $sender = $secretariat_items['sender'];
                                    $query = mysqli_query($connection, "select * from rater_list where username='$sender'");
                                    foreach ($query as $sender_items) {
                                    }
                                  switch ($sender_items['shahr_name']){
                                    case 'کاشان':
                                    case 'بناب':
                                      echo $sender_items['shahr_name'];
                                      break;
                                    default:
                                      echo $sender_items['city_name'];
                                      break;
                                  }
                                    
                                    ?></td>
                                <td>
                                    <?php echo $sender_items['name'] . ' ' . $sender_items['family'] ?>
                                </td>
                                <td>
                                    <?php
                                    $query = mysqli_query($connection, "select * from secretariat_approves where sender='$sender' and jashnvareh='$jashnvareh'");
                                    foreach ($query as $items) {
                                    }
                                    echo $items['sent_date']
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php
                                    $query = mysqli_query($connection, "select * from secretariat_approves where sender='$sender' and jashnvareh='$jashnvareh' and file_type=1");
                                    foreach ($query as $items) {
                                    }
                                    echo $main_website_url . $items['src'];
                                    ?>" target="_blank">
                                        دانلود فایل
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php
                                    $query = mysqli_query($connection, "select * from secretariat_approves where sender='$sender' and jashnvareh='$jashnvareh' and file_type=2");
                                    foreach ($query as $items) {
                                    }
                                    echo $main_website_url . $items['src'];
                                    ?>" target="_blank">
                                        دانلود فایل
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <?php endif; ?>
    <script src="/build/js/approved_state_works.js"></script>
    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>
