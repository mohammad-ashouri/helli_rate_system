<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 2):
?>

<div class="content-wrapper">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        این نکات خوانده شود:
                    </h3>
                </div>
                <div class="box-body">
                    <p>لطفا پس از اتمام کار با سامانه، از حساب کاربری خود خارج شوید.</p>
                    <p>لطفا در حفظ و نگهداری نام کاربری و رمز عبور خود نهایت دقت را داشته باشید.</p>

                </div>
            </div>
            <center>
                <?php if (isset($_GET['success_sianat_decline'])): ?>
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <h3 class="box-title">
                                اثر با کد
                                <?php echo $_GET['codeasar'] ?>
                                و با نام
                                <?php echo $_GET['nameasar'] ?>
                                با موفقیت به وضعیت صیانتی رد شده تغییر وضعیت یافت.
                            </h3>
                        </div>
                    </div>
                <?php elseif (isset($_GET['sent'])): ?>
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            آثار این دوره از جشنواره استان شما با موفقیت به دبیرخانه ارسال شد.
                        </h3>
                    </div>
                </div>
            </center>
            <?php elseif (isset($_GET['success_shora_decline'])): ?>
                <div class="box box-solid box-success">
                    <div class="box-header">
                        <i class="fa fa-info-circle"></i>
                        <h3 class="box-title">
                            اثر با کد
                            <?php echo $_GET['codeasar'] ?>
                            و با نام
                            <?php echo $_GET['nameasar'] ?>
                            با موفقیت به وضعیت رد شده در شورای علمی تغییر وضعیت یافت.
                        </h3>
                    </div>
                </div>
                </center>
            <?php endif;
            ?>
        </section>
    </div>
    <!-- Content Header (Page header) -->
    <!-- Content Wrapper. Contains page content -->
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        تاییدیه و انتقال آثار این دوره از جشنواره و ارسال به دبیرخانه کشوری
                    </h3>
                </div>
                <div class="p-3 mb-2 bg-danger text-dark" style="padding: 7px">
                    <h4 style="padding: 5px;font-weight: bold;text-align: center">دبیر محترم جشنواره استانی</h4>
                    <p style="padding: 5px;text-align: right">فهرست آثار برتر
                        <?php
                        echo 'استان ' . $_SESSION['city'];
                        ?>
                        به مرحله کشوری جشنواره به شرح زیر است. یادآور می‌شود ارسال آثار برتر استان به دبیرخانه کشوری
                        جشنواره منوط به ارسال فایل های زیر می‌باشد:</p>
                    <p style="padding: 5px;text-align: right">1- فایل صورتجلسه شورای علمی استان جهت معرفی آثار برتر</p>
                    <p style="padding: 5px;text-align: right">2- فایل نامه اتوماسیون اداری مبنی بر تایید صلاحیت عمومی
                        کلیه برگزیدگان استان (امور صیانتی)</p>
                    <br/>
                    <p style="padding: 5px;text-align: right">توجه داشته باشید: پس از ارسال آثار به دبیرخانه، دسترسی به
                        ویرایش اطلاعات و ارزیابی کلیه آثار از مدیریت دبیرخانه شما و دبیرخانه مدارس استان یا منطقه شما
                        خارج می‌شود.</p>
                    <p style="padding: 5px;text-align: right">این عملیات به هیچ عنوان قابل بازگشت نیست. لطفا پس از تایید
                        نهایی دبیرخانه خود نسبت به ارسال آثار به مرحله کشوری اقدام نمایید.</p>
                </div>
                <div class="box-body">
                    <center>
                        <table class="attachtable">
                            <tr>
                                <th>ردیف</th>
                                <th>کد اثر</th>
                                <th width="550px">نام اثر</th>
                                <th>قالب پژوهش
                                    <br>
                                    و سطح ارزیابی
                                </th>
                                <th>نام صاحب اثر</th>
                                <th>نمره نهایی استانی</th>
                                <th>عملیات رد اثر</th>
                            </tr>
                            <?php
                            $a = 1;
                            $ostantahsili = $_SESSION['city'];
                            $shahrtahsili = $_SESSION['shahr_name'];
                            $query = mysqli_query($signup_connection, "select * from festivals where active=0 order by id desc");
                            $lastFestival = mysqli_fetch_array($query);
                            $last = "$lastFestival[id]-$lastFestival[title]";
                            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$last' and ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$ostantahsili') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$ostantahsili')) and etelaat_a.approve_sianat=0 and ((etelaat_a.jamemtiazostan>=75 and etelaat_a.bakhshvizheh='هست') or (etelaat_a.jamemtiazostan>=80 and etelaat_a.bakhshvizheh='نیست')) order by etelaat_a.jamemtiazostan desc");
                            foreach ($query as $values):
                                ?>
                                <tr style="<?php
                                if ($a % 2 == 0) {
                                    echo "background-color: #f1f1f1";
                                } else {
                                    echo "background-color: #fff;";
                                }
                                ?>">
                                    <th><?php echo $a;
                                        $a++ ?></th>
                                    <td><?php echo $values['codeasar'] ?></td>
                                    <td>
                                        <label>
                                            <?php echo $values['nameasar'] ?>
                                        </label>
                                    </td>
                                    <td><?php echo $values['ghalebpazhouhesh'] . ' سطح ' . $values['satharzyabi'] ?></td>
                                    <td><?php echo $values['fname'] . ' ' . $values['family'] ?></td>
                                    <td style="text-align: center"><?php echo $values['jamemtiazostan'] ?></td>
                                    <td>
                                        <form method="post" action="build/php/Decline_Secreteriat_asar.php">
                                            <center>
                                                <input type="hidden" name="codeasar"
                                                       value="<?php echo $values['codeasar'] ?>">
                                                <input title="برای رد اثر به دلیل وضعیت صیانتی کلیک کنید"
                                                       class="btn btn-danger btn-block" name="decline_asar"
                                                       value="عدم تأیید به دلیل امور صیانتی" type="submit"
                                                       style="margin-bottom: 7px"
                                                       onclick="return confirm('این عملیات قابل بازگشت نیست. آیا با رد وضعیت صیانتی این اثر موافق هستید؟')">
                                            </center>
                                        </form>
                                        <form method="post" action="build/php/Decline_shora_elmi.php">
                                            <center>
                                                <input type="hidden" name="codeasar"
                                                       value="<?php echo $values['codeasar'] ?>">
                                                <input title="برای رد اثر به دلیل انتخاب نشدن در شورای علمی کلیک کنید"
                                                       class="btn btn-warning btn-block" name="decline_asar"
                                                       value="عدم انتخاب توسط شورای علمی" type="submit"
                                                       onclick="return confirm('این عملیات قابل بازگشت نیست. آیا با رد عدم انتخاب توسط شورای علمی این اثر موافق هستید؟')">
                                            </center>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            endforeach;  ?>
                        </table>
                        <br/>

                        <br/>
                        <?php
                        if (isset($values) and !empty($values)):
                        ?>
                            <div class="box box-solid box-danger">
                                <div class="box-header">
                                    <h3 class="box-title">
                                        دبیر محترم
                                        <br/>
                                        <br/>
                                        لطفا فایل تکمیل‌شده شورای علمی و فایل نامه‌ی اتوماسیونی معرفی منتخبین به معاون محترم پژوهش (با فرمت Word یا PDF) را در قسمت‌های مربوط بارگزاری کنید تا دکمه ارسال به مرحله کشوری برای شما فعال شود.
                                        <br/>
                                        <br/>
                                        لازم به ذکر است که در متن نامه اتوماسیونی معرفی منتخبین استان، می‌بایست منتخبین این دوره، به لحاظ صیانتی نیز تأیید شده باشند.                                    </h3>
                                </div>
                            </div>
                        <form method="post" action="build/php/Send_To_Secreteriat.php" enctype="multipart/form-data"
                              onsubmit="return CheckFields()">
                            <div style="display: block ruby; padding-bottom: 25px;">
                                <div>
                                    <label for="fileshora">
                                        فایل شورای علمی
                                    </label>
                                    <input type="file" name="fileshora" accept=".docx,.doc" id="fileshora">
                                </div>
                                <div>
                                    <label for="filesianati">
                                        فایل نامه معرفی و تایید صلاحیت منتخبین
                                    </label>
                                    <input type="file" name="filesianati" accept=".docx,.doc" id="filesianati">
                                </div>
                            </div>



                            <p id="top_button_paragraph" style="color:red">دکمه ارسال پس از انتخاب فایل ها به صورت
                                خودکار فعال خواهد شد</p>
                            <input id="Send" type="submit" value="ارسال به دبیرخانه کشوری" style="width: 200px;"
                                   class="btn btn-success btn-block" name="sendtosecretariat" disabled
                                   title="این دکمه پس از انتخاب فایل ها فعال می شود"
                                   onclick="return confirm('این عملیات قابل بازگشت نیست. آیا تایید می کنید؟')">
                        </form>
                        <?php endif; ?>
                    </center>


                </div>
            </div>

        </section>
    </div>

    <!-- Main content -->


    <script src="build/js/CheckSecretariatFields.js"></script>
    <?php if (!empty($values)): ?>
        <script src="build/js/ShowSendButton.js"></script>
    <?php endif; ?>

    <!-- /.content-wrapper -->
    <?php
    endif;
    include_once __DIR__ . '/footer.php';
    ?>
