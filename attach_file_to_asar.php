<?php
//include_once __DIR__ . '/header.php';
//if ($_SESSION['head'] == 1):
//?>
<!--<style>-->
<!--    .label_upload {-->
<!--        color: #fff;-->
<!--        background: #1FB264;-->
<!--        padding: 20px;-->
<!--        border-radius: 4px;-->
<!--        border-bottom: 4px solid #15824B;-->
<!--        transition: all .2s ease;-->
<!--        outline: none;-->
<!--        width: 200px;-->
<!--        text-transform: uppercase;-->
<!--        font-weight: 700;-->
<!---->
<!--    }-->
<!---->
<!--    .label_upload:hover {-->
<!--        background: #1AA059;-->
<!--        color: #ffffff;-->
<!--        transition: all .2s ease;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .file-upload {-->
<!--        background-color: #ffffff;-->
<!--        width: 600px;-->
<!--        margin: 0 auto;-->
<!--        padding: 20px;-->
<!--    }-->
<!---->
<!---->
<!--    .file-upload-btn {-->
<!--        width: 100%;-->
<!--        margin: 0;-->
<!--        color: #fff;-->
<!--        background: #1FB264;-->
<!--        border: none;-->
<!--        padding: 10px;-->
<!--        border-radius: 4px;-->
<!--        border-bottom: 4px solid #15824B;-->
<!--        transition: all .2s ease;-->
<!--        outline: none;-->
<!--        text-transform: uppercase;-->
<!--        font-weight: 700;-->
<!--    }-->
<!---->
<!--    .file-upload-btn:hover {-->
<!--        background: #1AA059;-->
<!--        color: #ffffff;-->
<!--        transition: all .2s ease;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .file-upload-btn:active {-->
<!--        border: 0;-->
<!--        transition: all .2s ease;-->
<!--    }-->
<!---->
<!--    .file-upload-content {-->
<!--        display: none;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .file-upload-input {-->
<!--        position: absolute;-->
<!--        margin: 0;-->
<!--        padding: 0;-->
<!--        width: 100%;-->
<!--        height: 100%;-->
<!--        outline: none;-->
<!--        opacity: 0;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .image-upload-wrap {-->
<!--        margin-top: 20px;-->
<!--        border: 4px dashed #1FB264;-->
<!--        position: relative;-->
<!--    }-->
<!---->
<!--    .image-dropping,-->
<!--    .image-upload-wrap:hover {-->
<!--        background-color: #1FB264;-->
<!--        border: 4px dashed #ffffff;-->
<!--    }-->
<!---->
<!--    .image-title-wrap {-->
<!--        padding: 0 15px 15px 15px;-->
<!--        color: #222;-->
<!--    }-->
<!---->
<!--    .drag-text {-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .drag-text h3 {-->
<!--        font-weight: 100;-->
<!--        text-transform: uppercase;-->
<!--        color: #15824B;-->
<!--        padding: 60px 0;-->
<!--    }-->
<!---->
<!--    .file-upload-image {-->
<!--        max-height: 200px;-->
<!--        max-width: 200px;-->
<!--        margin: auto;-->
<!--        padding: 20px;-->
<!--    }-->
<!---->
<!--    .remove-image {-->
<!--        width: 200px;-->
<!--        margin: 0;-->
<!--        color: #fff;-->
<!--        background: #cd4535;-->
<!--        border: none;-->
<!--        padding: 10px;-->
<!--        border-radius: 4px;-->
<!--        border-bottom: 4px solid #b02818;-->
<!--        transition: all .2s ease;-->
<!--        outline: none;-->
<!--        text-transform: uppercase;-->
<!--        font-weight: 700;-->
<!--    }-->
<!---->
<!--    .remove-image:hover {-->
<!--        background: #c13b2a;-->
<!--        color: #ffffff;-->
<!--        transition: all .2s ease;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .remove-image:active {-->
<!--        border: 0;-->
<!--        transition: all .2s ease;-->
<!--    }-->
<!---->
<!--    .file-upload-word {-->
<!--        background-color: #ffffff;-->
<!--        width: 600px;-->
<!--        margin: 0 auto;-->
<!--        padding: 20px;-->
<!--    }-->
<!---->
<!---->
<!--    .file-upload-btn-word {-->
<!--        width: 100%;-->
<!--        margin: 0;-->
<!--        color: #fff;-->
<!--        background: #1FB264;-->
<!--        border: none;-->
<!--        padding: 10px;-->
<!--        border-radius: 4px;-->
<!--        border-bottom: 4px solid #15824B;-->
<!--        transition: all .2s ease;-->
<!--        outline: none;-->
<!--        text-transform: uppercase;-->
<!--        font-weight: 700;-->
<!--    }-->
<!---->
<!--    .file-upload-btn-word:hover {-->
<!--        background: #1AA059;-->
<!--        color: #ffffff;-->
<!--        transition: all .2s ease;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .file-upload-btn-word:active {-->
<!--        border: 0;-->
<!--        transition: all .2s ease;-->
<!--    }-->
<!---->
<!--    .file-upload-content-word {-->
<!--        display: none;-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .file-upload-input-word {-->
<!--        position: absolute;-->
<!--        margin: 0;-->
<!--        padding: 0;-->
<!--        width: 100%;-->
<!--        height: 100%;-->
<!--        outline: none;-->
<!--        opacity: 0;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .image-upload-wrap-word {-->
<!--        margin-top: 20px;-->
<!--        border: 4px dashed #1FB264;-->
<!--        position: relative;-->
<!--    }-->
<!---->
<!--    .image-dropping-word,-->
<!--    .image-upload-wrap-word:hover {-->
<!--        background-color: #1FB264;-->
<!--        border: 4px dashed #ffffff;-->
<!--    }-->
<!---->
<!--    .image-title-wrap-word {-->
<!--        padding: 0 15px 15px 15px;-->
<!--        color: #222;-->
<!--    }-->
<!---->
<!--    .drag-text-word {-->
<!--        text-align: center;-->
<!--    }-->
<!---->
<!--    .drag-text-word h3 {-->
<!--        font-weight: 100;-->
<!--        text-transform: uppercase;-->
<!--        color: #15824B;-->
<!--        padding: 60px 0;-->
<!--    }-->
<!---->
<!--    .file-upload-image-word {-->
<!--        max-height: 200px;-->
<!--        max-width: 200px;-->
<!--        margin: auto;-->
<!--        padding: 20px;-->
<!--    }-->
<!---->
<!--    .remove-image-word {-->
<!--        width: 200px;-->
<!--        margin: 0;-->
<!--        color: #fff;-->
<!--        background: #cd4535;-->
<!--        border: none;-->
<!--        padding: 10px;-->
<!--        border-radius: 4px;-->
<!--        border-bottom: 4px solid #b02818;-->
<!--        transition: all .2s ease;-->
<!--        outline: none;-->
<!--        text-transform: uppercase;-->
<!--        font-weight: 700;-->
<!--    }-->
<!---->
<!--    .remove-image-word:hover {-->
<!--        background: #c13b2a;-->
<!--        color: #ffffff;-->
<!--        transition: all .2s ease;-->
<!--        cursor: pointer;-->
<!--    }-->
<!---->
<!--    .remove-image-word:active {-->
<!--        border: 0;-->
<!--        transition: all .2s ease;-->
<!--    }-->
<!--</style>-->
<!--<div class="content-wrapper">-->
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
<!--            <center>-->
<!--                --><?php //if (isset($_GET['wrongfilesize'])): ?>
<!--                    <div class="box box-solid box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                حجم فایل انتخاب شده از 20 مگابایت بالاتر است. لطفا پس از کاهش حجم فایل، دوباره آپلود-->
<!--                                کنید.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['fileset'])): ?>
<!--                    <div class="box box-solid box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                فایل با موفقیت در سامانه جشنواره علامه حلی ثبت شد.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['unknownwrong'])): ?>
<!--                    <div class="box box-solid box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                خطای ناشناخته. لطفا با مدیریت سایت تماس حاصل فرمایید-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['invalidpdfname'])): ?>
<!--                    <div class="box box-solid box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                نام فایل pdf با کد اثر برابر نیست.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['invaliddocname'])): ?>
<!--                    <div class="box box-solid box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                نام فایل word با کد اثر برابر نیست.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['filesset'])): ?>
<!--                    <div class="box box-solid box-success">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                فایل ها با موفقیت در سامانه جشنواره علامه حلی ثبت شدند.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['findwithname'])): ?>
<!--                    <div class="box box-solid box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                فایل اثر با این نام قبلا در سیستم ذخیره شده است. لطفا با پشتیبانی سامانه تماس بگیرید.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //elseif (isset($_GET['wrongfiletype'])): ?>
<!--                    <div class="box box-solid box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                پسوند فایل اثر اشتباه است. لطفا فایل pdf آپلود کنید.-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                --><?php //endif; ?>
<!--            </center>-->
<!--        </section>-->
<!--    </div>-->
<!--    <div class="box box-danger">-->
<!---->
<!--        <center>-->
<!--            <div class="p-3 mb-2 bg-danger text-dark">-->
<!--                <p>لطفا قبل از آپلود فایل اثر در نظر داشته باشید که نام فایل اثر، باید کد اثر باشد.</p>-->
<!--                <p>در صورت وجود فایل برای اثر انتخاب شده، لینک فایل اثر در زیر اطلاعات نمایش داده شده و می توانید مشاهده-->
<!--                    نمایید.</p>-->
<!---->
<!--            </div>-->
<!--        </center>-->
<!---->
<!--    </div>-->
<!--    <!-- Content Header (Page header) -->-->
<!--    <!-- Content Wrapper. Contains page content -->-->
<!--    <div class="row">-->
<!--        <section class="col-lg-12 col-md-12">-->
<!--            <div class="box box-danger">-->
<!--                <div class="box-header">-->
<!--                    <i class="fa fa-info-circle"></i>-->
<!--                    <h3 class="box-title">-->
<!--                        الصاق فایل به اثر-->
<!--                    </h3>-->
<!--                </div>-->
<!--                <div class="box-body">-->
<!--                    <center>-->
<!--                        <form method="post" id="myform">-->
<!--                                <span>-->
<!--                                    <input style="padding: 5px" value="" type="number" id="codeasar" name="codeasar"-->
<!--                                           placeholder="کد اثر را وارد کنید">-->
<!--                                </span>-->
<!--                            <input style="padding: 5px" name="findcodeasar_forattachfile" type="submit"-->
<!--                                   class="label_upload" value="جستجوی فایل اثر">-->
<!--                        </form>-->
<!--                    </center>-->
<!---->
<!---->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </section>-->
<!--    </div>-->
<!---->
<!--    --><?php
//    @$codeasar = $_POST['codeasar'];
//    if ($_SESSION['head'] == 1) {
//        $query = mysqli_query($connection, "select etelaat_a.fileasar_uploader,etelaat_a.fileasar_word_uploader,etelaat_a.codeasar,etelaat_a.fileasar,etelaat_a.fileasar_word,etelaat_a.nameasar,etelaat_a.ghalebpazhouhesh,etelaat_a.satharzyabi,etelaat_a.groupelmi,etelaat_p.fname,etelaat_p.family,etelaat_p.madrese,etelaat_p.ostantahsili from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.codeasar='$codeasar'");
//    }
//    foreach ($query as $selectionfrometa) {
//    }
//    if (!empty($selectionfrometa) and isset($_POST['findcodeasar_forattachfile'])):
//        ?>
<!---->
<!---->
<!--        <div class="row">-->
<!--            <section class="col-lg-12 col-md-12">-->
<!--                <div class="box box-solid box-success">-->
<!--                    <div class="box-header">-->
<!--                        <i class="fa fa-info-circle"></i>-->
<!--                        <h3 class="box-title">-->
<!--                            لطفا فایل اثر خود را انتخاب کرده و بر روی گزینه آپلود فایل کلیک کنید.-->
<!--                        </h3>-->
<!--                    </div>-->
<!--                    <div class="box-body">-->
<!--                        <center>-->
<!--                            <form action="/build/php/inc.php" method="post" enctype="multipart/form-data">-->
<!--                                <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                    کد اثر:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['codeasar'] ?>
<!--                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                                    <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                نام اثر:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['nameasar'] ?>
<!--                                </p>-->
<!--                                <br/>-->
<!--                                <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                قالب/سطح:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['ghalebpazhouhesh'] . ' سطح ' . $selectionfrometa['satharzyabi'] ?>
<!--                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                                    <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                گروه علمی:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['groupelmi'] ?>
<!--                                </p>-->
<!--                                <br/>-->
<!--                                <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                مشخصات صاحب اثر:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['fname'] . ' ' . $selectionfrometa['family'] ?>
<!--                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                                    <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                نام مدرسه:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['madrese'] ?>
<!--                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                                    <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                استان:-->
<!--                                </span>-->
<!--                                    --><?php //echo $selectionfrometa['ostantahsili'] ?>
<!--                                </p>-->
<!--                                --><?php //if ($selectionfrometa['fileasar'] != null): ?>
<!--                                    <br/>-->
<!--                                    <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                دانلود اثر بارگزاری شده با فرمت PDF:-->
<!--                                </span>-->
<!--                                        <a href="--><?php //echo $selectionfrometa['fileasar'] ?><!--">-->
<!--                                            --><?php //echo $selectionfrometa['nameasar'] ?>
<!--                                        </a>-->
<!--                                    </p>-->
<!--                                    --><?php //if ($_SESSION['head'] == 1): ?>
<!--                                        <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                آپلودر:-->
<!--                                </span>-->
<!--                                            --><?php
//                                            echo $selectionfrometa['fileasar_uploader'] . "--";
//                                            $user = $selectionfrometa['fileasar_uploader'];
//                                            $sql = mysqli_query($connection, "select name,family from rater_list where username='$user'");
//                                            foreach ($sql as $pdfuploader) {
//                                            }
//                                            echo $pdfuploader['name'] . ' ' . $pdfuploader['family'] ?>
<!--                                        </p>-->
<!--                                    --><?php //endif; endif; ?>
<!--                                --><?php //if ($selectionfrometa['fileasar_word'] != NULL): ?>
<!--                                    <br/>-->
<!--                                    <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                دانلود اثر بارگزاری شده با فرمت DOC:-->
<!--                                </span>-->
<!--                                        <a href="--><?php //echo $selectionfrometa['fileasar_word'] ?><!--">-->
<!--                                            --><?php //echo $selectionfrometa['nameasar'] ?>
<!--                                        </a>-->
<!--                                    </p>-->
<!--                                    --><?php //if ($_SESSION['head'] == 1): ?>
<!--                                        <p>-->
<!--                                <span style="background-color: #006400; color: white;border-radius: 10px;padding: 3px">-->
<!--                                آپلودر:-->
<!--                                </span>-->
<!--                                            --><?php
//                                            echo $selectionfrometa['fileasar_word_uploader'] . "--";
//                                            $user = $selectionfrometa['fileasar_word_uploader'];
//                                            $sql = mysqli_query($connection, "select name,family from rater_list where username='$user'");
//                                            foreach ($sql as $pdfuploader) {
//                                            }
//                                            echo $pdfuploader['name'] . ' ' . $pdfuploader['family'] ?>
<!--                                        </p>-->
<!--                                    --><?php //endif; endif; ?>
<!--                                <input name="adhesive" type="hidden" value="--><?php //echo $user ?><!--">-->
<!--                                <input name="codeasar" type="hidden"-->
<!--                                       value="--><?php //echo $selectionfrometa['codeasar'] ?><!--">-->
<!---->
<!--                                --><?php //if ($selectionfrometa['fileasar'] == null and $selectionfrometa['fileasar_word'] == null and $_SESSION['head'] == 2): ?>
<!--                                    <br/>-->
<!--                                    <span>-->
<!--                                <div class="file-upload">-->
<!---->
<!--                                    <div class="image-upload-wrap">-->
<!--                                        <input class="file-upload-input" type='file' name="fileasar" required-->
<!--                                               onchange="readURL(this);" accept="application/pdf"/>-->
<!--                                        <div class="drag-text">-->
<!--                                            <h3>فایل pdf را انتخاب کرده و در این کادر رها کنید یا کلیک کرده و فایل را انتخاب کنید. (حداکثر حجم فایل 20 مگابایت و با پسوند PDF)</h3>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="file-upload-content">-->
<!--                                        <div class="image-title-wrap">-->
<!--                                            <button type="button" onclick="removeUpload()" class="remove-image">حذف انتخاب <br/> <span-->
<!--                                                        class="image-title"></span></button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                </span>-->
<!--                                    <br/>-->
<!--                                    <span>-->
<!--                                <div class="file-upload-word">-->
<!--                                    <div class="image-upload-wrap-word">-->
<!--                                        <input class="file-upload-input-word" type='file' name="fileasar_word"-->
<!--                                               onchange="readURLword(this);" accept="application/msword"/>-->
<!--                                        <div class="drag-text">-->
<!--                                            <h3>فایل word را انتخاب کرده و در این کادر رها کنید یا کلیک کرده و فایل را انتخاب کنید. (حداکثر حجم فایل 20 مگابایت و با پسوند DOC)</h3>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="file-upload-content-word">-->
<!--                                        <div class="image-title-wrap-word">-->
<!--                                            <button type="button" onclick="removeUploadword()"-->
<!--                                                    class="remove-image-word">حذف انتخاب <br/> <span-->
<!--                                                        class="image-title-word"></span></button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                </span>-->
<!--                                    <br/>-->
<!---->
<!--                                    <input id="upload" style="padding: 5px" name="attachfile_type2" type="submit"-->
<!--                                           value="آپلود فایل" class="label_upload"-->
<!--                                           onclick="return confirm('آیا از آپلود فایل مطمئن هستید؟ این عملیات قابل بازگشت نیست!')">-->
<!--                                --><?php //elseif ($_SESSION['head'] == 1): ?>
<!--                                    <br/>-->
<!--                                    <span>-->
<!--                                <div class="file-upload">-->
<!--                                    <div class="image-upload-wrap">-->
<!--                                        <input class="file-upload-input" type='file' name="fileasar" required-->
<!--                                               onchange="readURL(this);" accept="application/pdf"/>-->
<!--                                        <div class="drag-text">-->
<!--                                            <h3>فایل pdf را انتخاب کرده و در این کادر رها کنید یا کلیک کرده و فایل را انتخاب کنید. (حداکثر حجم فایل 20 مگابایت و با پسوند PDF)</h3>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="file-upload-content">-->
<!--                                        <div class="image-title-wrap">-->
<!--                                            <button type="button" onclick="removeUpload()" class="remove-image">حذف انتخاب <br/> <span-->
<!--                                                        class="image-title"></span></button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                </span>-->
<!--                                    <br/>-->
<!--                                    <span>-->
<!--                                <div class="file-upload-word">-->
<!--                                    <div class="image-upload-wrap-word">-->
<!--                                        <input class="file-upload-input-word" type='file' name="fileasar_word"-->
<!--                                               onchange="readURLword(this);" accept="application/msword"/>-->
<!--                                        <div class="drag-text">-->
<!--                                            <h3>فایل word را انتخاب کرده و در این کادر رها کنید یا کلیک کرده و فایل را انتخاب کنید. (حداکثر حجم فایل 20 مگابایت و با پسوند DOC)</h3>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="file-upload-content-word">-->
<!--                                        <div class="image-title-wrap-word">-->
<!--                                            <button type="button" onclick="removeUploadword()"-->
<!--                                                    class="remove-image-word">حذف انتخاب <br/> <span-->
<!--                                                        class="image-title-word"></span></button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                </span>-->
<!--                                    <br/>-->
<!---->
<!--                                    <input id="upload" style="padding: 5px" name="attachfileadmin" type="submit"-->
<!--                                           value="آپلود فایل" class="label_upload"-->
<!--                                           onclick="return confirm('آیا از آپلود فایل مطمئن هستید؟')">-->
<!--                                --><?php //endif; ?>
<!--                            </form>-->
<!--                        </center>-->
<!---->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </section>-->
<!--        </div>-->
<!--    --><?php
//    elseif (empty($selectionfrometa) and isset($_POST['findcodeasar_forattachfile'])):
//        ?>
<!--        <div class="box box-solid box-danger">-->
<!--            <div class="box-header">-->
<!--                <i class="fa fa-info-circle"></i>-->
<!---->
<!--                <h3 class="box-title">-->
<!--                    کد اثر وارد شده، پیدا نشد!-->
<!--                </h3>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    --><?php //endif; ?>
<!--    <script>-->
<!--        function readURL(input) {-->
<!--            if (input.files && input.files[0]) {-->
<!---->
<!--                var reader = new FileReader();-->
<!---->
<!--                reader.onload = function (e) {-->
<!--                    $('.image-upload-wrap').hide();-->
<!---->
<!--                    $('.file-upload-image').attr('src', e.target.result);-->
<!--                    $('.file-upload-content').show();-->
<!---->
<!--                    $('.image-title').html(input.files[0].name);-->
<!--                };-->
<!---->
<!--                reader.readAsDataURL(input.files[0]);-->
<!---->
<!--            } else {-->
<!--                removeUpload();-->
<!--            }-->
<!--        }-->
<!---->
<!--        function removeUpload() {-->
<!--            $('.file-upload-input').replaceWith($('.file-upload-input').clone());-->
<!--            $('.file-upload-content').hide();-->
<!--            $('.image-upload-wrap').show();-->
<!--        }-->
<!---->
<!--        $('.image-upload-wrap').bind('dragover', function () {-->
<!--            $('.image-upload-wrap').addClass('image-dropping');-->
<!--        });-->
<!--        $('.image-upload-wrap').bind('dragleave', function () {-->
<!--            $('.image-upload-wrap').removeClass('image-dropping');-->
<!--        });-->
<!---->
<!---->
<!--        function readURLword(input) {-->
<!--            if (input.files && input.files[0]) {-->
<!---->
<!--                var reader = new FileReader();-->
<!---->
<!--                reader.onload = function (e) {-->
<!--                    $('.image-upload-wrap-word').hide();-->
<!---->
<!--                    $('.file-upload-image-word').attr('src', e.target.result);-->
<!--                    $('.file-upload-content-word').show();-->
<!---->
<!--                    $('.image-title-word').html(input.files[0].name);-->
<!--                };-->
<!---->
<!--                reader.readAsDataURL(input.files[0]);-->
<!---->
<!--            } else {-->
<!--                removeUploadword();-->
<!--            }-->
<!--        }-->
<!---->
<!--        function removeUploadword() {-->
<!--            $('.file-upload-input-word').replaceWith($('.file-upload-input-word').clone());-->
<!--            $('.file-upload-content-word').hide();-->
<!--            $('.image-upload-wrap-word').show();-->
<!--        }-->
<!---->
<!--        $('.image-upload-wrap-word').bind('dragover', function () {-->
<!--            $('.image-upload-wrap-word').addClass('image-dropping');-->
<!--        });-->
<!--        $('.image-upload-wrap-word').bind('dragleave', function () {-->
<!--            $('.image-upload-wrap-word').removeClass('image-dropping');-->
<!--        });-->
<!--    </script>-->
<!--    --><?php
//    elseif ($_SESSION['head'] == 2):
//    ?>
<!--    <div class="content-wrapper">-->
<!--        <div class="row">-->
<!--            <section class="col-lg-12 col-md-12">-->
<!--                <div class="box box-danger">-->
<!--                    <div class="box-header">-->
<!--                        <i class="fa fa-info-circle"></i>-->
<!--                        <h3 class="box-title">-->
<!--                            این نکات خوانده شود:-->
<!--                        </h3>-->
<!--                    </div>-->
<!--                    <div class="box-body">-->
<!--                        <p>لطفا پس از اتمام کار با سامانه، از حساب کاربری خود خارج شوید.</p>-->
<!--                        <p>لطفا در حفظ و نگهداری نام کاربری و رمز عبور خود نهایت دقت را داشته باشید.</p>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--                <center>-->
<!--                    --><?php //if (isset($_GET['wrongfilesize'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    حجم فایل انتخاب شده از 20 مگابایت بالاتر است. لطفا پس از کاهش حجم فایل، دوباره آپلود-->
<!--                                    کنید.-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['fileset'])): ?>
<!--                        <div class="box box-solid box-success">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    فایل با موفقیت در سامانه جشنواره علامه حلی ثبت شد.-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['unknownwrong'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    خطای ناشناخته. لطفا با مدیریت سایت تماس حاصل فرمایید-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['invalidpdfname'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    نام فایل pdf با کد اثر برابر نیست.-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['wrongfiletype'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    پسوند فایل اشتباه است-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['invaliddocname'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    نام فایل word با کد اثر برابر نیست.-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['filesset'])): ?>
<!--                        <div class="box box-solid box-success">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    فایل های اثر با کد-->
<!--                                    --><?php //echo $_GET['code'] ?>
<!--                                    با موفقیت در سامانه جشنواره علامه حلی ثبت شدند.-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['findwithname'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    فایل اثر با این نام قبلا در سیستم ذخیره شده است. لطفا با پشتیبانی سامانه تماس-->
<!--                                    بگیرید.-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //elseif (isset($_GET['wrongfile'])): ?>
<!--                        <div class="box box-solid box-danger">-->
<!--                            <div class="box-header">-->
<!--                                <i class="fa fa-info-circle"></i>-->
<!--                                <h3 class="box-title">-->
<!--                                    فایل اثر انتخاب نشده است-->
<!--                                </h3>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //endif; ?>
<!--                </center>-->
<!--            </section>-->
<!--        </div>-->
<!--        <div class="box box-danger">-->
<!---->
<!--            <center>-->
<!--                <div class="p-3 mb-2 bg-danger text-dark">-->
<!--                    <p style="padding: 5px">لطفا قبل از آپلود فایل اثر در نظر داشته باشید که نام فایل اثر، باید کد اثر-->
<!--                        باشد.</p>-->
<!--                    <p style="padding: 5px">به هیچ وجه، آثاری که به آن مشکوک هستید را آپلود نکنید؛ آپلود فایل اثر، نشان-->
<!--                        دهنده تایید اطلاعات اثر توسط شماست</p>-->
<!--                    <p style="padding: 5px">در صورت لزوم می توانید نام اثر را تغییر دهید. لطفا آثاری که بدون نام هستند-->
<!--                        را بارگذاری نکنید</p>-->
<!---->
<!--                </div>-->
<!--            </center>-->
<!---->
<!--        </div>-->
<!--        <!-- Content Header (Page header) -->-->
<!--        <!-- Content Wrapper. Contains page content -->-->
<!--        <div class="row">-->
<!--            <section class="col-lg-12 col-md-12">-->
<!--                <div class="box box-danger">-->
<!--                    <div class="box-header">-->
<!--                        <i class="fa fa-info-circle"></i>-->
<!--                        <h3 class="box-title">-->
<!--                            الصاق فایل به اثر-->
<!--                        </h3>-->
<!--                    </div>-->
<!--                    <div class="box-body">-->
<!--                        <center>-->
<!--                            <table class="attachtable">-->
<!--                                <tr>-->
<!--                                    <th>ردیف</th>-->
<!--                                    <th>کد اثر</th>-->
<!--                                    <th width="450px">نام اثر</th>-->
<!--                                    <th>قالب پژوهش و سطح ارزیابی</th>-->
<!--                                    <th>گروه علمی</th>-->
<!--                                    <th>صاحب اثر</th>-->
<!--                                    <!--                                    <th>اثر حوزه خواهران</th>-->-->
<!--                                    <th>انتخاب فایل</th>-->
<!--                                </tr>-->
<!--                                --><?php
//                                $a = 1;
//                                $ostantahsili = $_SESSION['city'];
//                                $shahrtahsili = $_SESSION['shahr_name'];
//                                switch ($shahrtahsili) {
//                                    case 'کاشان':
//                                        @$query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='کاشان' and (etelaat_a.nobat_arzyabi_ostani='ارزیابی اجمالی' or etelaat_a.nobat_arzyabi_ostani is null or etelaat_a.nobat_arzyabi_ostani='') and  (etelaat_a.fileasar is null or etelaat_a.fileasar_word is null) and etelaat_a.jashnvareh='14-چهاردهم' order by etelaat_a.codeasar desc");
//                                        break;
//                                    case 'بناب':
//                                        @$query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.shahrtahsili='بناب' and (etelaat_a.nobat_arzyabi_ostani='ارزیابی اجمالی' or etelaat_a.nobat_arzyabi_ostani is null or etelaat_a.nobat_arzyabi_ostani='') and (etelaat_a.fileasar is null or etelaat_a.fileasar_word is null) and etelaat_a.jashnvareh='14-چهاردهم' order by etelaat_a.codeasar desc");
//                                        break;
//                                    default:
//                                        @$query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$ostantahsili' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and (etelaat_a.nobat_arzyabi_ostani='ارزیابی اجمالی' or etelaat_a.nobat_arzyabi_ostani is null or etelaat_a.nobat_arzyabi_ostani='') and (etelaat_a.fileasar is null or etelaat_a.fileasar_word is null) and etelaat_a.jashnvareh='14-چهاردهم' order by etelaat_a.codeasar desc");
//                                        break;
//                                }
//                                foreach ($query as $values):
//                                    ?>
<!--                                    <tr style="--><?php
//                                    if ($a % 2 == 0) {
//                                        echo "background-color: #f1f1f1";
//                                    } else {
//                                        echo "background-color: #fff;";
//                                    }
//                                    ?><!--">-->
<!--                                        <th>--><?php //echo $a; ?><!--</th>-->
<!--                                        <td>--><?php //echo $values['codeasar'] ?><!--</td>-->
<!--                                        <td>-->
<!--                                            <label>-->
<!--                                                <form method="post" enctype="multipart/form-data"-->
<!--                                                      action="build/php/inc.php" onsubmit="return validatename()">-->
<!---->
<!--                                                    <input type="text" name="nameasar" id="--><?php //echo $a; ?><!--"-->
<!--                                                           value="--><?php //echo $values['nameasar'] ?><!--"-->
<!--                                                           style="padding: 2px;overflow-x: auto;width: 450px">-->
<!--                                            </label>-->
<!--                                        </td>-->
<!--                                        <td>--><?php //echo $values['ghalebpazhouhesh'] . ' سطح ' . $values['satharzyabi'] ?><!--</td>-->
<!--                                        <td>--><?php //echo $values['groupelmi'] ?><!--</td>-->
<!--                                        <td>--><?php //echo $values['fname'] . ' ' . $values['family'] ?><!--</td>-->
<!--                                        <!--                                        <td><center><input type="checkbox" value="1" onclick="alert('با انتخاب این گزینه شما تایید می کنید که این اثر مربوط به حوزه خواهران بوده و نوبت ارزیابی از تفصیلی اول شروع شود')"></center></td>-->-->
<!--                                        <td>-->
<!--                                            <center>-->
<!--                                                <label>-->
<!--                                                    فایل pdf-->
<!--                                                </label>-->
<!--                                                <input accept="application/pdf" name='fileasar' type="file"-->
<!--                                                       id="pdf--><?php //echo $a; ?><!--">-->
<!--                                                <br/>-->
<!--                                                <label>-->
<!--                                                    فایل word-->
<!--                                                </label>-->
<!--                                                <input accept=".docx,.doc" name='fileasar_word' type="file"-->
<!--                                                       id="word--><?php //echo $a ?><!--">-->
<!--                                                <input type="hidden" name="codeasar"-->
<!--                                                       value="--><?php //echo $values['codeasar'] ?><!--">-->
<!--                                                <br/>-->
<!--                                                <input style="padding: 5px" name="attachfile_type2" value="بارگذاری"-->
<!--                                                       type="submit">-->
<!--                                            </center>-->
<!--                                            </form>-->
<!--                                        </td>-->
<!--                                        <script>-->
<!--                                            function validatename() {-->
<!--                                                var name = document.getElementById('--><?php //echo $a; ?>//');
//                                                if (name.value == '') {
//                                                    alert
//                                                    'نام اثر وارد نشده است';
//                                                    return false;
//                                                } else {
//                                                    return true;
//                                                }
//                                            }
//                                        </script>
//                                    </tr>
//                                    <?php //$a++ ?>
<!--                                --><?php //endforeach; ?>
<!--                            </table>-->
<!--                        </center>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </section>-->
<!--        </div>-->
<!--        --><?php
//        elseif ($_SESSION['head'] == 3):
//        ?>
<!--        <div class="content-wrapper">-->
<!--            <div class="row">-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                این نکات خوانده شود:-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body">-->
<!--                            <p>لطفا پس از اتمام کار با سامانه، از حساب کاربری خود خارج شوید.</p>-->
<!--                            <p>لطفا در حفظ و نگهداری نام کاربری و رمز عبور خود نهایت دقت را داشته باشید.</p>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <center>-->
<!--                        --><?php //if (isset($_GET['wrongfilesize'])): ?>
<!--                            <div class="box box-solid box-danger">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        حجم فایل انتخاب شده از 20 مگابایت بالاتر است. لطفا پس از کاهش حجم فایل، دوباره-->
<!--                                        آپلود کنید.-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['fileset'])): ?>
<!--                            <div class="box box-solid box-success">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        فایل با موفقیت در سامانه جشنواره علامه حلی ثبت شد.-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['unknownwrong'])): ?>
<!--                            <div class="box box-solid box-success">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        خطای ناشناخته. لطفا با مدیریت سایت تماس حاصل فرمایید-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['invalidpdfname'])): ?>
<!--                            <div class="box box-solid box-danger">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        نام فایل pdf با کد اثر برابر نیست.-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['invaliddocname'])): ?>
<!--                            <div class="box box-solid box-danger">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        نام فایل word با کد اثر برابر نیست.-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['filesset'])): ?>
<!--                            <div class="box box-solid box-success">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        فایل های اثر با کد-->
<!--                                        --><?php //echo $_GET['code'] ?>
<!--                                        با موفقیت در سامانه جشنواره علامه حلی ثبت شدند.-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['findwithname'])): ?>
<!--                            <div class="box box-solid box-danger">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        فایل اثر با این نام قبلا در سیستم ذخیره شده است. لطفا با پشتیبانی سامانه تماس-->
<!--                                        بگیرید.-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //elseif (isset($_GET['wrongfile'])): ?>
<!--                            <div class="box box-solid box-danger">-->
<!--                                <div class="box-header">-->
<!--                                    <i class="fa fa-info-circle"></i>-->
<!--                                    <h3 class="box-title">-->
<!--                                        فایل انتخاب نشده است-->
<!--                                    </h3>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        --><?php //endif; ?>
<!--                    </center>-->
<!--                </section>-->
<!--            </div>-->
<!--            <div class="box box-danger">-->
<!---->
<!--                <center>-->
<!--                    <div class="p-3 mb-2 bg-danger text-dark">-->
<!--                        <p style="padding: 5px">لطفا قبل از آپلود فایل اثر در نظر داشته باشید که نام فایل اثر، باید کد-->
<!--                            اثر باشد.</p>-->
<!--                        <p style="padding: 5px">به هیچ وجه، آثاری که به آن مشکوک هستید را آپلود نکنید؛ آپلود فایل اثر،-->
<!--                            نشان دهنده تایید اطلاعات اثر توسط شماست</p>-->
<!---->
<!--                    </div>-->
<!--                </center>-->
<!---->
<!--            </div>-->
<!--            <!-- Content Header (Page header) -->-->
<!--            <!-- Content Wrapper. Contains page content -->-->
<!--            <div class="row">-->
<!--                <section class="col-lg-12 col-md-12">-->
<!--                    <div class="box box-danger">-->
<!--                        <div class="box-header">-->
<!--                            <i class="fa fa-info-circle"></i>-->
<!--                            <h3 class="box-title">-->
<!--                                الصاق فایل به اثر-->
<!--                            </h3>-->
<!--                        </div>-->
<!--                        <div class="box-body">-->
<!--                            <center>-->
<!--                                <table class="attachtable">-->
<!--                                    <tr>-->
<!--                                        <th>ردیف</th>-->
<!--                                        <th>کد اثر</th>-->
<!--                                        <th width="450px">نام اثر</th>-->
<!--                                        <th>قالب پژوهش و سطح ارزیابی</th>-->
<!--                                        <th>گروه علمی</th>-->
<!--                                        <th>صاحب اثر</th>-->
<!--                                        <th>انتخاب فایل</th>-->
<!--                                    </tr>-->
<!--                                    --><?php
//                                    $a = 1;
//                                    $ostantahsili = $_SESSION['city'];
//                                    $shahrtahsili = $_SESSION['shahr_name'];
//                                    $school = $_SESSION['school'];
//                                    switch ($shahrtahsili) {
//                                        case 'کاشان':
//                                            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where (etelaat_a.fileasar is null or etelaat_a.fileasar_word is null) and etelaat_p.shahrtahsili='کاشان' and etelaat_a.nameasar is not null and etelaat_a.nameasar!='' and etelaat_a.nobat_arzyabi_madrese='ارزیابی اجمالی' and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='14-چهاردهم'");
//                                            break;
//                                        case 'بناب':
//                                            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where (etelaat_a.fileasar is null or etelaat_a.fileasar_word is null) and etelaat_p.shahrtahsili!='بناب' and etelaat_a.nameasar is not null and etelaat_a.nameasar!='' and nobat_arzyabi_madrese='ارزیابی اجمالی' and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='14-چهاردهم'");
//                                            break;
//                                        default:
//                                            $query = mysqli_query($connection, "select * from etelaat_a INNER join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where (etelaat_a.fileasar is null or etelaat_a.fileasar_word is null) and etelaat_p.ostantahsili='$ostantahsili' and etelaat_p.shahrtahsili='$shahrtahsili' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='بناب' and etelaat_a.nameasar is not null and etelaat_a.nameasar!='' and nobat_arzyabi_madrese='ارزیابی اجمالی' and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='14-چهاردهم'");
//                                            break;
//                                    }
//                                    foreach ($query as $values):
//                                        ?>
<!--                                        <tr style="--><?php
//                                        if ($a % 2 == 0) {
//                                            echo "background-color: #f1f1f1";
//                                        } else {
//                                            echo "background-color: #fff;";
//                                        }
//                                        ?><!--">-->
<!--                                            <form method="post" enctype="multipart/form-data"-->
<!--                                                  action="build/php/inc.php">-->
<!---->
<!--                                                <th>--><?php //echo $a;
//                                                    $a++ ?><!--</th>-->
<!--                                                <td>--><?php //echo $values['codeasar'] ?><!--</td>-->
<!--                                                <td>-->
<!--                                                    <label>-->
<!--                                                        <input type="text" name="nameasar"-->
<!--                                                               value="--><?php //echo $values['nameasar'] ?><!--"-->
<!--                                                               style="padding: 2px;overflow-x: auto;width: 450px">-->
<!--                                                    </label>-->
<!--                                                </td>-->
<!--                                                <td>--><?php //echo $values['ghalebpazhouhesh'] . ' سطح ' . $values['satharzyabi'] ?><!--</td>-->
<!--                                                <td>--><?php //echo $values['groupelmi'] ?><!--</td>-->
<!--                                                <td>--><?php //echo $values['fname'] . ' ' . $values['family'] ?><!--</td>-->
<!--                                                <td>-->
<!--                                                    <center>-->
<!--                                                        <label>-->
<!--                                                            فایل pdf-->
<!--                                                        </label>-->
<!--                                                        <input accept="application/pdf" name='fileasar' type="file"-->
<!--                                                               id="pdf--><?php //echo $a; ?><!--">-->
<!--                                                        <br/>-->
<!--                                                        <label>-->
<!--                                                            فایل word-->
<!--                                                        </label>-->
<!--                                                        <input accept=".docx,.doc" name='fileasar_word' type="file"-->
<!--                                                               id="word--><?php //echo $a ?><!--">-->
<!--                                                        <input type="hidden" name="codeasar"-->
<!--                                                               value="--><?php //echo $values['codeasar'] ?><!--">-->
<!--                                                        <br/>-->
<!--                                                        <input style="padding: 5px" name="attachfile_type3"-->
<!--                                                               value="بارگذاری" type="submit">-->
<!--                                                    </center>-->
<!--                                            </form>-->
<!--                                            </td>-->
<!---->
<!--                                        </tr>-->
<!--                                    --><?php //endforeach; ?>
<!--                                </table>-->
<!--                            </center>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </section>-->
<!--            </div>-->
<!--            --><?php
//            endif;
//            include_once __DIR__ . '/footer.php';
//            ?>
