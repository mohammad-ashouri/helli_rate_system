<?php
include_once 'header.php';
if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)):
if ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null) {
    @$state = 'قم';
    @$city = 'قم';
    $_SESSION['shahr_name'] = 'قم';
    $groupname = $_SESSION['groupname'];
} else {
    @$state = $_SESSION['city'];
    @$city = $_SESSION['shahr_name'];
    @$school = $_SESSION['school'];
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
    <section class="content">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-solid box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            ویرایش ارزیابی های تفصیلی اول
                            (برای ویرایش ارزیابی بر روی کد اثر کلیک کنید)
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row" style="overflow-x: auto">
                            <?php
                            switch ($_SESSION['head']) {
                                case 0:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a 
                                                                            inner join tafsili1_ostan on etelaat_a.codeasar=tafsili1_ostan.codeasar
                                                                            inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar                                                                            
                                                                            where etelaat_a.approve_sianat=0
                                                                              and (etelaat_a.codearzyabtafsili2_ostani is null or etelaat_a.codearzyabtafsili2_ostani='') 
                                                                              and tafsili1_ostan.jam is not null 
                                                                              and etelaat_p.ostantahsili='$state'
                                                                              and ((etelaat_a.nobat_arzyabi_ostani='تفصیلی دوم' and etelaat_a.vaziatkarnameostani='در حال ارزیابی') or (etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='اتمام ارزیابی'))
                                                                              and etelaat_a.groupelmi='$groupname'
                                                                              order by etelaat_a.groupelmi asc,etelaat_a.codeasar asc");
                                    break;
                                case 2:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a 
                                                                            inner join tafsili1_ostan on etelaat_a.codeasar=tafsili1_ostan.codeasar
                                                                            inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar                                                                            
                                                                            where etelaat_a.approve_sianat=0
                                                                              and (etelaat_a.codearzyabtafsili2_ostani is null or etelaat_a.codearzyabtafsili2_ostani='') 
                                                                              and tafsili1_ostan.jam is not null 
                                                                              and ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state'))
                                                                              and ((etelaat_a.nobat_arzyabi_ostani='تفصیلی دوم' and etelaat_a.vaziatkarnameostani='در حال ارزیابی') or (etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='اتمام ارزیابی'))
                                                                              order by etelaat_a.groupelmi asc,etelaat_a.codeasar asc");
                                    break;
                                case 3:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a 
                                                                            inner join tafsili1_madrese on etelaat_a.codeasar=tafsili1_madrese.codeasar
                                                                            inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar                                                                            
                                                                            where etelaat_a.approve_sianat=0
                                                                              and (etelaat_a.codearzyabtafsili2_madrese is null or etelaat_a.codearzyabtafsili2_madrese='') 
                                                                              and tafsili1_madrese.jam is not null 
                                                                              and etelaat_p.ostantahsili='$state'
                                                                              and etelaat_p.shahrtahsili='$city'
                                                                              and etelaat_p.madrese='$school'
                                                                              and ((etelaat_a.nobat_arzyabi_madrese='تفصیلی دوم' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی') or (etelaat_a.nobat_arzyabi_madrese='تفصیلی اول' and etelaat_a.vaziatkarnamemadrese='اتمام ارزیابی'))
                                                                              order by etelaat_a.groupelmi asc,etelaat_a.codeasar asc");
                                    break;
                            }
                            ?>
                            <table id="myTable3" class="table table-bordered table-striped text-center">
                                <tr>
                                    <th>ردیف</th>
                                    <th>کد اثر</th>
                                    <th>نام اثر</th>
                                    <th>قالب پژوهش و سطح ارزیابی</th>
                                    <th>گروه علمی</th>
                                    <th>ارزیاب و امتیاز اجمالی</th>
                                    <th>ارزیاب و امتیاز تفصیلی اول</th>
                                </tr>
                                <?php
                                $a = 1;
                                foreach ($result as $row) :?>
                                    <form method="post" action="tafsili1.php">
                                        <tr>
                                            <td><?php echo $a;
                                                $a++; ?></td>
                                            <?php if ($_SESSION['head'] == 2 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>
                                                <td>
                                                    <input style="padding: 5px;" type="submit" name="editt1o"
                                                           value="<?php echo $row['codeasar']; ?>">
                                                    <input type="hidden" name="subjection" value="editt1o">
                                                </td>
                                            <?php elseif ($_SESSION['head'] == 3): ?>
                                                <td>
                                                    <input style="padding: 5px;" type="submit" name="editt1m"
                                                           value="<?php echo $row['codeasar']; ?>">
                                                    <input type="hidden" name="subjection" value="editt1m">
                                                </td>
                                            <?php endif; ?>

                                            <td><a href="<?php if ($row['fileasar'] == 'dist/files/asar_files/') {
                                                    echo $row['fileasar_word'];
                                                } else {
                                                    echo $row['fileasar'];
                                                } ?>" target="_blank">
                                                    <label style="width: 300px">
                                                        <?php echo $row['nameasar']; ?>
                                                    </label>
                                                </a></td>
                                            <td><?php echo $row['ghalebpazhouhesh'] . " سطح " . $row['satharzyabi']; ?></td>
                                            <td><?php echo $row['groupelmi'] ?></td>
                                            <td>
                                                <?php
                                                switch ($_SESSION['head']) {
                                                    case 0:
                                                    case 2:
                                                        $codeasar = $row['codeasar'];
                                                        $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                                        foreach ($query as $ejmali_items) {
                                                        }
                                                        $rater_user = $ejmali_items['rater_id'];
                                                        $query = mysqli_query($connection, "select * from rater_list where username='$rater_user'");
                                                        foreach ($query as $ejmali_rater) {
                                                        }
                                                        break;
                                                    case 3:
                                                        $codeasar = $row['codeasar'];
                                                        $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                                        foreach ($query as $ejmali_items) {
                                                        }
                                                        $rater_user = $ejmali_items['rater_id'];
                                                        $query = mysqli_query($connection, "select * from rater_list where username='$rater_user'");
                                                        foreach ($query as $ejmali_rater) {
                                                        }
                                                        break;
                                                }
                                                echo $ejmali_rater['name'] . ' ' . $ejmali_rater['family'] . ' - ' . $ejmali_items['jam'];
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                switch ($_SESSION['head']) {
                                                    case 0:
                                                    case 2:
                                                        $codeasar = $row['codeasar'];
                                                        $query = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar'");
                                                        foreach ($query as $tafsili1_items) {
                                                        }
                                                        $rater_user = $tafsili1_items['rater_id'];
                                                        $query = mysqli_query($connection, "select * from rater_list where username='$rater_user'");
                                                        foreach ($query as $tafsili1_rater) {
                                                        }
                                                        break;
                                                    case 3:
                                                        $codeasar = $row['codeasar'];
                                                        $query = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar'");
                                                        foreach ($query as $tafsili1_items) {
                                                        }
                                                        $rater_user = $tafsili1_items['rater_id'];
                                                        $query = mysqli_query($connection, "select * from rater_list where username='$rater_user'");
                                                        foreach ($query as $tafsili1_rater) {
                                                        }
                                                        break;
                                                }
                                                echo $tafsili1_rater['name'] . ' ' . $tafsili1_rater['family'] . ' - ' . $tafsili1_items['jam'];
                                                ?>
                                            </td>
                                        </tr>
                                    </form>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once 'footer.php';
    ?>
