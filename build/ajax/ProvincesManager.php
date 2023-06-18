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
            $query = mysqli_query($signup_connection, "select * from provinces where markaz='$center' and ostan='$state' and shahr='$city' and madrese='$school'");
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
            if ($center == 'انتخاب کنید') {
                $center = '';
            } elseif ($state == 'انتخاب کنید') {
                $state = '';
            } elseif ($city) {
                $city = '';
            } elseif ($gender) {
                $gender = '';
            }

            echo "<table>";
            echo "<tr> <th>ردیف</th> <th>مرکز</th> <th>استان</th> <th>شهرستان</th> <th>مدرسه</th> <th>جنسیت</th> </tr>";
            echo "</table>";

            break;
    }

}
