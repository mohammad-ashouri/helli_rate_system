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
                        <?php
//                        $query=mysqli_query($connection,"select * from etelaat_a INNER join tafsili3 on etelaat_a.codeasar=tafsili3.codeasar where etelaat_a.noepazhouhesh='تحقیق و تألیف' and etelaat_a.vaziatkarname='اتمام ارزیابی' and tafsili3.shivaeematn<=3 and etelaat_a.ghalebpazhouhesh='تحقیق پایانی'");
//                        foreach ($query as $sync){
//                            $code=$sync['codeasar'];
//                            $sh=$sync['shivaeematn']*2;
//                            mysqli_query($connection,"update tafsili3 set shivaeematn='$sh' where codeasar='$code'");
//                        }
                        ?>
                    </h3>
                </div>
                <div class="box-body">
                    <p>لطفا پس از اتمام کار با سامانه، از حساب کاربری خود خارج شوید.</p>
                    <p>لطفا در حفظ و نگهداری نام کاربری و رمز عبور خود نهایت دقت را داشته باشید.</p>

                </div>
            </div>
        </section>
    </div>
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            
                            <form method="post">
                                نمایش ارزیابی های تفصیلی دوم در جشنواره :
                                <select name="jashnvareh">
		                            <?php
			                            $query=mysqli_query($connection,"select * from advaar where end_rate_date_keshvari is null and end_rate_date_madrese is not null and end_rate_date_ostani is not null");
			                            foreach ($query as $jashnvarehlist):
				                            ?>
                                            <option><?php echo $jashnvarehlist['advaar_cl'] ?></option>
			                            <?php endforeach; ?>
                                </select>
                                <input type="submit" name="jashnvarehset" value="جستجو" style="padding: 6px">
                            </form>
                            
                            
                        </h3>
                    </div>
                </div>
            </section>
        </div>
<?php if (isset($_POST['jashnvarehset'])):$jashnvareh=$_POST['jashnvareh']; ?>
    <section class="content">
        <div class="row">
            <section class="col-lg-12 col-md-12">
                <div class="box box-solid box-info">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class='box-title'>لیست آثار ارزیابی شده تفصیلی دوم در جشنواره
                        <?php echo substr($jashnvareh,3) ?>
                        </h3>

                    </div>

                    <div class="box-body">

                        <div class="row" style="overflow-x: auto">
                            <?php
                                if ($_SESSION['head']==1){
	                                $result = mysqli_query($connection, "SELECT * FROM etelaat_a INNER join advaar on etelaat_a.jashnvareh=advaar.advaar_cl where etelaat_a.codearzyabtafsili3 is null and etelaat_a.codearzyabtafsili2 is not null and etelaat_a.vaziatostaniasar is not null and etelaat_a.jashnvareh='$jashnvareh' and advaar.end_rate_date_keshvari is null order by etelaat_a.groupelmi asc");
                                }elseif ($_SESSION['head']==2){
	                                $result = mysqli_query($connection, "SELECT * FROM etelaat_a INNER join advaar on etelaat_a.jashnvareh=advaar.advaar_cl where codearzyabtafsili3_ostani is null and codearzyabtafsili2_ostani is not null and jashnvareh='$jashnvareh' and advaar.end_rate_date_ostani is null order by groupelmi asc");
                                }elseif ($_SESSION['head']==3){
	                                $result = mysqli_query($connection, "SELECT * FROM etelaat_a INNER join advaar on etelaat_a.jashnvareh=advaar.advaar_cl where codearzyabtafsili3_madrese is null and codearzyabtafsili2_madrese is not null and jashnvareh='$jashnvareh' and advaar.end_rate_date_madrese is null order by groupelmi asc");
                                }
                            ?>


                            <table id="myTable3" class="arzyabinashodetable">
                                
                                    <tr>
                                        <th>ردیف</th>
                                        <th onclick="sortTable1(0)">کد اثر</th>
                                        <th onclick="sortTable1(1)">نام اثر</th>
                                        <th onclick="sortTable1(2)">قالب پژوهش و سطح ارزیابی</th>
                                        <th onclick="sortTable1(3)">اثر منتخب</th>
                                        <th onclick="sortTable1(4)">گروه علمی</th>
                                    </tr>

                                    <?php
	                                    $a=1;
                                    foreach($result as $row1) :?>

                                        <form method="post" action="tafsili2.php" target="_blank">
                                            <tr>
                                                <td><?php echo $a;$a++; ?></td>
                                                <?php if ($_SESSION['head']==1): ?>
                                                <td>
                                                    <input style="padding: 5px;" type="submit" name="editt2k" value="<?php echo $row1['codeasar'];?>">
                                                    <input type="hidden" name="subjection" value="editt2">
                                                </td>
	                                            <?php elseif ($_SESSION['head']==2): ?>
                                                    <td>
                                                        <input style="padding: 5px;" type="submit" name="editt2o" value="<?php echo $row1['codeasar'];?>">
                                                        <input type="hidden" name="subjection" value="editt2ostan">
                                                    </td>
	                                            <?php elseif ($_SESSION['head']==3): ?>
                                                    <td>
                                                        <input style="padding: 5px;" type="submit" name="editt2m" value="<?php echo $row1['codeasar'];?>">
                                                        <input type="hidden" name="subjection" value="editt2madrese">
                                                    </td>
	                                            <?php endif; ?>

                                                <td>
                                                    <label style="width: 400px"><?php echo  $row1['nameasar'];?></label>

                                                </td>
                                                <td><?php echo  $row1['ghalebpazhouhesh']." سطح ".$row1['satharzyabi'];?></td>
                                                <td><?php
                                                    $ostan= $row1['vaziatostaniasar'];
                                                    $ostan1= ltrim($ostan,"اثر ");
                                                    $ostan2=ltrim($ostan1,"منتخب");
                                                    echo $ostan2;
                                                    ?></td>
                                                <td><?php echo $row1['groupelmi'] ?></td>
                                            </tr>

                                        </form>

                                    <?php endforeach; ?>
                            </table>
                        </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php
	        endif;
	        endif;
        include_once 'footer.php';
        ?>
