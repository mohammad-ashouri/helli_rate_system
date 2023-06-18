</section>
<!-- /.content -->
</div>
<?php
include_once __DIR__ . '/config/connection.php';
?>
<footer class="main-footer text-left">
    <strong>امروز:
        <?php
        $date = jdate("l Y/n/j");
        echo $date;
        ?>
        مصادف با:
        <?php
        $arabic_date = arabicDate('hj: l j F Y ', time());
        echo $arabic_date;
        ?>
        می باشد</strong>
    <br/><br/>
    <strong>کلیه اطلاعات و حقوق این سامانه متعلق به دبیرخانه جشنواره علامه حلی می باشد</strong>
</footer>
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery UI 1.11.4 -->
<script src="./bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap -->
<script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--<script src="./bower_components/bootstrap-5.0.2/js/bootstrap.min.js"></script>-->
<!-- Sparkline -->
<script src="./bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="./bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- Slimscroll -->
<script src="./bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="./build/dist/js/adminlte.min.js"></script>
<!--admin panel scripts-->
<script src="./build/js/admin_panel_scripts.js"></script>
</body>
</html>

<?php include_once 'config/connection_close.php'; ?>