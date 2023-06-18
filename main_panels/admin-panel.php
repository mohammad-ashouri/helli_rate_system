<section class="content">
    <?php
    $query = mysqli_query($connection, "select * from rater_list where type=0");
    foreach ($query as $notapprovedraters) {
    }
    if (@$notapprovedraters != null):
        ?>
<!--        <div class="row">-->
<!--            <section class="col-lg-12 col-md-12">-->
<!--                <div class="box box-solid box-warning">-->
<!--                    <div class="box-header">-->
<!--                        <i class="fa fa-info-circle"></i>-->
<!--                        <h3 class='box-title'>-->
<!--                            لیست ارزیابان تایید نشده بر اساس استان-->
<!--                        </h3>-->
<!--                        <!-- tools box -->
<!--                        <div class="pull-left box-tools">-->
<!--                            <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i-->
<!--                                        class="fa fa-minus"></i>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <!-- /. tools -->
<!--                    </div>-->
<!--                    <div class="box-body" style="overflow-x: auto">-->
<!--                        <div class="row">-->
<!--                            <center>-->
<!--                                <table id="myTable3" class="setratertable" style="text-align: center  ">-->
<!--                                    <tr>-->
<!--                                        <th>ردیف</th>-->
<!--                                        <th>نام استان</th>-->
<!--                                        <th>تعداد ارزیاب ثبت نامی</th>-->
<!--                                        <th>تعداد ارزیاب بدون رزومه</th>-->
<!--                                        <th>تعداد ارزیاب تایید شده</th>-->
<!--                                        <th>تعداد ارزیاب تایید نشده</th>-->
<!--                                        <th>عملیات</th>-->
<!--                                    </tr>-->
<!--                                    --><?php
//                                    $a = 1;
//                                    $tedadkol = 0;
//                                    $tbr = 0;
//                                    $tt = 0;
//                                    $ttn = 0;
//                                    $query = mysqli_query($connection, "select distinct(city_name) from rater_list where city_name is not null and city_name!='' and type=0 and shahr_name!='بناب' and shahr_name!='کاشان' order by city_name asc");
//                                    foreach ($query as $notapprovedraters):
//                                        ?>
<!--                                        <tr>-->
<!--                                            <td>-->
<!--                                                --><?php //echo $a;
//                                                $a++; ?>
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                --><?php
//                                                echo $city_name = $notapprovedraters['city_name'];
//                                                ?>
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                --><?php
//                                                $query = mysqli_query($connection, "select * from rater_list where city_name='$city_name' and (shahr_name!='بناب' and shahr_name!='کاشان') and type=0");
//                                                echo mysqli_num_rows($query);
//                                                $tedadkol = mysqli_num_rows($query) + $tedadkol;
//                                                ?>
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                --><?php
//                                                $query = mysqli_query($connection, "select * from rater_list where city_name='$city_name' and (shahr_name!='بناب' and shahr_name!='کاشان') and approved=0 and type=0 and cv_filepath is null");
//                                                echo mysqli_num_rows($query);
//                                                $tbr = mysqli_num_rows($query) + $tbr;
//                                                ?>
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                --><?php
//                                                $query = mysqli_query($connection, "select * from rater_list where city_name='$city_name' and (shahr_name!='بناب' and shahr_name!='کاشان') and cv_filepath is not null and type=0");
//                                                echo mysqli_num_rows($query);
//                                                $tt = mysqli_num_rows($query) + $tt;
//                                                ?>
<!--                                            </td>-->
<!--                                            <td>-->
<!--                                                --><?php
//                                                $query = mysqli_query($connection, "select * from rater_list where city_name='$city_name' and (shahr_name!='بناب' and shahr_name!='کاشان') and approved=2 and type=0");
//                                                echo mysqli_num_rows($query);
//                                                $ttn = mysqli_num_rows($query) + $ttn;
//                                                ?>
<!--                                            </td>-->
<!--                                            --><?php
//                                            foreach ($query as $itemnotapprove) {
//                                            }
//                                            if (@$itemnotapprove != null):
//                                                ?>
<!--                                                <td>-->
<!--                                                    <form action="build/php/inc.php" method="post">-->
<!--                                                        <input type="hidden" value="--><?php //echo $city_name ?><!--"-->
<!--                                                               name="city_name">-->
<!--                                                        <input value="تایید ارزیاب‌های این استان" type="submit"-->
<!--                                                               name="set_approved" style="padding: 5px">-->
<!--                                                    </form>-->
<!--                                                </td>-->
<!--                                                --><?php //$itemnotapprove = null;endif; ?>
<!--                                        </tr>-->
<!--                                    --><?php //endforeach; ?>
<!--                                    --><?php
//                                    $query = mysqli_query($connection, "select * from rater_list where type=0 and shahr_name='بناب'");
//                                    foreach ($query as $notapprovedraters) {
//                                    }
//                                    ?>
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            --><?php //echo $a;
//                                            $a++; ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            echo 'منطقه بناب';
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='بناب' and type=0");
//                                            echo mysqli_num_rows($query);
//                                            $tedadkol = mysqli_num_rows($query) + $tedadkol;
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='بناب' and approved=0 and type=0 and cv_filepath is null");
//                                            echo mysqli_num_rows($query);
//                                            $tbr = mysqli_num_rows($query) + $tbr;
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='بناب' and cv_filepath is not null and type=0");
//                                            echo mysqli_num_rows($query);
//                                            $tt = mysqli_num_rows($query) + $tt;
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='بناب' and approved=2 and type=0");
//                                            echo mysqli_num_rows($query);
//                                            $ttn = mysqli_num_rows($query) + $ttn;
//                                            ?>
<!--                                        </td>-->
<!--                                        --><?php
//                                        foreach ($query as $itemnotapprove) {
//                                        }
//                                        if (@$itemnotapprove != null):
//                                            ?>
<!--                                            <td>-->
<!--                                                <form action="build/php/inc.php" method="post">-->
<!--                                                    <input type="hidden" value="--><?php //echo $city_name ?><!--"-->
<!--                                                           name="city_name">-->
<!--                                                    <input value="تایید ارزیاب‌های این استان" type="submit"-->
<!--                                                           name="set_approved" style="padding: 5px">-->
<!--                                                </form>-->
<!--                                            </td>-->
<!--                                            --><?php //$itemnotapprove = null;endif; ?>
<!--                                    </tr>-->
<!--                                    --><?php
//                                    $query = mysqli_query($connection, "select * from rater_list where type=0 and shahr_name='کاشان'");
//                                    foreach ($query as $notapprovedraters) {
//                                    }
//                                    ?>
<!--                                    <tr>-->
<!--                                        <td>-->
<!--                                            --><?php //echo $a;
//                                            $a++; ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            echo 'منطقه کاشان';
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='کاشان' and type=0");
//                                            echo mysqli_num_rows($query);
//                                            $tedadkol = mysqli_num_rows($query) + $tedadkol;
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='کاشان' and approved=0 and type=0 and cv_filepath is null");
//                                            echo mysqli_num_rows($query);
//                                            $tbr = mysqli_num_rows($query) + $tbr;
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='کاشان' and cv_filepath is not null and type=0");
//                                            echo mysqli_num_rows($query);
//                                            $tt = mysqli_num_rows($query) + $tt;
//                                            ?>
<!--                                        </td>-->
<!--                                        <td>-->
<!--                                            --><?php
//                                            $query = mysqli_query($connection, "select * from rater_list where shahr_name='کاشان' and approved=2 and type=0");
//                                            echo mysqli_num_rows($query);
//                                            $ttn = mysqli_num_rows($query) + $ttn;
//                                            ?>
<!--                                        </td>-->
<!--                                        --><?php
//                                        foreach ($query as $itemnotapprove) {
//                                        }
//                                        if (@$itemnotapprove != null):
//                                            ?>
<!--                                            <td>-->
<!--                                                <form action="build/php/inc.php" method="post">-->
<!--                                                    <input type="hidden" value="--><?php //echo $city_name ?><!--"-->
<!--                                                           name="city_name">-->
<!--                                                    <input value="تایید ارزیاب‌های این استان" type="submit"-->
<!--                                                           name="set_approved" style="padding: 5px">-->
<!--                                                </form>-->
<!--                                            </td>-->
<!--                                            --><?php //$itemnotapprove = null;endif; ?>
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td></td>-->
<!--                                        <td></td>-->
<!--                                        <td>--><?php //echo $tedadkol; ?><!--</td>-->
<!--                                        <td>--><?php //echo $tbr; ?><!--</td>-->
<!--                                        <td>--><?php //echo $tt; ?><!--</td>-->
<!--                                        <td>--><?php //echo $ttn; ?><!--</td>-->
<!--                                        <td></td>-->
<!--                                    </tr>-->
<!--                                </table>-->
<!--                            </center>-->
<!--                        </div>-->
<!--                    </div>-->
<!--            </section>-->
<!--        </div>-->
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
                                    <td><?php echo $codearzyabejmali=$tempresult1['codearzyabejmali'] ?></td>
                                    <td>
                                        <?php
                                        $query=mysqli_query($connection,"select * from rater_list where username='$codearzyabejmali'");
                                        foreach ($query as $rater_info){}
                                        echo $rater_info['name'].' '.$rater_info['family'];
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
                                    <td><?php echo $codearzyabtafsili2=$tempresult1['codearzyabtafsili2'] ?></td>
                                    <td><?php
                                        $query=mysqli_query($connection,"select * from rater_list where username='$codearzyabtafsili2'");
                                        foreach ($query as $rater_info){}
                                        echo $rater_info['name'].' '.$rater_info['family'];
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
                                    <td><?php echo $codearzyabtafsili3=$tempresult1['codearzyabtafsili3'] ?></td>
                                    <td><?php
                                        $query=mysqli_query($connection,"select * from rater_list where username='$codearzyabtafsili3'");
                                        foreach ($query as $rater_info){}
                                        echo $rater_info['name'].' '.$rater_info['family'];
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