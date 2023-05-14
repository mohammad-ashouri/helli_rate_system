<center>
    <h4 class="box-title">
        اطلاعات تعداد نفرات ثبت نامی در هر استان
    </h4>
    <table class="tableamarostan">
        <tr>
            <th style="text-align: center;border-bottom: 1px solid black">استان</th>
            <th style="text-align: center;border-bottom: 1px solid black">تعداد کل (اثر)</th>
            <th style="text-align: center;border-bottom: 1px solid black">برادران</th>
            <th style="text-align: center;border-bottom: 1px solid black">خواهران</th>
        </tr>
        <tr>
            <th>آذربایجان شرقی</th>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='آذربایجان شرقی' and shahrtahsili!='بناب' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='آذربایجان شرقی' and shahrtahsili!='بناب' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='آذربایجان شرقی' and shahrtahsili!='بناب' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>آذربایجان غربی</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='آذربایجان غربی' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='آذربایجان غربی' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='آذربایجان غربی' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>اردبیل</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='اردبیل' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='اردبیل' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='اردبیل' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>اصفهان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='اصفهان' and shahrtahsili!='کاشان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='اصفهان' and shahrtahsili!='کاشان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='اصفهان' and shahrtahsili!='کاشان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>البرز</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='البرز' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='البرز' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='البرز' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>ایلام</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='ایلام' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='ایلام' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='ایلام' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>بوشهر</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='بوشهر' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='بوشهر' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='بوشهر' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>تهران</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='تهران' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='تهران' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='تهران' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>خراسان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خراسان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خراسان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خراسان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>خراسان جنوبی</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خراسان جنوبی' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خراسان جنوبی' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خراسان جنوبی' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>خوزستان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خوزستان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خوزستان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='خوزستان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>زنجان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='زنجان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='زنجان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='زنجان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>سمنان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='سمنان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='سمنان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='سمنان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>سیستان و بلوچستان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='سیستان و بلوچستان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='سیستان و بلوچستان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='سیستان و بلوچستان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>فارس</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='فارس' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='فارس' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='فارس' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>قزوین</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='قزوین' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='قزوین' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='قزوین' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>قم</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='قم' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='قم' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='قم' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>لرستان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='لرستان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='لرستان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='لرستان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>مازندران</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='مازندران' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='مازندران' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='مازندران' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>مرکزی</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='مرکزی' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='مرکزی' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='مرکزی' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>منطقه بناب</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where shahrtahsili='بناب' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where shahrtahsili='بناب' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where shahrtahsili='بناب' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>منطقه کاشان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where shahrtahsili='کاشان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where shahrtahsili= 'کاشان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where shahrtahsili='کاشان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>هرمزگان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='هرمزگان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='هرمزگان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='هرمزگان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>همدان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='همدان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='همدان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='همدان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>چهارمحال و بختیاری</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='چهارمحال و بختیاری' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='چهارمحال و بختیاری' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='چهارمحال و بختیاری' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>کردستان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کردستان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کردستان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کردستان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>کرمان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کرمان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کرمان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کرمان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>کرمانشاه</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کرمانشاه' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کرمانشاه' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کرمانشاه' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>کهگیلویه و بویراحمد</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کهگیلویه و بویراحمد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کهگیلویه و بویراحمد' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='کهگیلویه و بویراحمد' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>گلستان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='گلستان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='گلستان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='گلستان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>گیلان</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='گیلان' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='گیلان' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='گیلان' and gender='زن' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>یزد</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='یزد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='یزد' and gender='مرد' and jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli from etelaat_p where ostantahsili='یزد' and gender='زن' and jashnvareh='$jashnvareh'");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
        <tr>
            <th>تعداد کل</th>
            <td><?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli,jashnvareh from etelaat_p where jashnvareh='$jashnvareh' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?></td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli,jashnvareh from etelaat_p where jashnvareh='$jashnvareh' and gender='مرد' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
            <td>
                <?php
                $sql=mysqli_query($connection,"SELECT distinct codemelli,jashnvareh from etelaat_p where jashnvareh='$jashnvareh' and gender='زن' ");
                $result2 = printf(mysqli_num_rows( $sql )) ;
                ?>
            </td>
        </tr>
    </table>
</center>
<br/><br/>