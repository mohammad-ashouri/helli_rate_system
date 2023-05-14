<?php
include_once __DIR__.'/../../config/connection.php';
if (isset($_POST['submit']) and !empty($_POST['codeasar'])):
$code=$_POST['codeasar'];
$result_a=mysqli_query($connection,"select * from etelaat_a where `codeasar`='$code'");
foreach ($result_a as $et_a){}
$result_p=mysqli_query($connection,"select * from etelaat_p where `codeasar`='$code'");
foreach ($result_p as $et_p){}
?>
<section class="content">
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-success">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>

                    <h3 class='box-title'>اطلاعات اثر</h3>

                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <div class="box-body">
                    <span style="font-weight: bold">کد اثر:</span>
                    <?php echo $et_a['codeasar']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">نام اثر:</span>
                    <?php echo $et_a['nameasar']; ?>
                    <br/><br/>
                    <span style="font-weight: bold">نوع فعالیت:</span>
                    <?php echo $et_a['noefaaliat']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">قالب پژوهش:</span>
                    <?php echo $et_a['ghalebpazhouhesh']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">سطح ارزیابی:</span>
                    <?php echo $et_a['satharzyabi']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">گروه علمی:</span>
                    <?php echo $et_a['groupelmi']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">نوع پژوهش:</span>
                    <?php echo $et_a['noepazhouhesh']; ?>
                    <br/><br/>
                    <span style="font-weight: bold">وضعیت نشر:</span>
                    <?php echo $et_a['vaziatnashr']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">تعداد صفحه:</span>
                    <?php echo $et_a['tedadsafhe']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">بخش ویژه:</span>
                    <?php echo $et_a['bakhshvizheh']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">وضعیت پذیرش اثر:</span>
                    <?php echo $et_a['vaziatpazireshasar']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">شرایط اولیه شرکت در جشنواره:</span>
                    <?php echo $et_a['sharayetavalliehsherkat']; ?>
                    <?php if ($et_a['sharayetavalliehsherkat']=="ندارد"): ?>
                        <br/><br/>
                        <span style="font-weight: bold">علت نداشتن شرایط اولیه:</span>
                        <?php echo $et_a['ellatnadashtansharayet']; ?>
                    <?php endif; ?>
                    <br/><br/>
                    <span style="font-weight: bold">وضعیت استانی اثر:</span>
                    <?php echo $et_a['vaziatostaniasar']; ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="font-weight: bold">برگزیده کشوری:</span>
                    <?php echo $et_a['bargozidehkeshvari']; ?>


                </div>

        </section>
        <section class="content">
            <div class="row">
                <section class="col-lg-12 col-md-12">
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>

                            <h3 class='box-title'>اطلاعات صاحب اثر</h3>

                            <!-- tools box -->
                            <div class="pull-left box-tools">
                                <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <div class="box-body">
                            <span style="font-weight: bold">نام و نام خانوادگی:</span>
                            <?php echo $et_p['fname']." ".$et_p['family']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">نام پدر:</span>
                            <?php echo $et_p['father_name']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">تاریخ تولد:</span>
                            <?php echo $et_p['tarikhtavallod']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">شماره پرونده تحصیلی:</span>
                            <?php echo $et_p['shparvandetahsili']; ?>
                            <br/><br/>
                            <span style="font-weight: bold">تاریخ تولد:</span>
                            <?php echo $et_p['tarikhtavallod']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">استان مدرسه:</span>
                            <?php echo $et_p['ostantahsili']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">شهر مدرسه:</span>
                            <?php echo $et_p['shahrtahsili']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">نام مدرسه:</span>
                            <?php echo $et_p['madrese']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">نام مرکز تحصیلی:</span>
                            <?php echo $et_p['namemarkaztahsili']; ?>
                            <br/><br/>
                            <span style="font-weight: bold">شماره همراه:</span>
                            <?php echo $et_p['mobile']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">تلفن ثابت:</span>
                            <?php echo $et_p['telephone']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span style="font-weight: bold">ایمیل:</span>
                            <?php echo $et_p['email']; ?>
                            <br/><br/>
                            <span style="font-weight: bold">آدرس:</span>
                            <?php echo $et_p['address']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                </section>
                <section class="content">
                    <div class="row">
                        <section class="col-lg-12 col-md-12">
                            <div class="box box-solid box-success">
                                <div class="box-header">
                                    <i class="fa fa-info-circle"></i>

                                    <h3 class='box-title'>لینک های دانلود فایل های پیوستی</h3>

                                    <!-- tools box -->
                                    <div class="pull-left box-tools">
                                        <button type="button" class="btn bg-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <div class="box-body">
                                    <span style="font-weight: bold">فایل اثر:</span>
                                    <a href="<?php echo $main_website_url.$et_a['fileasar']; ?>">
                                        <?php echo $main_website_url.$et_a['fileasar']; ?>
                                    </a>
                                    <br/><br/>
                                    <?php
                                    if (strlen($et_a['filetafsili1_ostan'])>28):
                                        ?>
                                        <span style="font-weight: bold">فایل تفصیلی اول استان:</span>
                                        <a href="<?php echo $main_website_url.$et_a['filetafsili1_ostan']; ?>">
                                            <?php echo $main_website_url.$et_a['filetafsili1_ostan']; ?>
                                        </a>
                                    <?php endif; ?>
                                    <br/><br/>
                                    <?php
                                    if (strlen($et_a['filetafsili2_ostan'])>28):
                                        ?>
                                        <span style="font-weight: bold">فایل تفصیلی دوم استان:</span>
                                        <a href="<?php echo $main_website_url.$et_a['filetafsili2_ostan']; ?>">
                                            <?php echo $main_website_url.$et_a['filetafsili2_ostan']; ?>
                                        </a>
                                    <?php endif; ?>
                                    <br/><br/>
                                    <span style="font-weight: bold">فایل تفصیلی سوم استان:</span>
                                    <?php
                                    if (strlen($et_a['filetafsili3_ostan'])>28):
                                        ?>
                                        <a href="<?php echo $main_website_url.$et_a['filetafsili3_ostan']; ?>">
                                            <?php echo $main_website_url.$et_a['filetafsili3_ostan']; ?>
                                        </a>
                                    <?php endif; ?>

                                </div>
                        </section>
                        <?php endif; ?>
