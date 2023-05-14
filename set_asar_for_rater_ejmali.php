<?php
include_once 'header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)):
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
    <?php if ($_SESSION['head'] == 2): ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <center>
                            <h3 class='box-title'>
                                توجه داشته باشید، پس از اختصاص اثر به ارزیاب، دیگر توانایی انتقال اثر به مدرسه را
                                ندارید.
                                <br/><br/>
                                لطفا دقت کنید؛ این عملیات قابل بازگشت نیست.
                            </h3>
                        </center>

                    </div>
            </section>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['wrongrem'])): ?>
        <section class="content">
            <div class="row">
                <section class="col-lg-12 col-md-12">
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <center>
                                <h3 class='box-title'>
                                    خطا در حذف اثر از پنل ارزیاب (مشکل در پیدا کردن ارزیاب با کد اثر مربوطه)
                                </h3>
                            </center>

                        </div>
                </section>
            </div>
            <?php elseif (isset($_GET['removedasarfromid'])): ?>
            <section class="content">
                <div class="row">
                    <section class="col-lg-12 col-md-12">
                        <div class="box box-solid box-success">
                            <div class="box-header">
                                <center>
                                    <h3 class='box-title'>
                                    <i class="fa fa-info-circle"></i>
                                    اثر با موفقیت از پنل ارزیاب حذف گردید.
                                    </h3>
                                </center>

                            </div>
                    </section>
                </div>
                <?php elseif (isset($_GET['wontfindrater'])): ?>
                <section class="content">
                    <div class="row">
                        <section class="col-lg-12 col-md-12">
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>
                                    <center>
                                        <h3 class='box-title'>
                                            ارزیاب وارد شده پیدا نشد
                                        </h3>
                                    </center>

                                </div>
                        </section>
                    </div>
                    <?php elseif (isset($_GET['wontfindasar'])): ?>
                    <section class="content">
                        <div class="row">
                            <section class="col-lg-12 col-md-12">
                                <div class="box box-solid box-danger">
                                    <div class="box-header">
                                        <i class="fa fa-info-circle"></i>
                                        <center>
                                            <h3 class='box-title'>
                                                اثر وارد شده پیدا نشد
                                            </h3>
                                        </center>

                                    </div>
                            </section>
                        </div>
                        <?php elseif (isset($_GET['successset'])): ?>
                        <section class="content">
                            <div class="row">
                                <section class="col-lg-12 col-md-12">
                                    <div class="box box-solid box-success">
                                        <div class="box-header">
                                            <i class="fa fa-info-circle"></i>
                                            <center>
                                                <h3 class='box-title'>
                                                    اثر با موفقیت در پنل ارزیاب مربوطه قرار داده شد
                                                </h3>
                                            </center>

                                        </div>
                                </section>
                            </div>
                            <?php elseif (isset($_GET['wrong'])): ?>
                            <section class="content">
                                <div class="row">
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box box-solid box-danger">
                                            <div class="box-header">
                                                <i class="fa fa-info-circle"></i>
                                                <center>
                                                    <h3 class='box-title'>
                                                        خطا در اختصاص اثر به ارزیاب
                                                    </h3>
                                                </center>
                                            </div>
                                    </section>
                                </div>
                                <?php elseif (isset($_GET['emptyratercode'])): ?>
                                <section class="content">
                                    <div class="row">
                                        <section class="col-lg-12 col-md-12">
                                            <div class="box box-solid box-danger">
                                                <div class="box-header">
                                                    <i class="fa fa-info-circle"></i>
                                                    <center>
                                                        <h3 class='box-title'>
                                                            لطفا کد ارزیاب را وارد کنید
                                                        </h3>
                                                    </center>


                                                </div>
                                        </section>
                                    </div>

                                    <?php endif; ?>

                                    <?php if ($_SESSION['head'] == 1): ?>
                                        <div class="row">
                                            <section class="col-lg-12 col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <i class="fa fa-info-circle"></i>
                                                        <h3 class="box-title">
                                                            حذف ارزیاب از یک اثر خاص
                                                        </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <center>
                                                            <form method="post" action="build/php/inc.php"
                                                                  onsubmit="return validateremoveejmalikeshvari();"
                                                                  id="remform">
                                                                <input name="asarcode" type="text"
                                                                       placeholder="کد اثر را وارد کنید"
                                                                       style="padding: 6px" id="remasarcode">
                                                                <br/><br/>
                                                                <input name="ratercode" type="text"
                                                                       placeholder="کد ارزیاب را وارد کنید"
                                                                       style="padding: 6px" id="remratercode">
                                                                <br/> <br/>
                                                                <input name="rfek" type="submit"
                                                                       value="حذف اثر از پنل ارزیاب"
                                                                       style="padding: 6px">
                                                            </form>
                                                        </center>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                    <?php elseif ($_SESSION['head'] == 2 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>
                                        <div class="row">
                                            <section class="col-lg-12 col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <i class="fa fa-info-circle"></i>
                                                        <h3 class="box-title">
                                                            حذف اثر از پنل ارزیابی ارزیاب
                                                        </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <center>
                                                            <form method="post" action="build/php/inc.php"
                                                                  onsubmit="return validateremoveejmaliostani();"
                                                                  id="remform">
                                                                <input name="asarcode" type="text"
                                                                       placeholder="کد اثر را وارد کنید"
                                                                       style="padding: 6px" id="remasarcode">
                                                                <br/><br/>
                                                                <input name="rfeo" type="submit"
                                                                       value="حذف اثر از پنل ارزیاب"
                                                                       style="padding: 6px">
                                                            </form>
                                                        </center>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                    <?php elseif ($_SESSION['head'] == 3): ?>
                                        <div class="row">
                                            <section class="col-lg-12 col-md-12">
                                                <div class="box box-success">
                                                    <div class="box-header">
                                                        <i class="fa fa-info-circle"></i>
                                                        <h3 class="box-title">
                                                            حذف اثر از پنل ارزیابی ارزیاب
                                                        </h3>
                                                    </div>
                                                    <div class="box-body">
                                                        <center>
                                                            <form method="post" action="build/php/inc.php"
                                                                  onsubmit="return validateremoveejmalimadrese();"
                                                                  id="remform">
                                                                <input name="asarcode" type="text"
                                                                       placeholder="کد اثر را وارد کنید"
                                                                       style="padding: 6px" id="remasarcode">
                                                                <br/><br/>
                                                                <input name="rfem" type="submit"
                                                                       value="حذف اثر از پنل ارزیاب"
                                                                       style="padding: 6px">
                                                            </form>
                                                        </center>
                                                    </div>
                                                </div>

                                            </section>
                                        </div>
                                    <?php endif; ?>


                                    <!-- Main content -->


                                    <?php
                                    switch ($_SESSION['head']) {
                                        case 1:
                                            include_once "build/php/safr_ejmali/ejmali_keshvar.php";
                                            break;
                                        case 2:
                                            include_once "build/php/safr_ejmali/ejmali_ostan.php";
                                            break;
                                        case 3:
                                            include_once "build/php/safr_ejmali/ejmali_madrese.php";
                                            break;
                                    }
                                    if ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null) {
                                        include_once "build/php/safr_ejmali/ejmali_ostan.php";
                                    }
                                    ?>

                                    <?php
                                    endif;
                                    include_once 'footer.php';
                                    ?>
                                    <script>
                                        // function sortTable1(n) {
                                        //     var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                                        //     table = document.getElementById("myTable3");
                                        //     switching = true;
                                        //     // Set the sorting direction to ascending:
                                        //     dir = "asc";
                                        //     /* Make a loop that will continue until
                                        //     no switching has been done: */
                                        //     while (switching) {
                                        //         // Start by saying: no switching is done:
                                        //         switching = false;
                                        //         rows = table.rows;
                                        //         /* Loop through all table rows (except the
                                        //         first, which contains table headers): */
                                        //         for (i = 1; i < (rows.length - 1); i++) {
                                        //             // Start by saying there should be no switching:
                                        //             shouldSwitch = false;
                                        //             /* Get the two elements you want to compare,
                                        //             one from current row and one from the next: */
                                        //             x = rows[i].getElementsByTagName("TD")[n];
                                        //             y = rows[i + 1].getElementsByTagName("TD")[n];
                                        //             /* Check if the two rows should switch place,
                                        //             based on the direction, asc or desc: */
                                        //             if (dir == "asc") {
                                        //                 if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                        //                     // If so, mark as a switch and break the loop:
                                        //                     shouldSwitch = true;
                                        //                     break;
                                        //                 }
                                        //             } else if (dir == "desc") {
                                        //                 if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                                        //                     // If so, mark as a switch and break the loop:
                                        //                     shouldSwitch = true;
                                        //                     break;
                                        //                 }
                                        //             }
                                        //         }
                                        //         if (shouldSwitch) {
                                        //             /* If a switch has been marked, make the switch
                                        //             and mark that a switch has been done: */
                                        //             rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                                        //             switching = true;
                                        //             // Each time a switch is done, increase this count by 1:
                                        //             switchcount ++;
                                        //         } else {
                                        //             /* If no switching has been done AND the direction is "asc",
                                        //             set the direction to "desc" and run the while loop again. */
                                        //             if (switchcount == 0 && dir == "asc") {
                                        //                 dir = "desc";
                                        //                 switching = true;
                                        //             }
                                        //         }
                                        //     }
                                        // }
                                        function searchfunction() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("myinput");
                                            filter = input.value;
                                            table = document.getElementById("myTable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[3];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }

                                        function searchnameasar() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("nameasar");
                                            filter = input.value;
                                            table = document.getElementById("myTable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[2];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }

                                        function searchcodeasar() {
                                            var input, filter, table, tr, td, i, txtValue;
                                            input = document.getElementById("codeasar");
                                            filter = input.value;
                                            table = document.getElementById("myTable3");
                                            tr = table.getElementsByTagName("tr");
                                            for (i = 0; i < tr.length; i++) {
                                                td = tr[i].getElementsByTagName("td")[1];
                                                if (td) {
                                                    txtValue = td.textContent || td.innerText;
                                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                                        tr[i].style.display = "";
                                                    } else {
                                                        tr[i].style.display = "none";
                                                    }
                                                }
                                            }
                                        }
                                    </script>
