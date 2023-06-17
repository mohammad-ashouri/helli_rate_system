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
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">
                        <form method="post" action="">
                            دریافت گزارشات ارزیابی آثار در دوره‌ی:
                            <select name="jashnvareh">
                                <?php
                                $selectionfrometelaat_a = mysqli_query($connection, "select distinct(jashnvareh) from etelaat_a where jashnvareh is not null and jashnvareh!='' AND jashnvareh!='13-سیزدهم'");
                                foreach ($selectionfrometelaat_a as $items):
                                    ?>
                                    <option <?php if (@$_POST['jashnvareh'] == $items['jashnvareh']) {
                                        echo 'selected';
                                    } ?>>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            گروه علمی:
                            <select name="groupelmi">
                                <option <?php if (@$_POST['groupelmi'] == 'همه گروه ها') {
                                    echo 'selected';
                                } ?>>همه گروه‌ها
                                </option>
                                <?php
                                $query = mysqli_query($connection, "select distinct groupelmi from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi asc");
                                foreach ($query as $groupelmi):
                                    ?>
                                    <option <?php if (@$_POST['groupelmi'] == $groupelmi['groupelmi']) {
                                        echo 'selected';
                                    } ?>><?php echo $groupelmi['groupelmi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            با جنسیت:
                            <select name="gender">
                                <option <?php if (@$_POST['gender'] == 'بدون فیلتر') {
                                    echo 'selected';
                                } ?>>بدون فیلتر
                                </option>
                                <option <?php if (@$_POST['gender'] == 'مرد') {
                                    echo 'selected';
                                } ?>>مرد
                                </option>
                                <option <?php if (@$_POST['gender'] == 'زن') {
                                    echo 'selected';
                                } ?>>زن
                                </option>
                            </select>
                            استان:
                            <select name="state">
                                <option <?php if (@$_POST['state'] == 'همه استان‌ها') {
                                    echo 'selected';
                                } ?>>همه استان‌ها
                                </option>
                                <?php
                                $query = mysqli_query($connection, "select distinct ostantahsili from etelaat_p where ostantahsili is not null and ostantahsili!='' order by ostantahsili asc");
                                foreach ($query as $ostantahsili):
                                    ?>
                                    <option <?php if (@$_POST['state'] == $ostantahsili['ostantahsili']) {
                                        echo 'selected';
                                    } ?>><?php echo $ostantahsili['ostantahsili'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت اطلاعات" name="exp_rates" style="padding: 6px"
                                   onclick="return confirm('لطفا تا بارگذاری کامل اطلاعات کمی صبر نمایید');">
                        </form>
                    </h3>
                </div>
            </div>

        </section>
    </div>

    <?php if (isset($_POST['exp_rates']) and !empty($_POST['jashnvareh'])):
    $counter = 1;
    $jashnvareh = $_POST['jashnvareh'];
    $groupelmi = $_POST['groupelmi'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];

    switch ($state) {
        case 'همه استان‌ها':
            switch ($groupelmi) {
                case 'همه گروه‌ها':
                    switch ($gender) {
                        case 'بدون فیلتر':
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.codeasar asc,etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                        default:
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' order by etelaat_a.codeasar asc,etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                    }
                    break;
                default:
                    switch ($gender) {
                        case 'بدون فیلتر':
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' order by etelaat_a.codeasar asc,etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                        default:
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.codeasar asc,etelaat_a.groupelmi='$groupelmi' order by etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                    }
                    break;
            }
            break;
        default:
            switch ($groupelmi) {
                case 'همه گروه‌ها':
                    switch ($gender) {
                        case 'بدون فیلتر':
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.ostantahsili='$state' order by etelaat_a.codeasar asc,etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                        default:
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_p.ostantahsili='$state' order by etelaat_a.codeasar asc,etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                    }
                    break;
                default:
                    switch ($gender) {
                        case 'بدون فیلتر':
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' order by etelaat_a.codeasar asc,etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                        default:
                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.codeasar asc,etelaat_p.ostantahsili='$state' order by etelaat_a.jamemtiazostan desc,etelaat_a.nobat_arzyabi_ostani desc";
                            break;
                    }
                    break;
            }
            break;
    }

    ?>
    <center>
        <div class="row" style="overflow-x: auto">
            <section class="col-lg-12 col-md-12" style="overflow-x: auto">
                <div class="box box-success" style="overflow-x: auto">
                    <div class="box-header" style="overflow-x: auto">
                        <h3 class="box-title" style="overflow-x: auto">
                            <table style="border-bottom: 2px solid black;overflow-x: auto">
                                <tr style="font-size: 14px;border-bottom: 2px solid green;">
                                    <th>ردیف</th>
                                    <th>کد اثر</th>
                                    <th>نام اثر</th>
                                    <th>مشخصات استادی</th>
                                    <th>مشخصات نویسنده</th>
                                    <th>قالب/سطح</th>
                                    <th>گروه علمی</th>
                                    <th>استان/شهرستان/مدرسه</th>
                                    <th>ارزیاب و امتیاز ارزیابی اجمالی</th>
                                    <th>ارزیاب و امتیاز تفصیلی اول</th>
                                    <th>ارزیاب و امتیاز تفصیلی دوم</th>
                                    <th>ارزیاب و امتیاز تفصیلی سوم</th>
                                    <th>امتیاز نهایی</th>
                                </tr>
                                <?php
                                $sql = mysqli_query($connection, $sql);
                                foreach ($sql as $values):
                                    $coderater = null;
                                    ?>
                                    <tr style="font-size: 15px;border-bottom: 2px solid black">
                                        <td style="padding: 10px">
                                            <?php echo $counter;
                                            $counter++ ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $codeasar = $values['codeasar'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php if ($values['fileasar'] != null or $values['fileasar_word'] != null): ?>
                                                <a href="<?php if ($values['fileasar'] != null and $values['fileasar'] != 'dist/files/asar_files/') {
                                                    echo $values['fileasar'];
                                                } elseif ($values['fileasar_word'] != null) {
                                                    echo $values['fileasar_word'];
                                                } ?>">
                                                    <?php echo $values['nameasar'] ?>
                                                </a>
                                            <?php else: ?>
                                                <?php echo $values['nameasar'] ?>
                                            <?php endif; ?>

                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $query = mysqli_query($connection, "select fname,family,ostantahsili,shahrtahsili,madrese,master from etelaat_p where codeasar='$codeasar'");
                                            foreach ($query as $etelaat_p) {
                                            }
                                            echo $etelaat_p['master'];
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            echo $etelaat_p['fname'] . ' ' . $etelaat_p['family'];
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $values['ghalebpazhouhesh'] . ' ' . $values['satharzyabi'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $values['groupelmi'] ?>
                                        </td>
                                        <td style="text-align:center">
                                            <?php echo $etelaat_p['ostantahsili'].' / '.$etelaat_p['shahrtahsili'].' / '. $etelaat_p['madrese']; ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $selectfromejmaliostan = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromejmaliostan as $ejo) {
                                            }
                                            $coderater = @$ejo['rater_id'];
                                            $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                            foreach ($sql as $ejr) {
                                            }
                                            echo @$ejr['name'] . ' ' . @$ejr['family'];
                                            echo ' - ' . @$ejo['jam'];
                                            @$ejo['jam'] = null;
                                            @$ejo['rater_id'] = null;
                                            @$coderater = null;
                                            @$ejr['name'] = null;
                                            @$ejr['family'] = null;
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php

                                            $selectfromtafsili1ostan = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromtafsili1ostan as $t1o) {
                                            }
                                            $coderater = @$t1o['rater_id'];
                                            $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                            foreach ($sql as $t1r) {
                                            }
                                            echo @$t1r['name'] . ' ' . @$t1r['family'];
                                            echo ' - ' . @$t1o['jam'];
                                            @$t1o['jam'] = null;
                                            @$t1o['rater_id'] = null;
                                            @$coderater = null;
                                            @$t1r['name'] = null;
                                            @$t1r['family'] = null;
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $selectfromtafsili2ostan = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromtafsili2ostan as $t2o) {
                                            }
                                            $coderater = @$t2o['rater_id'];
                                            $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                            foreach ($sql as $t2r) {
                                            }
                                            echo @$t2r['name'] . ' ' . @$t2r['family'];
                                            echo ' - ' . @$t2o['jam'];
                                            @$t2o['jam'] = null;
                                            @$t2o['rater_id'] = null;
                                            @$coderater = null;
                                            @$t2r['name'] = null;
                                            @$t2r['family'] = null;
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $selectfromtafsili3ostan = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromtafsili3ostan as $t3o) {
                                            }
                                            $coderater = @$t3o['rater_id'];
                                            $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                            foreach ($sql as $t3r) {
                                            }
                                            echo @$t3r['name'] . ' ' . @$t3r['family'];
                                            echo ' - ' . @$t3o['jam'];
                                            @$t3o['jam'] = null;
                                            @$t3o['rater_id'] = null;
                                            @$coderater = null;
                                            @$t3r['name'] = null;
                                            @$t3r['family'] = null;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $values['jamemtiazostan'];
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </table>

                        </h3>
                    </div>
                </div>

            </section>
        </div>
    </center>
<?php endif; ?>
<?php
endif;
include_once __DIR__ . '/footer.php';
?>