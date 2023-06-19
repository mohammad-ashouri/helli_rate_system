<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
if ($_SESSION['head'] == 1) {
    switch ($_REQUEST['work']) {
        case 'getCities':
            $state = $_REQUEST['state'];
            $query = mysqli_query($signup_connection, "select distinct shahr from provinces where ostan='$state'");
            foreach ($query as $city) {
                $cities[] = $city['shahr'];
            }
            echo json_encode($cities);
            break;
        case 'addCenter':
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $center = $_REQUEST['center'];
            $center = $center . " [" . $state . " - " . $city . "]";

            $query = mysqli_query($signup_connection, " insert into specialized_centers(title, user, active, created_at) values('$center','$user',1,'$now') ");
            if ($query) {
                echo 'Done';
            }
            break;
        case 'gettingResult':
            $query = mysqli_query($signup_connection,"Select * from specialized_centers order by title");
            echo "<table class='table table-bordered table-striped text-center'>";
            echo "<tr> <th>ردیف</th> <th> مرکز [استان - شهرستان]</th> <th>عملیات</th> </tr>";
            $count = 1;
            foreach ($query as $items) {
                $tr = "<tr>" .
                    "<td>" . $count++ . "</td>" .
                    "<td>" . $items['title'] . "</td>";
                if ($items['active'] == 1) {
                    echo $tr .= "<td> <button id='deactive' value=" . $items['id'] . " class='btn btn-danger'>غیرفعال</button> </td> </tr>";
                } else {
                    echo $tr .= "<td> <button id='active' value=" . $items['id'] . " class='btn btn-success'>فعال</button> </td> </tr>";
                }
            }
            echo "</table>";
            break;
        case 'deactiveCenter':
            $center = $_REQUEST['center'];
            $query = mysqli_query($signup_connection, "update specialized_centers set active=0,updated_at='$now' where id='$center'");
            if ($query) {
                echo 'Done';
            }
            break;
        case 'activeCenter':
            $center = $_REQUEST['center'];
            $query = mysqli_query($signup_connection, "update specialized_centers set active=1,updated_at='$now' where id='$center'");
            if ($query) {
                echo 'Done';
            }
            break;
    }

}
