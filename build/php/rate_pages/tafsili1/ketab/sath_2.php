<form method="post" action="inc_t1.php" id="myform" onsubmit="return validateForm()">
    <div class="box-body">
        <table style="font-size: 15px">
            <tr style="border-bottom: 3px solid black; ">
                <td style="padding-bottom: 5px">
                    <label>
                        کد اثر:
                        <?php echo $codeasar; ?>
                    </label>
                </td>
            </tr>
            <?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'): ?>
        <tr style="border-bottom: 3px solid black; ">
        <?php else: ?>
            <tr>
                <?php endif; ?>
                <td style="padding-top: 8px">
                    <label>
                        نام اثر:
                        <?php echo $item['nameasar']; ?>
                    </label>
                </td>
            </tr>
            <?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'): ?>
                <tr>
                    <td style="padding-top: 8px">
                        <label>
                            ارزیابی این اثر توسط استاد
                            <?php
                            $rater_id=$item['rater_id'];
                            $query=mysqli_query($connection,"select * from rater_list where username='$rater_id'");
                            foreach ($query as $rater_items){}
                            echo $rater_items['name'].' '.$rater_items['family'];
                            ?>
                            در تاریخ
                            <?php echo $item['datesabt'] ?>
                            ثبت شده است
                        </label>
                    </td>
                </tr>
            <?php endif; ?>
        </table>

        <br/>
        <center>
            <table class="tabletafsili" >
                <tr>
                    <th>رعایت ساختار اثر:
                        <br>
                        <span style="color: darkgreen; font-size: 11px">
                        [عنوان مناسب (2) - فهرست کامل مطالب (2) - مقدمه (4) - فهرست منابع (3) - ارجاع‌دهی واضح و شفاف (4) - نتیجه‌گیری (5)]</th>
                    </th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['reayatsakhtarasar'];} ?>" id="t1" type="number" step="any" name="t1" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 20
                    </td>

                </tr>
                <tr>
                    <th>شیوایی و رسایی متن</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['shivaeematn'];} ?>" id="t2" type="number" step="any" name="t2" class="rate_inputs" onblur="calcular()" >

                        &nbsp;&nbsp;
                        از 6
                    </td>
                </tr>
                <tr>
                    <th>رعایت آیین نگارش </th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['reayataeinnegaresh'];} ?>" id="t3" type="number" step="any" name="t3" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 7
                    </td>
                </tr>
                <tr>
                    <th>تبیین و تحدید دقیق مسأله</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['tabiinmasale'];} ?>" id="t4" type="number" step="any" name="t4" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 6
                    </td>
                </tr>
                <tr>
                    <th>سازماندهی و ترتیب منطقی مباحث</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['sazmandehimabahes'];} ?>" id="t5" type="number" step="any" name="t5" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>پرهیز از مطالب حاشیه‌ای و زائد</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['parhizazmatalebzaed'];} ?>" id="t6" type="number" step="any" name="t6" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 3
                    </td>
                </tr>
                <tr>
                    <th>استفاده از منابع معتبر و متعدد</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['estefadeazmanabe'];} ?>" id="t7" type="number" step="any" name="t7" class="rate_inputs" onblur="calcular()" >

                        &nbsp;&nbsp;
                        از 6
                    </td>
                </tr>
                <tr>
                    <th>کیفیت تببین و تحلیل مطالب و صحت استدلال</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['keyfiattabiinmataleb'];} ?>" id="t8" type="number" step="any" name="t8" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 20</td>
                </tr>
                <tr>
                    <th>اهمیت مسأله و ابتناء آن بر نیاز</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['ahammiatmasale'];} ?>" id="t9" type="number" step="any" name="t9" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 3
                    </td>
                </tr>
                <tr>
                    <th>نوآوری در تنظیم و ارائه مطالب</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['noavaridartanzim'];} ?>" id="t10" type="number" step="any" name="t10" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>روشمندی اثر (توصیفی، تبیینی، تطبیقی، تحلیلی و...)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['raveshmandiasar'];} ?>" id="t11" type="number" step="any" name="t11" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>پردازش محتوا بوسیله نویسنده</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['pardazeshmohtava'];} ?>" id="t12" type="number" step="any" name="t12" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 6
                    </td>
                </tr>
                <tr>
                    <th>کیفیت استنتاج و دست‌یابی به اهداف پژوهش</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['dastyabibeahdaf'];} ?>" id="t13" type="number" step="any" name="t13" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>نقد و نوآوری علمی</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['naghdvanoavarielmi'];} else {echo 0;} ?>" id="t14" type="number" step="any" name="t14" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        3+
                    </td>
                </tr>
                <tr>
                    <th>
                        امتیازات ویژه
                        <span style="color: darkgreen; font-size: 11px">
                            [اعتبار ناشر، نوبت چاپ، طرح جلد، صفحه‌آرایی و جذابیت ظاهری، داشتن فیپا، فونت مناسب و...]
                        </span>
                    </th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['emtiazatvizheh'];} else {echo 0;} ?>" id="t15" type="number" step="any" name="t15" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        3+
                    </td>
                </tr>
                <tr>
                    <th>عدم رعایت اخلاق پژوهشی:
                        <br>
                        <span style="color: darkgreen; font-size: 11px">
                            [ادب در نقد، تواضع علمی، احترام به محققین و مؤلفین و...]
                        </span>

                    </th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['adamreayatakhlaghpazhooheshi'];} else {echo 0;} ?>" id="t16" type="number" step="any" name="t16" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        5-
                    </td>
                </tr>
                <tr >
                    <th style="border: 0px;border-bottom-color: white;text-align: left; background-color: white">

                    </th>
                    <td style="border: 0px;text-align: center; ">
                        جمع امتیازات:
                        <label style="padding: 1px;color: blue" id="resultado"><?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['jam'];} ?></label>
                    </td>
                </tr>
            </table>

            <br/>
            <div class="row">
                <section class="col-lg-12 col-md-12">
                    <div class="box box-solid box-warning">
                        <div class="box-header">
                            <h3 class="box-title">
                                ارزشیابی توصیفی
                            </h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <textarea name="tozihat" id="tosifi" class="tozihat_textarea"  placeholder="ارزیاب محترم: با توجه به ارسال نقاط قوت و ضعف این اثر برای نویسنده، لطفا ارزشیابی توصیفی خود درباره این اثر و موارد احتمالی قوت یا ضعف آن را بصورت جزئی و حداقل در 250 کاراکتر در این کادر یادداشت فرمایید."><?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m'){echo @$item['tozihat'];} ?></textarea>

                    </div>
                </section>
            </div>
            <br/>
            <center>
                <input type="hidden" name="codeasarfield" value="<?php echo $codeasar; ?>">
	            <?php if ($_POST['subjection']==null): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketab" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='statet1'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='schoolt1'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabmadrese" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili1ostan'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili1madrese'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabmadrese" value="ثبت ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt1o'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt1ketabostani" value="ویرایش ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt1m'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt1ketabmadrese" value="ویرایش ارزیابی">
                    </p>
	            <?php endif; ?>
            </center>


</form>
</center>



</div>
</form>

<script src="build/js/rateforms/t1/k2.js"></script>