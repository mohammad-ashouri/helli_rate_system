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
                    <th>اتقان و اعتبار علمی اثر ترجمه شده (اصل اثر)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['etghanvaetebarelmiasar'];} ?>" id="t1" type="number" step="any" name="t1" class="rate_inputs" onblur="calcular()" >
                        &nbsp;&nbsp;
                        از 10
                    </td>

                </tr>
                <tr>
                    <th>دشواری و پیچیدگی متن ترجمه شده</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['pichidegimatntarjome'];} ?>" id="t2" type="number" step="any" name="t2" class="rate_inputs" onblur="calcular()" >

                        &nbsp;&nbsp;
                        از 7
                    </td>
                </tr>
                <tr>
                    <th>نداشتن سابقه ترجمه</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['nadashtansabeghetarome'];} ?>" id="t3" type="number" step="any" name="t3" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 5
                    </td>
                </tr>
                <tr>
                    <th>حجم متن ترجمه شده (حداقل 15 صفحه)</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['hajmmatntarjomeshode'];} ?>" id="t4" type="number" step="any" name="t4" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 4
                    </td>
                </tr>
                <tr>
                    <th>اهمیت اثر و ابتناء آن بر نیاز</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['ahamiatasarvaebtenabarniaz'];} ?>" id="t5" type="number" step="any" name="t5" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>میزان درک صحیح مترجم از متن و تسلط وی بر موضوع</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['mizandarksahihmotarjem'];} ?>" id="t6" type="number" step="any" name="t6" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 11
                    </td>
                </tr>
                <tr>
                    <th>معادل‌یابی واژگان، اصطلاحات، تعابیر، کنایه‌ها، تمثیلات و...</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['moadelyabivazhegan'];} ?>" id="t7" type="number" step="any" name="t7" class="rate_inputs" onblur="calcular()">

                        &nbsp;&nbsp;
                        از 11
                    </td>
                </tr>
                <tr>
                    <th>توانمندی مترجم در انتقال مفاهیم</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['tavanmandimotarjemdarenteghal'];} ?>" id="t8" type="number" step="any" name="t8" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 6</td>
                </tr>
                <tr>
                    <th>وفاداری ترجمه به متن اصلی</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['vafadaritarjomebematnasli'];} ?>" id="t9" type="number" step="any" name="t9" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>شیوایی، رسایی و رعایت نثر معیار</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['reayatnasrmeyar'];} ?>" id="t10" type="number" step="any" name="t10" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 10
                    </td>
                </tr>
                <tr>
                    <th>رعایت آیین نگارش</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['reayataeinnegaresh'];} ?>" id="t11" type="number" step="any" name="t11" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 8
                    </td>
                </tr>
                <tr>
                    <th>توضیحات و تعلیقات مناسب</th>
                    <td>
                        <input value="<?php if ($_POST['subjection']=='editt1o' or $_POST['subjection']=='editt1m' or isset($_POST['tafsili1_ostan_log']) or isset($_POST['tafsili1_madrese_log'])){echo @$item['tozihatvatalighatmonaseb'];} ?>" id="t12" type="number" step="any" name="t12" class="rate_inputs" onblur="calcular()">
                        &nbsp;&nbsp;
                        از 10
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
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1maghaletarjome" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='statet1'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1maghaletarjomeostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif($_POST['subjection']=='schoolt1'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1maghaletarjomemadrese" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili1ostan'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1maghaletarjomeostani" value="ثبت ارزیابی">
                    </p>
	            <?php elseif ($_POST['subjection']=='tafsili1madrese'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="subt1maghaletarjomemadrese" value="ثبت ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt1o'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt1maghaletarjomeostani" value="ویرایش ارزیابی">
                    </p>
                <?php elseif ($_POST['subjection']=='editt1m'): ?>
                    <p class="virayesh-ejmali-button" >
                        <input onclick="return submitconfirm()" style="padding: 6px" type="submit" name="editt1maghaletarjomemadrese" value="ویرایش ارزیابی">
                    </p>
	            <?php endif; ?>
            </center>

</form>


</div>
</form>

<script src="build/js/rateforms/t1/mt.js"></script>