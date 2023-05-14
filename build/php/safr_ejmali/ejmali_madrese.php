<?php
	$state=$_SESSION['city'];
	$city=$_SESSION['shahr_name'];
    $school=$_SESSION['school'];
?>
<section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-success" style="overflow-x: auto">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>

                    <h3 class='box-title'>
                        لیست آثار برای اختصاص به ارزیاب اجمالی
                        - مدرسه
                        <?php echo $school ?>
                        - استان
						<?php
							if ($state=='اصفهان' and $city=='کاشان'){
								echo "منطقه کاشان";
							}elseif ($state=='آذربایجان شرقی' and $city=='بناب'){
								echo "منطقه بناب";
							}else{
								echo $state;} ?>
                        - شهرستان
                        <?php echo $city ?>

                    </h3>

                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <input type="text" style="padding: 7px" id="codeasar" onkeyup="searchcodeasar()" placeholder="جستجو در کد اثر" title="جستجو در کد اثر">
                    <input type="text" style="padding: 7px" id="nameasar" onkeyup="searchnameasar()" placeholder="جستجو در نام اثر" title="جستجو در نام اثر">
                    <input type="text" style="padding: 7px" id="myinput" onkeyup="searchfunction()" placeholder="جستجو در گروه علمی" title="جستجو در گروه علمی">
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
                                    اختصاص به ارزیاب
                                </th>
                            </tr>
							
							<?php
                            $a=1;
                            $user=$_SESSION['username'];
								if ($state=='آذربایجان شرقی' and $city=='بناب'){
									$selectfrometelaat_aforejmaliostan = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_madrese='ارزیابی اجمالی' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and etelaat_a.fileasar is not null and etelaat_p.ostantahsili='آذربایجان شرقی' and etelaat_p.shahrtahsili='بناب' and etelaat_a.approve_sianat=0 and etelaat_p.madrese='$school' order by etelaat_a.groupelmi asc");
								}elseif($state=='اصفهان' and $city=='کاشان'){
									$selectfrometelaat_aforejmaliostan = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_madrese='ارزیابی اجمالی' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and etelaat_p.ostantahsili='اصفهان' and etelaat_a.fileasar is not null and etelaat_p.shahrtahsili='کاشان' and etelaat_a.approve_sianat=0 and etelaat_p.madrese='$school' order by etelaat_a.groupelmi asc");
								}else{
									$selectfrometelaat_aforejmaliostan = mysqli_query($connection, "SELECT * FROM `etelaat_a` inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.nobat_arzyabi_madrese='ارزیابی اجمالی' and etelaat_a.vaziatkarnamemadrese='در حال ارزیابی' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.shahrtahsili!='کاشان' and etelaat_a.fileasar is not null and etelaat_p.shahrtahsili!='بناب' and etelaat_a.approve_sianat=0 and etelaat_p.madrese='$school' order by etelaat_a.groupelmi asc");
								}
								foreach ($selectfrometelaat_aforejmaliostan as $bin):
									?>

                                    <tr>
                                        <td><?php echo $a;$a++; ?></td>

                                        <td>
											<?php echo $bin['codeasar']; ?>
                                        </td>
                                        <td>
                                            <a href="<?php if ($bin['fileasar']=='dist/files/asar_files/'){echo $bin['fileasar_word'];} else {echo $bin['fileasar'];} ?>" target="_blank">
                                                <label style="width: 300px">
													<?php echo $bin['nameasar']; ?>
                                                </label>
                                            </a>
                                        </td>
                                        <td>
											<?php echo $bin['ghalebpazhouhesh']." سطح ".$bin['satharzyabi']; ?>
                                        </td>
                                        <td>
											<?php echo $bin['groupelmi']; ?>
                                        </td>
                                        <td>
                                            <select style="font-size: small;padding: 5px" onchange="sendcode(this.value,<?php echo $bin['codeasar'] ?>)">
                                                <option style="color: #aeaeae;">نام خانوادگی ارزیاب را تایپ کنید</option>
												<?php
													if ($state=='اصفهان' and $city=='کاشان'){
														$query=mysqli_query($connection,"select * from rater_list where city_name='اصفهان' and shahr_name='کاشان' and approved=1 order by family asc");
													}elseif($state=='آذربایجان شرقی' and $city=='بناب'){
														$query=mysqli_query($connection,"select * from rater_list where city_name='آذربایجان شرقی' and shahr_name='بناب' and approved=1 order by family asc");
													}else{
														$query=mysqli_query($connection,"select * from rater_list where city_name='$state' and shahr_name!='بناب' and shahr_name!='کاشان' and approved=1 and type!=1 order by family asc");
													}
													foreach ($query as $raters):
														?>
                                                        <option style="color: black;font-size: medium" <?php if($raters['username']==$bin['codearzyabejmali_madrese']){echo 'selected';} ?> value="<?php echo $raters['username'] ?>"><?php echo $raters['family'].' - '.$raters['name'] ?></option>
													<?php endforeach; ?>
                                            </select>
                                        </td>
                                        <script>
                                            function sendcode(coderater,codeasar) {
                                                var xmlhttp=new XMLHttpRequest();
                                                xmlhttp.open("GET","/build/ajax/setejm.php?ratercode="+coderater+"&codeasar="+codeasar,true);
                                                xmlhttp.send();
                                            }
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
                                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-plus"></i>
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
										if ($city!='بناب' and $city!='کاشان'){
											$resultraters=mysqli_query($connection,"select * from rater_list WHERE `type`=0 and city_name='$state' and shahr_name!='بناب' and shahr_name!='کاشان' and approved=1 order by family asc");
										}elseif($city=='بناب'){
											$resultraters=mysqli_query($connection,"select * from rater_list WHERE `type`=0 and shahr_name='بناب' and approved=1 order by family asc");
										}elseif($city=='بناب'){
											$resultraters=mysqli_query($connection,"select * from rater_list WHERE `type`=0 and shahr_name='بناب' and approved=1 order by family asc");
										}
										
										foreach ($resultraters as $raters): ?>
                                            <tr>
                                                <td>
													<?php echo $raters['code'] ?>
                                                </td>
                                                <td>
													<?php echo $raters['name']." ".$raters['family'] ?>
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
            </div></section>
        <script>
            function validateremoveejmalimadrese(){
                var asarcode = document.forms["remform"]["remasarcode"].value;
                if (asarcode == ''){
                    alert("کد اثر وارد نشده است");
                    return false;
                }
                else{
                    return true;
                }
            }
        </script>