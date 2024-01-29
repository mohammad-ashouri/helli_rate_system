<?php
session_start();

include_once __DIR__ . '/config/connection.php';
include_once __DIR__ . '/build/php/functions.php';
$query = mysqli_query($connection, "select * from options where op_name='maintenance'");
foreach ($query as $option) {
}
if ($option['op_value'] == 1 and $_SESSION['full_access'] != 1) {
    header("location: maintenance.php");
}


if (!isset($_SESSION['username'])) {
    header("location:" . $main_website_url . "index.php?errorlog");
}
$user = $_SESSION['username'];
$result = mysqli_query($connection, "select * from rater_list where `username`='$user'");
foreach ($result as $rows) {
}
$genderformovetoschool = $rows['gender'];
if (!isset($_SESSION['islogin'])) {
    header("location:" . $main_website_url . "index.php?errorlog");
} elseif (!isset($_SESSION['start'])) {
    $_SESSION['start'] = time();
} else {
    $time_now = time();
    if ($time_now > $_SESSION['end']) {
        $user = $_SESSION['username'];
        mysqli_query($connection, "update log_helli set `logout_year`='$year',`logout_month`='$month',`logout_day`='$day',`logout_hour`='$hour',`logout_minute`='$min',`logout_second`='$sec' where `username`='$user' and `logout_year` is null");
        unset($_SESSION["islogin"]);
        unset($_SESSION["username"]);
        unset($_SESSION['coderater']);
        unset($_SESSION['head']);
        header("location:" . $main_website_url . "index.php?errorlog");
    } else {
        $select = mysqli_query($connection, "select * from log_helli where logout_year is null and username='$user'");
        foreach ($select as $markforlinklogs) {
        }
        $user = $_SESSION['username'];
        $dateforupdateloghelli = $year . '/' . $month . '/' . $day . ' ' . $hour . ':' . $min . ':' . $sec;
        $_SESSION['start'] = time();
        $_SESSION['end'] = $_SESSION['start'] + (36000);
        @$linklog = $markforlinklogs['radif'];
        $urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
        mysqli_query($connection, "insert into link_logs (id,url,time,username) values ('$linklog','$urlofthispage','$dateforupdateloghelli','$user')");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if ($_SESSION['head'] == 1): ?>
        <title>صفحه کاربری مدیر</title>
    <?php endif; ?>
    <?php if ($_SESSION['head'] == 0): ?>
        <title>صفحه کاربری ارزیاب</title>
    <?php endif; ?>
    <?php if ($_SESSION['head'] == 2): ?>
        <title>صفحه کاربری دبیر استان</title>
    <?php endif; ?>
    <?php if ($_SESSION['head'] == 3): ?>
        <title>صفحه کاربری دبیر مدرسه</title>
    <?php endif; ?>
    <link rel="icon" type="image/x-icon" href="build/dist/img/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="build/dist/css/bootstrap-theme.css">
    <!--    <link rel="stylesheet" href="bower_components/bootstrap-5.0.2/css/bootstrap.css">-->
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="build/dist/css/rtl.css">
    <!-- Custom styles from me -->
    <link rel="stylesheet" href="build/dist/css/custom_css.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="build/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="build/dist/css/skins/_all-skins.min.css">

    <!--    <script src="http://code.jquery.com/jquery-latest.js"></script>-->
    <script src="build/js/submit.js"></script>

    <!-- Select2 CSS -->
    <link rel="stylesheet" type="text/css" href="bower_components/select2/dist/css/select2.min.css">

    <!-- jQuery -->
    <script src="bower_components/jquery-3.3.1.min.js" type="text/javascript"></script>

    <!-- Select2 JS -->
    <script src="bower_components/select2/dist/js/select2.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'انتخاب کنید'
            });
        });
    </script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/panel.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src=""></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>سامانه جشنواره علامه حلی (ره)</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Sidebar toggle button-->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <ul class="dropdown-menu">
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="build/dist/img/user-img.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">
                                <?php
                                if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3) {
                                    echo "";
                                } else {
                                    echo "استاد";
                                }
                                ?>
                                <?php
                                echo $rows['name'] . " " . $rows['family'];
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="build/dist/img/user-img.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php
                                    if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3) {
                                        echo "";
                                    } else {
                                        echo "استاد";
                                    }
                                    ?>
                                    <?php
                                    echo $rows['name'] . " " . $rows['family'];
                                    ?>
                                    <small><?php
                                        echo $rows['subject'];
                                        ?></small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="profile.php" class="btn btn-default btn-flat">تغییر رمز عبور</a>
                                </div>
                                <div class="pull-left">

                                    <a href="logout.php"> <input type="button" class="btn btn-default btn-flat"
                                                                 value="خروج"> </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- right side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">

                <div class="pull-right info">
                    <p><?php
                        if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3) {
                            echo "";
                        } else {
                            echo "استاد";
                        }
                        ?>
                        <?php
                        echo $rows['name'] . " " . $rows['family'];
                        ?>

                    </p>
                    <?php
                    if ($_SESSION['head'] == 1 or $_SESSION['head'] == 0):
                        ?>
                        <a href="#"><i class="fa fa-circle text-success"></i> <?php
                            echo $rows['subject'];
                            ?>
                        </a>
                        <br><br/>
                    <?php endif; ?>
                    <a href="#"><i class="fa fa-circle text-success"></i>
                        <?php
                        $rater_code = $rows['code'];
                        echo "کد" . " " . $rater_code;
                        ?>
                    </a>
                    <?php if ($_SESSION['head'] == 2 and $_SESSION['approved'] == 1): ?>
                        <br/><br/>
                        <a href="#"><i class="fa fa-circle text-success"></i> <?php
                            echo $rows['subject'];
                            ?>
                        </a>
                        <br/><br/>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php
                            $state = $_SESSION['city'];
                            $city = $_SESSION['shahr_name'];
                            echo $state;
                            ?>
                        </a>

                    <?php elseif ($_SESSION['head'] == 3 and $_SESSION['approved'] == 1): ?>
                        <br/><br/>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php
                            echo "دبیر جشنواره مدرسه" . " " . $_SESSION['school'];
                            ?>
                        </a>
                        <br/><br/>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php
                            $state = $_SESSION['city'];
                            $city = $_SESSION['shahr_name'];
                            echo $state;
                            ?>
                        </a>
                        <br/><br/>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php
                            echo 'شهرستان ' . $city = $_SESSION['shahr_name'];
                            ?>
                        </a>
                    <?php elseif ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null): ?>
                        <br/><br/>
                        <a href="#"><i class="fa fa-circle text-success"></i>
                            <?php
                            echo "سرگروه علمی گروه" . " " . $_SESSION['groupname'];
                            ?>
                        </a>
                    <?php endif; ?>

                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            include_once __DIR__ . '/manager_nav.php';
            ?>

        </section>
        <!-- /.sidebar -->
    </aside>
