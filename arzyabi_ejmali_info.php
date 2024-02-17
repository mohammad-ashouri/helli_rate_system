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
<?php
$rater_code=$_SESSION['head'];
if ($rater_code==0 and $_SESSION['city_name']==null):
?>
<section class="content-header">
<div class="row">
<section class="col-lg-12 col-md-12">
<div class="box box-info">
<div class="box-header">
<form method="post">
<i class="fa fa-info-circle"></i>
<h3 class="box-title">لیست آثار ارزیابی شده
<?php
if ($_SESSION['head']==1):
?>
گروه علمی:

<select name="customgroup">
<?php
$selectfromelmigroup=mysqli_query($connection,"select distinct(groupelmi) from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi asc");
foreach ($selectfromelmigroup as $groupitems):
?>
<option>
	<?php echo $groupitems['groupelmi'] ?>
</option>
<?php
endforeach;
?>
</select>
<input type="submit" name="subgroup" style="padding: 7px" value="جستجو">
</form>
<?php endif; ?>
</h3>
</div>

<div class="box-body" style="overflow-x: auto">
<div class="box-body" style="overflow-x: auto">
<div class="row" style="overflow-x: auto">
<section class="col-lg-12 col-md-12">
<div class="box box-success">
<div class="box-body" style="overflow-x: auto">
<table class="arzyabinashodetable" style="overflow-x: auto">
	<tr>
		
		<th>کد اثر</th>
		<th>نام اثر</th>
		<th>رد / قبول</th>
		<th>تاریخ ارزیابی</th>
	
	</tr>
	<?php endif; ?>
	
	<?php
		
		if ($rater_code==0):
		$rcode = $_SESSION['coderater'];
		$result4=mysqli_query($connection,"select * from rater_comments_archive where `rater_id`='$rcode' and `comment` is not null");
		foreach ($result4 as $row2): ?>
			<tr>
				<td><?php echo $row2['codeasar'] ?></td>
				<td>
					<a href="<?php
						$codeasar_temp=$row2['codeasar'];
						$query_temp=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasar_temp'");
						foreach ($query_temp as $item_temp){}
						echo $item_temp['fileasar'] ?>">
						<label style='width: 500px'><?php echo $row2['asarname'] ?></label>
					</a>
				</td>
				<td><?php echo $row2['accept_or_reject'] ?></td>
				<td><?php echo $row2['tarikhsabt_year']."/".$row2['tarikhsabt_month']."/".$row2['tarikhsabt_day'] ?></td>
			</tr>
			<tr>
				<td>توضیحات:</td>
				<td>
					<textarea disabled style="width: available; height: 150px"><?php echo $row2['comment'];?></textarea>
				
				</td>
			</tr>
		<?php
		endforeach;
	
	?>
</table>
</div>
</div>
</section>
</div>
</div>

</div>




<?php elseif ($rater_code==1): ?>
<section class="content-header">
<div class="row">
<section class="col-lg-12 col-md-12">
<div class="box box-info">
<div class="box-header">
<form method="post">
<i class="fa fa-info-circle"></i>
<h3 class="box-title">لیست آثار ارزیابی شده
	<?php
		if ($_SESSION['head']==1):
	?>
	گروه علمی:
	
	<select name="customgroup">
		<?php
			$selectfromelmigroup=mysqli_query($connection,"select distinct(groupelmi) from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi asc");
			foreach ($selectfromelmigroup as $groupitems):
				?>
				<option <?php if (@$_POST['customgroup']==$groupitems['groupelmi']){ echo 'selected';} ?>>
					<?php echo $groupitems['groupelmi'] ?>
				</option>
			<?php
			endforeach;
		?>
	</select>
	در دوره:
	<select name="jashnvareh">
        <option disabled selected>انتخاب کنید</option>
		<?php
			$selectfromjashnvareh=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a");
			foreach ($selectfromjashnvareh as $jashnvarehitems):
				?>
				<option <?php if (@$_POST['jashnvareh']==$jashnvarehitems['jashnvareh']){ echo 'selected';} ?>>
					<?php echo $jashnvarehitems['jashnvareh'] ?>
				</option>
			<?php
			endforeach;
		?>
	</select>
	با وضعیت
	<select name="status">
		<option selected>بدون فیلتر</option>
		<option <?php if (isset($_POST) and @$_POST['status']=='اجمالی ردی'){ echo 'selected';} ?>>اجمالی ردی</option>
		<option <?php if (isset($_POST) and @$_POST['status']=='اجمالی قبول'){ echo 'selected';} ?>>اجمالی قبول</option>
	</select>
	<input type="submit" name="subgroup" style="padding: 7px" value="جستجو">
</form>
<?php endif; ?>
</h3>
</div>
<div class="box-body" style="overflow-x: auto">
<div class="box-body" style="overflow-x: auto">
<div class="row" style="overflow-x: auto">
	<section class="col-lg-12 col-md-12">
		<div class="box box-success">
			<div class="box-body" style="overflow-x: auto">
				
				<?php
					if (isset($_POST['subgroup'])):
						$customgroup=$_POST['customgroup'];
						$jashnvareh=$_POST['jashnvareh'];
						@$status=$_POST['status'];
						$jashnvarehheader=substr($jashnvareh,3);
						?>
						<center>
							<?php if ($status!=null): ?>
							<h4 class="box-title"><?php echo "ارزیابی های اجمالی گروه علمی:".$customgroup.' در جشنواره '.$jashnvarehheader.' با وضعیت '.$status ?></h4>
							<?php else: ?>
								<h4 class="box-title"><?php echo "ارزیابی های اجمالی گروه علمی:".$customgroup.' در جشنواره '.$jashnvarehheader?></h4>
							<?php endif; ?>
						</center>
						<br/><br/>
						
						
						<table id="myTable3" class="arzyabishodetable" style="overflow-x: auto">
							
							<?php
								switch ($status){
									case 'اجمالی ردی':
										$result=mysqli_query($connection,"select distinct(codeasar),nameasar,fileasar,ghalebpazhouhesh,satharzyabi,groupelmi,nobat_arzyabi from etelaat_a where jashnvareh='$jashnvareh' and groupelmi='$customgroup' and nobat_arzyabi='اجمالی ردی' order by groupelmi asc") ;
										break;
									case 'اجمالی قبول':
										$result=mysqli_query($connection,"select distinct(codeasar),nameasar,fileasar,ghalebpazhouhesh,satharzyabi,groupelmi,nobat_arzyabi from etelaat_a where jashnvareh='$jashnvareh' and groupelmi='$customgroup' and nobat_arzyabi!='اجمالی ردی' order by groupelmi asc") ;
										break;
									default:
										$result=mysqli_query($connection,"select distinct(codeasar),nameasar,fileasar,ghalebpazhouhesh,satharzyabi,groupelmi,nobat_arzyabi from etelaat_a where jashnvareh='$jashnvareh' and groupelmi='$customgroup' and nobat_arzyabi is not null order by groupelmi asc") ;
										break;
								}
								foreach ($result as $items):
									$codeasarselect=$items['codeasar'];
									$resultselection=mysqli_query($connection,"select * from rater_comments_archive where `codeasar`='$codeasarselect' and comment is not null");
									
									?>
									<tr style="background-color: #4ca20b; border-bottom: hidden; overflow-x: auto">
										<td style="width: 300px">کد اثر:
											<label>
												<?php echo $items['codeasar']; ?>
											</label>
										
										</td>
											<td>نام اثر:
												<label style="width: 700px">
													<a target="_blank" style="color: black" href="<?php
														$file=$items['fileasar'];
														echo $file ?>">
														<?php echo $items['nameasar']; ?>
													</a>
												
												</label>
												
												<span>
													<?php
														switch ($status){
															case 'اجمالی ردی':
																echo 'اجمالی ردی';
																break;
															case 'اجمالی قبول':
																echo 'اجمالی قبول';
																break;
															default:
																echo $items['nobat_arzyabi'];
																break;
														}
													?>
                                                </span>
											</td>
									</tr>
									<?php
									
									$etaresult=mysqli_query($connection,"select * from etelaat_a where codeasar='$codeasarselect'");
									foreach ($etaresult as $eta):
										?>
										<tr style="background-color: #4ca20b">
											<td style="width: 300px">قالب پژوهش:
												<label>
													<?php echo $eta['ghalebpazhouhesh']; ?>
												</label>
											
											</td>
											<td>سطح ارزیابی:
												<label style="">
													<?php echo $eta['satharzyabi']; ?>
												</label>
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												گروه علمی:
												<label style="">
													<?php echo $eta['groupelmi']; ?>
												</label>
											</td>
										
										</tr>
									<?php endforeach; ?>
									
									
									
									<?php
									foreach ($resultselection as $values):
										?>
										<tr>
											<td  style="border-bottom:2px solid black; background-color: #7abaff">
												نظر استاد
												<?php echo $values['rater_info'] ?>
												<br/>
												در تاریخ
												<?php echo $values['tarikhsabt_year'].'/'.$values['tarikhsabt_month'].'/'.$values['tarikhsabt_day'] ?>
											
											</td>
												<td>
													
													<label style="700px">
														<?php if ($values['accept_or_reject']=="راه‌یابی اثر به مرحله تفصیلی"): ?>
															<label style="color: #0000CC"><?php echo $values['accept_or_reject'] ?></label>
														<?php endif; ?>
														<?php if ($values['accept_or_reject']=="توقف اثر در مرحله اجمالی"): ?>
															<label style="color: red"><?php echo $values['accept_or_reject'] ?></label>
														<?php endif; ?>
														<?php if ($values['accept_or_reject']=="نیاز به بررسی بیشتر در گروه"): ?>
															<label style="color: red"><?php echo $values['accept_or_reject'] ?></label>
														<?php endif; ?>
													</label>
												</td>
										
										</tr>
										<tr>
											<td>
												<p style="direction: ltr">
													توضیحات
												</p>
											
											</td>
											<td>
												<label style="overflow-x: auto ;width: 900px; height: 150px;" dir="rtl">
													<?php
														echo $values['comment']
													?>
												</label >
											
											</td>
										</tr>
									
									
									
									<?php
									endforeach;
								endforeach;
							
							?>
						</table>
					
					
					<?php
					endif;
				
				?>
			
			</div>
	</section>

</div>
</section>
<?php endif; ?>




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
