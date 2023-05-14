<?php
include_once 'header.php';

if ($_SESSION['head']==1):
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
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">لیست آثار در حال ارزیابی تفصیلی سوم</h3>

                    </div>
                    <?php
                    $rater_code=$_SESSION['head'];
                    if ($rater_code==1):
                        ?>
                        <table id="myTable3" class="arzyabishodetable">
                            <tr>
                                <th>ردیف</th>
                                <th>کد اثر</th>
                                <th>نام اثر</th>
                                <th>قالب/سطح</th>
                                <th>گروه علمی</th>
                                <th>ارزیاب</th>

                            </tr>
                            <?php
                            $counter=1;
                            $selectionfrometa=mysqli_query($connection,"select * from etelaat_a where bargozidehkeshvari='نمی باشد' and nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and codearzyabtafsili3 is not null");
                            foreach ($selectionfrometa as $itemeta):
                                ?>
                                <tr>
                                    <td><?php echo $counter;$counter++?></td>
                                    <td>
                                        <form method="post" action="tafsili3.php">
                                            <input  style="padding: 5px" name="subset" value="<?php echo $itemeta['codeasar'] ?>" type="submit">
                                        </form>
                                    </td>
                                    <td><a target="_blank" href="<?php echo $itemeta['fileasar'] ?>"><?php echo $itemeta['nameasar'] ?></a> </td>
                                    <td><?php echo $itemeta['ghalebpazhouhesh']." ".$itemeta['satharzyabi'] ?></td>
                                    <td><?php echo $itemeta['groupelmi'] ?></td>
                                    <td><?php
                                        $codearzyab=$itemeta['codearzyabtafsili3'];
                                        $selectionfromraterlist=mysqli_query($connection,"select * from rater_list where code='$codearzyab'");
                                        foreach ($selectionfromraterlist as $itemrater){}
                                        if (!empty($itemrater)){
                                            echo $itemrater['name']." ".$itemrater['family'];
                                        }

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
