<?php

include_once 'header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3):
@$state = $_SESSION['city'];
@$city = $_SESSION['shahr_name'];
@$school = $_SESSION['school'];
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


    <section class="content">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-solid box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class='box-title'>لیست آثار ارزیابی نشده تفصیلی سوم</h3>

                    </div>

                    <div class="box-body">

                        <div class="row" style="overflow-x: auto">
                            <?php
                            switch ($_SESSION['head']) {
                                case 1:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a where nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی'");
                                    break;
                                case 2:
                                    $result = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_ostani='تفصیلی سوم' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_p.ostantahsili='$state' and etelaat_a.fileasar is not null order by etelaat_a.groupelmi asc");
                                    break;
                                case 3:
                                    $result = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_madrese='تفصیلی سوم' and etelaat_p.shahrtahsili='$city' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and etelaat_p.ostantahsili='$state' and etelaat_a.fileasar is not null and etelaat_p.madrese='$school' order by etelaat_a.groupelmi asc");
                                    break;
                            }
                            ?>
                            <center>
                                <table id="myTable3" class="arzyabinashodetable">
                                    <tr>
                                        <th onclick="sortTable1(0)">کد اثر</th>
                                        <th onclick="sortTable1(1)">نام اثر</th>
                                        <th onclick="sortTable1(2)">قالب پژوهش و سطح ارزیابی</th>
                                        <th onclick="sortTable1(3)">اثر منتخب</th>
                                        <th onclick="sortTable1(4)">گروه علمی</th>
                                        <th>امتیاز ارزیابی اول</th>
                                        <th>ارزیاب تفصیلی اول</th>
                                        <th>امتیاز ارزیابی دوم</th>
                                        <th>ارزیاب تفصیلی دومً</th>
                                    </tr>
                                    <?php
                                    foreach ($result as $row1):
                                        $codeasar = $row1['codeasar'];
                                        ?>

                                        <form method="post" action="tafsili3.php">
                                            <tr>
                                                <td><input style="padding: 5px" type="submit" name="subset"
                                                           value="<?php echo $codeasar; ?>">
                                                    <?php
                                                    switch ($_SESSION['head']) {
                                                        case 1:
                                                            ?>
                                                            <input type="hidden" name="code"
                                                                   value="<?php echo $codeasar; ?>">
                                                            <?php
                                                            break;
                                                        case 2:
                                                            ?>
                                                            <input type="hidden" name="subjection"
                                                                   value="tafsili3ostan">
                                                            <input type="hidden" name="code"
                                                                   value="<?php echo $codeasar; ?>">
                                                            <?php
                                                            break;
                                                        case 3:
                                                            ?>
                                                            <input type="hidden" name="subjection"
                                                                   value="tafsili3madrese">
                                                            <input type="hidden" name="code"
                                                                   value="<?php echo $codeasar; ?>">
                                                            <?php
                                                            break;
                                                    }
                                                    ?>                                                </td>
                                                <td>
                                                    <a href="<?php if ($row1['fileasar'] == 'dist/files/asar_files/') {
                                                        echo $row1['fileasar_word'];
                                                    } else {
                                                        echo $row1['fileasar'];
                                                    } ?>">
                                                        <label style="width: 400px"><?php echo $row1['nameasar']; ?></label>
                                                    </a>
                                                </td>
                                                <td><?php echo $row1['ghalebpazhouhesh'] . " سطح " . $row1['satharzyabi']; ?></td>
                                                <td><?php
                                                    $ostan = $row1['vaziatostaniasar'];
                                                    $ostan1 = ltrim($ostan, "اثر ");
                                                    $ostan2 = ltrim($ostan1, "منتخب");
                                                    echo $ostan2;
                                                    ?></td>
                                                <td><?php echo $row1['groupelmi'] ?></td>
                                                <td>
                                                    <?php
                                                    switch ($_SESSION['head']) {
                                                        case 1:
                                                            $query = mysqli_query($connection, "select * from tafsili1 where codeasar='$codeasar'");
                                                            break;
                                                        case 2:
                                                            $query = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
                                                            break;
                                                        case 3:
                                                            $query = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
                                                            break;
                                                    }
                                                    foreach ($query as $tafsili1items) {
                                                    }
                                                    echo $tafsili1items['jam'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $tafsili1items['rater_id'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    switch ($_SESSION['head']) {
                                                        case 1:
                                                            $query = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
                                                            break;
                                                        case 2:
                                                            $query = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar'");
                                                            break;
                                                        case 3:
                                                            $query = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar'");
                                                            break;
                                                    }
                                                    foreach ($query as $tafsili2items) {
                                                    }
                                                    echo $tafsili2items['jam'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $tafsili2items['rater_id'] ?>
                                                </td>

                                            </tr>

                                        </form>

                                    <?php endforeach; ?>
                                </table>
                            </center>
                        </div>
            </section>


        </div>


        <!-- /.content-wrapper -->
        <?php
        endif;
        include_once 'footer.php';
        ?>
        <script type="text/javascript" language="Javascript">
            var sum = 0;

            function OnChange(value) {
                sum += new Number(value);
                document.getElementById('result').innerHTML = sum;
            }
        </script>
