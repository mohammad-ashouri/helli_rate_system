<?php
include_once 'header.php';
if ($_SESSION['head']==1 or $_SESSION['head']==2 or $_SESSION['head']==3):
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

    <!-- Content Header (Page header) -->
    <!-- Content Wrapper. Contains page content -->
    <section class="content-header">
        <div class="row" style="overflow-x: auto">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info" style="overflow-x: auto">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">لیست آثار در حال ارزیابی تفصیلی دوم</h3>
                    </div>
                    <?php
                    if ($_SESSION['head']==1):
                        ?>
                        <table id="myTable3" class="arzyabishodetable" style="overflow-x: auto">
                            <tr>
                                <th>ردیف</th>
                                <th>کد اثر</th>
                                <th>نام اثر</th>
                                <th>قالب/سطح</th>
                                <th>گروه علمی</th>
                                <th>ارزیاب</th>
                                <th>امتیاز استان</th>

                            </tr>
                            <?php
                            $counter=1;
                            $selectionfrometa=mysqli_query($connection,"select * from etelaat_a where bargozideh_ostani='می باشد' and vaziatkarname='در حال ارزیابی' and nobat_arzyabi='تفصیلی دوم'");
                            foreach ($selectionfrometa as $itemeta):
                            ?>
                            <tr>
                                <td><?php echo $counter;$counter++ ?></td>
                                <td>
                                    <form method="post" action="./tafsili2.php">
                                        <input style="padding: 5px" name="subset" value="<?php echo $itemeta['codeasar'] ?>" type="submit">
                                    </form>
                                    </td>
                                <td><a target="_blank" href="<?php echo $itemeta['fileasar'] ?>"><?php echo $itemeta['nameasar'] ?></a> </td>
                                <td><?php echo $itemeta['ghalebpazhouhesh']." ".$itemeta['satharzyabi'] ?></td>
                                <td><?php echo $itemeta['groupelmi'] ?></td>
                                <td><?php
                                    $codearzyab=$itemeta['codearzyabtafsili2'];
                                    $selectionfromraterlist=mysqli_query($connection,"select * from rater_list where code='$codearzyab'");
                                    foreach ($selectionfromraterlist as $itemrater){}
                                    echo $itemrater['name']." ".$itemrater['family']
                                    ?>
                                </td>
                                <td><?php
                                    echo $itemeta['jamemtiazostan']
                                    ?>
                                </td>

                            </tr>
                            <?php endforeach; ?>

                        </table>


                    <?php
                    endif;
                    ?>

                    <?php
                    if ($_SESSION['head']==2):
                        ?>
                        <table id="myTable3" class="arzyabishodetable" style="overflow-x: auto">
                            <tr>
                                <th>کد اثر</th>
                                <th>نام اثر</th>
                                <th>قالب/سطح</th>
                                <th>گروه علمی</th>
                                <th>ارزیاب</th>
                                <th>نمره</th>

                            </tr>
                            <?php
                            $selectionfrometa=mysqli_query($connection,"select * from etelaat_a where bargozidehkeshvari='نمی باشد' and codearzyabtafsili2 is not null and vaziatkarname='در حال ارزیابی'");
                            foreach ($selectionfrometa as $itemeta):
                                ?>
                                <tr>
                                    <td>
                                        <form method="post" action="tafsili2.php">
                                            <input name="codeasart2" value="<?php echo $itemeta['codeasar'] ?>" type="submit">
                                        </form>
                                    </td>
                                    <td><a target="_blank" href="<?php echo $itemeta['fileasar'] ?>"><?php echo $itemeta['nameasar'] ?></a> </td>
                                    <td><?php echo $itemeta['ghalebpazhouhesh']." ".$itemeta['satharzyabi'] ?></td>
                                    <td><?php echo $itemeta['groupelmi'] ?></td>
                                    <td><?php
                                        $codearzyab=$itemeta['codearzyabtafsili2'];
                                        $selectionfromraterlist=mysqli_query($connection,"select * from rater_list where code='$codearzyab'");
                                        foreach ($selectionfromraterlist as $itemrater){}
                                        echo $itemrater['name']." ".$itemrater['family']
                                        ?>
                                    </td>
                                    <td><?php
                                        $codeasar=$itemeta['codeasar'];
                                        $selectionfromtafsili2=mysqli_query($connection,"select * from tafsili2 where codeasar='$codeasar'");
                                        foreach ($selectionfromtafsili2 as $itemtafsili2){}
                                        echo $itemtafsili2['jam']
                                        ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </table>


                    <?php
                    endif;
                    ?>
                    <?php
                    if ($_SESSION['head']==3):
                        ?>
                        <table id="myTable3" class="arzyabishodetable" style="overflow-x: auto">
                            <tr>
                                <th>کد اثر</th>
                                <th>نام اثر</th>
                                <th>قالب/سطح</th>
                                <th>گروه علمی</th>
                                <th>ارزیاب</th>
                                <th>نمره</th>

                            </tr>
                            <?php
                            $selectionfrometa=mysqli_query($connection,"select * from etelaat_a where bargozidehkeshvari='نمی باشد' and codearzyabtafsili2 is not null and vaziatkarname='در حال ارزیابی'");
                            foreach ($selectionfrometa as $itemeta):
                                ?>
                                <tr>
                                    <td>
                                        <form method="post" action="tafsili2.php">
                                            <input name="codeasart2" value="<?php echo $itemeta['codeasar'] ?>" type="submit">
                                        </form>
                                    </td>
                                    <td><a target="_blank" href="<?php echo $itemeta['fileasar'] ?>"><?php echo $itemeta['nameasar'] ?></a> </td>
                                    <td><?php echo $itemeta['ghalebpazhouhesh']." ".$itemeta['satharzyabi'] ?></td>
                                    <td><?php echo $itemeta['groupelmi'] ?></td>
                                    <td><?php
                                        $codearzyab=$itemeta['codearzyabtafsili2'];
                                        $selectionfromraterlist=mysqli_query($connection,"select * from rater_list where code='$codearzyab'");
                                        foreach ($selectionfromraterlist as $itemrater){}
                                        echo $itemrater['name']." ".$itemrater['family']
                                        ?>
                                    </td>
                                    <td><?php
                                        $codeasar=$itemeta['codeasar'];
                                        $selectionfromtafsili2=mysqli_query($connection,"select * from tafsili2 where codeasar='$codeasar'");
                                        foreach ($selectionfromtafsili2 as $itemtafsili2){}
                                        echo $itemtafsili2['jam']
                                        ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </table>


                    <?php
                    endif;
                    ?>
                </div>
            </section>

        </div>
    </section>

    <!-- Main content -->
    <section class="content">

    </section>



    <!-- /.content-wrapper -->
<?php
endif;
include_once 'footer.php';
?>
        <script>
            function searchgroupelmi() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("groupelmi");
                filter = input.value;
                table = document.getElementById("myTable3");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[1];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
