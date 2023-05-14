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
            <?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])): ?>
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
                    <th>اعتبار و ارزش علمی اثر (متن مصحح)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['etebarvaarzeshelmiasar_matnmosaheh'];} ?>" id="t1" type="number" step="any" name="t1" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 10
                    </td>

                </tr>
                <tr>
                    <th>میزان تسلط مصحح بر موضوع</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['mizantasallotmosahehbarmozoo'];} ?>" id="t2" type="number" step="any" name="t2" class="rate_inputs" onblur="calcular()" >

                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>اهمیت و مبتنی بر نیاز بودن اثر (متن مصحح)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['ahamiatvamobtanibarniazasar_matnmosaheh'];} ?>" id="t3" type="number" step="any" name="t3" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>تخریج مصادر</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['takhrijmasader'];} ?>" id="t4" type="number" step="any" name="t4" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>قدمت متن مصحح و دشواری تصحیح آن (تعدد و خوانابودن نسخ و افتادگی متن)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['ghedmatmatnmosaheh'];} ?>" id="t5" type="number" step="any" name="t5" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>انتخاب مناسب نسخه اصلی و بدل های معتبر</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['entekhabmonasebnoskheasli'];} ?>" id="t6" type="number" step="any" name="t6" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>فهم صحیح نسخه های اصلی و نقل دقیق نسخه بدل ها</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['fahmsahihnoskheasli'];} ?>" id="t7" type="number" step="any" name="t7" class="rate_inputs" onblur="calcular()">

                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>افزودن تعلیقات و پانوشت های علمی و توضیحی</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['afzoodantalighat'];} ?>" id="t8" type="number" step="any" name="t8" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 12</td>
                </tr>
                <tr>
                    <th>مقدمه جامع مصحح*</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['moghadamejamemosaheh'];} ?>" id="t9" type="number" step="any" name="t9" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>فهرست نویسی و عنوان بندی مناسب</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['fehrestnevisivaonvanbandi'];} ?>" id="t10" type="number" step="any" name="t10" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>ویرایش و استفاده از علائم نگارشی</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['virayeshvaestefadeazalaem'];} ?>" id="t11" type="number" step="any" name="t11" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>نداشتن سابقه تصحیح (متن مصحح)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['nadashtanesabaeghetashih_matnmosaheh'];} ?>" id="t12" type="number" step="any" name="t12" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>حجم متن مصحح (حداقل 40 صفحه)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['hajmmatnmosaheh'];} ?>" id="t13" type="number" step="any" name="t13" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>امتیازات ویژه
                        <span style="color: darkgreen; font-size: 11px">
                            [اعتبار ناشر، نوبت چاپ، طرح جلد، صفحه‌آرایی و جذابیت ظاهری، داشتن فیپا، فونت مناسب و...]</span>

                    </th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['emtiazatvizheh'];} else {echo 0;} ?>" id="t14" type="number" step="any" name="t14" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        3+
                    </td>
                </tr>
                <tr >
                    <th style="border: 0px;border-bottom-color: white;text-align: left; background-color: white">

                    </th>
                    <td style="border: 0px;text-align: center; ">
                        جمع امتیازات:
                        <label style="padding: 1px;color: blue" id="resultado"><?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['jam'];} ?></label>
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
                        <textarea name="tozihat" id="tosifi" class="tozihat_textarea"  placeholder="ارزیاب محترم: با توجه به ارسال نقاط قوت و ضعف این اثر برای نویسنده، لطفا ارزشیابی توصیفی خود درباره این اثر و موارد احتمالی قوت یا ضعف آن را بصورت جزئی و حداقل در 250 کاراکتر در این کادر یادداشت فرمایید."><?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['tozihat'];} ?></textarea>

                    </div>
                </section>
            </div>
            <br/>
        <br/>
            <center>
                <input type="hidden" name="codeasarfield" value="<?php echo $codeasar; ?>">
	            <?php if ($_POST['subjection']==null): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabtashih" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='statet1'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabtashihostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='schoolt1'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabtashihmadrese" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili1ostan'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabtashihostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili1madrese'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1ketabtashihmadrese" value="ثبت ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt1o'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt1ketabtashihostani" value="ویرایش ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt1m'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt1ketabtashihmadrese" value="ویرایش ارزیابی">
                    </p>
	            <?php endif; ?>
            </center>

</form>


</div>
</form>

<script src="build/js/rateforms/t1/ktt.js"></script>