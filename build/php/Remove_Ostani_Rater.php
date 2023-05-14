<?php
include_once __DIR__ . '/../../config/connection.php';
if (!empty($_POST['removeostanirater']) and isset($_POST['ratercode'])) {
    $ratercode = $_POST['ratercode'];
    mysqli_query($connection, "update rater_list set approved=0,type=8 where username='$ratercode'");
    header("location:" . $main_website_url . "/../../add_rater_ostani.php?removed&code=$ratercode");
}