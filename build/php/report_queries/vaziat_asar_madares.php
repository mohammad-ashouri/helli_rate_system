<center>
    <h4 class="box-title">
        اطلاعات تعداد نفرات ثبت نامی در هر استان
    </h4>
    <table class="tableamarostan table-bordered" style="border-color: black">
        <tr>
            <th style="text-align: center;border-bottom: 1px solid black">استان</th>
            <th style="text-align: center;border-bottom: 1px solid black">تعداد کل ارجاع داده شده (اثر)</th>
            <th style="text-align: center;border-bottom: 1px solid black">تعداد مدارس</th>
            <th style="text-align: center;border-bottom: 1px solid black">مدارس</th>
        </tr>
        <?php
        $query=mysqli_query($connection,"select distinct ostantahsili from etelaat_p where jashnvareh='$jashnvareh' and ostantahsili!='' and ostantahsili is not null order by ostantahsili");
        $states = [];

        while ($row = mysqli_fetch_array($query)) :
            $state = $row['ostantahsili'];
        ?>
        <tr>
            <th><?php echo $state; ?></th>
            <td>
                <?php
                $allPosts=mysqli_query($connection,"SELECT * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state')) and (etelaat_a.vaziatmadreseasar!='' and etelaat_a.vaziatmadreseasar is not null) and ((etelaat_a.nobat_arzyabi_madrese!='ارزیابی اجمالی')) and etelaat_a.jashnvareh='$jashnvareh'");
                 printf(mysqli_num_rows( $allPosts )) ;
                ?>
            </td>
            <td>
                <?php
                $allSchools=mysqli_query($connection,"SELECT DISTINCT shahrtahsili from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state')) and (etelaat_a.vaziatmadreseasar!='' and etelaat_a.vaziatmadreseasar is not null) and ((etelaat_a.nobat_arzyabi_madrese!='ارزیابی اجمالی')) and etelaat_a.jashnvareh='$jashnvareh'");
                printf(mysqli_num_rows( $allSchools )) ;
                ?>
            </td>
            <td>
                <div style="padding: 10px">
                <?php
                $allSchools=mysqli_query($connection,"SELECT distinct shahrtahsili,madrese from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state')) and (etelaat_a.vaziatmadreseasar!='' and etelaat_a.vaziatmadreseasar is not null) and ((etelaat_a.nobat_arzyabi_madrese!='ارزیابی اجمالی')) and etelaat_a.jashnvareh='$jashnvareh' order by madrese");
                foreach ($allSchools as $key=>$school){
                    echo ++$key . ". $school[shahrtahsili] - $school[madrese] <hr style='border-top: 1px solid red; background-color: blue;padding: 0'>";
                }
                ?>
                </div>
            </td>
        </tr>
        <?php endwhile; ?>

        <tr>
<!--            <th>تعداد کل</th>-->
<!--            <td>--><?php
//                $sql=mysqli_query($connection,"SELECT distinct codemelli,jashnvareh from etelaat_p where jashnvareh='$jashnvareh' ");
//                $result2 = printf(mysqli_num_rows( $sql )) ;
//                ?><!--</td>-->
<!--            <td>-->
<!--                --><?php
//                $sql=mysqli_query($connection,"SELECT distinct codemelli,jashnvareh from etelaat_p where jashnvareh='$jashnvareh' and gender='مرد' ");
//                $result2 = printf(mysqli_num_rows( $sql )) ;
//                ?>
<!--            </td>-->
<!--            <td>-->
<!--                --><?php
//                $sql=mysqli_query($connection,"SELECT distinct codemelli,jashnvareh from etelaat_p where jashnvareh='$jashnvareh' and gender='زن' ");
//                $result2 = printf(mysqli_num_rows( $sql )) ;
//                ?>
<!--            </td>-->
        </tr>
    </table>
</center>
<br/><br/>