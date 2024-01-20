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
                            ویرایش ارزیابی های اجمالی
                            (برای ویرایش ارزیابی بر روی کد اثر کلیک کنید)
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row" style="overflow-x: auto">
                            <?php
                            $last_jashnvareh = mysqli_query($connection, "select jashnvareh from etelaat_a order by jashnvareh desc limit 1");
                            foreach ($last_jashnvareh as $item) {
                            }
                            $last_jashnvareh = $item['jashnvareh'];
                            switch ($_SESSION['head']) {
                                case 0:
                                    switch ($_SESSION['shahr_name']) {
                                        default:
                                            $result = mysqli_query($connection, "SELECT * FROM etelaat_a 
                                                                            inner join ejmali_ostan on etelaat_a.codeasar=ejmali_ostan.codeasar
                                                                            inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar                                                                            
                                                                            where etelaat_a.jashnvareh='$last_jashnvareh'
                                                                             and etelaat_a.approve_sianat=0
                                                                              and ((etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and (etelaat_a.codearzyabtafsili1_ostani is null or etelaat_a.codearzyabtafsili1_ostani=''))  or etelaat_a.nobat_arzyabi_ostani='اجمالی ردی')
                                                                              and ejmali_ostan.jam is not null 
                                                                              and (etelaat_a.nobat_arzyabi_ostani='تفصیلی اول'  or etelaat_a.nobat_arzyabi_ostani='اجمالی ردی')
                                                                                and etelaat_p.ostantahsili='$state'
                                                                              and etelaat_a.groupelmi='$groupname'
                                                                              order by etelaat_a.groupelmi asc");
                                            break;
                                    }
                                    break;
                                case 2:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a 
                                                                            inner join ejmali_ostan on etelaat_a.codeasar=ejmali_ostan.codeasar
                                                                            inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar                                                                            
                                                                            where etelaat_a.jashnvareh='$last_jashnvareh'
                                                                             and etelaat_a.approve_sianat=0
                                                                              and ((etelaat_a.nobat_arzyabi_ostani='تفصیلی اول' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and (etelaat_a.codearzyabtafsili1_ostani is null or etelaat_a.codearzyabtafsili1_ostani=''))  or etelaat_a.nobat_arzyabi_ostani='اجمالی ردی')
                                                                              and ejmali_ostan.jam is not null 
                                                                              and (etelaat_a.nobat_arzyabi_ostani='تفصیلی اول'  or etelaat_a.nobat_arzyabi_ostani='اجمالی ردی')
                                                                              and ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state'))
                                                                              order by etelaat_a.groupelmi asc");
                                    break;
                                case 3:
                                    $result = mysqli_query($connection, "SELECT * FROM etelaat_a 
                                                                            inner join ejmali_madrese on etelaat_a.codeasar=ejmali_madrese.codeasar
                                                                            inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar                                                                            
                                                                            where etelaat_a.jashnvareh='$last_jashnvareh'
                                                                             and etelaat_a.approve_sianat=0
                                                                              and ejmali_madrese.jam is not null 
                                                                              and ((etelaat_a.nobat_arzyabi_madrese='تفصیلی اول' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and (etelaat_a.codearzyabtafsili1_madrese is null or etelaat_a.codearzyabtafsili1_madrese=''))  or etelaat_a.nobat_arzyabi_madrese='اجمالی ردی')
                                                                                and etelaat_p.ostantahsili='$state'
                                                                                and etelaat_p.madrese='$school'
                                                                                and etelaat_p.shahrtahsili='$city'
                                                                              order by etelaat_a.groupelmi asc");
                                    break;
                            }
                            ?>
                            <table id="myTable3" class="arzyabinashodetable">
                                <tr>
                                    <th>ردیف</th>
                                    <th>کد اثر</th>
                                    <th>نام اثر</th>
                                    <th>قالب پژوهش و سطح ارزیابی</th>
                                    <th>گروه علمی</th>
                                    <th>ارزیاب اجمالی</th>
                                    <th>امتیاز اجمالی</th>
                                </tr>
                                <?php
                                $a = 1;
                                foreach ($result as $row1) :?>
                                    <form method="post" action="sabt-arzyabi-ejmali.php" target="_blank">
                                        <tr>
                                            <td><?php echo $a;
                                                $a++; ?></td>
                                            <?php if ($_SESSION['head'] == 2 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>
                                                <td>
                                                    <input style="padding: 5px;" type="submit" name="editeo"
                                                           value="<?php echo $row1['codeasar']; ?>">
                                                    <input type="hidden" name="subjection" value="editeo">
                                                </td>
                                            <?php elseif ($_SESSION['head'] == 3): ?>
                                                <td>
                                                    <input style="padding: 5px;" type="submit" name="editem"
                                                           value="<?php echo $row1['codeasar']; ?>">
                                                    <input type="hidden" name="subjection" value="editem">
                                                </td>
                                            <?php endif; ?>

                                            <td><label style="width: 400px"><?php echo $row1['nameasar']; ?></label>
                                            </td>
                                            <td><?php echo $row1['ghalebpazhouhesh'] . " سطح " . $row1['satharzyabi']; ?></td>
                                            <td><?php echo $row1['groupelmi'] ?></td>
                                            <td>
                                                <?php
                                                switch ($_SESSION['head']) {
                                                    case 2:
                                                    case 0:
                                                        $codeasar = $row1['codeasar'];
                                                        $query = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar'");
                                                        foreach ($query as $ejmali_items) {
                                                        }
                                                        $rater_user = $ejmali_items['rater_id'];
                                                        $query = mysqli_query($connection, "select * from rater_list where username='$rater_user'");
                                                        foreach ($query as $ejmali_rater) {
                                                        }
                                                        break;
                                                    case 3:
                                                        $codeasar = $row1['codeasar'];
                                                        $query = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar'");
                                                        foreach ($query as $ejmali_items) {
                                                        }
                                                        $rater_user = $ejmali_items['rater_id'];
                                                        $query = mysqli_query($connection, "select * from rater_list where username='$rater_user'");
                                                        foreach ($query as $ejmali_rater) {
                                                        }
                                                        break;
                                                }

                                                echo $ejmali_rater['name'] . ' ' . $ejmali_rater['family'];
                                                ?>
                                            </td>
                                            <td><?php echo $ejmali_items['jam']; ?></td>

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
