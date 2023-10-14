<?php
include_once __DIR__.'/header.php';
if ($_SESSION['head']==1 or $_SESSION['head']==2):
    $head=$_SESSION['head'];
if ($head==2){
    $state=$_SESSION['city'];
}
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
        </section>
    </div>
    <div class="row">
        <section class="col-lg-12 col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">
                        <form method="post" action="">
                            دریافت گزارشات ارزیابی آثار در دوره‌ی:
                            <select name="jashnvareh">
                                <?php
                                $selectionfrometelaat_a=mysqli_query($connection,"select distinct(jashnvareh) from etelaat_a where jashnvareh is not null and jashnvareh!='' AND jashnvareh!='13-سیزدهم'");
                                foreach ($selectionfrometelaat_a as $items):
                                    ?>
                                    <option <?php if (@$_POST['jashnvareh']==$items['jashnvareh']){echo 'selected';} ?>>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            گروه علمی:
                            <select name="groupelmi">
                                <option <?php if (@$_POST['groupelmi']=='همه گروه ها'){echo 'selected';} ?>>همه گروه‌ها</option>
                                <?php
                                $query=mysqli_query($connection,"select distinct groupelmi from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi");
                                foreach ($query as $groupelmi):
                                    ?>
                                    <option <?php if (@$_POST['groupelmi']==$groupelmi['groupelmi']){echo 'selected';} ?>><?php echo $groupelmi['groupelmi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            با جنسیت:
                            <select name="gender">
                                <option <?php if (@$_POST['gender']=='بدون فیلتر'){echo 'selected';} ?>>بدون فیلتر</option>
                                <option <?php if (@$_POST['gender']=='مرد'){echo 'selected';} ?>>مرد</option>
                                <option <?php if (@$_POST['gender']=='زن'){echo 'selected';} ?>>زن</option>
                            </select>
                            <?php
                            if ($head==1):
                            ?>
                            استان:
                            <select name="state">
                                <option <?php if (@$_POST['state']=='همه استان‌ها'){echo 'selected';} ?>>همه استان‌ها</option>
                                <?php
                                    $query=mysqli_query($connection,"select distinct ostantahsili from etelaat_p where ostantahsili is not null and ostantahsili!='' order by ostantahsili");
                                foreach ($query as $ostantahsili):
                                    ?>
                                    <option <?php if (@$_POST['state']==$ostantahsili['ostantahsili']){echo 'selected';} ?>><?php echo $ostantahsili['ostantahsili'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php endif; ?>
                            <br/><br/>
                            شهرستان:
                            <select name="city">
                                <?php if ($_SESSION['shahr_name']!='بناب' and $_SESSION['shahr_name']!='کاشان' and $_SESSION['shahr_name']!='بابل'): ?>
                                <option <?php if (@$_POST['city']=='همه شهرستان‌ها'){echo 'selected';} ?>>همه شهرستان‌ها</option>
                                <?php endif; ?>
                                <?php
                                if ($head==1){
                                    $query=mysqli_query($connection,"select distinct shahrtahsili from etelaat_p where ostantahsili is not null and ostantahsili!='' and shahrtahsili is not null and shahrtahsili!='' order by shahrtahsili");
                                }
                                elseif ($head==2){
                                    switch ($_SESSION['shahr_name']){
                                        case 'کاشان':
                                            $query=mysqli_query($connection,"select distinct shahrtahsili from etelaat_p where shahrtahsili='کاشان' order by shahrtahsili");
                                            break;
                                        case 'بناب':
                                            $query=mysqli_query($connection,"select distinct shahrtahsili from etelaat_p where shahrtahsili='بناب' order by shahrtahsili");
                                            break;
                                        case 'بابل':
                                            $query=mysqli_query($connection,"select distinct shahrtahsili from etelaat_p where shahrtahsili='بابل' order by shahrtahsili");
                                            break;
                                        default:
                                            $query=mysqli_query($connection,"select distinct shahrtahsili from etelaat_p where ostantahsili='$state' and shahrtahsili!='کاشان' and shahrtahsili!='بناب' and shahrtahsili!='بابل' order by shahrtahsili");
                                            break;
                                    }
                                }
                                foreach ($query as $shahrtahsili):
                                    ?>
                                    <option <?php if (@$_POST['city']==$shahrtahsili['shahrtahsili']){echo 'selected';} ?>><?php echo $shahrtahsili['shahrtahsili'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            مدرسه:
                            <select name="school">
                                <option <?php if (@$_POST['school']=='همه مدارس'){echo 'selected';} ?>>همه مدارس</option>
                                <?php
                                if ($head==1) {
                                    $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili is not null and ostantahsili!='' and madrese is not null and madrese!='' order by madrese");
                                }
                                elseif ($head==2){
                                    switch ($_SESSION['shahr_name']){
                                        case 'کاشان':
                                            $query=mysqli_query($connection,"select distinct madrese from etelaat_p where shahrtahsili='کاشان' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                        case 'بناب':
                                            $query=mysqli_query($connection,"select distinct madrese from etelaat_p where shahrtahsili='بناب' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                        case 'بابل':
                                            $query=mysqli_query($connection,"select distinct madrese from etelaat_p where shahrtahsili='بابل' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                        default:
                                            $query=mysqli_query($connection,"select distinct madrese from etelaat_p where ostantahsili='$state' and shahrtahsili!='کاشان' and shahrtahsili!='بناب' and shahrtahsili!='بابل' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                    }
                                }
                                foreach ($query as $madrese):
                                    ?>
                                    <option <?php if (@$_POST['school']==$madrese['madrese']){echo 'selected';} ?>><?php echo $madrese['madrese'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <input type="submit" value="دریافت اطلاعات" name="exp_rates" style="padding: 6px" onclick="return confirm('لطفا تا بارگذاری کامل اطلاعات کمی صبر نمایید');">
                        </form>
                    </h3>
                </div>
            </div>

        </section>
    </div>

    <?php if (isset($_POST['exp_rates']) and !empty($_POST['jashnvareh'])):
    $counter=1;
    $jashnvareh=$_POST['jashnvareh'];
    $groupelmi=$_POST['groupelmi'];
    $gender=$_POST['gender'];
    if($head==1){
        $state=$_POST['state'];
    }
    elseif($head==2){
        $state=$_SESSION['city'];
    }
    switch (@$_SESSION['shahr_name']){
        case 'بناب':
            $city='بناب';
            break;
        case 'کاشان':
            $city='کاشان';
            break;
        case 'بابل':
            $city='بابل';
            break;
        default:
            $city=$_POST['city'];
            break;
    }
    $school=$_POST['school'];
    switch ($school) {
        case 'همه مدارس':
            switch ($state) {
                case 'همه استان‌ها':
                    switch ($groupelmi) {
                        case 'همه گروه‌ها':
                            switch ($gender) {
                                case 'بدون فیلتر':
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                                default:
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                            }
                            break;
                        default:
                            switch ($gender) {
                                case 'بدون فیلتر':
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                                default:
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                            }
                            break;
                    }
                    break;
                default:
                    switch ($city) {
                        case 'همه شهرستان‌ها':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.ostantahsili='$state' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_p.ostantahsili='$state' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='$city' and etelaat_p.ostantahsili='$state' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
            }
    break;
        default:
            switch ($state) {
                case 'همه استان‌ها':
                    switch ($groupelmi) {
                        case 'همه گروه‌ها':
                            switch ($gender) {
                                case 'بدون فیلتر':
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                                default:
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                            }
                            break;
                        default:
                            switch ($gender) {
                                case 'بدون فیلتر':
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                                default:
                                    $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                    break;
                            }
                            break;
                    }
                    break;
                default:
                    switch ($city) {
                        case 'همه شهرستان‌ها':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($gender) {
                                        case 'بدون فیلتر':
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                        default:
                                            $sql = "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='$gender' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='$city' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.nobat_arzyabi_madrese is not null and etelaat_a.nobat_arzyabi_madrese!='' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.codeasar";
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
            }
            break;
}
    ?>
    <center>
        <div class="row" style="overflow-x: auto">
            <section class="col-lg-12 col-md-12" style="overflow-x: auto">
                <div class="box box-success" style="overflow-x: auto">
                    <div class="box-header" style="overflow-x: auto">
                        <h3 class="box-title" style="overflow-x: auto">

                                <?php
                                $sql=mysqli_query($connection,$sql);
                                foreach($sql as $values){}
                                if (empty($values)):
                                ?>
                                    <section class="col-lg-12 col-md-12">
                                        <div class="box-header">
                                            <h3 class="box-title">
                                                اثری برای نمایش وجود ندارد.
                                            </h3>
                                        </div>
                                    </section>
                                <?php else:?>
                                    <table style="border-bottom: 2px solid black;overflow-x: auto">

                                        <tr style="font-size: 14px;border-bottom: 2px solid green;">
                                            <th>ردیف</th>
                                            <th>کد اثر</th>
                                            <th>نام اثر</th>
                                            <th>قالب/سطح</th>
                                            <th>گروه علمی</th>
                                            <th>بخش اساتید</th>
                                            <?php if ($head==1): ?>
                                                <th>استان</th>
                                            <?php endif; ?>
                                            <th>شهرستان</th>
                                            <th>مدرسه</th>
                                            <th>وضعیت ارزیابی</th>
                                            <th>ارزیاب و امتیاز ارزیابی اجمالی</th>
                                            <th>ارزیاب و امتیاز تفصیلی اول</th>
                                            <th>ارزیاب و امتیاز تفصیلی دوم</th>
                                            <th>ارزیاب و امتیاز تفصیلی سوم</th>
                                            <th>امتیاز نهایی</th>
                                        </tr>
                                    <?php
                                foreach($sql as $values):
                                    $coderater=null;
                                    ?>

                                    <tr style="font-size: 15px;border-bottom: 2px solid black" >
                                        <td style="padding: 10px">
                                            <?php echo $counter;$counter++ ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $codeasar=$values['codeasar'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php if ($values['fileasar']!=null or $values['fileasar_word']!=null):  ?>
                                                <a href="<?php if ($values['fileasar']!=null and $values['fileasar']!='dist/files/asar_files/') {echo $values['fileasar'];} elseif ($values['fileasar_word']!=null){echo $values['fileasar_word'];}  ?>">
                                                    <?php echo $values['nameasar'] ?>
                                                </a>
                                            <?php else: ?>
                                                <?php echo $values['nameasar'] ?>
                                            <?php endif; ?>

                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $values['ghalebpazhouhesh'].' '.$values['satharzyabi'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $values['groupelmi'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $query=mysqli_query($connection,"select master from etelaat_p where codeasar='$codeasar'");
                                            foreach ($query as $etelaat_p){}
                                            if ($etelaat_p['master']=='هست'){
                                                echo 'می باشد';
                                            }else{
                                                echo 'نمی باشد';
                                            }
                                            ?>
                                        </td>
                                        <?php if($head==1): ?>
                                        <td>
                                            <?php echo $values['ostantahsili'] ?>
                                        </td>
                                        <?php endif; ?>
                                        <td>
                                            <?php echo $values['shahrtahsili'] ?>
                                        </td>
                                        <td>
                                            <?php echo $values['madrese'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            if ($values['fileasar']==null or $values['fileasar_word']==null){
                                                echo 'فایل بارگذاری نشده';
                                            }
                                            else{
                                                echo $values['nobat_arzyabi_madrese'].' ('.$values['vaziatkarnamemadrese'].')';
                                            }
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $selectfromejmalimadrese=mysqli_query($connection,"select * from ejmali_madrese where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromejmalimadrese as $ejm){}
                                            $coderater=@$ejm['rater_id'];
                                            $sql=mysqli_query($connection,"select * from rater_list where username='$coderater'");
                                            foreach ($sql as $ejr){}
                                            echo @$ejr['name'].' '.@$ejr['family'];
                                            echo ' - '.@$ejm['jam'];
                                            @$ejm['jam']=null;
                                            @$ejm['rater_id']=null;
                                            @$coderater=null;
                                            @$ejr['name']=null;
                                            @$ejr['family']=null;
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php

                                            $selectfromtafsili1madrese=mysqli_query($connection,"select * from tafsili1_madrese where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromtafsili1madrese as $t1m){}
                                            $coderater=@$t1m['rater_id'];
                                            $sql=mysqli_query($connection,"select * from rater_list where username='$coderater'");
                                            foreach ($sql as $t1r){}
                                            echo @$t1r['name'].' '.@$t1r['family'];
                                            echo ' - '.@$t1m['jam'];
                                            @$t1m['jam']=null;
                                            @$t1m['rater_id']=null;
                                            @$coderater=null;
                                            @$t1r['name']=null;
                                            @$t1r['family']=null;
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $selectfromtafsili2madrese=mysqli_query($connection,"select * from tafsili2_madrese where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromtafsili2madrese as $t2m){}
                                            $coderater=@$t2m['rater_id'];
                                            $sql=mysqli_query($connection,"select * from rater_list where username='$coderater'");
                                            foreach ($sql as $t2r){}
                                            echo @$t2r['name'].' '.@$t2r['family'];
                                            echo ' - '.@$t2m['jam'];
                                            @$t2m['jam']=null;
                                            @$t2m['rater_id']=null;
                                            @$coderater=null;
                                            @$t2r['name']=null;
                                            @$t2r['family']=null;
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            $selectfromtafsili3madrese=mysqli_query($connection,"select * from tafsili3_madrese where codeasar='$codeasar' and jam is not null");
                                            foreach ($selectfromtafsili3madrese as $t3m){}
                                            $coderater=@$t3m['rater_id'];
                                            $sql=mysqli_query($connection,"select * from rater_list where username='$coderater'");
                                            foreach ($sql as $t3r){}
                                            echo @$t3r['name'].' '.@$t3r['family'];
                                            echo ' - '.@$t3m['jam'];
                                            @$t3m['jam']=null;
                                            @$t3m['rater_id']=null;
                                            @$coderater=null;
                                            @$t3r['name']=null;
                                            @$t3r['family']=null;
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $values['jamemtiazmadrese'];
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </table>
                            <?php endif; ?>

                        </h3>
                    </div>
                </div>

            </section>
        </div>
    </center>
<?php endif; ?>
<?php
endif;
include_once __DIR__.'/footer.php';
?>