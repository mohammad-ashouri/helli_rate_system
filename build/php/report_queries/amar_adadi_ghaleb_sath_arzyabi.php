<?php
//آمار عددی بر اساس قالب پژوهش و سطح ارزیابی
//مقاله
$maghalesabtnami=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.jashnvareh='$jashnvareh' ");
$maghalesath1=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=1 and etelaat_a.jashnvareh='$jashnvareh' ");
$maghalesath2=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=2 and etelaat_a.jashnvareh='$jashnvareh' ");
$maghalesath3=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=3 and etelaat_a.jashnvareh='$jashnvareh' ");
$maghalesath4=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi=4 and etelaat_a.jashnvareh='$jashnvareh' ");
//پایان‌نامه
$payannamesabtnami=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.jashnvareh='$jashnvareh' ");
$payannamesath1=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi=1 and etelaat_a.jashnvareh='$jashnvareh' ");
$payannamesath2=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi=2 and etelaat_a.jashnvareh='$jashnvareh' ");
$payannamesath3=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi=3 and etelaat_a.jashnvareh='$jashnvareh' ");
$payannamesath4=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi=4 and etelaat_a.jashnvareh='$jashnvareh' ");
//تحقیق پایانی
$tahghighpayanisabtnami=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.jashnvareh='$jashnvareh' ");
$tahghighpayanisath1=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi=1 and etelaat_a.jashnvareh='$jashnvareh' ");
$tahghighpayanisath2=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi=2 and etelaat_a.jashnvareh='$jashnvareh' ");
$tahghighpayanisath3=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi=3 and etelaat_a.jashnvareh='$jashnvareh' ");
$tahghighpayanisath4=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi=4 and etelaat_a.jashnvareh='$jashnvareh' ");
//کتاب
$ketabsabtnami=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh like '%کتاب%' and etelaat_a.jashnvareh='$jashnvareh' ");
$ketabsath1=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh like '%کتاب%' and etelaat_a.satharzyabi=1 and etelaat_a.jashnvareh='$jashnvareh' ");
$ketabsath2=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh like '%کتاب%' and etelaat_a.satharzyabi=2 and etelaat_a.jashnvareh='$jashnvareh' ");
$ketabsath3=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh like '%کتاب%' and etelaat_a.satharzyabi=3 and etelaat_a.jashnvareh='$jashnvareh' ");
$ketabsath4=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh like '%کتاب%' and etelaat_a.satharzyabi=4 and etelaat_a.jashnvareh='$jashnvareh' ");
//فاقد قالب پژوهش
$faghedghaleb=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.ghalebpazhouhesh not like '%کتاب%' and etelaat_a.ghalebpazhouhesh!='تحقیق پایانی' and etelaat_a.ghalebpazhouhesh!='پایان‌نامه' and etelaat_a.ghalebpazhouhesh!='مقاله' and etelaat_a.jashnvareh='$jashnvareh' ");
//فاقد سطح ارزیابی چهار قالب پژوهش
$faghedsathmaghale=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.ghalebpazhouhesh='مقاله' and etelaat_a.satharzyabi is null ");
$faghedsathtahghighpayani=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.ghalebpazhouhesh='تحقیق پایانی' and etelaat_a.satharzyabi is null ");
$faghedsathpayanname=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.ghalebpazhouhesh='پایان‌نامه' and etelaat_a.satharzyabi is null ");
$faghedsathketab=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.ghalebpazhouhesh like '%کتاب%' and etelaat_a.satharzyabi is null ");
?>

<center>
    <h3 class="box-title">آمار عددی بر اساس قالب پژوهش و سطح ارزیابی آثار ثبت شده</h3>
    <table class="tableamarasar">
        <tr >
            <td>تعداد کل آثار: <?php printf(mysqli_num_rows($kolleasar)) ?></td>
            <td style="text-align: center"> مقالات </td>
            <td style="text-align: center"> تحقیق پایانی </td>
            <td style="text-align: center"> پایان‌نامه </td>
            <td style="text-align: center"> کتاب </td>
            <td style="text-align: center"> فاقد قالب پژوهش </td>


        </tr>

        <tr>
            <th>ثبت نامی</th>
            <td> <?php $tmaghalesabtnami=printf(mysqli_num_rows($maghalesabtnami)) ?> </td>
            <td> <?php  $ttahghighpayanisabtnami=printf(mysqli_num_rows($tahghighpayanisabtnami)) ?> </td>
            <td> <?php  $tpayannamesabtnami=printf(mysqli_num_rows($payannamesabtnami)) ?> </td>
            <td> <?php  $tketabsabtnami=printf(mysqli_num_rows($ketabsabtnami)) ?> </td>
            <td> <?php  $tfaghed=printf(mysqli_num_rows($faghedghaleb)) ?> </td>


        </tr>
        <tr>
            <th> سطح اول </th>
            <td> <?php  $tmaghalesath1=printf(mysqli_num_rows($maghalesath1)) ?> </td>
            <td> <?php  $ttahghighpayanisath1=printf(mysqli_num_rows($tahghighpayanisath1)) ?> </td>
            <td> <?php  $tpayannamesath1=printf(mysqli_num_rows($payannamesath1)) ?> </td>
            <td> <?php  $tketabsath1=printf(mysqli_num_rows($ketabsath1)) ?> </td>
        </tr>
        <tr>
            <th> سطح دوم </th>
            <td> <?php  $tmaghalesath2=printf(mysqli_num_rows($maghalesath2)) ?> </td>
            <td> <?php  $ttahghighpayanisath2=printf(mysqli_num_rows($tahghighpayanisath2)) ?> </td>
            <td> <?php  $tpayannamesath2=printf(mysqli_num_rows($payannamesath2)) ?> </td>
            <td> <?php  $tketabsath2=printf(mysqli_num_rows($ketabsath2)) ?> </td>
        </tr>
        <tr>
            <th> سطح سوم </th>
            <td> <?php  $tmaghalesath3=printf(mysqli_num_rows($maghalesath3)) ?> </td>
            <td> <?php  $ttahghighpayanisath3=printf(mysqli_num_rows($tahghighpayanisath3)) ?> </td>
            <td> <?php  $tpayannamesath3=printf(mysqli_num_rows($payannamesath3)) ?> </td>
            <td> <?php  $tketabsath3=printf(mysqli_num_rows($ketabsath3)) ?> </td>
        </tr>
        <tr>
            <th> سطح چهارم </th>
            <td> <?php  $tmaghalesath4=printf(mysqli_num_rows($maghalesath4)) ?> </td>
            <td> <?php  $ttahghighpayanisath4=printf(mysqli_num_rows($tahghighpayanisath4)) ?> </td>
            <td> <?php  $tpayannamesath4=printf(mysqli_num_rows($payannamesath4)) ?> </td>
            <td> <?php  $tketabsath4=printf(mysqli_num_rows($ketabsath4)) ?> </td>
        </tr>
        <tr>
            <th>بلاتکلیف (بدون سطح)</th>
            <td><?php $tfaghelmaghele=printf(mysqli_num_rows($faghedsathmaghale));
                ?></td>
            <td><?php $tfaghedsathtahghighpayani=printf(mysqli_num_rows($faghedsathtahghighpayani));
                ?></td>
            <td><?php $tfaghedsathpayanname=printf(mysqli_num_rows($faghedsathpayanname));
                ?></td>
            <td><?php $tfaghedsathketab=printf(mysqli_num_rows($faghedsathketab));
                ?></td>
        </tr>
    </table>
</center>
