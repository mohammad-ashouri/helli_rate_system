<?php
include_once 'header.php';
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
    <?php
    $rater_code = $_SESSION['head'];
    if ($rater_code == 0 and $_SESSION['city_name'] == null):
    ?>
    <section class="content-header">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <form method="post">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">لیست آثار ارزیابی شده
                                <?php
                                if ($_SESSION['head'] == 1):
                                ?>
                                گروه علمی:

                                <select name="customgroup">
                                    <?php
                                    $selectfromelmigroup = mysqli_query($connection, "select distinct(groupelmi) from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi asc");
                                    foreach ($selectfromelmigroup as $groupitems):
                                        ?>
                                        <option>
                                            <?php echo $groupitems['groupelmi'] ?>
                                        </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                                <input type="submit" name="subgroup" style="padding: 7px" value="جستجو">
                            </h3>
                        </form>
                        <?php endif; ?>
                    </div>

                    <div class="box-body" style="overflow-x: auto">
                        <div class="box-body" style="overflow-x: auto">
                            <div class="row" style="overflow-x: auto">
                                <section class="col-lg-12 col-md-12">
                                    <div class="box box-success">
                                        <div class="box-body" style="overflow-x: auto">
                                            <table class="arzyabinashodetable" style="overflow-x: auto">
                                                <tr>

                                                    <th>کد اثر</th>
                                                    <th>نام اثر</th>
                                                    <th>رد / قبول</th>
                                                    <th>تاریخ ارزیابی</th>

                                                </tr>
                                                <?php endif; ?>

                                                <?php

                                                if ($rater_code == 0):
                                                $rcode = $_SESSION['coderater'];
                                                $result4 = mysqli_query($connection, "select * from rater_comments_archive where `rater_id`='$rcode' and `comment` is not null");
                                                foreach ($result4 as $row2): ?>
                                                    <tr>
                                                        <td><?php echo $row2['codeasar'] ?></td>
                                                        <td>
                                                            <a href="<?php
                                                            $codeasar_temp = $row2['codeasar'];
                                                            $query_temp = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasar_temp'");
                                                            foreach ($query_temp as $item_temp) {
                                                            }
                                                            echo $item_temp['fileasar'] ?>">
                                                                <label style='width: 500px'><?php echo $row2['asarname'] ?></label>
                                                            </a>
                                                        </td>
                                                        <td><?php echo $row2['accept_or_reject'] ?></td>
                                                        <td><?php echo $row2['tarikhsabt_year'] . "/" . $row2['tarikhsabt_month'] . "/" . $row2['tarikhsabt_day'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>توضیحات:</td>
                                                        <td>
                                                            <textarea disabled
                                                                      style="width: available; height: 150px"><?php echo $row2['comment']; ?></textarea>

                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;

                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                    </div>


                    <?php elseif ($rater_code == 1): ?>
                    <section class="content-header">
                        <div class="row">
                            <section class="col-lg-12 col-md-12">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <form method="post">
                                            <i class="fa fa-info-circle"></i>
                                            <h3 class="box-title">لیست آثار ارزیابی شده
                                                <?php
                                                if ($_SESSION['head'] == 1):
                                                ?>
                                                گروه علمی:

                                                <select name="customgroup">
                                                    <?php
                                                    $selectfromelmigroup = mysqli_query($connection, "select distinct(groupelmi) from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi asc");
                                                    foreach ($selectfromelmigroup as $groupitems):
                                                        ?>
                                                        <option <?php if ($groupitems['groupelmi'] == @$_POST['customgroup']) {
                                                            echo 'selected';
                                                        } ?>>
                                                            <?php echo $groupitems['groupelmi'] ?>
                                                        </option>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </select>
                                                <input type="submit" name="subgroup" style="padding: 7px" value="جستجو">
                                        </form>
                                        <?php endif; ?>
                                        </h3>
                                    </div>
                                    <div class="box-body" style="overflow-x: auto">
                                        <div class="box-body" style="overflow-x: auto">
                                            <div class="row" style="overflow-x: auto">
                                                <section class="col-lg-12 col-md-12">
                                                    <div class="box box-success">
                                                        <div class="box-body" style="overflow-x: auto">

                                                            <?php
                                                            if (isset($_POST['subgroup'])):
                                                                $customgroup = $_POST['customgroup'];
                                                                ?>


                                                                <table id="myTable3" class="arzyabishodetable"
                                                                       style="overflow-x: auto">

                                                                    <?php
                                                                    $result = mysqli_query($connection, "select distinct(codeasar),nameasar,fileasar,fileasar_word,ghalebpazhouhesh,satharzyabi,groupelmi from etelaat_a where nobat_arzyabi='ارزیابی اجمالی' and groupelmi='$customgroup' order by groupelmi asc");
                                                                    foreach ($result as $items):
                                                                        $codeasarselect = $items['codeasar'];
                                                                        $resultselection = mysqli_query($connection, "select * from rater_comments_archive where `codeasar`='$codeasarselect' and comment is not null");

                                                                        ?>
                                                                        <tr style="background-color: #2DCDDF; border-bottom: hidden; overflow-x: auto">
                                                                            <td style="width: 300px">کد اثر:
                                                                                <label>
                                                                                    <?php echo $items['codeasar']; ?>
                                                                                </label>

                                                                            </td>
                                                                            <form style="direction: ltr" target="_blank"
                                                                                  action="sabt-arzyabi-ejmali.php"
                                                                                  method="post">
                                                                                <td>نام اثر:
                                                                                    <label style="width: 700px">
                                                                                        <a target="_blank"
                                                                                           style="color: black"
                                                                                           href="<?php if ($items['fileasar'] == 'dist/files/asar_files/') {
                                                                                               echo $items['fileasar_word'];
                                                                                           } else {
                                                                                               echo $items['fileasar'];
                                                                                           } ?>">
                                                                                            <?php echo $items['nameasar']; ?>
                                                                                        </a>
                                                                                    </label>
                                                                                    <span>
                                                                                        <input type="hidden"
                                                                                               value="<?php echo $items['codeasar'] ?>"
                                                                                               name="code">
                                                                                        <input style="padding: 7px;  left: 50px;"
                                                                                               type="submit"
                                                                                               value="ثبت ارزیابی اجمالی">
                                                                                    </span>
                                                                                </td>
                                                                            </form>
                                                                        </tr>
                                                                        <?php

                                                                        $selectfrometa = "select * from etelaat_a where codeasar='$codeasarselect'";
                                                                        $etaresult = mysqli_query($connection, $selectfrometa);
                                                                        foreach ($etaresult as $eta):
                                                                            ?>
                                                                            <tr style="background-color: #2DCDDF">
                                                                                <td style="width: 300px">قالب پژوهش:
                                                                                    <label>
                                                                                        <?php echo $eta['ghalebpazhouhesh']; ?>
                                                                                    </label>

                                                                                </td>
                                                                                <td>سطح ارزیابی:
                                                                                    <label style="">
                                                                                        <?php echo $eta['satharzyabi']; ?>
                                                                                    </label>
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                    گروه علمی:
                                                                                    <label style="">
                                                                                        <?php echo $eta['groupelmi']; ?>
                                                                                    </label>
                                                                                </td>

                                                                            </tr>
                                                                        <?php endforeach; ?>


                                                                        <?php
                                                                        foreach ($resultselection as $values):
                                                                            ?>
                                                                            <tr>
                                                                                <td style="border-bottom:2px solid black; background-color: #7abaff">
                                                                                    نظر استاد
                                                                                    <?php echo $values['rater_info'] ?>
                                                                                    <br/>
                                                                                    در تاریخ
                                                                                    <?php echo $values['tarikhsabt_year'] . '/' . $values['tarikhsabt_month'] . '/' . $values['tarikhsabt_day'] ?>

                                                                                </td>
                                                                                <form style="direction: ltr"
                                                                                      action="sabt-arzyabi-ejmali.php"
                                                                                      method="post">
                                                                                    <td>

                                                                                        <label style="700px">
                                                                                            <?php if ($values['accept_or_reject'] == "راه‌یابی اثر به مرحله تفصیلی"): ?>
                                                                                                <label style="color: #0000CC"><?php echo $values['accept_or_reject'] ?></label>
                                                                                            <?php endif; ?>
                                                                                            <?php if ($values['accept_or_reject'] == "توقف اثر در مرحله اجمالی"): ?>
                                                                                                <label style="color: red"><?php echo $values['accept_or_reject'] ?></label>
                                                                                            <?php endif; ?>
                                                                                            <?php ?>
                                                                                        </label>
                                                                                    </td>
                                                                                </form>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="direction: ltr">
                                                                                        توضیحات
                                                                                    </p>
                                                                                    <?php if (!empty($values['comment'])): ?>
                                                                                        <br/>
                                                                                        <form action="build/php/inc.php"
                                                                                              method="post">
                                                                                            <input type="hidden"
                                                                                                   value="<?php echo $items['codeasar'] ?>"
                                                                                                   name="codeasar">
                                                                                            <input type="hidden"
                                                                                                   value="<?php echo $values['rater_id'] ?>"
                                                                                                   name="rater_id">
                                                                                            <input type="hidden"
                                                                                                   value="<?php echo $user ?>"
                                                                                                   name="remover">
                                                                                            <input class="removefromrated"
                                                                                                   type="submit"
                                                                                                   name="removefromrated"
                                                                                                   value="حذف ارزیابی">

                                                                                        </form>
                                                                                    <?php endif; ?>

                                                                                </td>
                                                                                <td>
                                                                                    <label style="overflow-x: auto ;width: 900px; height: 150px;"
                                                                                           dir="rtl">
                                                                                        <?php
                                                                                        echo $values['comment']
                                                                                        ?>
                                                                                    </label>

                                                                                </td>
                                                                            </tr>
                                                                        <?php
                                                                        endforeach;
                                                                    endforeach;
                                                                    ?>
                                                                </table>
                                                            <?php
                                                            endif;
                                                            ?>
                                                        </div>
                                                </section>
                                            </div>
                            </section>
                            <?php endif; ?>
                            <!-- /.content-wrapper -->
                            <?php
                            include_once 'footer.php';
                            ?>
                            <script>
                                function searchgroupelmi() {
                                    var input, filter, table, tr, td, i, txtValue;
                                    input = document.getElementById("groupelmi");
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
