<section class="content">
    <?php
    $query = mysqli_query($connection, "select * from rater_list where type=0");
    foreach ($query as $notapprovedraters) {
    }
    if (@$notapprovedraters != null):
        ?>
    <?php endif; ?>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-danger collapsed-box">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class='box-title'>
                        لیست آثاری که برای ارزیاب اجمالی ارسال شده و ارزشیابی توصیفی آنها ثبت نشده است
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
                        //							$rater_code=$rows['code'];
                        //							$result4 = mysqli_query($connection, "SELECT * FROM `rater_comments_archive` where `comment` is null order by rater_id asc"); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" id="myinputelmigroup" onkeyup="searchelmigroup()"
                               placeholder="جستجو در گروه علمی" title="جستجو در گروه علمی">
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
                            $tempresult = mysqli_query($connection, "select * from etelaat_a where nobat_arzyabi='ارزیابی اجمالی' and codearzyabejmali is not null and codearzyabejmali!=''");
                            foreach ($tempresult as $tempresult1):
                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tempresult1['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $tempresult1['nameasar']; ?></label>
                                    </td>
                                    <td><?php echo $codearzyabejmali = $tempresult1['codearzyabejmali'] ?></td>
                                    <td>
                                        <?php
                                        $query = mysqli_query($connection, "select * from rater_list where username='$codearzyabejmali'");
                                        foreach ($query as $rater_info) {
                                        }
                                        echo $rater_info['name'] . ' ' . $rater_info['family'];
                                        ?>
                                    </td>
                                    <td><?php echo $tempresult1['groupelmi'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
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

                    <h3 class='box-title'>لیست آثاری که برای ارزیاب ارسال شده و ارزیابی تفصیلی دوم آنها ثبت نشده است

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
                        //							$rater_code=$rows['code'];
                        //							$result4 = mysqli_query($connection, "SELECT * FROM `etelaat_a` where nobat_arzyabi='تفصیلی دوم' and codearzyabtafsili2 is not null and vaziatkarname='در حال ارزیابی' order by codearzyabtafsili2 asc"); ?>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" id="myinputelmigroupt2" onkeyup="searchelmigroupt2()"
                               placeholder="جستجو در گروه علمی" title="جستجو در گروه علمی">


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

                            $tempresult = mysqli_query($connection, "select * from etelaat_a where nobat_arzyabi='تفصیلی دوم' and codearzyabtafsili2 is not null and vaziatkarname='در حال ارزیابی' order by codearzyabtafsili2 asc");
                            foreach ($tempresult as $tempresult1):
                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tempresult1['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $tempresult1['nameasar']; ?></label>

                                    </td>
                                    <td><?php echo $codearzyabtafsili2 = $tempresult1['codearzyabtafsili2'] ?></td>
                                    <td><?php
                                        $query = mysqli_query($connection, "select * from rater_list where username='$codearzyabtafsili2'");
                                        foreach ($query as $rater_info) {
                                        }
                                        echo $rater_info['name'] . ' ' . $rater_info['family'];
                                        ?></td>
                                    <td><?php echo $tempresult1['groupelmi'] ?></td>
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

                    <h3 class='box-title'>لیست آثاری که برای ارزیاب ارسال شده و ارزیابی تفصیلی سوم آنها ثبت نشده است
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
                        <input type="text" id="myinputelmigroupt3" onkeyup="searchelmigroupt3()"
                               placeholder="جستجو در گروه علمی" title="جستجو در گروه علمی">
                        <table id="myTable4" class="arzyabinashodetable">
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

                            $tempresult = mysqli_query($connection, "select * from etelaat_a where nobat_arzyabi='تفصیلی سوم' and codearzyabtafsili2 is not null and vaziatkarname='در حال ارزیابی' order by codearzyabtafsili2 asc");
                            foreach ($tempresult as $tempresult1):
                                ?>
                                <tr>
                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $a;
                                        $a++; ?></td>
                                    <td>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tempresult1['codeasar']; ?>
                                    </td>
                                    <td>
                                        <label style="width: 600px"><?php echo $tempresult1['nameasar']; ?></label>

                                    </td>
                                    <td><?php echo $codearzyabtafsili3 = $tempresult1['codearzyabtafsili3'] ?></td>
                                    <td><?php
                                        $query = mysqli_query($connection, "select * from rater_list where username='$codearzyabtafsili3'");
                                        foreach ($query as $rater_info) {
                                        }
                                        echo $rater_info['name'] . ' ' . $rater_info['family'];
                                        ?></td>
                                    <td><?php echo $tempresult1['groupelmi'] ?></td>
                                </tr>

                            <?php endforeach; ?>
                        </table>


                    </div>
                </div>


        </section>
    </div>
</section>