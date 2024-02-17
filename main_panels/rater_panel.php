<?php
//پنل اصلی ارزیابان کشوری
$coderater = $_SESSION['coderater'];
$resultejk = mysqli_query($connection, "SELECT * FROM rater_comments_archive inner join etelaat_a on rater_comments_archive.codeasar=etelaat_a.codeasar where rater_comments_archive.comment is null and rater_comments_archive.rater_id='$coderater'");
foreach ($resultejk as $binejk) {
}
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
                    echo "<h3 class='box-title'>لیست آثاری که ارزیابی اجمالی آنها ثبت نشده است</h3>";
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
                        <table class="arzyabinashodetable2">
                            <?php $coderater = $_SESSION['username'];
                            $resultejk = mysqli_query($connection, "SELECT * FROM rater_comments_archive inner join etelaat_a on rater_comments_archive.codeasar=etelaat_a.codeasar where rater_comments_archive.comment is null and rater_comments_archive.rater_id='$coderater' and etelaat_a.nobat_arzyabi='ارزیابی اجمالی' and etelaat_a.vaziatkarname='در حال ارزیابی'");
                            $jscounter = 1;
                            foreach ($resultejk as $bin):
                                ?>
                                <tr>
                                    <td>
                                        <br/>

                                        <form action="build/php/comment_rater.php" method="post"
                                              id="rateejmalikeshvari<?php echo $jscounter ?>"
                                              onsubmit="<?php echo "return validationrateejmalikeshvari('$jscounter')" ?>">
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
                                                $codeasarforselect = $bin['codeasar'];
                                                $selectresult = mysqli_query($connection, "select * from etelaat_a where codeasar='$codeasarforselect'");
                                                foreach ($selectresult as $items) {
                                                }
                                                echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi'] . "<br>" . " گروه علمی " . $bin['groupelmi'] ?></label>
                                            <br/><br/>
                                            <input type="hidden" name="code" value="<?php echo $bin['codeasar']; ?>">
                                            <select style="width: available; overflow-x: auto" name="nazar"
                                                    id="<?php echo "nazar" . $jscounter ?>">
                                                <option selected>انتخاب کنید</option>
                                                <option value="راه‌یابی اثر به مرحله تفصیلی">راه‌یابی اثر به مرحله تفصیلی</option>
                                                <option value="توقف اثر در مرحله اجمالی">توقف اثر در مرحله اجمالی</option>
                                                <option value="نیاز به بررسی بیشتر در گروه">نیاز به بررسی بیشتر در گروه</option>
                                            </select>
                                            <br/><br/>
                                            <textarea id="<?php echo "tozihat" . $jscounter;
                                            $jscounter++; ?>" name="tozihat"
                                                      style="overflow-x: auto;height: 200px; width: 90%"
                                                      placeholder="ارزشیابی توصیفی:(حداقل 100 کاراکتر)"></textarea>
                                            <br/><br/>
                                            <center>
                                                <div class="wrap">
                                                    <input class="btn btn-block btn-success" style="width: 150px"
                                                           name="submitrateraterkeshvari" type="submit"
                                                           value="ثبت ارزیابی"
                                                           onclick="return confirm('ارزیاب گرامی: لطفا در صورت صحت اطلاعات وارد شده، بر روی گزینه OK کلیک کنید')">
                                                </div>
                                            </center>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            
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
                            echo "<h3 class='box-title'>لیست آثاری که ارزیابی تفصیلی آن ها ثبت نشده است</h3>";
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
                                    //keshvari rates
                                    $result1 = mysqli_query($connection, "SELECT * FROM etelaat_a where codearzyabtafsili1='$coderater' and nobat_arzyabi='تفصیلی اول' and vaziatkarname='در حال ارزیابی'");
                                    $result2 = mysqli_query($connection, "SELECT * FROM etelaat_a where codearzyabtafsili2='$coderater' and nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی'");
                                    $result3 = mysqli_query($connection, "SELECT * FROM etelaat_a where codearzyabtafsili3='$coderater' and nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی'");
                                    $resultmt1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili1_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی اول' and vaziatkarnamemadrese='در حال ارزیابی'");
                                    $resultmt2 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili2_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی دوم' and vaziatkarnamemadrese='در حال ارزیابی'");
                                    $resultmt3 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili3_madrese`='$coderater' and nobat_arzyabi_madrese='تفصیلی سوم' and vaziatkarnamemadrese='در حال ارزیابی'");
                                    $resultot1 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili1_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی اول' and vaziatkarnameostani='در حال ارزیابی'");
                                    $resultot2 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili2_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی دوم' and vaziatkarnameostani='در حال ارزیابی'");
                                    $resultot3 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where `codearzyabtafsili3_ostani`='$coderater' and nobat_arzyabi_ostani='تفصیلی سوم' and vaziatkarnameostani='در حال ارزیابی'");
                                    ?>
                                    <?php
                                    $a = 1;
                                    foreach ($result1 as $bin):?>
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
                                                        $codeasarforselect = $bin['codeasar'];
                                                        $queryforselectet_a = "select * from etelaat_a where codeasar='$codeasarforselect'";
                                                        $selectresult = mysqli_query($connection, $queryforselectet_a);
                                                        foreach ($selectresult as $items) {
                                                        }
                                                        echo $items['ghalebpazhouhesh'] . " سطح " . $items['satharzyabi'] . "<br>" . " گروه علمی " . $items['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <center>
                                                        <div class="wrap">
                                                            <input class="btn btn-block btn-success"
                                                                   style="width: 150px" name="submit" type="submit"
                                                                   value="ثبت ارزیابی تفصیلی">
                                                        </div>
                                                    </center>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php
                                    $a = 1;
                                    foreach ($result2 as $bin):?>
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
                                                        $codeasarforselect = $bin['codeasar'];
                                                        $queryforselectet_a = "select * from etelaat_a where codeasar='$codeasarforselect'";
                                                        $selectresult = mysqli_query($connection, $queryforselectet_a);
                                                        foreach ($selectresult as $items) {
                                                        }
                                                        echo $items['ghalebpazhouhesh'] . " سطح " . $items['satharzyabi'] . "<br>" . " گروه علمی " . $items['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <center>
                                                        <div class="wrap">
                                                            <input class="btn btn-block btn-success"
                                                                   style="width: 150px" name="submit" type="submit"
                                                                   value="ثبت ارزیابی تفصیلی">
                                                        </div>
                                                    </center>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                    <?php
                                    foreach ($result3 as $bin): ?>
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
                                                        $codeasarforselect = $bin['codeasar'];
                                                        $queryforselectet_a = "select * from etelaat_a where codeasar='$codeasarforselect'";
                                                        $selectresult = mysqli_query($connection, $queryforselectet_a);
                                                        foreach ($selectresult as $items) {
                                                        }
                                                        echo $items['ghalebpazhouhesh'] . " سطح " . $items['satharzyabi'] . "<br>" . " گروه علمی " . $items['groupelmi'] ?></label>
                                                    <br/><br/>
                                                    <input type="hidden" name="subset"
                                                           value="<?php echo $bin['codeasar']; ?>">
                                                    <input type="hidden" name="coderater"
                                                           value="<?php echo $_SESSION['coderater']; ?>">
                                                    <center>
                                                        <div class="wrap">
                                                            <input class="btn btn-block btn-success"
                                                                   style="width: 150px" name="submit" type="submit"
                                                                   value="ثبت ارزیابی تفصیلی">
                                                        </div>
                                                    </center>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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
                                                    <center>
                                                        <input class="btn btn-block btn-success" style="width: 150px"
                                                               name="submit" type="submit"
                                                               value="ثبت ارزیابی تفصیلی">
                                                    </center>
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
                                                    <center>
                                                        <input class="btn btn-block btn-success" style="width: 150px"
                                                               name="submit" type="submit"
                                                               value="ثبت ارزیابی تفصیلی">
                                                    </center>
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
                                                    <center>
                                                        <input class="btn btn-block btn-success" style="width: 150px"
                                                               name="submit" type="submit"
                                                               value="ثبت ارزیابی تفصیلی">
                                                    </center>
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
                                                    <center>
                                                        <input class="btn btn-block btn-success" style="width: 150px"
                                                               name="submit" type="submit"
                                                               value="ثبت ارزیابی تفصیلی">
                                                    </center>
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
                                                    <center>
                                                        <input class="btn btn-block btn-success" style="width: 150px"
                                                               name="submit" type="submit"
                                                               value="ثبت ارزیابی تفصیلی">
                                                    </center>
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
                                                    <center>
                                                        <input class="btn btn-block btn-success" style="width: 150px"
                                                               name="submit" type="submit"
                                                               value="ثبت ارزیابی تفصیلی">
                                                    </center>
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
