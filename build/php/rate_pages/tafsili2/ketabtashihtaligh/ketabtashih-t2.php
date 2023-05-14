<form method="post" action="inc_t2.php" id="myform" onsubmit="return validateForm()">
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
            <?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])): ?>
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
            <?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])): ?>
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
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t1" type="number" step="any" name="t1" class="rate_inputs" onblur="calcular()"  value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['etebarvaarzeshelmiasar_matnmosaheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['etebarvaarzeshelmiasar_matnmosaheh'];} ?>">
                        &nbsp;&nbsp;
                        از 10
                    </td>

                </tr>
                <tr>
                    <th>میزان تسلط مصحح بر موضوع</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t2" type="number" step="any" name="t2" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['mizantasallotmosahehbarmozoo'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['mizantasallotmosahehbarmozoo'];} ?>" >

                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>اهمیت و مبتنی بر نیاز بودن اثر (متن مصحح)</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t3" type="number" step="any" name="t3" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['ahamiatvamobtanibarniazasar_matnmosaheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['ahamiatvamobtanibarniazasar_matnmosaheh'];} ?>">
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>تخریج مصادر</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t4" type="number" step="any" name="t4" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['takhrijmasader'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['takhrijmasader'];} ?>">
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>قدمت متن مصحح و دشواری تصحیح آن (تعدد و خوانابودن نسخ و افتادگی متن)</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t5" type="number" step="any" name="t5" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['ghedmatmatnmosaheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['ghedmatmatnmosaheh'];} ?>">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>انتخاب مناسب نسخه اصلی و بدل های معتبر</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t6" type="number" step="any" name="t6" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['entekhabmonasebnoskheasli'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['entekhabmonasebnoskheasli'];} ?>">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>فهم صحیح نسخه های اصلی و نقل دقیق نسخه بدل ها</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t7" type="number" step="any" name="t7" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['fahmsahihnoskheasli'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['fahmsahihnoskheasli'];} ?>">

                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>افزودن تعلیقات و پانوشت های علمی و توضیحی</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t8" type="number" step="any" name="t8" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['afzoodantalighat'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['afzoodantalighat'];} ?>">
                        &nbsp;&nbsp;
                        از 12</td>
                </tr>
                <tr>
                    <th>مقدمه جامع مصحح*</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t9" type="number" step="any" name="t9" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['moghadamejamemosaheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['moghadamejamemosaheh'];} ?>">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>فهرست نویسی و عنوان بندی مناسب</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t10" type="number" step="any" name="t10" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['fehrestnevisivaonvanbandi'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['fehrestnevisivaonvanbandi'];} ?>">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>ویرایش و استفاده از علائم نگارشی</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t11" type="number" step="any" name="t11" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['virayeshvaestefadeazalaem'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['virayeshvaestefadeazalaem'];} ?>">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>نداشتن سابقه تصحیح (متن مصحح)</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t12" type="number" step="any" name="t12" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['nadashtanesabaeghetashih_matnmosaheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['nadashtanesabaeghetashih_matnmosaheh'];} ?>">
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>حجم متن مصحح (حداقل 40 صفحه)</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t13" type="number" step="any" name="t13" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['hajmmatnmosaheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['hajmmatnmosaheh'];} ?>">
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
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t14" type="number" step="any" name="t14" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['emtiazatvizheh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['emtiazatvizheh'];} else {echo 0;} ?>">
                        &nbsp;&nbsp;
                        3+
                    </td>
                </tr>
                <tr >
                    <th style="border: 0px;border-bottom-color: white;text-align: left; background-color: white">

                    </th>
                    <td style="border: 0px;text-align: center; ">
                        جمع امتیازات:
                        <label style="padding: 1px;color: blue" id="resultado"><?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2'){echo $tafsili2items['jam'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo @$item['jam'];} ?></label>
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
                        <textarea <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> name="tozihat" id="tosifi" class="tozihat_textarea"  placeholder="ارزیاب محترم: با توجه به ارسال نقاط قوت و ضعف این اثر برای نویسنده، لطفا ارزشیابی توصیفی خود درباره این اثر و موارد احتمالی قوت یا ضعف آن را بصورت جزئی و حداقل در 250 کاراکتر در این کادر یادداشت فرمایید."><?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2'){echo $tafsili2items['tozihat'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo @$item['tozihat'];} ?></textarea>

                    </div>
                </section>
            </div>
            <br/>
        <br/>
            <center>
                <input type="hidden" name="codeasarfield" value="<?php echo $codeasar; ?>">
	            <?php if ($_POST['subjection']==null): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2ketabtashih" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='statet2'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2ketabtashihostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='schoolt2'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2ketabtashihmadrese" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='editt2'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt2ketabtashih" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili2ostan'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2ketabtashihostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili2madrese'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2ketabtashihmadrese" value="ثبت ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt2o'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt2ketabtashihostani" value="ویرایش ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt2m'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt2ketabtashihmadrese" value="ویرایش ارزیابی">
                    </p>
	            <?php endif; ?>
            </center>

</form>


</div>
</form>
<script src="build/js/rateforms/t2/ktt.js"></script>