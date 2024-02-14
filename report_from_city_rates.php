<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2):
    $head = $_SESSION['head'];
    if ($head == 2) {
        $state = $_SESSION['city'];
    }
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
                                } ?> value="">همه گروه‌ها
                                </option>
                                <?php
                                $query = mysqli_query($connection, "select distinct groupelmi from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi");
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
                                } ?> value="">بدون فیلتر
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
                            <?php
                            if ($head == 1):
                                ?>
                                استان:
                                <select name="state">
                                    <option <?php if (@$_POST['state'] == 'همه استان‌ها') {
                                        echo 'selected';
                                    } ?> value="">همه استان‌ها
                                    </option>
                                    <?php
                                    $query = mysqli_query($connection, "select distinct ostantahsili from etelaat_p where ostantahsili is not null and ostantahsili!='' order by ostantahsili");
                                    foreach ($query as $ostantahsili):
                                        ?>
                                        <option <?php if (@$_POST['state'] == $ostantahsili['ostantahsili']) {
                                            echo 'selected';
                                        } ?>><?php echo $ostantahsili['ostantahsili'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                            <br/><br/>
                            شهرستان:
                            <select name="city">
                                <option <?php if (@$_POST['city'] == 'همه شهرستان‌ها') {
                                    echo 'selected';
                                } ?> value="">همه شهرستان‌ها
                                </option>
                                <?php
                                if ($head == 1) {
                                    $query = mysqli_query($connection, "select distinct shahrtahsili from etelaat_p where ostantahsili is not null and ostantahsili!='' and shahrtahsili is not null and shahrtahsili!='' order by shahrtahsili");
                                } elseif ($head == 2) {
                                    $query = mysqli_query($connection, "select distinct shahrtahsili from etelaat_p where ostantahsili='$state' order by shahrtahsili");
                                }
                                foreach ($query as $shahrtahsili):
                                    ?>
                                    <option <?php if (@$_POST['city'] == $shahrtahsili['shahrtahsili']) {
                                        echo 'selected';
                                    } ?> value="<?php echo $shahrtahsili['shahrtahsili'] ?>"><?php echo $shahrtahsili['shahrtahsili'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            مدرسه:
                            <select name="school">
                                <option <?php if (@$_POST['school'] == 'همه مدارس') {
                                    echo 'selected';
                                } ?> value="">همه مدارس
                                </option>
                                <?php
                                if ($head == 1) {
                                    $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili is not null and ostantahsili!='' and madrese is not null and madrese!='' order by madrese");
                                } elseif ($head == 2) {
                                    $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili='$state' and madrese is not null and madrese!='' order by madrese");
                                }
                                foreach ($query as $madrese):
                                    ?>
                                    <option <?php if (@$_POST['school'] == $madrese['madrese']) {
                                        echo 'selected';
                                    } ?>><?php echo $madrese['madrese'] ?></option>
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
    if ($head == 1) {
        $state = $_POST['state'];
    } elseif ($head == 2) {
        $state = $_SESSION['city'];
    }
    $city = $_POST['city'];
    $school = $_POST['school'];
    $query="select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.vaziatkarnamemadrese is not null and vaziatkarnamemadrese!='' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_p.master!='هست' and etelaat_a.nobat_arzyabi_madrese!='' ";
    if ($state!=null){
        $query.=" and etelaat_p.ostantahsili='$state'";
    }
    if ($groupelmi!=null){
        $query.="and etelaat_a.groupelmi='$groupelmi' ";
    }
    if ($gender!=null){
        $query.="and etelaat_p.gender='$gender' ";
    }
    if ($city!=null){
        $query.="and etelaat_p.shahrtahsili='$city' ";
    }
    if ($school!=null){
        $query.="and etelaat_p.madrese='$school' ";
    }
    $query.=";";
    ?>
    <center>
        <div class="row" style="overflow-x: auto">
            <section class="col-lg-12 col-md-12" style="overflow-x: auto">
                <div class="box box-success" style="overflow-x: auto">
                    <div class="box-header" style="overflow-x: auto">
                        <h3 class="box-title" style="overflow-x: auto">

                            <?php
                            $sql = mysqli_query($connection, $query);
                            $values=mysqli_fetch_array($sql);
                            if (empty($values)):
                                ?>
                                <section class="col-lg-12 col-md-12">
                                    <div class="box-header">
                                        <h3 class="box-title">
                                            اثری برای نمایش وجود ندارد.
                                        </h3>
                                    </div>
                                </section>
                            <?php else: ?>
                                <table style="border-bottom: 2px solid black;overflow-x: auto">

                                    <tr style="font-size: 14px;border-bottom: 2px solid green;">
                                        <th>ردیف</th>
                                        <th>کد اثر</th>
                                        <th>نام اثر</th>
                                        <th>نویسنده</th>
                                        <th>جنسیت</th>
                                        <th>قالب/سطح</th>
                                        <th>گروه علمی</th>
                                        <?php if ($head == 1): ?>
                                            <th>استان</th>
                                        <?php endif; ?>
                                        <th>شهرستان</th>
                                        <th>مدرسه</th>
                                        <th>وضعیت ارزیابی</th>
                                        <th>ارزیاب و امتیاز ارزیابی اجمالی</th>
                                        <th>ارزیاب و امتیاز تفصیلی اول</th>
                                        <th>ارزیاب و امتیاز تفصیلی دوم</th>
                                        <th>ارزیاب و امتیاز تفصیلی سوم</th>
                                        <th>امتیاز نهایی</th>
                                    </tr>
                                    <?php
                                    foreach ($sql as $key=>$values):
                                        $coderater = null;
                                        ?>

                                        <tr style="font-size: 15px;border-bottom: 2px solid black">
                                            <td style="padding: 10px">
                                                <?php echo ++$key;?>
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
                                                <?php echo $values['fname'] . ' ' . $values['family'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['gender'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['ghalebpazhouhesh'] . ' ' . $values['satharzyabi'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php echo $values['groupelmi'] ?>
                                            </td>
                                            <?php if ($head == 1): ?>
                                                <td>
                                                    <?php echo $values['ostantahsili'] ?>
                                                </td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <?php echo $values['shahrtahsili'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $values['madrese'] ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                if (($values['fileasar'] == null and $values['fileasar_word'] == null)) {
                                                    echo 'فایل بارگذاری نشده';
                                                } elseif (($values['fileasar'] == null or $values['fileasar_word'] == null) and $values['approve_sianat'] == 2) {
                                                    echo $values['ellatnadashtansharayet'];
                                                } elseif ($values['vaziatkarnamemadrese'] == 'در حال ارزیابی' and ($values['nobat_arzyabi_madrese'] != null or $values['nobat_arzyabi_madrese'] != '')) {
                                                    echo 'در حال ارزیابی در مدرسه';
                                                } elseif (($values['jamemtiazmadrese'] != null or $values['jamemtiazmadrese'] != '') and (($values['jamemtiazmadrese'] < 75 and $values['bakhshvizheh'] == 'هست') or ($values['jamemtiazmadrese'] < 80 and $values['bakhshvizheh'] == 'نیست'))) {
                                                    echo 'رد اثر در مدرسه';
                                                } elseif ($values['approve_sianat'] == 2 and $values['ellatnadashtansharayet'] == 'عدم اتمام فرایند ارزیابی در مرحله مدرسه ای') {
                                                    echo 'عدم اتمام فرایند ارزیابی در مرحله مدرسه ای';
                                                } elseif ($values['approve_sianat'] == 2 and $values['ellatnadashtansharayet'] == 'عدم اتمام فرایند ارزیابی در مرحله استانی') {
                                                    echo 'عدم اتمام فرایند ارزیابی در مرحله استانی';
                                                } else {
                                                    echo $values['nobat_arzyabi_madrese'] . ' (' . $values['vaziatkarnamemadrese'] . ')';
                                                }
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $selectfromejmalimadrese = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar' and jam is not null");
                                                $ejm=mysqli_fetch_array($selectfromejmalimadrese);
                                                $coderater = @$ejm['rater_id'];
                                                $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                $ejr=mysqli_fetch_array($sql);
                                                echo @$ejr['name'] . ' ' . @$ejr['family'];
                                                echo ' - ' . @$ejm['jam'];
                                                @$ejm['jam'] = null;
                                                @$ejm['rater_id'] = null;
                                                @$coderater = null;
                                                @$ejr['name'] = null;
                                                @$ejr['family'] = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php

                                                $selectfromtafsili1madrese = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar' and jam is not null");
                                                $t1m=mysqli_fetch_array($selectfromtafsili1madrese);
                                                $coderater = @$t1m['rater_id'];
                                                $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                $t1r=mysqli_fetch_array($sql);
                                                echo @$t1r['name'] . ' ' . @$t1r['family'];
                                                echo ' - ' . @$t1m['jam'];
                                                @$t1m['jam'] = null;
                                                @$t1m['rater_id'] = null;
                                                @$coderater = null;
                                                @$t1r['name'] = null;
                                                @$t1r['family'] = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $selectfromtafsili2madrese = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar' and jam is not null");
                                                $t2m=mysqli_fetch_array($selectfromtafsili2madrese);
                                                $coderater = @$t2m['rater_id'];
                                                $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                $t2r=mysqli_fetch_array($sql);
                                                echo @$t2r['name'] . ' ' . @$t2r['family'];
                                                echo ' - ' . @$t2m['jam'];
                                                @$t2m['jam'] = null;
                                                @$t2m['rater_id'] = null;
                                                @$coderater = null;
                                                @$t2r['name'] = null;
                                                @$t2r['family'] = null;
                                                ?>
                                            </td>
                                            <td style="padding: 10px">
                                                <?php
                                                $selectfromtafsili3madrese = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar' and jam is not null");
                                                $t3m=mysqli_fetch_array($selectfromtafsili3madrese);
                                                $coderater = @$t3m['rater_id'];
                                                $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                $t3r=mysqli_fetch_array($sql);
                                                echo @$t3r['name'] . ' ' . @$t3r['family'];
                                                echo ' - ' . @$t3m['jam'];
                                                @$t3m['jam'] = null;
                                                @$t3m['rater_id'] = null;
                                                @$coderater = null;
                                                @$t3r['name'] = null;
                                                @$t3r['family'] = null;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $values['jamemtiazmadrese'];
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </table>
                            <?php endif; ?>

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