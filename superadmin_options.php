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
<!--                    <form method="post" action="build/php/inc.php">-->
<!--                        <input type="submit" name="querya">-->
<!--                    </form>-->
                </div>
            </div>
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
                        حالت تعمیر و نگهداری
                    </h3>
                </div>
                <div class="box-body">
                    <center>
                        <form action="/build/php/maintenance.php" method="post">
                                <span>
                                    وضعیت در حال تعمیر:
                                    <?php
                                    $query=mysqli_query($connection,"select * from options where op_name='maintenance'");
                                    foreach ($query as $options){}
                                    if ($options['op_value']==0){
                                        echo 'غیر فعال';
                                    }else{
                                        echo 'فعال';
                                    }
                                    ?>
                                </span>
                            <br/><br/>
                            <input name="maintenance" type="submit" value="تغییر وضعیت حالت تعمیر و نگهداری" class="btn btn-block btn-danger">
                        </form>
                    </center>
                </div>
            </div>
        </section>
    </div>

        <!-- /.content-wrapper -->
        <?php
        include_once __DIR__ . '/footer.php';
        ?>
