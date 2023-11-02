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
                        <h3 class='box-title'>لیست آثار ارزیابی نشده تفصیلی اول</h3>
                    </div>

                    <div class="box-body">
                        <div class="row" style="overflow-x: auto">
                            <?php
                            switch ($_SESSION['head']) {
                                case 1:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a where nobat_arzyabi='تفصیلی اول' and vaziatkarnamemadrese='در حال ارزیابی' and fileasar is not null");
                                    break;
                                case 2:
                                    $result = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_p.ostantahsili='$state' and etelaat_a.fileasar is not null order by etelaat_a.groupelmi asc");
                                    break;
                                case 3:
                                    $result = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_madrese='تفصیلی اول' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.fileasar is not null and etelaat_p.madrese='$school' order by etelaat_a.groupelmi asc");
                                    break;
                            }
                            ?>
                            <center>
                                <table id="myTable3" class="arzyabinashodetable">

                                    <tr>
                                        <th onclick="sortTable1(0)">کد اثر</th>
                                        <th onclick="sortTable1(1)">نام اثر</th>
                                        <th onclick="sortTable1(2)">قالب پژوهش و سطح ارزیابی</th>
                                        <?php if ($_SESSION['head'] == 1): ?>
                                            <th onclick="sortTable1(3)">اثر منتخب</th>
                                        <?php endif; ?>
                                        <th onclick="sortTable1(4)">گروه علمی</th>
                                        <th>امتیاز ارزیابی اجمالی</th>
                                    </tr>

                                    <?php
                                    foreach ($result as $row1):
                                        ?>

                                        <form method="post" action="tafsili1.php">
                                            <tr>
                                                <td><input style="padding: 5px" type="submit" name="subset"
                                                           value="<?php echo $row1['codeasar']; ?>"></td>
                                                <?php
                                                if ($_SESSION['head'] == 3):
                                                    ?>
                                                    <input type="hidden" name="subjection" value="tafsili1madrese">
                                                <?php
                                                else:
                                                    ?>
                                                    <input type="hidden" name="subjection" value="tafsili1ostan">
                                                <?php
                                                endif;
                                                ?>
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
                                                <?php if ($_SESSION['head'] == 1): ?>
                                                    <td>
                                                        <?php
                                                        $ostan = $row1['vaziatostaniasar'];
                                                        $ostan1 = ltrim($ostan, "اثر ");
                                                        $ostan2 = ltrim($ostan1, "منتخب");
                                                        echo $ostan2;
                                                        ?>
                                                    </td>
                                                <?php endif; ?>
                                                <td><?php echo $row1['groupelmi'] ?></td>
                                                <td>
                                                    <?php
                                                    $codeasar = $row1['codeasar'];
                                                    switch ($_SESSION['head']) {
                                                        case 1:
                                                            $query = mysqli_query($connection, "select * from t_a_ejmali where codeasar='$codeasar'");
                                                            break;
                                                        case 2:
                                                            $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                                            break;
                                                        case 3:
                                                            $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                                            break;
                                                    }
                                                    foreach ($query as $EjmaliSum) {
                                                    }
                                                    echo $EjmaliSum['jam'];
                                                    ?>
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
