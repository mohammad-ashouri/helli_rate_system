<section class="content" style="overflow-x: auto">
    <div class="row" style="overflow-x: auto">
        <section class="col-lg-12 col-md-12" style="overflow-x: auto">
            <div class="box box-solid box-warning" style="overflow-x: auto">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>

                    <h3 class='box-title'>لیست آثار پذیرش شده برای اختصاص به ارزیاب اجمالی</h3>

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
                    <input type="text" style="padding: 7px" id="myinput" onkeyup="searchfunction()"
                           placeholder="جستجو در گروه علمی" title="جستجو در گروه علمی">
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
                                    قالب/سطح
                                    <br>
                                    گروه علمی
                                </th>
                                <!--                                <th>-->
                                <!--                                    بخش ویژه-->
                                <!--                                </th>-->
                                <th>
                                    استان منتخب
                                </th>
                                <th>
                                    نمره استان
                                </th>
                                <th>
                                    ارزیابان
                                </th>
                                <th>
                                    اختصاص به ارزیاب
                                </th>


                            </tr>

                            <?php
                            $a = 1;
                            $result3 = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi='ارزیابی اجمالی' and etelaat_a.vaziatkarname='در حال ارزیابی' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.approve_sianat=1 order by etelaat_a.groupelmi asc,etelaat_p.ostantahsili asc");
                            foreach ($result3 as $bin):
                                ?>

                                <tr>
                                    <td><?php echo $a;
                                        ?></td>
                                    <td>
                                        <?php echo $codeasar = $bin['codeasar']; ?>
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
                                        <?php echo $bin['ghalebpazhouhesh'] . " " . $bin['satharzyabi']; ?>
                                        <br>
                                        <?php echo $bin['groupelmi']; ?>
                                    </td>
                                    <!--                                    <td>-->
                                    <!--                                        --><?php //echo $bin['bakhshvizheh']
                                    ?>
                                    <!--                                    </td>-->
                                    <td>
                                        <?php
                                        echo $bin['ostantahsili'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $bin['jamemtiazostan']
                                        ?>
                                    </td>
                                    <td>
                                        <div>
                                            <p style="color:red" id="<?php echo $codeasar ?>"></p>
                                            <?php
                                            $result4 = mysqli_query($connection, "select * from rater_comments_archive where `codeasar`='$codeasar'");
                                            foreach ($result4 as $items) {
                                                echo $items['rater_id'] . "<br>";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td>

                                        <select style="width: 200px;"
                                                title=" برای انتخاب ارزیاب، کاربر مورد نظر خود را انتخاب کرده و سپس در صورت نیاز کاربر دیگری را انتخاب نمایید"
                                                onchange="SetEjmaliKeshvari(this.value,<?php echo $codeasar ?>)"
                                                id='sel_users<?php echo $a; ?>'>
                                            <option disabled selected
                                                    title="برای انتخاب ارزیاب، کاربر مورد نظر خود را انتخاب کرده و سپس در صورت نیاز کاربر دیگری را انتخاب نمایید">
                                                انتخاب کنید
                                            </option>
                                            <?php
                                            $query = mysqli_query($connection, "select * from rater_list where type=0 and (city_name='قم' or city_name is null) order by family asc");
                                            foreach ($query as $raters):
                                                ?>
                                                <option value="<?php echo $raters['username'] ?>"><?php echo $raters['name'] . ' ' . $raters['family'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!--                                        <form action="build/php/asar-for-rater-inc.php" method="post">-->
                                        <!--                                            <input name="ratercode" type="text"-->
                                        <!--                                                   placeholder="لطفا کد ارزیاب را وارد کنید" style="padding: 6px">-->
                                        <!--                                            <input name="a_code" type="hidden" value="-->
                                        <?php //echo $bin['codeasar'];
                                        ?><!--">-->
                                        <!--                                            <input name="a_name" type="hidden" value="-->
                                        <?php //echo $bin['nameasar'];
                                        ?><!--">-->
                                        <!--                                            <input name="subsetejmali" type="submit" value="ثبت" style="padding: 6px">-->
                                        <!--                                        </form>-->
                                    </td>
                                    <script type="text/javascript">
                                        $(document).ready(function () {

                                            // Initialize Select2
                                            $('#sel_users<?php echo $a; ?>').select2();

                                            // Set option selected onchange
                                            $('#user_selected<?php echo $a; ?>').change(function () {
                                                var value = $(this).val();

                                                // Set selected
                                                $('#sel_users<?php echo $a; ?>').val(value);
                                                $('#sel_users<?php echo $a;$a++; ?>').select2().trigger('change');
                                            });
                                        });
                                    </script>
                                </tr>

                            <?php
                            endforeach;
                            ?>


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
                                            گروه علمی
                                        </th>

                                    </tr>

                                    <?php
                                    $resultraters = mysqli_query($connection, "select * from rater_list where city_name is NULL and type=0 and approved=1 order by family asc");
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
                                                <?php
                                                $a1 = $raters['adabiat'];
                                                $a2 = $raters['akhlaghtarbiat'];
                                                $a3 = $raters['hadisderaye'];
                                                $a4 = $raters['falsafe'];
                                                $a5 = $raters['tafsir'];
                                                $a6 = $raters['kalaam'];
                                                $a7 = $raters['ulumensani'];
                                                $a8 = $raters['feghh'];
                                                $a9 = $raters['osoolfegh'];
                                                $a10 = $raters['tarikheslam'];
                                                if ($a1 == NULL) {
                                                    $a1 = "";
                                                } else {
                                                    echo $a1 = $raters['adabiat'] . "/";
                                                }
                                                if ($a2 == NULL) {
                                                    $a2 = "";
                                                } else {
                                                    echo $a2 = $raters['akhlaghtarbiat'] . "/";
                                                }
                                                if ($a3 == NULL) {
                                                    $a3 = "";
                                                } else {
                                                    echo $a3 = $raters['hadisderaye'] . "/";
                                                }
                                                if ($a4 == NULL) {
                                                    $a4 = "";
                                                } else {
                                                    echo $a4 = $raters['falsafe'] . "/";
                                                }
                                                if ($a5 == NULL) {
                                                    $a5 = "";
                                                } else {
                                                    echo $a5 = $raters['tafsir'] . "/";
                                                }
                                                if ($a6 == NULL) {
                                                    $a6 = "";
                                                } else {
                                                    echo $a6 = $raters['kalaam'] . "/";
                                                }
                                                if ($a7 == NULL) {
                                                    $a7 = "";
                                                } else {
                                                    echo $a7 = $raters['ulumensani'] . "/";
                                                }
                                                if ($a8 == NULL) {
                                                    $a8 = "";
                                                } else {
                                                    echo $a8 = $raters['feghh'] . "/";
                                                }
                                                if ($a9 == NULL) {
                                                    $a9 = "";
                                                } else {
                                                    echo $a9 = $raters['osoolfegh'] . "/";
                                                }
                                                if ($a10 == NULL) {
                                                    $a10 = "";
                                                } else {
                                                    echo $a10 = $raters['tarikheslam'] . "/";
                                                }
                                                ?>
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
            function SetEjmaliKeshvari(coderater, codeasar) {
                var xmlhttp = new XMLHttpRequest();
                var codeasarobj = codeasar;
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById(codeasarobj).innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "build/ajax/Set_Ejmali_Keshvari_rater.php?coderater=" + coderater + "&codeasar=" + codeasar, true);
                xmlhttp.send();
                codeasar = null;
                coderater = null;
            }
        </script>
        <script>
            function validateremoveejmalikeshvari() {
                var asarcode = document.getElementById("remasarcode").value;
                var ratercode = document.getElementById("remratercode").value;
                if (asarcode == '') {
                    alert("کد اثر وارد نشده است");
                    return false;
                } else if (ratercode == '') {
                    alert("کد ارزیاب وارد نشده است");
                    return false;
                } else {
                    return true;
                }
            }
        </script>