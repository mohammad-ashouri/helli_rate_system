<?php include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1): ?>
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
                                $selectionfrometelaat_a = mysqli_query($connection, "select distinct(jashnvareh) from etelaat_a where jashnvareh is not null and jashnvareh!='' order by jashnvareh desc");
                                foreach ($selectionfrometelaat_a as $items):
                                    ?>
                                    <option <?php if (@$_POST['jashnvareh'] == $items['jashnvareh']) {
                                        echo 'selected';
                                    } ?>>
                                        <?php echo @$items['jashnvareh'] ?>
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
                                <option <?php if (@$_POST['gender'] == '') {
                                    echo 'selected';
                                } ?>></option>
                                <option <?php if (@$_POST['gender'] == 'مرد') {
                                    echo 'selected';
                                } ?>>مرد
                                </option>
                                <option <?php if (@$_POST['gender'] == 'زن') {
                                    echo 'selected';
                                } ?>>زن
                                </option>
                            </select>
                            در استان:
                            <select name="state">
                                <option <?php if (@$_POST['state'] == 'همه استان‌ها') {
                                    echo 'selected';
                                } ?>>همه استان‌ها
                                </option>
                                <?php
                                $query = mysqli_query($connection, "select distinct ostantahsili from etelaat_p where ostantahsili is not null and ostantahsili!='' and ostantahsili!='ندارد' order by ostantahsili asc");
                                foreach ($query as $ostantahsili):
                                    ?>
                                    <option <?php if (@$_POST['state'] == $ostantahsili['ostantahsili']) {
                                        echo 'selected';
                                    } ?>><?php echo $ostantahsili['ostantahsili'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت اطلاعات" name="exp_rates" style="padding: 6px">
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
        $state = $_POST['state'];
        $gender = $_POST['gender'];
        if ($gender == 'مرد') {
            if ($groupelmi == 'همه گروه‌ها') {
                if ($state == 'همه استان‌ها') {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                } else {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                }
            } else {
                if ($state == 'همه استان‌ها') {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                } else {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='می باشد' and etelaat_p.ostantahsili='$state' order by emtiaznahaei desc");
                }
            }
        } elseif ($gender == 'زن') {
            if ($groupelmi == 'همه گروه‌ها') {
                if ($state == 'همه استان‌ها') {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                } else {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                }
            } else {
                if ($state == 'همه استان‌ها') {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                } else {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by emtiaznahaei desc");
                }
            }
        } else {
            if ($groupelmi == 'همه گروه‌ها') {
                if ($state == 'همه استان‌ها') {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 order by etelaat_a.emtiaznahaei desc");
                } else {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                }
            } else {
                if ($state == 'همه استان‌ها') {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_a.groupelmi='$groupelmi' order by etelaat_a.emtiaznahaei desc");
                } else {
                    $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' order by emtiaznahaei desc");
                }
            }
        }
        ?>
        <center>
            <div class="row">
                <section class="col-lg-12 col-md-12" style="overflow-x: auto">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">
                                گزارش ارزیابی آثار در دوره:
                                <?php
                                echo substr($jashnvareh, 3);
                                ?>
                                - گروه علمی:
                                <?php echo $groupelmi; ?>
                                - استان:
                                <?php echo $state; ?>
                            </h3>
                        </div>
                    </div>
                </section>
            </div>
            <div class="row">
                <section class="col-lg-12 col-md-12" style="overflow-x: auto">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">
                                تعداد کل آثار در گروه علمی
                                <?php
                                switch ($groupelmi) {
                                    case 'همه گروه‌ها':
                                        $groupquery = mysqli_query($connection, "select * from etelaat_a where jashnvareh='$jashnvareh'");
                                        break;
                                    default:
                                        $groupquery = mysqli_query($connection, "select * from etelaat_a where jashnvareh='$jashnvareh' and groupelmi='$groupelmi'");
                                        break;
                                }
                                echo $groupelmi . ':' . mysqli_num_rows($groupquery);
                                ?>
                                <br/><br/>
                                تعداد راه یافته به مرحله تفصیلی کشوری:
                                <?php
                                switch ($groupelmi) {
                                    case 'همه گروه‌ها':
                                        $groupquery = mysqli_query($connection, "select * from etelaat_a where (nobat_arzyabi='تفصیلی دوم' or nobat_arzyabi='تفصیلی سوم') and sharayetavalliehsherkat='دارد' and jashnvareh='$jashnvareh'");
                                        break;
                                    default:
                                        $groupquery = mysqli_query($connection, "select * from etelaat_a where (nobat_arzyabi='تفصیلی دوم' or nobat_arzyabi='تفصیلی سوم') and groupelmi='$groupelmi' and sharayetavalliehsherkat='دارد' and jashnvareh='$jashnvareh'");
                                        break;
                                }
                                echo mysqli_num_rows($groupquery);
                                ?> <br/><br/>
                                تعداد برگزیده کشوری در این گروه:
                                <?php
                                $a = 0;
                                foreach ($query as $tafsiliopen) {
                                    if ($tafsiliopen['bargozidehkeshvari'] == 'می باشد') {
                                        $a++;
                                    }
                                }
                                echo $a; ?>
                            </h3>
                        </div>
                    </div>
                </section>
            </div>
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
                                        <th>نویسنده</th>
                                        <th>جنسیت</th>
                                        <th>قالب/سطح</th>
                                        <th>گروه علمی</th>
                                        <th>تعداد صفحه</th>
                                        <th>استان</th>
                                        <th>وضعیت ارزیابی</th>
                                        <th>امتیاز استانی</th>
                                        <th>ارزیاب تفصیلی دوم</th>
                                        <th>امتیاز تفصیلی دوم</th>
                                        <th>ارزیاب تفصیلی سوم</th>
                                        <th>امتیاز تفصیلی سوم</th>
                                        <th>امتیاز نهایی</th>
                                    </tr>
                                    <?php
                                    if ($gender == 'مرد') {
                                        if ($groupelmi == 'همه گروه‌ها') {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            }
                                        } else {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='می باشد' and etelaat_p.ostantahsili='$state' order by emtiaznahaei desc");
                                            }
                                        }
                                    } elseif ($gender == 'زن') {
                                        if ($groupelmi == 'همه گروه‌ها') {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            }
                                        } else {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by emtiaznahaei desc");
                                            }
                                        }
                                    } else {
                                        if ($groupelmi == 'همه گروه‌ها') {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar 
                                                                                            where etelaat_a.jashnvareh='$jashnvareh'
                                                                                            and vaziatpazireshasar='پذیرش شد'
                                                                                            order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='می باشد' order by etelaat_a.emtiaznahaei desc");
                                            }
                                        } else {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_a.groupelmi='$groupelmi' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' order by emtiaznahaei desc");
                                            }
                                        }
                                    }
                                    foreach ($query as $values): ?>
                                        <tr style="font-size: 15px;border-bottom: 2px solid black">
                                            <td style="padding: 10px"><?php echo $counter;
                                                $counter++ ?></td>
                                            <td style="padding: 10px"><?php echo $values['codeasar'] ?></td>
                                            <td style="padding: 10px">
                                                <a href="<?php echo $values['fileasar'] ?>">
                                                    <?php echo $values['nameasar'] ?>
                                                </a>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['fname'] . ' ' . $values['family'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['gender'] ?>
                                            </td>
                                            <td style="padding: 10px"><?php echo $values['ghalebpazhouhesh'] . ' ' . $values['satharzyabi'] ?></td>
                                            <td style="padding: 10px"><?php echo $values['groupelmi'] ?></td>
                                            <td style="padding: 10px"><?php echo $values['tedadsafhe'] ?></td>
                                            <td style="padding: 10px">
                                                <?php
                                                $codeasar = $values['codeasar'];
                                                $sql = mysqli_query($connection, "select * from etelaat_p where codeasar='$codeasar'");
                                                foreach ($sql as $sql1) {
                                                }
                                                echo $sql1['ostantahsili'];
                                                ?>
                                            </td>
                                            <td style="padding: 10px"><?php echo $values['nobat_arzyabi'] . ' (' . $values['vaziatkarname'] . ')' ?></td>
                                            <td style="padding: 10px"><?php echo $values['jamemtiazostan'] ?></td>
                                            <td style="padding: 10px">
                                                <?php
                                                if ($values['codearzyabtafsili2'] != null) {
                                                    $coderater = $values['codearzyabtafsili2'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t2r) {
                                                    }
                                                    echo $t2r['name'] . ' ' . $t2r['family'];
                                                    $t2r = null;
                                                }
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $sql = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
                                                foreach ($sql as $t2a) {
                                                }
                                                if ($t2a != null) {
                                                    echo $t2a['jam'];
                                                }
                                                $t2a = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                if ($values['codearzyabtafsili3'] != null) {
                                                    $coderater = $values['codearzyabtafsili3'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t3r) {
                                                    }
                                                    echo $t3r['name'] . ' ' . $t3r['family'];
                                                    $t3r = null;
                                                }
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $sql = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
                                                foreach ($sql as $t3a) {
                                                }
                                                if (@$t3a != null) {
                                                    echo @$t3a['jam'];
                                                }
                                                $t3a = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px ; <?php if ($values['bargozidehkeshvari'] == 'می باشد') {
                                                echo "background-color:#22df80";
                                            } else {
                                                echo "background-color:#b21f2d; color: white";
                                            } ?>"
                                            ">
                                            <?php echo $values['emtiaznahaei'] ?>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    $gender = $_POST['gender'];
                                    $groupelmi = $_POST['groupelmi'];
                                    $jashnvareh = $_POST['jashnvareh'];
                                    if ($gender == 'مرد') {
                                        if ($groupelmi == 'همه گروه‌ها') {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            }
                                        } else {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='نمی باشد' and etelaat_p.ostantahsili='$state' order by emtiaznahaei desc");
                                            }
                                        }
                                    } elseif ($gender == 'زن') {
                                        if ($groupelmi == 'همه گروه‌ها') {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            }
                                        } else {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='نمی باشد' order by emtiaznahaei desc");
                                            }
                                        }
                                    } else {
                                        if ($groupelmi == 'همه گروه‌ها') {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1  order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            }
                                        } else {
                                            if ($state == 'همه استان‌ها') {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_a.groupelmi='$groupelmi' and etelaat_a.bargozidehkeshvari='نمی باشد' order by etelaat_a.emtiaznahaei desc");
                                            } else {
                                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.approve_sianat=1 and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_a.bargozidehkeshvari='نمی باشد' order by emtiaznahaei desc");
                                            }
                                        }
                                    }
                                    foreach ($query as $values):
                                        ?>
                                        <tr style="font-size: 15px;border-bottom: 2px solid black">
                                            <td style="padding: 10px">
                                                <?php echo $counter;
                                                $counter++
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['codeasar']
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <a href="<?php echo $values['fileasar'] ?>">
                                                    <?php echo $values['nameasar'] ?>
                                                </a>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['ghalebpazhouhesh'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['satharzyabi'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['groupelmi']
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['tedadsafhe'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $codeasar = $values['codeasar'];
                                                $sql = mysqli_query($connection, "select * from etelaat_p where codeasar='$codeasar'");
                                                foreach ($sql as $sql1) {
                                                }
                                                echo $sql1['ostantahsili'];
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['nobat_arzyabi'] . ' (' . $values['vaziatkarname'] . ')'
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['jamemtiazostan']
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                if ($values['codearzyabtafsili2'] != null) {
                                                    $coderater = $values['codearzyabtafsili2'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t2r) {
                                                    }
                                                    echo $t2r['name'] . ' ' . $t2r['family'];
                                                    $t2r = null;
                                                }
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $sql = mysqli_query($connection, "select * from tafsili2 where codeasar='$codeasar'");
                                                foreach ($sql as $t2) {
                                                }
                                                echo @$t2['jam'];
                                                $t2 = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                if ($values['codearzyabtafsili3'] != null) {
                                                    $coderater = $values['codearzyabtafsili3'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t3r) {
                                                    }
                                                    echo $t3r['name'] . ' ' . $t3r['family'];
                                                    $t3r = null;
                                                }
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $sql = mysqli_query($connection, "select * from tafsili3 where codeasar='$codeasar'");
                                                foreach ($sql as $t3) {
                                                }
                                                echo @$t3['jam'];
                                                $t3 = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['emtiaznahaei']
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach;
                                    ?>
                                </table>
                                <br>
                                <!--                                <form method="post" target="_blank" action="/build/php/excel_export/rates_exp.php">-->
                                <!--                                    <input type="hidden" name="jashnvareh" value="-->
                                <?php //echo $_POST['jashnvareh']
                                ?><!--">-->
                                <!--                                    <input type="submit" value="دریافت خروجی اکسل" name="exp_asar_rates_excel"-->
                                <!--                                           style="padding: 6px;font-size: 14px">-->
                                <!--                                </form>-->
                            </h3>
                        </div>
                    </div>
                </section>
            </div>
        </center>
    <?php endif; ?>
<?php endif;
include_once __DIR__ . '/footer.php'; ?>