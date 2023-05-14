<?php include_once __DIR__ . '/../../config/connection.php'; ?>
<!DOCTYPE html>
<html>
<body>
<?php
session_start();
$coderater = $_GET['coderater'];
$codeasar = $_GET['codeasar'];
$registrar=$_SESSION['username'];
$query = mysqli_query($connection, "select * from rater_comments_archive where rater_id='$coderater' and codeasar='$codeasar'");
foreach ($query as $check) {
}
if (empty($check)) {
    $query=mysqli_query($connection,"select * from rater_list where username='$coderater'");
    foreach ($query as $rater_info){}
    $rater_info=$rater_info['name'].' '.$rater_info['family'];
    mysqli_query($connection, "insert into rater_comments_archive (codeasar,rater_id,rater_info,Registrant_user,added_date) values ('$codeasar','$coderater','$rater_info','$registrar','$datewithtime')");
    $query = mysqli_query($connection, "select * from rater_comments_archive where codeasar='$codeasar'");
    foreach ($query as $select) {
        echo $select['rater_id'].'<br>';
    }
}
$codeasar = null;
$coderater = null;
mysqli_close($connection);
?>

</body>
</html>