<?php
if (($_SESSION['city'] == 'قم' or @$_SESSION['groupname'] != null) and $_SESSION['head'] == 0) {
    $state = 'قم';
    $city = 'قم';
    $groupname = $_SESSION['groupname'];
} else {
    $groupname = null;
    $state = $_SESSION['city'];
    $city = $_SESSION['shahr_name'];
}

?>
<section class="content" style="overflow-x: auto">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-success" style="overflow-x: auto">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>

                    <h3 class='box-title'>لیست آثار برای اختصاص به ارزیاب اجمالی استان
                        <?php
                        echo $state;
                        ?>

                    </h3>

                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <input type="text" style="padding: 7px" id="codeasar" onkeyup="searchcodeasar()"
                           placeholder="جستجو در کد اثر" title="جستجو در کد اثر">
                    <input type="text" style="padding: 7px" id="nameasar" onkeyup="searchnameasar()"
                           placeholder="جستجو در نام اثر" title="جستجو در نام اثر">
                    <?php if ($groupname == null): ?>
                        <input type="text" style="padding: 7px" id="myinput" onkeyup="searchfunction()"
                               placeholder="جستجو در گروه علمی" title="جستجو در گروه علمی">
                    <?php endif; ?>
                    <center>
                        <table id="myTable3" class="arzyabinashodetable">
                            <tr>
                                <th>ردیف</th>

                                <th onclick="sortTable1(0)">
                                    کد اثر
                                </th>
                                <th onclick="sortTable1(1)">
                                    نام اثر
                                </th>
                                <th onclick="sortTable1(2)">
                                    قالب پژوهش و سطح ارزیابی
                                </th>
                                <th onclick="sortTable1(3)">
                                    گروه علمی
                                </th>
                                <th>
                                    امتیاز مدرسه
                                </th>
                                <th>
                                    اختصاص به ارزیاب
                                </th>
                            </tr>

                            <?php
                            $a = 1;
                            $user = $_SESSION['username'];
                            if ($state == 'قم' and $groupname != null) {
                                $selectfrometelaat_aforejmaliostan = mysqli_query($connection, "SELECT * FROM etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_ostani='ارزیابی اجمالی' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and ((etelaat_p.master='هست' and etelaat_p.teachingProvince='قم') or (etelaat_p.master='نیست' and etelaat_p.ostantahsili='قم'))  and etelaat_a.groupelmi='$groupname' and etelaat_a.approve_sianat=0 order by etelaat_a.groupelmi,etelaat_a.jamemtiazmadrese desc");
                            } else {
                                $selectfrometelaat_aforejmaliostan = mysqli_query($connection, "SELECT * FROM etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_ostani='ارزیابی اجمالی' and etelaat_a.vaziatkarnameostani='در حال ارزیابی' and etelaat_a.approve_sianat=0 and ((etelaat_p.master='هست' and etelaat_p.teachingProvince='$state') or (etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state')) order by etelaat_a.groupelmi,etelaat_a.jamemtiazmadrese desc");
                            }
                            foreach ($selectfrometelaat_aforejmaliostan as $bin):
                                ?>

                                <tr>
                                    <td><?php echo $a;
                                        $a++; ?></td>

                                    <td>
                                        <?php echo $bin['codeasar']; ?>
                                    </td>
                                    <td>
                                        <a href="<?php if ($bin['fileasar'] == 'dist/files/asar_files/') {
                                            echo $bin['fileasar_word'];
                                        } else {
                                            echo $bin['fileasar'];
                                        } ?>" target="_blank">
                                            <label style="width: 300px">
                                                <?php echo $bin['nameasar']; ?>
                                            </label>
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $bin['ghalebpazhouhesh'] . " سطح " . $bin['satharzyabi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $bin['groupelmi']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($bin['jamemtiazmadrese'] == null or $bin['jamemtiazmadrese'] == '') {
                                            echo 'بدون ارزیابی در مدرسه';
                                        } else {
                                            echo $bin['jamemtiazmadrese'];
                                            $bin['jamemtiazmadrese'] = null;
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <select style="font-size: small;padding: 5px"
                                                onchange="sendcode(this.value,<?php echo $bin['codeasar'] ?>)">
                                            <option style="color: #aeaeae;">نام خانوادگی ارزیاب را تایپ کنید</option>
                                            <?php
                                            if ($state == 'قم') {
                                                $query = mysqli_query($connection, "select * from rater_list where (city_name='قم' or city_name is null) and approved=1 and type!=1 order by family");
                                            } else {
                                                $query = mysqli_query($connection, "select * from rater_list where city_name='$state' and approved=1 and type!=1 order by family");
                                            }
                                            foreach ($query as $raters):
                                                ?>
                                                <option style="color: black;font-size: medium" <?php if ($raters['username'] == $bin['codearzyabejmali_ostani']) {
                                                    echo 'selected';
                                                } ?>
                                                        value="<?php echo $raters['username'] ?>"><?php echo $raters['family'] . ' - ' . $raters['name'] . ' کد: ' . $raters['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>


                                </tr>

                            <?php
                            endforeach;
                            ?>
                            <script>
                                function sendcode(coderater, codeasar) {
                                    var xmlhttp = new XMLHttpRequest();
                                    xmlhttp.open("GET", "./build/ajax/setejo.php?ratercode=" + coderater + "&codeasar=" + codeasar, true);
                                    xmlhttp.send();
                                }
                            </script>
                        </table>
                    </center>
                </div>
        </section>
        <section class="content">
            <div class="row">
                <section class="col-lg-12 col-md-12">
                    <div class="box box-solid box-warning collapsed-box">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>

                            <h3 class='box-title'>لیست ارزیابان جشنواره</h3>

                            <!-- tools box -->
                            <div class="pull-left box-tools">
                                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i
                                            class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <center>
                                <table class="arzyabinashodetable">
                                    <tr>
                                        <th>
                                            کد
                                        </th>
                                        <th>
                                            نام و نام خانوادگی
                                        </th>
                                        <th>
                                            شماره همراه
                                        </th>
                                        <th>
                                            استان
                                        </th>
                                        <th>
                                            شهرستان
                                        </th>
                                        <th>
                                            مدرسه
                                        </th>

                                    </tr>

                                    <?php
                                    if ($state == 'قم') {
                                        $resultraters = mysqli_query($connection, "select * from rater_list WHERE type=0 and (city_name='قم' or city_name is null) and approved=1 order by family");
                                    } else {
                                        $resultraters = mysqli_query($connection, "select * from rater_list WHERE type=0 and city_name='$state' and approved=1 order by family");
                                    }

                                    foreach ($resultraters as $raters): ?>
                                        <tr>
                                            <td>
                                                <?php echo $raters['code'] ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo $raters['cv_filepath'] ?>">
                                                    <?php echo $raters['name'] . " " . $raters['family'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $raters['phone'] ?>
                                            </td>
                                            <td>
                                                <?php echo $raters['city_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $raters['shahr_name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $raters['school_name'] ?>
                                            </td>

                                        </tr>


                                    <?php
                                    endforeach;
                                    ?>
                                </table>
                            </center>

                        </div>
                </section>
            </div>
        </section>
        <script>
            function validateremoveejmaliostani() {
                var asarcode = document.forms["remform"]["remasarcode"].value;
                if (asarcode == '') {
                    alert("کد اثر وارد نشده است");
                    return false;
                } else {
                    return true;
                }
            }
        </script>