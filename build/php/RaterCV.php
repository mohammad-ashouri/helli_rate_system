<?php
include_once __DIR__ . '/../../config/connection.php';
session_start();
$user = $_SESSION['username'];
$select = mysqli_query($connection, "select * from log_helli where username='$user' order by radif desc limit 1");
foreach ($select as $markforlinklogs) {
}
$LinkLogID = @$markforlinklogs['radif'];
$urlofthispage = $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
if (isset($_POST['uploadcv']) and !empty($_POST['coderater']) and !empty($_FILES['uploadcvfile']) and $_POST['accept_data'] == 'on') {
    $operation = "uploadcv";
    mysqli_query($connection, "insert into link_logs (id,url,operation,time,username) values ('$LinkLogID','$urlofthispage','$operation','$dateforupdateloghelli','$user')");

    $coderater = $_POST['coderater'];
    $file_size = $_FILES['uploadcvfile']['size'];
    $filename = $_FILES["uploadcvfile"]["name"];
    $filename_without_extdocx = basename($filename, '.docx');
    $allowed = array('docx', 'doc');
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if ($file_size > 5242880) {
        header("location: ../../panel.php?wrongcvsize");
    } elseif ($filename_without_extdocx != $coderater) {
        header("location: ../../panel.php?incompatibilitynames");
    } elseif (!in_array($ext, $allowed)) {
        header("location: ../../panel.php?incompatibilityext");
    } elseif ((substr($_FILES["uploadcvfile"]["name"], 0, -4) == $coderater) or substr($_FILES["uploadcvfile"]["name"], 0, -3) == $coderater) {
        if (!file_exists(__DIR__ . "/../../dist/files/cv_raters/" . $_FILES["uploadcvfile"]["name"])) {
            move_uploaded_file($_FILES["uploadcvfile"]["tmp_name"], __DIR__ . "/../../dist/files/cv_raters/" . $_FILES["uploadcvfile"]["name"]);
            if ($_SESSION['head'] == 2 or $_SESSION['head'] == 3) {
                $_SESSION['approved'] = 1;
                mysqli_query($connection, "update rater_list set `cv_filepath`= 'dist/files/cv_raters/$filename',`approved`= 1,accept_data=1,cvsettime='$datewithtime' where `code`='$coderater' ");
                header("location: ../../panel.php?cvseted");
            } elseif ($_SESSION['head'] == 0) {
                $_SESSION['approved'] = 2;
                mysqli_query($connection, "update rater_list set `cv_filepath`= 'dist/files/cv_raters/$filename',`approved`= 1,accept_data=1,cvsettime='$datewithtime' where `code`='$coderater' ");
                header("location: ../../panel.php?cvset");
            }
        } else {
            header("location: ../../panel.php?wrongcvset");
        }
    }
}

