<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$work = $_GET['work'];
if ($_SESSION['head'] == 1) {
    switch ($work) {
        case 'getStates':
            $center = $_REQUEST['center'];
            $query = mysqli_query($signup_connection, "select distinct ostan from provinces where markaz='$center' order by ostan");
            $states = array();
            foreach ($query as $row) {
                $states[] = $row['ostan'];
            }
            echo json_encode($states);
            break;
        case 'getCities':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $query = mysqli_query($signup_connection, "select distinct shahr from provinces where markaz='$center' and ostan='$state' order by shahr");
            $cities = array();
            foreach ($query as $row) {
                $cities[] = $row['shahr'];
            }
            echo json_encode($cities);
            break;
        case 'getSchools':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $query = mysqli_query($signup_connection, "select distinct madrese from provinces where markaz='$center' and ostan='$state' and shahr='$city' order by madrese");
            $schools = array();
            foreach ($query as $row) {
                $schools[] = $row['madrese'];
            }
            echo json_encode($schools);
            break;
        case 'changeSchool':
            $center = $_REQUEST['center'];
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $school = $_REQUEST['school'];
            $userNationalCode = $_REQUEST['userNationalCode'];

            $query = mysqli_query($signup_connection, "update educational_infos set namemarkaztahsili='$center', ostantahsili='$state', shahrtahsili='$city',madresetahsili='$school' where national_code='$userNationalCode'");
            break;
        case 'getTeachingCities':
            $state = $_REQUEST['state'];
            $query = mysqli_query($signup_connection, "select distinct shahr from provinces where ostan='$state' order by shahr");
            $cities = array();
            foreach ($query as $row) {
                $cities[] = $row['shahr'];
            }
            echo json_encode($cities);
            break;
        case 'getTeachingSchools':
            $state = $_REQUEST['state'];
            $city = $_REQUEST['city'];
            $query = mysqli_query($signup_connection, "select distinct madrese from provinces where ostan='$state' and shahr='$city' order by shahr");
            $cities = array();
            foreach ($query as $row) {
                $schools[] = $row['madrese'];
            }
            echo json_encode($schools);
            break;
    }
}