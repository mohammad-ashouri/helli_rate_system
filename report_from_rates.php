<?php
include_once __DIR__ . '/header.php';
if ($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)):
    $state = $_SESSION['city'];
    @$city = $_SESSION['shahr_name'];
    @$school = $_SESSION['school'];
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
                                $selectionfrometelaat_a = mysqli_query($connection, "select distinct(jashnvareh) from etelaat_a where jashnvareh is not null and jashnvareh!='' AND jashnvareh!='13-سیزدهم'");
                                foreach ($selectionfrometelaat_a as $items):
                                    ?>
                                    <option <?php if (@$_POST['jashnvareh'] == $items['jashnvareh']) {
                                        echo 'selected';
                                    } ?>>
                                        <?php echo $items['jashnvareh'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (@$_SESSION['head'] != 0 or @$_SESSION['groupname'] == null): ?>
                                گروه علمی:
                                <select name="groupelmi">
                                    <option <?php if (@$_POST['groupelmi'] == 'همه گروه ها') {
                                        echo 'selected';
                                    } ?>>همه گروه‌ها
                                    </option>
                                    <?php
                                    $query = mysqli_query($connection, "select distinct groupelmi from etelaat_a where groupelmi is not null and groupelmi!='' order by groupelmi");
                                    foreach ($query as $groupelmi):
                                        ?>
                                        <option <?php if (@$_POST['groupelmi'] == $groupelmi['groupelmi']) {
                                            echo 'selected';
                                        } ?>><?php echo $groupelmi['groupelmi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                            با جنسیت:
                            <select name="gender">
                                <option <?php if (@$_POST['gender'] == 'بدون فیلتر') {
                                    echo 'selected';
                                } ?>>بدون فیلتر
                                </option>
                                <option <?php if (@$_POST['gender'] == 'مرد') {
                                    echo 'selected';
                                } ?>>مرد
                                </option>
                                <option <?php if (@$_POST['gender'] == 'زن') {
                                    echo 'selected';
                                } ?>>زن
                                </option>
                            </select>
                            <?php if ($_SESSION['head'] == 2): ?>
                                <br/><br/>
                                <?php if ($_SESSION['shahr_name'] != 'بناب' and $_SESSION['shahr_name'] != 'کاشان'): ?>
                                    شهرستان:
                                    <select name="shahr_name">
                                        <option <?php if (@$_POST['groupelmi'] == 'همه شهرستان‌ها') {
                                            echo 'selected';
                                        } ?>>همه شهرستان‌ها
                                        </option>
                                        <?php
                                        $city = $_POST['shahr_name'];
                                        $school = $_POST['school'];
                                        switch ($city) {
                                            case 'بناب':
                                                $query = mysqli_query($connection, "select distinct shahrtahsili from etelaat_p where ostantahsili='$state' and shahrtahsili='بناب'");
                                                break;
                                            case 'کاشان':
                                                $query = mysqli_query($connection, "select distinct shahrtahsili from etelaat_p where ostantahsili='$state' and shahrtahsili='کاشان'");
                                                break;
                                            case 'بابل':
                                                $query = mysqli_query($connection, "select distinct shahrtahsili from etelaat_p where ostantahsili='$state' and shahrtahsili='بابل'");
                                                break;
                                            default:
                                                $query = mysqli_query($connection, "select distinct shahrtahsili from etelaat_p where ostantahsili='$state' and shahrtahsili is not null and shahrtahsili!='' and shahrtahsili!='بناب' and shahrtahsili!='کاشان' and shahrtahsili!='بابل' order by shahrtahsili");
                                                break;
                                        }
                                        foreach ($query as $shahrtahsili):
                                            ?>
                                            <option <?php if (@$_POST['shahr_name'] == $shahrtahsili['shahrtahsili']) {
                                                echo 'selected';
                                            } ?>><?php echo $shahrtahsili['shahrtahsili'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                                مدرسه:
                                <select name="school">
                                    <?php if ($city != 'بناب' or $city != 'کاشان'): ?>
                                        <option <?php if (@$_POST['school'] == 'همه مدارس') {
                                            echo 'selected';
                                        } ?>>همه مدارس
                                        </option>
                                    <?php endif; ?>
                                    <?php
                                    switch ($city) {
                                        case 'بناب':
                                            $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili='$state' and shahrtahsili='بناب' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                        case 'کاشان':
                                            $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili='$state' and shahrtahsili='کاشان' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                        case 'بابل':
                                            $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili='$state' and shahrtahsili='بابل' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                        default:
                                            $query = mysqli_query($connection, "select distinct madrese from etelaat_p where ostantahsili='$state' and madrese is not null and madrese!='' and shahrtahsili!='بناب' and shahrtahsili!='کاشان' and shahrtahsili!='بابل' and madrese is not null and madrese!='' order by madrese");
                                            break;
                                    }
                                    foreach ($query as $madrese):
                                        ?>
                                        <option <?php if (@$_POST['school'] == $madrese['madrese']) {
                                            echo 'selected';
                                        } ?>><?php echo $madrese['madrese'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                            <input type="submit" value="دریافت اطلاعات" name="exp_rates" style="padding: 6px"
                                   onclick="return confirm('لطفا تا بارگذاری کامل اطلاعات کمی صبر نمایید');">
                        </form>
                    </h3>
                </div>
            </div>

        </section>
    </div>

    <?php if (isset($_POST['exp_rates']) and !empty($_POST['jashnvareh'])):
    $counter = 1;
    $jashnvareh = $_POST['jashnvareh'];
    if (@$_SESSION['head'] != 0 or @$_SESSION['groupname'] == null) {
        $groupelmi = $_POST['groupelmi'];
    } else {
        $groupelmi = $_SESSION['groupname'];
    }

    $gender = $_POST['gender'];

    switch ($_SESSION['head']) {
        case 0:
            switch ($gender) {
                case 'مرد':
                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='قم' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_a.groupelmi,etelaat_a.codeasar");
                    break;
                case 'زن':
                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.ostantahsili='قم' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_a.groupelmi,etelaat_a.codeasar");
                    break;
                default:
                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='قم' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_a.groupelmi,etelaat_a.codeasar");
                    break;
            }
            break;
        case 2:
            if ($_SESSION['shahr_name'] == 'بناب') {
                @$city = 'بناب';
                @$school = $_POST['school'];
            } elseif ($_SESSION['shahr_name'] == 'کاشان') {
                @$city = 'کاشان';
                @$school = $_POST['school'];
            } elseif ($_SESSION['shahr_name'] == 'بابل') {
                @$city = 'بابل';
                @$school = $_POST['school'];
            } else {
                @$city = $_POST['shahr_name'];
                @$school = $_POST['school'];
            }

            switch ($city) {
                case 'بناب':
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='بناب' and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بناب' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بناب')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
                case 'کاشان':
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='کاشان' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='کاشان')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
                case 'بابل':
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.shahrtahsili='بابل' and etelaat_p.master='نیست') or (etelaat_p.master='هست' and etelaat_p.teachingCity='بابل')) and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
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
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.shahrtahsili!='کاشان' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='مرد' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by  etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili,etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.gender='زن' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where ((etelaat_p.master='نیست' and etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.master='هست' and etelaat_p.teachingProvince='$state' and etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                    }
                                    break;
                                default:
                                    switch ($city) {
                                        case 'همه شهرستان‌ها':
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_a.groupelmi='$groupelmi' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                            }
                                            break;
                                        default:
                                            switch ($school) {
                                                case 'همه مدارس':
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_a.groupelmi='$groupelmi' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
                                                    break;
                                                default:
                                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.shahrtahsili='$city' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and ((etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل') or (etelaat_p.teachingCity!='بناب' and etelaat_p.teachingCity!='کاشان' and etelaat_p.teachingCity!='بابل')) and etelaat_a.jashnvareh='$jashnvareh' order by etelaat_a.jamemtiazostan desc,etelaat_p.shahrtahsili, etelaat_a.groupelmi");
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
            break;
        case 3:
            @$city = $_SESSION['shahr_name'];
            @$school = $_SESSION['school'];
            switch ($city) {
                case 'بناب':
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc");
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc");
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='بناب' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc");
                                    break;
                            }
                            break;
                    }
                    break;
                case 'کاشان':
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='اصفهان' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='کاشان' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                    }
                    break;
                case 'بابل':
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='اصفهان' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='بابل' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                    }
                    break;
                default:
                    switch ($gender) {
                        case 'مرد':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='مرد' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                        case 'زن':
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.gender='زن' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.shahrtahsili!='کاشان' and and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
                                    break;
                            }
                            break;
                        default:
                            switch ($groupelmi) {
                                case 'همه گروه‌ها':
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi ");
                                    break;
                                default:
                                    $sql = mysqli_query($connection, "select * from etelaat_a inner join etelaat_p on etelaat_a.codeasar=etelaat_p.codeasar where etelaat_p.ostantahsili='$state' and etelaat_p.madrese='$school' and etelaat_a.groupelmi='$groupelmi' and etelaat_p.shahrtahsili='$city' and etelaat_a.jashnvareh='$jashnvareh' and etelaat_p.shahrtahsili!='بناب' and etelaat_p.shahrtahsili!='کاشان' and etelaat_p.shahrtahsili!='بابل' and etelaat_p.master ='نیست' order by etelaat_a.jamemtiazmadrese desc,etelaat_a.groupelmi");
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
                            <table style="border-bottom: 2px solid black;overflow-x: auto">
                                <tr style="font-size: 14px;border-bottom: 2px solid green;">
                                    <th>ردیف</th>
                                    <th>کد اثر</th>
                                    <th>نام اثر</th>
                                    <th>قالب/سطح</th>
                                    <?php if ($_SESSION['head'] != 0): ?>
                                        <th>گروه علمی</th>
                                    <?php endif; ?>
                                    <th>بخش اساتید</th>
                                    <?php if ($_SESSION['head'] == 2): ?>
                                        <th>شهرستان</th>
                                        <th>مدرسه</th>
                                    <?php endif; ?>
                                    <th>وضعیت ارزیابی</th>
                                    <th>ارزیاب و امتیاز ارزیابی اجمالی</th>
                                    <th>ارزیاب و امتیاز تفصیلی اول</th>
                                    <th>ارزیاب و امتیاز تفصیلی دوم</th>
                                    <th>ارزیاب و امتیاز تفصیلی سوم</th>

                                    <th>امتیاز نهایی</th>
                                </tr>
                                <?php foreach ($sql as $values):
                                    $coderater = null;
                                    ?>
                                    <tr style="font-size: 15px;border-bottom: 2px solid black">
                                        <td style="padding: 10px">
                                            <?php echo $counter;
                                            $counter++ ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $codeasar = $values['codeasar'] ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php if ($values['fileasar'] != null or $values['fileasar_word'] != null): ?>
                                                <a href="<?php if ($values['fileasar'] != null and $values['fileasar'] != 'dist/files/asar_files/') {
                                                    echo $values['fileasar'];
                                                } elseif ($values['fileasar_word'] != null) {
                                                    echo $values['fileasar_word'];
                                                } ?>">
                                                    <?php echo $values['nameasar'] ?>
                                                </a>
                                            <?php else: ?>
                                                <?php echo $values['nameasar'] ?>
                                            <?php endif; ?>

                                        </td>
                                        <td style="padding: 10px">
                                            <?php echo $values['ghalebpazhouhesh'] . ' ' . $values['satharzyabi'] ?>
                                        </td>
                                        <?php if ($_SESSION['head'] != 0): ?>
                                            <td style="padding: 10px">
                                                <?php echo $values['groupelmi'] ?>
                                            </td>
                                        <?php endif; ?>
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
                                        <?php if ($_SESSION['head'] == 2): ?>
                                            <td>
                                                <?php echo $values['shahrtahsili'] ?>
                                            </td>
                                            <td>
                                                <?php echo $values['madrese'] ?>
                                            </td>
                                        <?php endif; ?>
                                        <td style="padding: 10px">
                                            <?php
                                            switch ($_SESSION['head']) {
                                                case 0:
                                                case 2:
                                                    if (($values['fileasar'] == null or $values['fileasar_word'] == null) and $values['approve_sianat'] == 0) {
                                                        echo 'فایل بارگذاری نشده';
                                                    } elseif (($values['fileasar'] == null or $values['fileasar_word'] == null) and $values['approve_sianat'] == 2) {
                                                        echo $values['ellatnadashtansharayet'];
                                                    } elseif ($values['vaziatkarnamemadrese'] == 'در حال ارزیابی' and ($values['nobat_arzyabi_madrese'] != null or $values['nobat_arzyabi_madrese'] != '')) {
                                                        echo 'در حال ارزیابی در مدرسه';
                                                    } elseif (($values['jamemtiazmadrese'] != null or $values['jamemtiazmadrese'] != '') and (($values['jamemtiazmadrese'] < 75 and $values['bakhshvizheh'] == 'هست') or ($values['jamemtiazmadrese'] < 80 and $values['bakhshvizheh'] == 'نیست'))) {
                                                        echo 'رد اثر در مدرسه';
                                                    } elseif ($values['approve_sianat'] == 2 and $values['ellatnadashtansharayet'] == 'عدم اتمام فرایند ارزیابی در مرحله مدرسه ای') {
                                                        echo 'عدم اتمام فرایند ارزیابی در مرحله مدرسه ای';
                                                    } elseif ($values['approve_sianat'] == 2 and $values['ellatnadashtansharayet'] == 'عدم اتمام فرایند ارزیابی در مرحله استانی') {
                                                        echo 'عدم اتمام فرایند ارزیابی در مرحله استانی';
                                                    } else {
                                                        echo $values['nobat_arzyabi_ostani'] . ' (' . $values['vaziatkarnameostani'] . ')';
                                                    }
                                                    break;
                                                case 3:
                                                    echo $values['nobat_arzyabi_madrese'] . ' (' . $values['vaziatkarnamemadrese'] . ')';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            switch ($_SESSION['head']) {
                                                case 0:
                                                case 2:
                                                    $coderater = $values['codearzyabejmali_ostani'];
                                                    $selectfromejmaliostan = mysqli_query($connection, "select * from ejmali_ostan where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromejmaliostan as $ejo) {
                                                    }
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $ejr) {
                                                    }
                                                    echo @$ejr['name'] . ' ' . @$ejr['family'];
                                                    if (@$ejo['jam'] == null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$ejo['jam'];
                                                    }
                                                    break;
                                                case 3:
                                                    $coderater = $values['codearzyabejmali_madrese'];
                                                    $selectfromejmalimadrese = mysqli_query($connection, "select * from ejmali_madrese where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromejmalimadrese as $ejm) {
                                                    }
                                                    $coderater = @$ejm['rater_id'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $ejr) {
                                                    }
                                                    echo @$ejr['name'] . ' ' . @$ejr['family'];
                                                    if (@$ejm['jam'] == null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$ejm['jam'];
                                                    }
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            switch ($_SESSION['head']) {
                                                case 0:
                                                case 2:
                                                    $selectfromtafsili1ostan = mysqli_query($connection, "select * from tafsili1_ostan where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromtafsili1ostan as $t1o) {
                                                    }
                                                    $coderater = $values['codearzyabtafsili1_ostani'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t1r) {
                                                    }
                                                    echo @$t1r['name'] . ' ' . @$t1r['family'];
                                                    if (@$t1o['jam'] == null and @$ejo['jam'] != null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$t1o['jam'];
                                                    }
                                                    break;
                                                case 3:
                                                    $selectfromtafsili1madrese = mysqli_query($connection, "select * from tafsili1_madrese where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromtafsili1madrese as $t1m) {
                                                    }
                                                    $coderater = $values['codearzyabtafsili1_madrese'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t1r) {
                                                    }
                                                    echo @$t1r['name'] . ' ' . @$t1r['family'];
                                                    if (@$t1m['jam'] == null and @$ejm['jam'] != null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$t1m['jam'];
                                                    }
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            switch ($_SESSION['head']) {
                                                case 0:
                                                case 2:
                                                    $selectfromtafsili2ostan = mysqli_query($connection, "select * from tafsili2_ostan where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromtafsili2ostan as $t2o) {
                                                    }
                                                    $coderater = $values['codearzyabtafsili2_ostani'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t2r) {
                                                    }
                                                    echo @$t2r['name'] . ' ' . @$t2r['family'];
                                                    if (@$t2o['jam'] == null and @$t1o['jam'] != null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$t2o['jam'];
                                                    }
                                                    break;
                                                case 3:
                                                    $selectfromtafsili2madrese = mysqli_query($connection, "select * from tafsili2_madrese where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromtafsili2madrese as $t2m) {
                                                    }
                                                    $coderater = $values['codearzyabtafsili2_madrese'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t2r) {
                                                    }
                                                    echo @$t2r['name'] . ' ' . @$t2r['family'];
                                                    if (@$t2m['jam'] == null and @$t1m['jam'] != null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$t2m['jam'];
                                                    }
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="padding: 10px">
                                            <?php
                                            switch ($_SESSION['head']) {
                                                case 0:
                                                case 2:
                                                    $selectfromtafsili3ostan = mysqli_query($connection, "select * from tafsili3_ostan where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromtafsili3ostan as $t3o) {
                                                    }
                                                    $coderater = $values['codearzyabtafsili3_ostani'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t3r) {
                                                    }
                                                    echo @$t3r['name'] . ' ' . @$t3r['family'];
                                                    if (@$t3o['jam'] == null and @$t2o['jam'] != null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$t3o['jam'];
                                                    }
                                                    break;
                                                case 3:
                                                    $selectfromtafsili3madrese = mysqli_query($connection, "select * from tafsili3_madrese where codeasar='$codeasar' and jam is not null");
                                                    foreach ($selectfromtafsili3madrese as $t3m) {
                                                    }
                                                    $coderater = $values['codearzyabtafsili3_madrese'];
                                                    $sql = mysqli_query($connection, "select * from rater_list where username='$coderater'");
                                                    foreach ($sql as $t3r) {
                                                    }
                                                    echo @$t3r['name'] . ' ' . @$t3r['family'];
                                                    if (@$t3m['jam'] == null and @$t2m['jam'] != null and $coderater != null) {
                                                        echo "<p style='color:red'>-ارزیابی ثبت نشده</p>";
                                                    } else {
                                                        echo ' - ' . @$t3m['jam'];
                                                    }
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            switch ($_SESSION['head']) {
                                                case 0:
                                                case 2:
                                                    echo $values['jamemtiazostan'];
                                                    break;
                                                case 3:
                                                    echo $values['jamemtiazmadrese'];
                                                    break;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    @$ejo['jam'] = null;
                                    @$ejo['rater_id'] = null;
                                    @$coderater = null;
                                    @$ejr['name'] = null;
                                    @$ejr['family'] = null;
                                    @$ejm['jam'] = null;
                                    @$ejm['rater_id'] = null;
                                    @$coderater = null;
                                    @$ejr['name'] = null;
                                    @$ejr['family'] = null;
                                    @$t1o['jam'] = null;
                                    @$t1o['rater_id'] = null;
                                    @$coderater = null;
                                    @$t1r['name'] = null;
                                    @$t1r['family'] = null;
                                    @$t1m['jam'] = null;
                                    @$t1m['rater_id'] = null;
                                    @$coderater = null;
                                    @$t1r['name'] = null;
                                    @$t1r['family'] = null;
                                    @$t2o['jam'] = null;
                                    @$t2o['rater_id'] = null;
                                    @$coderater = null;
                                    @$t2r['name'] = null;
                                    @$t2r['family'] = null;
                                    @$t2m['jam'] = null;
                                    @$t2m['rater_id'] = null;
                                    @$coderater = null;
                                    @$t2r['name'] = null;
                                    @$t2r['family'] = null;
                                    @$t3o['jam'] = null;
                                    @$t3o['rater_id'] = null;
                                    @$coderater = null;
                                    @$t3r['name'] = null;
                                    @$t3r['family'] = null;
                                    @$t3m['jam'] = null;
                                    @$t3m['rater_id'] = null;
                                    @$coderater = null;
                                    @$t3r['name'] = null;
                                    @$t3r['family'] = null;
                                endforeach; ?>

                            </table>

                        </h3>
                    </div>
                </div>

            </section>
        </div>
    </center>
<?php endif; ?>
<?php
endif;
include_once __DIR__ . '/footer.php';
?>