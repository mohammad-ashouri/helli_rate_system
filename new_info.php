<?php
include_once __DIR__.'/header.php';
if ($_SESSION['head']==1):
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
            </div></section>
        <?php if (isset($_GET['created'])): ?>
        <section class="content">
            <div class="row">
                <section class="col-lg-12 col-md-12">
                    <div class="box box-solid box-success">
                        <div class="box-header">
                            <i class="fa fa-info-circle"></i>
                            <center>
                                <h3 class='box-title'>
                                    اثر با نام
                                    <?php echo $_GET['name']; ?>
                                    با موفقیت در سامانه جشنواره علامه حلی ثبت شد
                                    <br/><br/>
                                    کد اثر وارد شده:
                                    <?php echo $_GET['code']; ?>
                                </h3>
                            </center>

                        </div>
                </section>
                <?php endif; ?>
    </div>

    <div class="box-body">
        <section class="col-lg-12 col-md-12">
            <div class="box box-solid box-info">
                <div class="box-header">
                    <i class="fa fa-info-circle"></i>
                    <h3 class="box-title">
                        ثبت اثر جدید
                    </h3>

                </div>

                <div class="box-body">
                    <form name="myform" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" action="build/php/inc.php">
                        <center>
                                <span style="font-weight:bold ">
                                    نام اثر
                                </span>
                            <input id="asarname" class="asarname" type="text" name="asarname">
                            <br/> <br/>
                            <table class="tablenewasar" >
                                <tr>
                                    <th>دوره</th>
                                    <td>
                                        <select name="advaar" class="newasarselections">
                                            <?php
                                            $selectionfrometelaat_a=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a where jashnvareh is not null and jashnvareh!='' order by jashnvareh desc ");
                                            foreach ($selectionfrometelaat_a as $items):
                                                ?>
                                                <option>
                                                    <?php echo $items['jashnvareh'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <th>نام</th>
                                    <td>
                                        <input name="namesahebasar" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>نوع فعالیت</th>
                                    <td>
                                        <select class="newasarselections" name="noefaaliat">
                                            <option selected>انتخاب کنید</option>
                                            <option selected>
                                                فردی                                                    </option>
                                            <option>
                                                گروهی                                                    </option>
                                        </select>
                                    </td>
                                    <th>نام خانوادگی</th>
                                    <td>
                                        <input name="familysahebasar" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>قالب پژوهش</th>
                                    <td>
                                        <select class="newasarselections" name="ghalebpazhouhesh">
                                            <option selected>انتخاب کنید</option>
                                            <option>
                                                تحقیق پایانی                                                    </option>
                                            <option>
                                                مقاله                                                    </option>
                                            <option>
                                                پایان نامه                                                    </option>
                                            <option>
                                                کتاب                                                    </option>
                                        </select>
                                    </td>
                                    <th>نام پدر</th>
                                    <td>
                                        <input name="fathersahebasar" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>سطح ارزیابی</th>
                                    <td>
                                        <select class="newasarselections" name="satharzyabi">
                                            <option selected>انتخاب کنید</option>
                                            <option>
                                                1                                                    </option>
                                            <option>
                                                2                                                    </option>
                                            <option>
                                                3                                                    </option>
                                            <option>
                                                4                                                    </option>
                                        </select>
                                    </td>
                                    <th>کد ملی</th>
                                    <td>
                                        <input id="codemelli" name="codemelli" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>گروه علمی</th>
                                    <td>
                                        <select class="newasarselections" name="elmigroup">
                                            <option selected>انتخاب کنید</option>
                                            <option>
                                                اخلاق و تربیت                                                    </option>
                                            <option>
                                                ادبیات                                                    </option>
                                            <option>
                                                اصول فقه                                                    </option>


                                            <option>
                                                تاریخ اسلام                                                    </option>
                                            <option>
                                                تفسیر و علوم قرآنی                                                    </option>
                                            <option>
                                                علوم انسانی                                                    </option>
                                            <option>
                                                علوم حدیث و درایه                                                    </option>
                                            <option>
                                                فقه و حقوق اسلامی                                                    </option>
                                            <option>
                                                فلسفه و منطق                                                    </option>
                                            <option>
                                                کلام                                                    </option>
                                        </select>
                                    </td>
                                    <th>جنسیت</th>
                                    <td>
                                        <select name="gender" class="newasarselections">
                                            <option>انتخاب کنید</option>
                                            <option>مرد</option>
                                            <option>زن</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>نوع پژوهش</th>
                                    <td>
                                        <select class="newasarselections" name="noepazhouhesh">
                                            <option>انتخاب کنید</option>
                                            <option selected>
                                                تحقیق و تألیف                                                    </option>
                                            <option>
                                                ترجمه                                                    </option>
                                            <option>
                                                تصحیح و تعلیق                                                    </option>
                                        </select>
                                    </td>
                                    <th>تاریخ تولد</th>
                                    <td>
                                        <input name="t_year" style="width: 60px" placeholder="سال">
                                        <input name="t_month" style="width: 60px" placeholder="ماه">
                                        <input name="t_day" style="width: 60px" placeholder="روز">
                                    </td>
                                </tr>
                                <tr>
                                    <th>وضعیت نشر</th>
                                    <td>
                                        <select class="newasarselections" name="vaziatnashr">
                                            <option selected>انتخاب کنید</option>
                                            <option>منتشر شده</option>
                                            <option>منتشر نشده</option>
                                        </select>
                                    </td>
                                    <th>وضعیت تاهل</th>
                                    <td>
                                        <select name="vaziattaahol" class="newasarselections">
                                            <option selected>انتخاب کنید</option>
                                            <option>مجرد</option>
                                            <option>متاهل</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>تعداد صفحه</th>
                                    <td>
                                        <input placeholder="تعداد صفحه را وارد کنید" class="newasarselections" type="text" name="tedadsafhe">
                                    </td>
                                    <th>استان سکونت</th>
                                    <td>
                                        <input name="ostansokoonat" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>بخش ویژه</th>
                                    <td>
                                        <select class="newasarselections" name="bakhshvizheh">
                                            <option >انتخاب کنید</option>
                                            <option >هست</option>
                                            <option selected>نیست</option>
                                        </select>
                                    </td>
                                    <th>شهر سکونت</th>
                                    <td>
                                        <input name="shahrsokoonat" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>وضعیت استانی اثر</th>
                                    <td>
                                        <select class="newasarselections" name="vaziatostani">
                                            <option selected>انتخاب کنید</option>
                                            <option>
                                                اثر استان خراسان                                                    </option>
                                            <option>
                                                اثر منتخب استان آذربایجان شرقی                                                    </option>
                                            <option>
                                                اثر منتخب استان آذربایجان غربی                                                    </option>
                                            <option>
                                                اثر منتخب استان اردبیل                                                    </option>
                                            <option>
                                                اثر منتخب استان اصفهان                                                    </option>
                                            <option>
                                                اثر منتخب استان البرز                                                    </option>
                                            <option>
                                                اثر منتخب استان ایلام                                                    </option>
                                            <option>
                                                اثر منتخب استان بوشهر                                                    </option>
                                            <option>
                                                اثر منتخب استان تهران                                                    </option>
                                            <option>
                                                اثر منتخب استان خوزستان                                                    </option>
                                            <option>
                                                اثر منتخب استان زنجان                                                    </option>
                                            <option>
                                                اثر منتخب استان سمنان                                                    </option>
                                            <option>
                                                اثر منتخب استان سیستان و بلوچستان                                                    </option>
                                            <option>
                                                اثر منتخب استان فارس                                                    </option>
                                            <option>
                                                اثر منتخب استان قزوین                                                    </option>
                                            <option>
                                                اثر منتخب استان قم                                                    </option>
                                            <option>
                                                اثر منتخب استان لرستان                                                    </option>
                                            <option>
                                                اثر منتخب استان مازندران                                                    </option>
                                            <option>
                                                اثر منتخب استان مرکزی                                                    </option>
                                            <option>
                                                اثر منتخب استان هرمزگان                                                    </option>
                                            <option>
                                                اثر منتخب استان همدان                                                    </option>
                                            <option>
                                                اثر منتخب استان چهارمحال و بختیاری                                                    </option>
                                            <option>
                                                اثر منتخب استان کرمان                                                    </option>
                                            <option>
                                                اثر منتخب استان کرمانشاه                                                    </option>
                                            <option>
                                                اثر منتخب استان کهگیلویه و بویراحمد                                                    </option>
                                            <option>
                                                اثر منتخب استان گلستان                                                    </option>
                                            <option>
                                                اثر منتخب استان گیلان                                                    </option>
                                            <option>
                                                اثر منتخب استان یزد                                                    </option>
                                            <option>
                                                اثر منتخب منطقه بناب                                                    </option>
                                            <option>
                                                اثر منتخب منطقه کاشان                                                    </option>
                                        </select>
                                    </td>
                                    <th>آدرس</th>
                                    <td>
                                        <textarea name="address" class="textnewasartable"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th>شرایط اولیه شرکت در جشنواره</th>
                                    <td>
                                        <select name="sharayetavvalie" class="newasarselections">
                                            <option>انتخاب کنید</option>
                                            <option selected>دارد</option>
                                            <option>ندارد</option>
                                        </select>
                                    </td>
                                    <th>کدپستی</th>
                                    <td>
                                        <input name="codeposti" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>علت نداشتن شرایط اولیه</th>
                                    <td>
                                        <select class="newasarselections" name="ellatnadashtansharayet">
                                            <option selected>انتخاب کنید</option>
                                            <option>
                                                اثر اینترنتی است                                                    </option>
                                            <option>
                                                اثر به قلم شرکت کننده نیست                                                    </option>
                                            <option>
                                                اثر تایپ نشده                                                    </option>
                                            <option>
                                                اثر تکراری است                                                    </option>
                                            <option>
                                                اثر در دوره ی قبل شرکت داده شده بود                                                    </option>
                                            <option>
                                                اثر رتبه برگزیدگی استانی ندارد                                                    </option>
                                            <option>
                                                اثر شایسته تقدیر استان است                                                    </option>
                                            <option>
                                                اثر مربوط به قبل طلبگی ایشان است                                                    </option>
                                            <option>
                                                اثر کمتر از 10 صفحه است                                                    </option>
                                            <option>
                                                اثر، پژوهشی نیست                                                    </option>
                                            <option>
                                                امتیاز زیر 80 در استان                                                    </option>
                                            <option>
                                                این اثر، با اثر دیگری از نویسنده همپوشانی دارد                                                    </option>
                                            <option>
                                                به هم ریختگی فونت دارد                                                    </option>
                                            <option>
                                                خود اظهاری: بیشتر محتوای مقاله به قلم نویسنده نمی باشد                                                    </option>
                                            <option>
                                                شرایط سنی ندارد                                                    </option>
                                            <option>
                                                عدم ارسال فایل اثر توسط استان                                                    </option>
                                            <option>
                                                محتوای اثر ارتباطی با مباحث دینی ندارد                                                    </option>
                                            <option>
                                                مشارکان شرایط شرکت در جشنواره را ندارند                                                    </option>
                                            <option>
                                                پایان نامه دانشگاهی است                                                    </option>
                                            <option>
                                                پایان نامه سطح 4 شرایط جشنواره را ندارد                                                    </option>
                                            <option>
                                                پژوهشگر در جشنواره قبل برگزیده شده بود                                                    </option>
                                        </select>
                                    </td>
                                    <th>کد شهر</th>
                                    <td>
                                        <input id="codeshahr" name="codeshahr" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th>برگزیده کشوری</th>
                                    <td>
                                        <select name="bargozide" class="newasarselections">
                                            <option>انتخاب کنید</option>
                                            <option>می باشد</option>
                                            <option>نمی باشد</option>
                                        </select>
                                    </td>
                                    <th>تلفن ثابت</th>
                                    <td>
                                        <input name="telephone" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>استان تحصیل</th>
                                    <td>
                                        <input name="ostantahsil" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>شهر تحصیل</th>
                                    <td>
                                        <input name="shahrtahsil" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>نام مدرسه</th>
                                    <td>
                                        <input name="namemadrese" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>پایه، سطح، ترم</th>
                                    <td>
                                        <input name="paye" style="width: 60px" placeholder="پایه">
                                        <input name="sath" style="width: 60px" placeholder="سطح">
                                        <input name="term" style="width: 60px" placeholder="ترم">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>شرط سنی</th>
                                    <td>
                                        <select name="shartsenni" class="newasarselections">
                                            <option>انتخاب کنید</option>
                                            <option selected>دارد</option>
                                            <option>ندارد</option>
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>رشته دانشگاهی</th>
                                    <td>
                                        <input name="reshtedaneshgahi" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>شماره پرونده تحصیلی</th>
                                    <td>
                                        <input name="id_parvandetahsili" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>شماره شناسنامه</th>
                                    <td>
                                        <input name="id_shenasname" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>محل صدور</th>
                                    <td>
                                        <input name="mahalsodoor" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>تلفن همراه</th>
                                    <td>
                                        <input name="mobile" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>ایمیل</th>
                                    <td>
                                        <input name="email" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>رشته تخصصی حوزوی</th>
                                    <td>
                                        <input name="reshtetakhasosihozavi" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>مرکز تخصصی حوزوی</th>
                                    <td>
                                        <input name="markaztakhasosihozavi" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>ملیت</th>
                                    <td>
                                        <input name="meliat" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>نام کشور</th>
                                    <td>
                                        <input name="namekeshvar" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>گذرنامه</th>
                                    <td>
                                        <input name="gozarname" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>نام مرکز تحصیلی</th>
                                    <td>
                                        <input name="namemarkaztahsili" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>نوع تحصیلات حوزوی</th>
                                    <td>
                                        <input name="noetahsilathozavi" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>سال اخذ مدرک غیر حوزوی</th>
                                    <td>
                                        <input name="akhzmadrakgheirhozavi" class="textnewasartable">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                    </td>
                                    <th>تحصیلات غیر حوزوی</th>
                                    <td>
                                        <input name="tahsilatgheirhozavi" class="textnewasartable">
                                    </td>
                                </tr>

                            </table>

                            <br/><br/>

                            <input class="btn btn-block btn-success" style="width: 150px" type="submit" name="set_new_asar" value="ثبت اثر جدید" onclick="return confirm('کاربر گرامی: لطفا در صورت صحت اطلاعات وارد شده، بر روی گزینه OK کلیک کنید')">

                        </center>

                    </form>
                </div>
        </section>
    </div>






    <!-- /.content-wrapper -->
<?php
endif;
include_once __DIR__.'/footer.php';
?>
            <script>
                function validateForm() {
                    var codemelli = document.forms["myform"]["codemelli"].value;
                    var asarname = document.forms["myform"]["asarname"].value;
                    if (asarname == ""){
                        document.forms["myform"]["asarname"].style.backgroundColor="yellow";
                        alert("نام اثر وارد نشده است");
                        return false;
                    }
                    else if (codemelli > 9999999999) {
                        document.forms["myform"]["codemelli"].style.backgroundColor="yellow";
                        alert("کد ملی وارد شده بیشتر از 10 کاراکتر است!");
                        return false;
                    }

                    else{
                        return true;
                    }
                }

            </script>
