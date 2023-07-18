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
                    <th>اتقان و اعتبار علمی اثر ترجمه شده (اصل اثر)</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t1" type="number" step="any" name="t1" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['etghanvaetebarelmiasar'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['etghanvaetebarelmiasar'];} ?>">
                        &nbsp;&nbsp;
                        از 10
                    </td>

                </tr>
                <tr>
                    <th>دشواری و پیچیدگی متن ترجمه شده</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t2" type="number" step="any" name="t2" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['pichidegimatntarjome'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['pichidegimatntarjome'];} ?>">

                        &nbsp;&nbsp;
                        از 7
                    </td>
                </tr>
                <tr>
                    <th>نداشتن سابقه ترجمه</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t3" type="number" step="any" name="t3" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['nadashtansabeghetarome'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['nadashtansabeghetarome'];} ?>">
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>حجم متن ترجمه شده (حداقل 15 صفحه)</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t4" type="number" step="any" name="t4" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['hajmmatntarjomeshode'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['hajmmatntarjomeshode'];} ?>">
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>اهمیت اثر و ابتناء آن بر نیاز</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t5" type="number" step="any" name="t5" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['ahamiatasarvaebtenabarniaz'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['ahamiatasarvaebtenabarniaz'];} ?>">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>میزان درک صحیح مترجم از متن و تسلط وی بر موضوع</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t6" type="number" step="any" name="t6" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['mizandarksahihmotarjem'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['mizandarksahihmotarjem'];} ?>">
                        &nbsp;&nbsp;
                        از 11
                    </td>
                </tr>
                <tr>
                    <th>معادل‌یابی واژگان، اصطلاحات، تعابیر، کنایه‌ها، تمثیلات و...</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t7" type="number" step="any" name="t7" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['moadelyabivazhegan'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['moadelyabivazhegan'];} ?>">

                        &nbsp;&nbsp;
                        از 11
                    </td>
                </tr>
                <tr>
                    <th>توانمندی مترجم در انتقال مفاهیم</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t8" type="number" step="any" name="t8" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['tavanmandimotarjemdarenteghal'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['tavanmandimotarjemdarenteghal'];} ?>">
                        &nbsp;&nbsp;
                        از 6</td>
                </tr>
                <tr>
                    <th>وفاداری ترجمه به متن اصلی</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t9" type="number" step="any" name="t9" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['vafadaritarjomebematnasli'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['vafadaritarjomebematnasli'];} ?>">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>شیوایی، رسایی و رعایت نثر معیار</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t10" type="number" step="any" name="t10" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['reayatnasrmeyar'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['reayatnasrmeyar'];} ?>">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>رعایت آیین نگارش</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t11" type="number" step="any" name="t11" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['reayataeinnegaresh'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['reayataeinnegaresh'];} ?>">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>توضیحات و تعلیقات مناسب</th>
                    <td>
                        <input <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> id="t12" type="number" step="any" name="t12" class="rate_inputs" onblur="calcular()" value="<?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo $tafsili2items['tozihatvatalighatmonaseb'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m'){echo @$item['tozihatvatalighatmonaseb'];} ?>">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr >
                    <th style="border: 0px;border-bottom-color: white;text-align: left; background-color: white">

                    </th>
                    <td style="border: 0px;text-align: center; ">
                        جمع امتیازات:
                        <label style="padding: 1px;color: blue" id="resultado"><?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k'){echo $tafsili2items['jam'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo @$item['jam'];} ?></label>
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
                        <textarea <?php if($_POST['subjection']=='log'){echo 'disabled';} ?> name="tozihat" id="tosifi" class="tozihat_textarea"  placeholder="ارزیاب محترم: با توجه به ارسال نقاط قوت و ضعف این اثر برای نویسنده، لطفا ارزشیابی توصیفی خود درباره این اثر و موارد احتمالی قوت یا ضعف آن را بصورت جزئی و حداقل در 250 کاراکتر در این کادر یادداشت فرمایید."><?php if($_POST['subjection']=='log' or $_POST['subjection']=='editt2k'){echo $tafsili2items['tozihat'];} ?><?php if ($_POST['subjection']=='editt2o' or $_POST['subjection']=='editt2m' or isset($_POST['tafsili2_ostan_log']) or isset($_POST['tafsili2_madrese_log'])){echo @$item['tozihat'];} ?></textarea>

                    </div>
                </section>
            </div>
            <br/>
            <br/>
            <center>
                <input type="hidden" name="codeasarfield" value="<?php echo $codeasar; ?>">
	            <?php if ($_POST['subjection']==null): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2maghaletarjome" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='statet2'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2maghaletarjomeostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='schoolt2'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2maghaletarjomemadrese" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='editt2k'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt2maghaletarjome" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili2ostan'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2maghaletarjomeostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili2madrese'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt2maghaletarjomemadrese" value="ثبت ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt2o'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt2maghaletarjomeostani" value="ویرایش ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt2m'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt2maghaletarjomemadrese" value="ویرایش ارزیابی">
                    </p>
	            <?php endif; ?>
            </center>

</form>


</div>
</form>
<script src="build/js/rateforms/t2/mt.js"></script>