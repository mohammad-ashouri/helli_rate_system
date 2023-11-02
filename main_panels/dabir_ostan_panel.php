<?php
@$state = $_SESSION['city'];
@$city_name = $_SESSION['shahr_name'];
?>
<section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-warning collapsed-box">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class='box-title'>
                        لیست آثاری که برای ارزیاب اجمالی ارسال شده و ارزیابی آنها ثبت نشده است
                    </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                    class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body" style="overflow-x: auto">


                    <div class="row">
                        <?php
                        $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabejmali_ostani is not null and etelaat_a.codearzyabejmali_ostani!='' and etelaat_p.ostantahsili='$state' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='ارزیابی اجمالی' order by etelaat_a.groupelmi asc");
                        ?>

                        <table id="myTable2" class="arzyabinashodetable">
                            <tr>
                                <th>ردیف</th>
                                <th onclick="sortTable(0)">&nbsp;&nbsp;&nbsp;&nbsp;کد اثر</th>
                                <th onclick="sortTable(1)">نام اثر</th>
                                <th onclick="sortTable(2)">کد ارزیاب</th>
                                <th onclick="sortTable(3)">نام و نام خانوادگی ارزیاب</th>
                                <th onclick="sortTable(4)">گروه علمی اثر</th>

                            </tr>

                            <?php
                            $a = 1;
                            foreach ($query as $ejmalinotrated):

                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ejmalinotrated['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $ejmalinotrated['nameasar']; ?></label>
                                    </td>
                                    <td><?php echo $ejmalinotrated['codearzyabejmali_ostani'] ?></td>
                                    <td><?php
                                        $coderater = $ejmalinotrated['codearzyabejmali_ostani'];
                                        $query = mysqli_query($connection, "select * from rater_list where code='$coderater'");
                                        foreach ($query as $raterinfo) {
                                        }
                                        echo $raterinfo['name'] . ' ' . $raterinfo['family']; ?></td>
                                    <td><?php echo $ejmalinotrated['groupelmi'] ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </table>


                    </div>
                </div>


        </section>
    </div>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-success collapsed-box">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class='box-title'>
                        لیست آثاری که برای ارزیاب تفصیلی اول ارسال شده و ارزیابی آنها ثبت نشده است
                    </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                    class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body" style="overflow-x: auto">


                    <div class="row">
                        <?php
                        $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili1_ostani is not null and etelaat_a.codearzyabtafsili1_ostani!='' and etelaat_p.ostantahsili='$state' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی اول' order by etelaat_a.groupelmi asc");
                        ?>


                        <table id="myTable1" class="arzyabinashodetable">
                            <tr>
                                <th>ردیف</th>
                                <th onclick="sortTable(0)">&nbsp;&nbsp;&nbsp;&nbsp;کد اثر</th>
                                <th onclick="sortTable(1)">نام اثر</th>
                                <th onclick="sortTable(2)">کد ارزیاب</th>
                                <th onclick="sortTable(3)">نام و نام خانوادگی ارزیاب</th>
                                <th onclick="sortTable(4)">گروه علمی اثر</th>

                            </tr>
                            <?php
                            $a = 1;
                            foreach ($query as $tafsili1notrated):

                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tafsili1notrated['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $tafsili1notrated['nameasar']; ?></label>

                                    </td>
                                    <td><?php echo $tafsili1notrated['codearzyabtafsili1_ostani'] ?></td>
                                    <td><?php
                                        $coderater = $tafsili1notrated['codearzyabtafsili1_ostani'];
                                        $query = mysqli_query($connection, "select * from rater_list where code='$coderater'");
                                        foreach ($query as $raterinfo) {
                                        }
                                        echo $raterinfo['name'] . ' ' . $raterinfo['family']; ?></td>
                                    <td><?php echo $tafsili1notrated['groupelmi'] ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </table>


                    </div>
                </div>


        </section>
    </div>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-primary collapsed-box">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class='box-title'>
                        لیست آثاری که برای ارزیاب تفصیلی دوم ارسال شده و ارزیابی آنها ثبت نشده است
                    </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                    class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body" style="overflow-x: auto">


                    <div class="row">
                        <?php
                        switch ($city_name) {
                            case 'کاشان':
                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili2_ostani and etelaat_a.codearzyabtafsili2_ostani!='' is not null and etelaat_p.shahrtahsili='کاشان' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی دوم' order by etelaat_a.groupelmi asc");
                                break;
                            case 'بناب':
                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili2_ostani and etelaat_a.codearzyabtafsili2_ostani!='' is not null and etelaat_p.shahrtahsili='بناب' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی دوم' order by etelaat_a.groupelmi asc");
                                break;
                            default:
                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili2_ostani and etelaat_a.codearzyabtafsili2_ostani!='' is not null and etelaat_p.ostantahsili='$state' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی دوم' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' order by etelaat_a.groupelmi asc");
                                break;
                        }

                        ?>


                        <table id="myTable2" class="arzyabinashodetable">
                            <tr>
                                <th>ردیف</th>
                                <th onclick="sortTable(0)">&nbsp;&nbsp;&nbsp;&nbsp;کد اثر</th>
                                <th onclick="sortTable(1)">نام اثر</th>
                                <th onclick="sortTable(2)">کد ارزیاب</th>
                                <th onclick="sortTable(3)">نام و نام خانوادگی ارزیاب</th>
                                <th onclick="sortTable(4)">گروه علمی اثر</th>

                            </tr>

                            <?php
                            $a = 1;
                            foreach ($query as $tafsili2notrated):

                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tafsili2notrated['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $tafsili2notrated['nameasar']; ?></label>

                                    </td>
                                    <td><?php echo $tafsili2notrated['codearzyabtafsili2_ostani'] ?></td>
                                    <td><?php
                                        $coderater = $tafsili2notrated['codearzyabtafsili2_ostani'];
                                        $query = mysqli_query($connection, "select * from rater_list where code='$coderater'");
                                        foreach ($query as $raterinfo) {
                                        }
                                        echo $raterinfo['name'] . ' ' . $raterinfo['family']; ?></td>
                                    <td><?php echo $tafsili2notrated['groupelmi'] ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </table>


                    </div>
                </div>


        </section>
    </div>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-danger collapsed-box">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class='box-title'>
                        لیست آثاری که برای ارزیاب تفصیلی سوم ارسال شده و ارزیابی آنها ثبت نشده است
                    </h3>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                    class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body" style="overflow-x: auto">


                    <div class="row">
                        <?php

                        switch ($city_name) {
                            case 'کاشان':
                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili3_ostani is not null and etelaat_a.codearzyabtafsili3_ostani!='' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی سوم' order by etelaat_a.groupelmi asc");
                                break;
                            case 'بناب':
                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili3_ostani is not null and etelaat_a.codearzyabtafsili3_ostani!='' and etelaat_p.shahrtahsili='بناب' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی سوم' order by etelaat_a.groupelmi asc");
                                break;
                            default:
                                $query = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codearzyabtafsili3_ostani is not null and etelaat_a.codearzyabtafsili3_ostani!='' and etelaat_p.ostantahsili='$state' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and nobat_arzyabi_ostani='تفصیلی سوم' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' order by etelaat_a.groupelmi asc");
                                break;
                        }
                        ?>
                        <table id="myTable3" class="arzyabinashodetable">
                            <tr>
                                <th>ردیف</th>
                                <th onclick="sortTable(0)">&nbsp;&nbsp;&nbsp;&nbsp;کد اثر</th>
                                <th onclick="sortTable(1)">نام اثر</th>
                                <th onclick="sortTable(2)">کد ارزیاب</th>
                                <th onclick="sortTable(3)">نام و نام خانوادگی ارزیاب</th>
                                <th onclick="sortTable(4)">گروه علمی اثر</th>
                            </tr>
                            <?php
                            $a = 1;
                            foreach ($query as $tafsili3notrated):
                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tafsili3notrated['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $tafsili3notrated['nameasar']; ?></label>
                                    </td>
                                    <td><?php echo $tafsili3notrated['codearzyabtafsili3_ostani'] ?></td>
                                    <td><?php
                                        $coderater = $tafsili3notrated['codearzyabtafsili3_ostani'];
                                        $query = mysqli_query($connection, "select * from rater_list where code='$coderater'");
                                        foreach ($query as $raterinfo) {
                                        }
                                        echo $raterinfo['name'] . ' ' . $raterinfo['family']; ?></td>
                                    <td><?php echo $tafsili3notrated['groupelmi'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
        </section>
    </div>
</section>


<?php
//پنل اصلی ارزیابی اجمالی و تفصیلی استانی
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabejmali_ostani`='$coderater' and nobat_arzyabi_ostani='ارزیابی اجمالی' and vaziatkarnameostani='در حال ارزیابی'");
foreach ($result as $binoe) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili1_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی اول' and vaziatkarnameostani='در حال ارزیابی'");
foreach ($result as $bino1) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili2_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی دوم' and vaziatkarnameostani='در حال ارزیابی'");
foreach ($result as $bino2) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili3_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی سوم' and vaziatkarnameostani='در حال ارزیابی'");
foreach ($result as $bino3) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabejmali_madrese`='$coderater' and nobat_arzyabi_madrese='ارزیابی اجمالی' and vaziatkarnamemadrese='در حال ارزیابی'");
foreach ($result as $binme) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili1_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی اول' and vaziatkarnamemadrese='در حال ارزیابی'");
foreach ($result as $binm1) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili2_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی دوم' and vaziatkarnamemadrese='در حال ارزیابی'");
foreach ($result as $binm2) {
}
$result = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili3_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی سوم' and vaziatkarnamemadrese='در حال ارزیابی'");
foreach ($result as $binm3) {
}
?>
<section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <?php
                    echo "<h3 class='box-title'>لیست آثاری که ارزیابی اجمالی آنها توسط شما ثبت نشده است</h3>";
                    ?>
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body" style="overflow-x: auto">

                    <center>
                        <table class="arzyabinashodetable2">


                            <?php

                            $coderater = $_SESSION['coderater'];
                            $resultme = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabejmali_madrese`='$coderater' and nobat_arzyabi_madrese='ارزیابی اجمالی' and vaziatkarnamemadrese='در حال ارزیابی'");
                            ?>
                            <?php
                            $a = 1;
                            foreach ($resultme as $meitems): ?>
                                <tr>
                                    <td>
                                        <br/>

                                        <form action="sabt-arzyabi-ejmali.php" method="post">
                                            <a style="width: available" target="_blank"
                                               href="<?php if ($meitems['fileasar'] == 'dist/files/asar_files/') {
                                                   echo $meitems['fileasar_word'];
                                               } else {
                                                   echo $meitems['fileasar'];
                                               } ?>">
                                                <label style="width: auto"><?php echo $a . "- " . $meitems['nameasar'];
                                                    $a++; ?></label>
                                            </a>
                                            <br/>
                                            <label style="width: 90%;"><?php
                                                echo $meitems['ghalebpazhouhesh'] . " سطح " . $meitems['satharzyabi'] . "<br>" . " گروه علمی " . $meitems['groupelmi'] ?></label>
                                            <br/><br/>
                                            <input type="hidden" name="code"
                                                   value="<?php echo $meitems['codeasar']; ?>">
                                            <input type="hidden" name="subjection" value="schoolejmali">
                                            <input type="hidden" name="coderater"
                                                   value="<?php echo $_SESSION['coderater']; ?>">

                                            <input style="padding: 5px" name="submit" type="submit"
                                                   value="ثبت ارزیابی اجمالی">
                                        </form>

                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            <?php
                            $resultoe = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabejmali_ostani`='$coderater' and nobat_arzyabi_ostani='ارزیابی اجمالی' and vaziatkarnameostani='در حال ارزیابی'");
                            foreach ($resultoe as $oeitems): ?>
                                <tr>
                                    <td>
                                        <br/>

                                        <form action="sabt-arzyabi-ejmali.php" method="post">
                                            <a style="width: available" target="_blank"
                                               href="<?php if ($oeitems['fileasar'] == 'dist/files/asar_files/') {
                                                   echo $oeitems['fileasar_word'];
                                               } else {
                                                   echo $oeitems['fileasar'];
                                               } ?>">
                                                <label style="width: auto"><?php echo $a . "- " . $oeitems['nameasar'];
                                                    $a++; ?></label>
                                            </a>
                                            <br/>
                                            <label style="width: 90%;"><?php
                                                echo $oeitems['ghalebpazhouhesh'] . " سطح " . $oeitems['satharzyabi'] . "<br>" . " گروه علمی " . $oeitems['groupelmi'] ?></label>
                                            <br/><br/>
                                            <input type="hidden" name="code"
                                                   value="<?php echo $oeitems['codeasar']; ?>">
                                            <input type="hidden" name="subjection" value="stateejmali">
                                            <input type="hidden" name="coderater"
                                                   value="<?php echo $_SESSION['coderater']; ?>">

                                            <input style="padding: 5px" name="submit" type="submit"
                                                   value="ثبت ارزیابی اجمالی">
                                        </form>

                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </table>
                    </center>

                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <section class="col-lg-12 col-md-12">
                    <div class="box box-solid box-warning">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <?php
                            echo "<h3 class='box-title'>لیست آثاری که ارزیابی تفصیلی آن ها توسط شما ثبت نشده است</h3>";
                            ?>
                            <!-- tools box -->
                            <div class="pull-left box-tools">
                                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body" style="overflow-x: auto">

                            <center>
                                <table class="arzyabinashodetable2">


                                    <?php

                                    $coderater = $_SESSION['coderater'];
                                    $resultmt1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili1_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی اول' and vaziatkarnamemadrese='در حال ارزیابی'");
                                    $resultmt2 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili2_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی دوم' and vaziatkarnamemadrese='در حال ارزیابی'");
                                    $resultmt3 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili3_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی سوم' and vaziatkarnamemadrese='در حال ارزیابی'");
                                    $resultot1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili1_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی اول' and vaziatkarnameostani='در حال ارزیابی'");
                                    $resultot2 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili2_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی دوم' and vaziatkarnameostani='در حال ارزیابی'");
                                    $resultot3 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili3_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی سوم' and vaziatkarnameostani='در حال ارزیابی'");
                                    ?>
                                    <?php
                                    $a = 1;
                                    foreach ($resultmt1 as $bin):
                                        ?>
                                        <tr>
                                            <td>
                                                <br/>
                                                <form action="tafsili1.php" method="post">
                                                    <a style="width: available" target="_blank"
                                                       href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                           echo $bin['fileasar_word'];
                                                       } else {
                                                           echo $bin['fileasar'];
                                                       } ?>">
                                                        <label style="width: auto"><?php echo $a . "- " . $bin['nameasar'];
                                                            $a++; ?></label>
                                                    </a>
                                                    <br/>
                                                    <label style="width: 90%;"><?php
                                                        echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <input type="hidden" name="subjection" value="schoolt1">

                                                    <input style="padding: 5px" name="submit" type="submit"
                                                           value="ثبت ارزیابی تفصیلی">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                    foreach ($resultmt2 as $bin):
                                        ?>
                                        <tr>
                                            <td>
                                                <br/>
                                                <form action="tafsili2.php" method="post">
                                                    <a style="width: available" target="_blank"
                                                       href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                           echo $bin['fileasar_word'];
                                                       } else {
                                                           echo $bin['fileasar'];
                                                       } ?>">
                                                        <label style="width: auto"><?php echo $a . "- " . $bin['nameasar'];
                                                            $a++; ?></label>
                                                    </a>
                                                    <br/>
                                                    <label style="width: 90%;"><?php
                                                        echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <input type="hidden" name="subjection" value="schoolt2">

                                                    <input style="padding: 5px" name="submit" type="submit"
                                                           value="ثبت ارزیابی تفصیلی">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                    foreach ($resultmt3 as $bin):
                                        ?>
                                        <tr>
                                            <td>
                                                <br/>
                                                <form action="tafsili3.php" method="post">
                                                    <a style="width: available" target="_blank"
                                                       href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                           echo $bin['fileasar_word'];
                                                       } else {
                                                           echo $bin['fileasar'];
                                                       } ?>">
                                                        <label style="width: auto"><?php echo $a . "- " . $bin['nameasar'];
                                                            $a++; ?></label>
                                                    </a>
                                                    <br/>
                                                    <label style="width: 90%;"><?php
                                                        echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <input type="hidden" name="subjection" value="schoolt3">

                                                    <input style="padding: 5px" name="submit" type="submit"
                                                           value="ثبت ارزیابی تفصیلی">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                    foreach ($resultot1 as $bin):
                                        ?>
                                        <tr>
                                            <td>
                                                <br/>
                                                <form action="tafsili1.php" method="post">
                                                    <a style="width: available" target="_blank"
                                                       href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                           echo $bin['fileasar_word'];
                                                       } else {
                                                           echo $bin['fileasar'];
                                                       } ?>">
                                                        <label style="width: auto"><?php echo $a . "- " . $bin['nameasar'];
                                                            $a++; ?></label>
                                                    </a>
                                                    <br/>
                                                    <label style="width: 90%;"><?php
                                                        echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <input type="hidden" name="subjection" value="statet1">

                                                    <input style="padding: 5px" name="submit" type="submit"
                                                           value="ثبت ارزیابی تفصیلی">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                    foreach ($resultot2 as $bin):
                                        ?>
                                        <tr>
                                            <td>
                                                <br/>
                                                <form action="tafsili2.php" method="post">
                                                    <a style="width: available" target="_blank"
                                                       href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                           echo $bin['fileasar_word'];
                                                       } else {
                                                           echo $bin['fileasar'];
                                                       } ?>">
                                                        <label style="width: auto"><?php echo $a . "- " . $bin['nameasar'];
                                                            $a++; ?></label>
                                                    </a>
                                                    <br/>
                                                    <label style="width: 90%;"><?php
                                                        echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <input type="hidden" name="subjection" value="statet2">

                                                    <input style="padding: 5px" name="submit" type="submit"
                                                           value="ثبت ارزیابی تفصیلی">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                    foreach ($resultot3 as $bin):
                                        ?>
                                        <tr>
                                            <td>
                                                <br/>
                                                <form action="tafsili3.php" method="post">
                                                    <a style="width: available" target="_blank"
                                                       href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                                           echo $bin['fileasar_word'];
                                                       } else {
                                                           echo $bin['fileasar'];
                                                       } ?>">
                                                        <label style="width: auto"><?php echo $a . "- " . $bin['nameasar'];
                                                            $a++; ?></label>
                                                    </a>
                                                    <br/>
                                                    <label style="width: 90%;"><?php
                                                        echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <input type="hidden" name="subjection" value="statet3">

                                                    <input style="padding: 5px" name="submit" type="submit"
                                                           value="ثبت ارزیابی تفصیلی">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </center>

                        </div>
                    </div>
                </section>
            </div>
        </section>
