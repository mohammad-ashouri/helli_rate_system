<br/><br/>
<?php
$query1=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query2=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query3=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query4=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query5=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query6=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query7=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query8=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query9=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query10=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query11=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query12=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query13=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query14=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اخلاق و تربیت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query15=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query16=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query17=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query18=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query19=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query20=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query21=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query22=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query23=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query24=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query25=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query26=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query27=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query28=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='ادبیات' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query29=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query30=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query31=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query32=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query33=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query34=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query35=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query36=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query37=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query38=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query39=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query40=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query41=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query42=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اصول فقه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query43=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query44=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query45=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query46=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query47=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query48=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query49=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query50=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query51=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query52=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query53=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query54=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query55=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query56=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تاریخ اسلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query57=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query58=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query59=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query60=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query61=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query62=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query63=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query64=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query65=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query66=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query67=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query68=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query69=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query70=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='تفسیر و علوم قرآنی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query71=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query72=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query73=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query74=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query75=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query76=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query77=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query78=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query79=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query80=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query81=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query82=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query83=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query84=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم انسانی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query85=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query86=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query87=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query88=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query89=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query90=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query91=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query92=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query93=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query94=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query95=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query96=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query97=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query98=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم حدیث و درایه' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query99=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query100=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query101=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query102=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query103=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query104=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query105=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query106=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query107=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query108=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query109=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query110=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query111=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query112=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فقه و حقوق اسلامی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query113=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query114=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query115=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query116=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query117=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query118=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query119=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query120=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query121=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query122=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query123=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query124=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query125=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query126=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='فلسفه و منطق' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query127=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query128=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query129=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query130=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query131=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query132=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query133=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query134=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query135=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query136=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query137=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query138=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query139=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query140=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='کلام' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query141=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query142=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query143=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query144=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query145=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query146=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query147=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query148=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query149=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query150=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query151=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query152=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query153=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query154=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='سیاسی و اجتماعی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query155=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query156=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query157=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query158=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query159=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query160=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query161=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query162=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query163=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query164=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query165=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query166=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query167=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query168=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='اقتصاد و مدیریت' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query169=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.jashnvareh='$jashnvareh'");
$query170=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.jashnvareh='$jashnvareh'");
$query171=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query172=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.vaziatostaniasar is not null and etelaat_a.vaziatpazireshasar='پذیرش شد' and etelaat_a.sharayetavalliehsherkat='دارد' and etelaat_a.jashnvareh='$jashnvareh'");
$query173=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query174=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='اجمالی ردی' and etelaat_a.jashnvareh='$jashnvareh'");
$query175=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query176=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query177=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query178=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='در حال ارزیابی' and etelaat_a.jashnvareh='$jashnvareh'");
$query179=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query180=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='مرد' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query181=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی دوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");
$query182=mysqli_query($connection,"select etelaat_a.codeasar from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.groupelmi='علوم تربیتی و روان‌شناسی' and etelaat_p.gender='زن' and etelaat_a.nobat_arzyabi='تفصیلی سوم' and vaziatkarname='اتمام ارزیابی' and bargozidehkeshvari='می باشد' and etelaat_a.jashnvareh='$jashnvareh'");

?>
<center>
    <h4 class="box-title">
        وضعیت آثار این دوره جشنواره بر اساس گروه علمی
    </h4>
    <table class="tableamarostan">
        <tr>
            <th rowspan="2" style="text-align: center">گروه علمی</th>
            <th colspan="2" style="text-align: center">تعداد کل آثار</th>
            <th colspan="2" style="text-align: center">راهیافته به کشوری</th>
            <th colspan="2" style="text-align: center">اجمالی ردی</th>
            <th colspan="2" style="text-align: center">راهیافته به تفصیلی</th>
            <th colspan="2" style="text-align: center">برگزیده کشوری</th>

        </tr>
        <tr>
            <th style="text-align: center">مرد</th>
            <th style="text-align: center">زن</th>
            <th style="text-align: center">مرد</th>
            <th style="text-align: center">زن</th>
            <th style="text-align: center">مرد</th>
            <th style="text-align: center">زن</th>
            <th style="text-align: center">مرد</th>
            <th style="text-align: center">زن</th>
            <th style="text-align: center">مرد</th>
            <th style="text-align: center">زن</th>
        </tr>
        <tr>
            <th>اخلاق و تربیت</th>
            <td><?php
                echo mysqli_num_rows($query1);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query2);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query3);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query4);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query5);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query6);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query7)+mysqli_num_rows($query8);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query9)+mysqli_num_rows($query10);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query11)+mysqli_num_rows($query12);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query13)+mysqli_num_rows($query14);
                ?>
            </td>
        </tr>
        <tr>
            <th>ادبیات</th>
            <td><?php
                echo mysqli_num_rows($query15);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query16);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query17);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query18);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query19);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query20);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query21)+mysqli_num_rows($query22);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query23)+mysqli_num_rows($query24);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query25)+mysqli_num_rows($query26);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query27)+mysqli_num_rows($query28);
                ?>
            </td>
        </tr>
        <tr>
            <th>اصول فقه</th>
            <td><?php
                echo mysqli_num_rows($query29);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query30);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query31);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query32);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query33);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query34);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query35)+mysqli_num_rows($query36);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query37)+mysqli_num_rows($query38);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query39)+mysqli_num_rows($query40);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query41)+mysqli_num_rows($query42);
                ?>
            </td>
        </tr>
        <tr>
            <th>تاریخ اسلام</th>
            <td><?php

                echo mysqli_num_rows($query43);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query44);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query45);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query46);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query47);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query48);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query49)+mysqli_num_rows($query50);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query51)+mysqli_num_rows($query52);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query53)+mysqli_num_rows($query54);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query55)+mysqli_num_rows($query56);
                ?>
            </td>
        </tr>
        <tr>
            <th>تفسیر و علوم قرآنی</th>
            <td><?php

                echo mysqli_num_rows($query57);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query58);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query59);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query60);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query61);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query62);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query63)+mysqli_num_rows($query64);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query65)+mysqli_num_rows($query66);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query67)+mysqli_num_rows($query68);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query69)+mysqli_num_rows($query70);
                ?>
            </td>
        </tr>
        <tr>
            <th>علوم انسانی</th>
            <td><?php

                echo mysqli_num_rows($query71);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query72);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query73);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query74);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query75);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query76);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query77)+mysqli_num_rows($query78);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query79)+mysqli_num_rows($query80);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query81)+mysqli_num_rows($query82);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query83)+mysqli_num_rows($query84);
                ?>
            </td>
        </tr>
        <tr>
            <th>علوم حدیث و درایه</th>
            <td><?php

                echo mysqli_num_rows($query85);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query86);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query87);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query88);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query89);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query90);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query91)+mysqli_num_rows($query92);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query93)+mysqli_num_rows($query94);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query95)+mysqli_num_rows($query96);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query97)+mysqli_num_rows($query98);
                ?>
            </td>
        </tr>
        <tr>
            <th>فقه و حقوق اسلامی</th>
            <td><?php

                echo mysqli_num_rows($query99);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query100);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query101);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query102);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query103);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query104);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query105)+mysqli_num_rows($query106);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query107)+mysqli_num_rows($query108);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query109)+mysqli_num_rows($query110);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query111)+mysqli_num_rows($query112);
                ?>
            </td>
        </tr>
        <tr>
            <th>فلسفه و منطق</th>
            <td><?php

                echo mysqli_num_rows($query113);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query114);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query115);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query116);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query117);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query118);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query119)+mysqli_num_rows($query120);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query121)+mysqli_num_rows($query122);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query123)+mysqli_num_rows($query124);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query125)+mysqli_num_rows($query126);
                ?>
            </td>
        </tr>
        <tr>
            <th>کلام</th>
            <td><?php

                echo mysqli_num_rows($query127);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query128);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query129);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query130);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query131);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query132);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query133)+mysqli_num_rows($query134);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query135)+mysqli_num_rows($query136);
                ?>
            </td>
            <td><?php
               echo mysqli_num_rows($query137)+mysqli_num_rows($query138);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query139)+mysqli_num_rows($query140);
                ?>
            </td>
        </tr>
        <tr>
            <th>سیاسی و اجتماعی</th>
            <td><?php

                echo mysqli_num_rows($query141);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query142);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query143);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query144);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query145);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query146);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query147)+mysqli_num_rows($query148);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query149)+mysqli_num_rows($query150);
                ?>
            </td>
            <td><?php
               echo mysqli_num_rows($query151)+mysqli_num_rows($query152);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query153)+mysqli_num_rows($query154);
                ?>
            </td>
        </tr>
        <tr>
            <th>اقتصاد و مدیریت</th>
            <td><?php

                echo mysqli_num_rows($query155);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query156);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query157);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query158);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query159);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query160);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query161)+mysqli_num_rows($query162);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query163)+mysqli_num_rows($query164);
                ?>
            </td>
            <td><?php
               echo mysqli_num_rows($query165)+mysqli_num_rows($query166);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query167)+mysqli_num_rows($query168);
                ?>
            </td>
        </tr>
        <tr>
            <th>علوم تربیتی و روان‌شناسی</th>
            <td><?php

                echo mysqli_num_rows($query169);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query170);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query171);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query172);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query173);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query174);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query175)+mysqli_num_rows($query176);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query177)+mysqli_num_rows($query178);
                ?>
            </td>
            <td><?php
               echo mysqli_num_rows($query179)+mysqli_num_rows($query180);
                ?>
            </td>
            <td><?php
                echo mysqli_num_rows($query181)+mysqli_num_rows($query182);
                ?>
            </td>
        </tr>
    </table>
    <br/><br/>