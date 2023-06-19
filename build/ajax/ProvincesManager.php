<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
if ($_SESSION['head'] == 1) {
    switch ($_REQUEST['work']) {
        case 'getStates':
            $center = $_REQUEST['center'];
            $query = mysqli_query($signup_connection, "select distinct ostan from provinces where markaz='$center'");
            foreach ($query as $state) {
                $states[] = $state['ostan'];
            }
            echo json_encode($states);
            break;
        case 'getCities':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $query = mysqli_query($signup_connection, "select distinct shahr from provinces where markaz='$center' and ostan='$state'");
            foreach ($query as $city) {
                $cities[] = $city['shahr'];
            }
            echo json_encode($cities);
            break;
        case 'checkSchool':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $school = $_REQUEST['school'];
            $query = mysqli_query($signup_connection, "select * from provinces where markaz='$center' and ostan='$state' and shahr='$city' and madrese='$school' and active=1");
            foreach ($query as $checkSchool) {
            }
            if ($checkSchool) {
                echo 'DuplicateFounded';
            }
            break;
        case 'addSchool':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $school = $_REQUEST['school'];
            $gender = $_REQUEST['gender'];

            $query = mysqli_query($signup_connection, "select * from provinces where markaz='$center' and ostan='$state' and shahr='$city' and madrese='$school'");
            if (mysqli_fetch_assoc($query) > 0) {
                echo 'DuplicateFounded';
            }

            $query = mysqli_query($signup_connection, "insert into provinces (markaz, ostan, shahr, madrese, gender, active, created_at) values ('$center','$state','$city','$school','$gender',1,'$now') ");
            if ($query) {
                echo 'Done';
            }
            break;
        case 'gettingResult':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $gender = $_REQUEST['gender'];
            $query = "SELECT * FROM provinces";

            switch ($gender) {
                case 'مرد':
                case 'زن':
                    if (($state == 'انتخاب کنید' or $state == '') and ($city == 'انتخاب کنید' or $city == '')) {
                        $query .= " WHERE markaz = '$center' and gender='$gender' order by ostan,shahr,madrese";
                    } elseif (($state != 'انتخاب کنید' or $state != '') and ($city == 'انتخاب کنید' or $city == '')) {
                        $query .= " WHERE markaz = '$center' and ostan='$state' and gender='$gender' order by ostan,shahr,madrese";
                    } elseif (($state != 'انتخاب کنید' or $state != '') and ($city != 'انتخاب کنید' or $city != '')) {
                        $query .= " WHERE markaz = '$center' and ostan='$state' and shahr='$city' and gender='$gender' order by ostan,shahr,madrese";
                    }
                    break;
                default:
                    if (($state == 'انتخاب کنید' or $state == '') and ($city == 'انتخاب کنید' or $city == '')) {
                        $query .= " WHERE markaz = '$center' order by ostan,shahr,madrese";
                    } elseif (($state != 'انتخاب کنید' or $state != '') and ($city == 'انتخاب کنید' or $city == '')) {
                        $query .= " WHERE markaz = '$center' and ostan='$state' order by ostan,shahr,madrese";
                    } elseif (($state != 'انتخاب کنید' or $state != '') and ($city != 'انتخاب کنید' or $city != '')) {
                        $query .= " WHERE markaz = '$center' and ostan='$state' and shahr='$city' order by ostan,shahr,madrese";
                    }
                    break;
            }


            echo "<table class='table table-bordered table-striped text-center'>";
            echo "<tr> <th>ردیف</th> <th>مرکز</th> <th>استان</th> <th>شهرستان</th> <th>مدرسه</th> <th>جنسیت</th> <th>عملیات</th> </tr>";
            $query = mysqli_query($signup_connection, $query);
            $count = 1;
            foreach ($query as $items) {
                $tr = "<tr>" .
                    "<td>" . $count++ . "</td>" .
                    "<td>" . $items['markaz'] . "</td>" .
                    "<td>" . $items['ostan'] . "</td>" .
                    "<td>" . $items['shahr'] . "</td>" .
                    "<td>" . $items['madrese'] . "</td>" .
                    "<td>" . $items['gender'] . "</td>";
                if ($items['active'] == 1) {
                    echo $tr .= "<td> <button id='deactive' value=" . $items['id'] . " class='btn btn-danger deactiveProvinces'>غیرفعال</button> </td> </tr>";
                } else {
                    echo $tr .= "<td> <button id='active' value=" . $items['id'] . " class='btn btn-success activeProvinces'>فعال</button> </td> </tr>";
                }

            }
            echo "</table>";
            break;
        case 'deactiveProvince':
            $province = $_REQUEST['province'];
            $query = mysqli_query($signup_connection, "update provinces set active=0,updated_at='$now' where id='$province'");
            if ($query) {
                echo 'Done';
            }
            break;
        case 'activeProvince':
            $province = $_REQUEST['province'];
            $query = mysqli_query($signup_connection, "update provinces set active=1,updated_at='$now' where id='$province'");
            if ($query) {
                echo 'Done';
            }
            break;
    }

}
