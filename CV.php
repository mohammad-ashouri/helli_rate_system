<?php
//include_once __DIR__.'/header.php';
//if ($_SESSION['head']==0 and $_SESSION['city']==NULL and $_SESSION['school']==NULL):
//?>
<!--    -->
<!--    <div class="content-wrapper">-->
<!--    <div class="row">-->
<!--        <section class="col-lg-12 col-md-12">-->
<!--            <div class="box box-danger">-->
<!--                <div class="box-header">-->
<!--                    <i class="fa fa-info-circle"></i>-->
<!--                    <h3 class="box-title">-->
<!--                        این نکات خوانده شود:-->
<!--                    </h3>-->
<!--                </div>-->
<!--                <div class="box-body">-->
<!--                    <p>لطفا پس از اتمام کار با سامانه، از حساب کاربری خود خارج شوید.</p>-->
<!--                    <p>لطفا در حفظ و نگهداری نام کاربری و رمز عبور خود نهایت دقت را داشته باشید.</p>-->
<!---->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
<!--    </div>-->
<!--        --><?php //if (isset($_GET['successinsert'])): ?>
<!--        <section class="content">-->
<!--            <div class="row">-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-solid box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <center>-->
<!--                                <h3 class='box-title'>-->
<!--                                    رزومه شما با موفقیت در سامانه جشنواره علامه حلی ثبت شد.-->
<!--                                </h3>-->
<!--                            </center>-->
<!---->
<!--                        </div>-->
<!--                </section>-->
<!--                --><?php //endif; ?>
<!--                --><?php //if (isset($_GET['successupdate'])): ?>
<!--                <section class="content">-->
<!--                    <div class="row">-->
<!--                        <section class="col-lg-12 col-md-12">-->
<!--                            <div class="box box-solid box-success">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <center>-->
<!--                                        <h3 class='box-title'>-->
<!--                                            رزومه شما با موفقیت ویرایش شد.-->
<!--                                        </h3>-->
<!--                                    </center>-->
<!---->
<!--                                </div>-->
<!--                        </section>-->
<!--                        --><?php //endif; ?>
<!---->
<!--    <!-- Content Header (Page header) -->-->
<!--    <!-- Content Wrapper. Contains page content -->-->
<!---->
<!---->
<!--    <!-- Main content -->-->
<!--    <section class="content">-->
<!--        <form id="myform" onsubmit="return validateForm()" action="build/php/profile.php" method="post" id="myform">-->
<!--            --><?php
//            $code=$_SESSION['coderater'];
//            $query="select * from CV_raters where code='$code'";
//            $result=mysqli_query($connection,$query);
//            foreach ($result as $item){}
//            ?>
<!--            <div class="row">-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                اطلاعات شخصی-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <input type="hidden" value="--><?php //echo $rater_code; ?><!--" name="ratercode">-->
<!--                            <table class="cv_et_shakhsi">-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        نام:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input disabled value="--><?php //echo $rows['name']; ?><!--" style="overflow-x: auto" class="cvinput" type="text">-->
<!--                                        <input type="hidden" value="--><?php //echo $rows['name']; ?><!--" name="name">-->
<!---->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        نام خانوادگی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input disabled value="--><?php //echo $rows['family']; ?><!--" class="cvinput" type="text">-->
<!--                                        <input type="hidden" value="--><?php //echo $rows['family']; ?><!--" name="family">-->
<!---->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        نام پدر:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if (!empty($item['fathername'])){echo "disabled";} ?><!-- class="cvinput" name="fathername" type="text" value="--><?php //if (!empty($item)){echo $item['fathername'];} ?><!--">-->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                            </table>-->
<!--                            <table class="cv_et_shakhsi">-->
<!--                                <tr>-->
<!---->
<!--                                    <th>-->
<!--                                        محل تولد:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if (!empty($item['t_city'])){echo "disabled";} ?><!-- value="--><?php //if (!empty($item)){echo $item['t_city'];} ?><!--" class="cvinput" name="t_city" type="text">-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        تلفن همراه:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input class="cvinput" name="mobile" type="number" value="--><?php //if (!empty($item)){echo $item['mobile'];} ?><!--">-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        ش.ش:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if (!empty($item['id_shenasname'])){echo "disabled";} ?><!-- value="--><?php //if (!empty($item)){echo $item['id_shenasname'];} ?><!--" class="cvinput" name="id_shenasname" type="number">-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            </table>-->
<!--                            <table class="cv_et_shakhsi">-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        تاریخ تولد (بدون / یا . یا هر کاراکتر دیگر):-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if (!empty($item['birthday'])){echo "disabled";} ?><!-- value="--><?php //if (!empty($item)){echo $item['birthday'];} ?><!--" style="width: 200px" name="birthday" type="number" min="13200101" max="14990101" placeholder="به عنوان نمونه: 13500105">-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        کد ملی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if (!empty($item['codemelli'])){echo "disabled";} ?><!-- value="--><?php //if (!empty($item)){echo $item['codemelli'];} ?><!--" style="width: 200px" name="codemelli" type="number" id="codemelli" onblur="check_national_code()">-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        ایمیل:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['email'];} ?><!--" style="width: 300px; text-align: left" class="cvinput" name="email" type="text">-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            </table>-->
<!--                            <table>-->
<!--                                <tr style="padding-bottom: 50px">-->
<!--                                    <th >-->
<!--                                        <label>-->
<!--                                            آدرس منزل:-->
<!--                                        </label>-->
<!--                                    </th>-->
<!--                                    <td style="width: 600px; padding-right: 25px">-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['home_address'];} ?><!--" class="inputcvshakhsiaddress" name="home_address" type="text">-->
<!--                                    </td>-->
<!--                                    <th style="padding-right: 30px">-->
<!--                                        تلفن منزل:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['home_phone'];} ?><!--" class="inputcvshakhsiphone" name="home_phone" type="number">-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            </table>-->
<!--                            <table>-->
<!--                                <tr >-->
<!--                                    <th>-->
<!--                                        آدرس محل کار:-->
<!--                                    </th>-->
<!--                                    <td style="width: 600px">-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['job_address'];} ?><!--" class="inputcvshakhsiaddress" name="job_address" type="text">-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        تلفن محل کار:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['job_phone'];} ?><!--" class="inputcvshakhsiphone" name="job_phone" type="number">-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                            </table>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--            <div class="row" >-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                اطلاعات آخرین مدرک تحصیلی-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <table class="tablecvtahsili">-->
<!--                                <tr style="background-color: tan; text-align: center">-->
<!--                                    <td></td>-->
<!--                                    <td>مرکز آموزشی</td>-->
<!--                                    <td>مقطع</td>-->
<!--                                    <td>رشته تحصیلی</td>-->
<!--                                    <td>تاریخ</td>-->
<!--                                    <td>عنوان پایان نامه</td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>تحصیلات حوزوی</td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_a_hozavi'];} ?><!--" type="text" name="m_a_hozavi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_hozavi'];} ?><!--" style="width: 120px;" type="text" name="m_hozavi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['r_t_hozavi'];} ?><!--" type="text" name="r_t_hozavi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['t_hozavi'];} ?><!--" style="width: 100px;" type="text" name="t_hozavi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['sub_hozavi'];} ?><!--" type="text" name="sub_hozavi">-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>تحصیلات دانشگاهی</td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_a_uni'];} ?><!--" type="text" name="m_a_uni">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_uni'];} ?><!--" style="width: 120px;" type="text" name="m_uni">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['r_t_uni'];} ?><!--" type="text" name="r_t_uni">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['t_uni'];} ?><!--" style="width: 100px;" type="text" name="t_uni">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['sub_uni'];} ?><!--" type="text" name="sub_uni">-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>مرکز تخصصی</td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_a_markaz_takhassosi'];} ?><!--" type="text" name="m_a_markaz_takhassosi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_markaz_takhassosi'];} ?><!--" style="width: 120px;" type="text" name="m_markaz_takhassosi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['r_t_markaz_takhassosi'];} ?><!--" type="text" name="r_t_markaz_takhassosi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['t_markaz_takhassosi'];} ?><!--" style="width: 100px;" type="text" name="t_markaz_takhassosi">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['sub_markaz_takhassosi'];} ?><!--" type="text" name="sub_markaz_takhassosi">-->
<!--                                    </td>-->
<!--                                </tr>-->
<!---->
<!--                            </table>-->
<!--                            <br/>-->
<!--                            <span style="width: 100%;">-->
<!--                                تحصیلات متفرقه:-->
<!--                                <input value="--><?php //if (!empty($item)){echo $item['other'];} ?><!--" type="text" name="other_t" style="width: 80% ;padding: 5px">-->
<!--                            </span>-->
<!---->
<!---->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--            <div class="row" >-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                اطلاعات شغلی-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <table class="tablecvshoghli">-->
<!--                                <tr>-->
<!--                                    <th style="background-color: mediumpurple; color: white">-->
<!--                                        سوابق استخدامی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="sabeghe_estekhdam">--><?php //if (!empty($item)){echo $item['sabeghe_estekhdam'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: mediumpurple; color: white">-->
<!--                                        سوابق مدیریتی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="sabeghe_modiriati">--><?php //if (!empty($item)){echo $item['sabeghe_modiriati'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: mediumpurple; color: white">-->
<!--                                        سوابق ارزیابی-->
<!--                                        <br/>-->
<!--                                        [غیر از جشنواره علامه حلی (ره)]:-->
<!---->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="sabeghe_arzyabi">--><?php //if (!empty($item)){echo $item['sabeghe_arzyabi'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: mediumpurple; color: white">-->
<!--                                        سوابق تدریس:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="sabeghe_tadris">--><?php //if (!empty($item)){echo $item['sabeghe_tadris'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                            </table>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--            <div class="row" >-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                کارگاه ها: (اگر در کارگاه های آموزشی و پژوهشی تدریس یا تحصیل داشته‌اید یادداشت فرمایید)-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <textarea style="font-weight: bold;width: 100%; height: 200px" name="kargah" placeholder="کارگاه های آموزشی و پژوهشی که در آنها تدریس یا تحصیل داشته اید را وارد کنید">--><?php //if (!empty($item)){echo $item['kargah'];} ?><!--</textarea>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--            <div class="row" >-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                سوابق پژوهشی-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <table class="tablecvshoghli">-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        کتب:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="kotob">--><?php //if (!empty($item)){echo $item['kotob'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        مقالات:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="maghalat">--><?php //if (!empty($item)){echo $item['maghalat'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        پروژه های تحقیقاتی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="p_tahghighati">--><?php //if (!empty($item)){echo $item['project_tahghighati'];} ?><!--</textarea>-->
<!---->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        ترجمه:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="tarjome">--><?php //if (!empty($item)){echo $item['tarjome'];} ?><!--</textarea>-->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        شرکت در سمینار و انجمن های علمی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="seminars">--><?php //if (!empty($item)){echo $item['sh_seminar'];} ?><!--</textarea>-->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        مشاوره پایان نامه:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="moshavere">--><?php //if (!empty($item)){echo $item['moshavere_p'];} ?><!--</textarea>-->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th style="background-color: olive; color: white">-->
<!--                                        عضویت در انجمن های علمی:-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <textarea style="height: 150px;border-radius: 7px" name="ozviat_anjoman">--><?php //if (!empty($item)){echo $item['ozviat_anjoman'];} ?><!--</textarea>-->
<!--                                    </td>-->
<!---->
<!--                                </tr>-->
<!--                            </table>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--            <div class="row" >-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <span>-->
<!--                                <h3 class="box-title">-->
<!--                                توانایی و علاقه به ارزیابی در کدامیک از گروه های علمی جشنواره علامه حلی (ره) را دارید؟-->
<!--                            </h3>-->
<!--                            <h5>(در صورت علاقه به ارزیابی در چند گروه، لطفا به ترتیب اولویت شماره گذاری کنید)</h5>-->
<!--                            </span>-->
<!---->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <table class="tablecvtavanaei">-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t1'];} ?><!--" name="t1" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        فقه و حقوق اسلامی-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t2'];} ?><!--" name="t2" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        اصول فقه-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t3'];} ?><!--" name="t3" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        تفسیر و علوم قرآنی-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t4'];} ?><!--" name="t4" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        کلام-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t5'];} ?><!--" name="t5" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        علوم حدیث و درایه-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t6'];} ?><!--" name="t6" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        فلسفه و منطق-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t7'];} ?><!--" name="t7" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        تاریخ اسلام و تشیع-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t8'];} ?><!--" name="t8" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        ادبیات-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t9'];} ?><!--" name="t9" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        اخلاق و تربیت-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <input min="0" max="10" value="--><?php //if (!empty($item)){echo $item['t10'];} ?><!--" name="t10" type="number" style="width: 100%;">-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        علوم انسانی-->
<!--                                    </td>-->
<!--                                </tr>-->
<!---->
<!---->
<!--                            </table>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--            <div class="row" >-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                مهارت های زبان خارجی: (جهت ترجمه)-->
<!--                            </h3>-->
<!---->
<!--                        </div>-->
<!--                        <div class="box-body" style="overflow-x: auto">-->
<!--                            <table class="cvtablemaharat">-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        الف) عربی-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if ($item['m_arabic']=='خوب'){echo "checked";} ?><!-- type="radio" id="a_good" name="m_arabic" value="خوب">-->
<!--                                        <label for="a_good">خوب</label><br>-->
<!--                                        <input --><?php //if ($item['m_arabic']=='متوسط'){echo "checked";} ?><!-- type="radio" id="a_med" name="m_arabic" value="متوسط">-->
<!--                                        <label for="a_med">متوسط</label><br>-->
<!--                                        <input --><?php //if ($item['m_arabic']=='ضعیف'){echo "checked";} ?><!-- type="radio" id="a_bad" name="m_arabic" value="ضعیف">-->
<!--                                        <label for="a_bad">ضعیف</label>-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        ب) انگلیسی-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if ($item['m_english']=='خوب'){echo "checked";} ?><!-- type="radio" id="e_good" name="m_english" value="خوب">-->
<!--                                        <label for="e_good">خوب</label><br>-->
<!--                                        <input --><?php //if ($item['m_english']=='متوسط'){echo "checked";} ?><!-- type="radio" id="e_med" name="m_english" value="متوسط">-->
<!--                                        <label for="e_med">متوسط</label><br>-->
<!--                                        <input --><?php //if ($item['m_english']=='ضعیف'){echo "checked";} ?><!-- type="radio" id="e_bad" name="m_english" value="ضعیف">-->
<!--                                        <label for="e_bad">ضعیف</label>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        ج) سایر زبان ها (با ذکر نام)-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_o1_name'];} ?><!--" class="inputmaharat" name="m_ot1" type="text" placeholder="نام زبان مورد نظر">-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if ($item['m_o1']=='خوب'){echo "checked";} ?><!-- type="radio" id="o1_good" name="m_o1" value="خوب">-->
<!--                                        <label for="o1_good">خوب</label><br>-->
<!--                                        <input --><?php //if ($item['m_o1']=='متوسط'){echo "checked";} ?><!-- type="radio" id="o1_med" name="m_o1" value="متوسط">-->
<!--                                        <label for="o1_med">متوسط</label><br>-->
<!--                                        <input --><?php //if ($item['m_o1']=='ضعیف'){echo "checked";} ?><!-- type="radio" id="o1_bad" name="m_o1" value="ضعیف">-->
<!--                                        <label for="o1_bad">ضعیف</label>-->
<!--                                    </td>-->
<!--                                    <th>-->
<!--                                        <input value="--><?php //if (!empty($item)){echo $item['m_o2_name'];} ?><!--" class="inputmaharat" name="m_ot2" type="text" placeholder="نام زبان مورد نظر">-->
<!--                                    </th>-->
<!--                                    <td>-->
<!--                                        <input --><?php //if ($item['m_o2']=='خوب'){echo "checked";} ?><!-- type="radio" id="o2_good" name="m_o2" value="خوب">-->
<!--                                        <label for="o2_good">خوب</label><br>-->
<!--                                        <input --><?php //if ($item['m_o2']=='متوسط'){echo "checked";} ?><!-- type="radio" id="o2_med" name="m_o2" value="متوسط">-->
<!--                                        <label for="o2_med">متوسط</label><br>-->
<!--                                        <input --><?php //if ($item['m_o2']=='ضعیف'){echo "checked";} ?><!-- type="radio" id="o2_bad" name="m_o2" value="ضعیف">-->
<!--                                        <label for="o2_bad">ضعیف</label>-->
<!--                                    </td>-->
<!--                                </tr>-->
<!---->
<!---->
<!--                            </table>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--                    <div class="row" >-->
<!--                        <section class="col-lg-12 col-md-12">-->
<!--                            <div class="box box-success">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        شماره شبای حساب بانکی:-->
<!--                                    </h3>-->
<!---->
<!--                                </div>-->
<!--                                <div class="box-body" style="overflow-x: auto">-->
<!---->
<!--                                    <input id="id_tejarat" value="--><?php //if (!empty($item)){echo substr($item['id_tejarat'],2) ;} ?><!--" type="number" name="id_tejarat" placeholder="شماره شبا بدون IR" style="width: 300px; text-align: left;border-radius: 5px;padding: 5px">-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </section>-->
<!--                    </div>-->
<!--                    <div class="row" >-->
<!--                        <section class="col-lg-12 col-md-12">-->
<!--                            <div class="box box-solid box-primary">-->
<!--                                <div class="box-header">-->
<!--                                    <center>-->
<!--                                        <h3 class="box-title">-->
<!--                                            <input type="submit" name="subcv" value="--><?php //if (empty($item)){echo "ثبت رزومه";} else{echo "ویرایش رزومه";} ?><!--" style="padding: 10px; background-color: blue;color: white" onclick="return confirm('ارزیاب گرامی: برخی از اطلاعات وارد شده ی شما پس از تاییدتان، قابل ویرایش نیستند، در صورت تایید نهایی اطلاعات وارد شده، بر روی گزینه OK کلیک کنید')">-->
<!--                                        </h3>-->
<!---->
<!--                                    </center>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </section>-->
<!--                    </div>-->
<!--        </form>-->
<!--    </section>-->
<!--                    </div></section>-->
<!---->
<!---->
<!--    <!-- /.content-wrapper -->-->
<?php
//endif;
//include_once __DIR__.'/footer.php';
//?>
<!--                        <script>-->
<!--                            function validateForm() {-->
<!--                                var id_tejarat = document.forms["myform"]["id_tejarat"].value;-->
<!--                                var codemelli = document.forms["myform"]["codemelli"].value;-->
<!---->
<!---->
<!--                                if (id_tejarat > 999999999999999999999999){-->
<!--                                    document.forms["myform"]["id_tejarat"].style.backgroundColor="yellow";-->
<!--                                    alert("شماره شبای وارد شده بیشتر از 24 رقم است");-->
<!--                                    return false;-->
<!--                                }-->
<!--                                else if (id_tejarat < 100000000000000000000000) {-->
<!--                                    document.forms["myform"]["id_tejarat"].style.backgroundColor="yellow";-->
<!--                                    alert("شماره شبای وارد شده کمتر از 24 رقم است");-->
<!--                                    return false;-->
<!--                                }-->
<!--                                else if (codemelli == "") {-->
<!--                                    document.forms["myform"]["codemelli"].style.backgroundColor="yellow";-->
<!--                                    alert("کدملی وارد نشده است");-->
<!--                                    return false;-->
<!--                                }-->
<!--                                else if (codemelli > 9999999999) {-->
<!--                                    document.forms["myform"]["codemelli"].style.backgroundColor="yellow";-->
<!--                                    alert("کدملی وارد شده بیشتر از ده رقم است");-->
<!--                                    return false;-->
<!--                                }-->
<!--                                else if (codemelli < 1000000000) {-->
<!--                                    document.forms["myform"]["codemelli"].style.backgroundColor="yellow";-->
<!--                                    alert("کدملی وارد شده کمتر از ده رقم است");-->
<!--                                    return false;-->
<!--                                }-->
<!--                            }-->
<!--                            function check_national_code() {-->
<!--                                var xv = document.forms["myform"]["codemelli"].value;-->
<!--                                if (isNaN(xv)) {-->
<!--                                    alert("لطفا کد ملی را به صورت صحیح وارد کنید !");-->
<!--                                } else if (xv == "") {-->
<!--                                    alert("لطفا کد ملی را وارد کنید !")-->
<!--                                } else if (xv.length < 10) {-->
<!--                                    alert("کد ملی وارد شده کمتر از 10 رقم است")-->
<!--                                } else {-->
<!--                                    var yy = 0;-->
<!--                                    var yv = parseInt(yv);-->
<!--                                    for (let i = 0; i < xv.length; i++) {-->
<!--                                        yv = xv[i] * (xv.length - i);-->
<!--                                        yy += yv;-->
<!--                                    }-->
<!--                                    var x = yy % 11;-->
<!--                                    if (x == 0) {-->
<!--                                        alert("کد ملی وارد شده 0 است !");-->
<!--                                    }-->
<!--                                    yy = 0;-->
<!--                                }-->
<!--                            }-->
<!---->
<!--                        </script>-->