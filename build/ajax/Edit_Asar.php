<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
if (isset($_SESSION['head'])) {
    switch ($_GET['work']) {
        case 'getCities':
            if (!empty($_GET['province'])) {
                $query = mysqli_query($signup_connection, "select distinct shahr from provinces where ostan='$_GET[province]' order by shahr");
                $cities = array();
                while ($row = mysqli_fetch_assoc($query)) {
                    $cities[] = $row['shahr'];
                }
                echo json_encode($cities, true);
            }
            break;
        case 'getSchools':
            if (!empty($_GET['province']) and !empty($_GET['city'])) {
                $query = mysqli_query($signup_connection, "select distinct madrese from provinces where ostan='$_GET[province]' and shahr='$_GET[city]' order by madrese");
                $schools = array();
                while ($row = mysqli_fetch_assoc($query)) {
                    $schools[] = $row['madrese'];
                }
                echo json_encode($schools, true);
            }
            break;
    }
}