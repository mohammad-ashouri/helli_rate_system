<ul class="sidebar-menu" data-widget="tree">
    <li class="header">
        تاریخ آخرین بازدید:
        <?php showlastseentimeonnavbar($connection, $user); ?>
    </li>

    <li class="<?php
    if ($_SERVER['PHP_SELF'] == "/panel.php") {
        echo "active treeview";
    }
    ?>">
        <a href="<?php echo '../panel.php'; ?>">
            <i class="fa fa-home"></i> <span>صفحه اصلی</span>
        </a>
    </li>


    <?php //if ($_SESSION['head']==0 and $_SESSION['approved']==1): ?>
    <!--        <li class="-->
    <?php
    //    if ($_SERVER['PHP_SELF']=="/arzyabi_shode.php"){
    //        echo "active treeview";
    //    }
    //          ?><!--">-->
    <!--        <a href="--><?php //echo $main_website_url.'arzyabi_shode.php'; ?><!--">-->
    <!--            <i class="fa fa-briefcase"></i> <span>آثار ارزیابی شده</span>-->
    <!--        </a>-->
    <!--    </li>-->
    <!--        --><?php //endif; ?>

    <?php if ($_SESSION['head'] == 1): ?>
        <li class="<?php
        switch ($_SERVER['PHP_SELF']) {
            case '/arzyabi_shode.php':
            case '/arzyabi_shodet1.php':
            case '/arzyabi_shodet2.php':
            case '/arzyabi_shodet3.php':
                echo 'active treeview';
                break;
            default:
                echo 'treeview';
                break;
        }
        ?>">
            <a href="#">
                <i class="fa fa-reply"></i> <span>آثار در حال ارزیابی</span>
                <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php
                if ($_SERVER['PHP_SELF'] == "/arzyabi_shode.php") {
                    echo "active treeview";
                }
                ?>">
                    <a href="<?php echo 'arzyabi_shode.php'; ?>">
                        <i class="fa fa-check"></i> <span>ارزیابی اجمالی</span>
                    </a>
                </li>
                <li class="<?php
                if ($_SERVER['PHP_SELF'] == "/arzyabi_shodet2.php") {
                    echo "active treeview";
                }
                ?>">
                    <a href="<?php echo 'arzyabi_shodet2.php'; ?>">
                        <i class="fa fa-check"></i> <span>تفصیلی دوم</span>
                    </a>
                </li>
                <li class="<?php
                if ($_SERVER['PHP_SELF'] == "/arzyabi_shodet3.php") {
                    echo "active treeview";
                }
                ?>">
                    <a href="<?php echo 'arzyabi_shodet3.php'; ?>">
                        <i class="fa fa-check"></i> <span>تفصیلی سوم</span>
                    </a>
                </li>
            </ul>
        </li>
    <?php endif; ?>
    <?php if (($_SESSION['head'] == 1 or $_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)) and $_SESSION['approved'] == 1): ?>
        <?php if ($_SESSION['head'] == 1): ?>
            <li class="<?php
            switch ($_SERVER['PHP_SELF']) {
                case '/new_info.php':
                case '/edit_asar.php':
//                case '/attach_file_to_asar.php':
                case '/tafsili2edit.php':
                case '/tafsili3edit.php':
                    echo 'active treeview';
                    break;
                default:
                    echo 'treeview';
                    break;
            }
            ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>عملیات مربوط به اثر</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/new_info.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'new_info.php'; ?>">
                            <i class="fa fa-info-circle"></i> <span>ثبت اثر جدید</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/edit_asar.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'edit_asar.php'; ?>">
                            <i class="fa fa-download"></i> <span>ویرایش اطلاعات اثر</span>
                        </a>
                    </li>
                    <!--                    <li class="--><?php
                    //                    if ($_SERVER['PHP_SELF']=="/paziresh.php"){
                    //                        echo "active treeview";
                    //                    }
                    //                    ?><!--">-->
                    <!--                        <a href="--><?php //echo $main_website_url.'paziresh.php'; ?><!--">-->
                    <!--                            <i class="fa-file-excel-o"></i> <span>ورود اطلاعات با فایل اکسل</span>-->
                    <!--                        </a>-->
                    <!--                    </li>-->
<!--                    <li class="--><?php
//                    if ($_SERVER['PHP_SELF'] == "/attach_file_to_asar.php") {
//                        echo "active treeview";
//                    }
//                    ?><!--">-->
<!--                        <a href="--><?php //echo 'attach_file_to_asar.php'; ?><!--">-->
<!--                            <i class="fa fa-paperclip"></i> <span>الصاق فایل به اثر</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/tafsili2edit.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'tafsili2edit.php'; ?>">
                            <i class="fa fa-info-circle"></i> <span>ویرایش ارزیابی دوم</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/tafsili3edit.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'tafsili3edit.php'; ?>">
                            <i class="fa fa-info-circle"></i> <span>ویرایش ارزیابی سوم</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3): ?>

            <li class="<?php
            switch ($_SERVER['PHP_SELF']) {
//                case '/attach_file_to_asar.php':
                case '/move_to_school.php':
                case '/edit_asar.php':
                case '/a-p-info.php':
                    echo 'active treeview';
                    break;
                default:
                    echo 'treeview';
                    break;
            }
            ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>عملیات مربوط به اثر</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
<!--                    <li class="--><?php
//                    if ($_SERVER['PHP_SELF'] == "/attach_file_to_asar.php") {
//                        echo "active treeview";
//                    }
//                    ?><!--">-->
<!--                        <a href="--><?php //echo 'attach_file_to_asar.php'; ?><!--">-->
<!--                            <i class="fa fa-paperclip"></i> <span>الصاق فایل به اثر</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <?php if ($_SESSION['head'] == 2): ?>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/move_to_school.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'move_to_school.php'; ?>">
                                <i class="fa fa-send"></i> <span>انتقال آثار به ارزیابی مدرسه‌ای</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3): ?>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/edit_asar.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'edit_asar.php'; ?>">
                                <i class="fa fa-download"></i> <span>ویرایش اطلاعات اثر</span>
                            </a>
                        </li>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/a-p-info.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'a-p-info.php'; ?>">
                                <i class="fa fa-info-circle"></i> <span>جستجو در پایگاه داده</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <li class="<?php
        switch ($_SERVER['PHP_SELF']) {
            case '/set_asar_for_rater_ejmali.php':
            case '/set_asar_for_rater_tafsili1.php':
            case '/set_asar_for_rater_tafsili2.php':
            case '/set_asar_for_rater_tafsili3.php':
                echo 'active treeview';
                break;
            default:
                echo 'treeview';
                break;
        }
        ?>">
            <a href="#">
                <i class="fa fa-reply"></i> <span>اختصاص اثر به ارزیابان</span>
                <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li class="<?php
                if ($_SERVER['PHP_SELF'] == "/set_asar_for_rater_ejmali.php") {
                    echo "active treeview";
                }
                ?>">
                    <a href="<?php echo 'set_asar_for_rater_ejmali.php'; ?>">
                        <i class="fa fa-check"></i> <span>اختصاص به ارزیاب اجمالی</span>
                    </a>
                </li>
                <?php if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/set_asar_for_rater_tafsili1.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'set_asar_for_rater_tafsili1.php'; ?>">
                            <i class="fa fa-check"></i> <span>اختصاص به ارزیاب تفصیلی اول</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="<?php
                if ($_SERVER['PHP_SELF'] == "/set_asar_for_rater_tafsili2.php") {
                    echo "active treeview";
                }
                ?>">
                    <a href="<?php echo 'set_asar_for_rater_tafsili2.php'; ?>">
                        <i class="fa fa-check"></i> <span>اختصاص به ارزیاب تفصیلی دوم</span>
                    </a>
                </li>
                <li class="<?php
                if ($_SERVER['PHP_SELF'] == "/set_asar_for_rater_tafsili3.php") {
                    echo "active treeview";
                }
                ?>">
                    <a href="<?php echo 'set_asar_for_rater_tafsili3.php'; ?>">
                        <i class="fa fa-check"></i> <span>اختصاص به ارزیاب تفصیلی سوم</span>
                    </a>
                </li>
            </ul>
        </li>
        <?php if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>

            <li class="<?php
            switch ($_SERVER['PHP_SELF']) {
                case '/ejmali_edit.php':
                case '/tafsili1_edit.php':
                case '/tafsili2_edit.php':
                case '/tafsili3_edit.php':
                    echo 'active treeview';
                    break;
                default:
                    echo 'treeview';
                    break;
            }
            ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>عملیات مربوط به ارزیابی</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/ejmali_edit.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'ejmali_edit.php'; ?>">
                            <i class="fa fa-check"></i> <span>ویرایش ارزیابی اجمالی</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/tafsili1_edit.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'tafsili1_edit.php'; ?>">
                            <i class="fa fa-check"></i> <span>ویرایش ارزیابی تفصیلی اول</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/tafsili2_edit.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'tafsili2_edit.php'; ?>">
                            <i class="fa fa-check"></i> <span>ویرایش ارزیابی تفصیلی دوم</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/tafsili3_edit.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'tafsili3_edit.php'; ?>">
                            <i class="fa fa-check"></i> <span>ویرایش ارزیابی تفصیلی سوم</span>
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>
            <?php if (@$_SESSION['groupname'] == null): ?>
                <!--                <li class="--><?php
//        switch ($_SERVER['PHP_SELF']){
//            case '/ejmali_list.php':
//            case '/tafsili1_list.php':
//	        case '/tafsili2_list.php':
//	        case '/tafsili3_list.php':
//                echo 'active treeview';
//                break;
//            default:
//                echo 'treeview';
//                break;
//        }
//        ?><!--">-->
                <!--            <a href="#">-->
                <!--                <i class="fa fa-files-o"></i> <span>فرم های ارزیابی</span>-->
                <!--                <span class="pull-left-container">-->
                <!--              <i class="fa fa-angle-right pull-left"></i>-->
                <!--            </span>-->
                <!--            </a>-->
                <!--            <ul class="treeview-menu">-->
                <!--                <li class="--><?php
//                if ($_SERVER['PHP_SELF']=="/ejmali_list.php"){
//                    echo "active treeview";
//                }
//                ?><!--">-->
                <!--                    <a href="--><?php //echo $main_website_url.'ejmali_list.php'; ?><!--">-->
                <!--                        <i class="fa fa-check"></i> <span>ثبت ارزیابی اجمالی</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li class="--><?php
//                if ($_SERVER['PHP_SELF']=="/tafsili1_list.php"){
//                    echo "active treeview";
//                }
//                ?><!--">-->
                <!--                    <a href="--><?php //echo $main_website_url.'tafsili1_list.php'; ?><!--">-->
                <!--                        <i class="fa fa-check"></i> <span>ثبت ارزیابی تفصیلی اول</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li class="--><?php
//                if ($_SERVER['PHP_SELF']=="/tafsili2_list.php"){
//                    echo "active treeview";
//                }
//                ?><!--">-->
                <!--                    <a href="--><?php //echo $main_website_url.'tafsili2_list.php'; ?><!--">-->
                <!--                        <i class="fa fa-check"></i> <span>ثبت ارزیابی تفصیلی دوم</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--                <li class="--><?php
//                if ($_SERVER['PHP_SELF']=="/tafsili3_list.php"){
//                    echo "active treeview";
//                }
//                ?><!--">-->
                <!--                    <a href="--><?php //echo $main_website_url.'tafsili3_list.php'; ?><!--">-->
                <!--                        <i class="fa fa-check"></i> <span>ثبت ارزیابی تفصیلی سوم</span>-->
                <!--                    </a>-->
                <!--                </li>-->
                <!--            </ul>-->
                <!--        </li>-->
            <?php endif; ?>
            <li class="<?php
            if ($_SERVER['PHP_SELF'] == "/report_from_rates.php") {
                echo "active treeview";
            }
            ?>">
                <a href="<?php echo 'report_from_rates.php'; ?>">
                    <i class="fa fa-check"></i>
                    <span>
                    <?php if ($_SESSION['head'] == 1 or ($_SESSION['head'] == 0 and $_SESSION['groupname'] != null)): ?>
                        وضعیت ارزیابی آثار استانی
                    <?php elseif ($_SESSION['head'] == 2 and $_SESSION['shahr_name'] != 'بناب' and $_SESSION['shahr_name'] != 'کاشان'): ?>
                        وضعیت ارزیابی آثار استانی
                    <?php elseif ($_SESSION['head'] == 2 and ($_SESSION['shahr_name'] == 'بناب' or $_SESSION['shahr_name'] == 'کاشان')): ?>
                        وضعیت ارزیابی آثار منطقه
                    <?php elseif ($_SESSION['head'] == 3): ?>
                        وضعیت ارزیابی آثار مدرسه
                    <?php endif; ?>
                </span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['head'] == 2): ?>
            <li class="<?php
            if ($_SERVER['PHP_SELF'] == "/report_from_city_rates.php") {
                echo "active treeview";
            }
            ?>">
                <a href="<?php echo 'report_from_city_rates.php'; ?>">
                    <i class="fa fa-check"></i>
                    <span>
                        وضعیت ارزیابی آثار مدرسه
                </span>
                </a>
            </li>
            <li class="<?php
            if ($_SERVER['PHP_SELF'] == "/Send_To_Secretariat.php") {
                echo "active treeview";
            }
            ?>">
                <a href="<?php echo 'Send_To_Secretariat.php'; ?>">
                    <i class="fa fa-send"></i> <span>تاییدیه و ارسال آثار به دبیرخانه</span>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($_SESSION['head'] == 1): ?>
            <li class="<?php
            switch ($_SERVER['PHP_SELF']) {
                case '/a-p-info.php':
                case '/arzyabi_ejmali_info.php':
                case '/report.php':
                case '/export.php':
                case '/report_from_rates.php':
                case '/excel_export_with_save_payment.php':
                case '/report-logins.php':
                case '/report_from_state_rates.php':
                case '/report_from_city_rates.php':
                case '/approved_state_works.php':

                    echo 'active treeview';
                    break;
                default:
                    echo 'treeview';
                    break;
            }
            ?>">
                <a href="#">
                    <i class="fa fa-history"></i> <span>آمار و گزارش‌ها</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/a-p-info.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'a-p-info.php'; ?>">
                            <i class="fa fa-info-circle"></i> <span>جستجو در پایگاه داده</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/arzyabi_ejmali_info.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'arzyabi_ejmali_info.php'; ?>">
                            <i class="fa fa-info-circle"></i> <span>نمایش همه ارزیابی های اجمالی</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/report.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'report.php'; ?>">
                            <i class="fa fa-check"></i> <span>گزارش گیری از اطلاعات ادوار</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/export.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'export.php'; ?>">
                            <i class="fa fa-check"></i> <span>خروجی اکسل از اطلاعات</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/report_from_rates_keshvari.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'report_from_rates_keshvari.php'; ?>">
                            <i class="fa fa-check"></i> <span>گزارش وضعیت ارزیابی کشوری</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/report_from_state_rates.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'report_from_state_rates.php'; ?>">
                            <i class="fa fa-check"></i> <span>گزارش وضعیت ارزیابی استانی</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/report_from_city_rates.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'report_from_city_rates.php'; ?>">
                            <i class="fa fa-check"></i> <span>گزارش وضعیت ارزیابی مدرسه ای</span>
                        </a>
                    </li>
                    <?php if (@$_SESSION['full_access'] == 1): ?>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/excel_export_with_save_payment.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'excel_export_with_save_payment.php'; ?>">
                                <i class="fa fa-check"></i> <span>خروجی پرداختی به ارزیابان</span>
                            </a>
                        </li>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/report-logins.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'report-logins.php'; ?>">
                                <i class="fa fa-check"></i> <span>آخرین بازدید کاربران</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/approved_state_works.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'approved_state_works.php'; ?>">
                            <i class="fa fa-check"></i> <span>فایل های تاییدیه استان ها</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?php
            switch ($_SERVER['PHP_SELF']) {
                case '/add_rater.php':
                case '/rater_head.php':

                    echo 'active treeview';
                    break;
                default:
                    echo 'treeview';
                    break;
            }
            ?>">
                <a href="#">
                    <i class="fa fa-reply"></i> <span>مدیریت ارزیابان کشوری</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/add_rater.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'add_rater.php'; ?>">
                            <i class="fa fa-check"></i> <span>مدیریت ارزیابان</span>
                        </a>
                    </li>
                    <li class="<?php
                    if ($_SERVER['PHP_SELF'] == "/rater_head.php") {
                        echo "active treeview";
                    }
                    ?>">
                        <a href="<?php echo 'rater_head.php'; ?>">
                            <i class="fa fa-check"></i> <span>تعیین سرگروه</span>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="<?php
            if ($_SERVER['PHP_SELF'] == "/add_rater_ostani.php") {
                echo "active treeview";
            }
            ?>">
                <a href="<?php echo '/add_rater_ostani.php'; ?>">
                    <i class="fa fa-reply"></i> <span>مدیریت ارزیابان استانی</span>
                </a>
            </li>
            <?php if ($_SESSION['head'] == 1): ?>
                <li class="<?php
                switch ($_SERVER['PHP_SELF']) {
                    case '/admin_manager.php':
                    case '/ostani_admins.php':
                    case '/madrese_admins.php':

                        echo 'active treeview';
                        break;
                    default:
                        echo 'treeview';
                        break;
                }
                ?>">
                    <a href="#">
                        <i class="fa fa-reply"></i> <span>مدیریت کاربران غیر ارزیاب</span>
                        <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php
                        if (@$_SESSION['full_access'] == 1):
                            ?>
                            <li class="<?php
                            if ($_SERVER['PHP_SELF'] == "/admin_manager.php") {
                                echo "active treeview";
                            }
                            ?>">
                                <a href="<?php echo 'admin_manager.php'; ?>">
                                    <i class="fa fa-check"></i> <span>ادمین های کشوری</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/ostani_admins.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'ostani_admins.php'; ?>">
                                <i class="fa fa-check"></i> <span>ادمین های استانی</span>
                            </a>
                        </li>
                        <li class="<?php
                        if ($_SERVER['PHP_SELF'] == "/madrese_admins.php") {
                            echo "active treeview";
                        }
                        ?>">
                            <a href="<?php echo 'madrese_admins.php'; ?>">
                                <i class="fa fa-check"></i> <span>ادمین های مدرسه‌ای</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (@$_SESSION['full_access'] == 1): ?>
                    <li class="<?php
                    switch ($_SERVER['PHP_SELF']) {
                        case '/superadmin_options.php':
                            echo 'active treeview';
                            break;
                        default:
                            echo 'treeview';
                            break;
                    }
                    ?>">
                        <a href="#">
                            <i class="fa fa-reply"></i> <span>تنظیمات سامانه ارزیابی</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php
                            if ($_SERVER['PHP_SELF'] == "/superadmin_options.php") {
                                echo "active treeview";
                            }
                            ?>">
                                <a href="<?php echo 'superadmin_options.php'; ?>">
                                    <i class="fa fa-cogs"></i> <span>تنظیمات عمومی</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="<?php
                    switch ($_SERVER['PHP_SELF']) {
                        case '/superadmin_options.php':
                        case '/signup_posts.php':
                            echo 'active treeview';
                            break;
                        default:
                            echo 'treeview';
                            break;
                    }
                    ?>">
                        <a href="#">
                            <i class="fa fa-reply"></i> <span>تنظیمات سامانه ثبت نام</span>
                            <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="<?php
                            if ($_SERVER['PHP_SELF'] == "/superadmin_options.php") {
                                echo "active treeview";
                            }
                            ?>">
                                <a href="<?php echo 'superadmin_options.php'; ?>">
                                    <i class="fa fa-cogs"></i> <span>تنظیمات فراخوان</span>
                                </a>
                            </li>
                            <li class="<?php
                            if ($_SERVER['PHP_SELF'] == "/signup_posts.php") {
                                echo "active treeview";
                            }
                            ?>">
                                <a href="<?php echo 'signup_posts.php'; ?>">
                                    <i class="fa fa-cogs"></i> <span>آثار کاربران ثبت نام شده</span>
                                </a>
                            </li>
                            <li class="<?php
                            if ($_SERVER['PHP_SELF'] == "/provinces_settings.php") {
                                echo "active treeview";
                            }
                            ?>">
                                <a href="<?php echo 'provinces_settings.php'; ?>">
                                    <i class="fa fa-cogs"></i> <span>مدیریت استان/شهرستان/مدرسه</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <?php
                endif;
            endif;
        endif; ?>
    <?php endif; ?>


    <li>
        <a href="<?php echo 'logout.php'; ?>">
            <i class="fa fa-sign-out"></i> <span>خروج از سامانه</span>
        </a>
    </li>
</ul>