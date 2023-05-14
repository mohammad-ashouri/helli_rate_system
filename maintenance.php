<?php
include_once 'config/connection.php';
$query = mysqli_query($connection, "select * from options where op_name='maintenance'");
foreach ($query as $option) {
}
if ($option['op_value'] == 0) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<title>This website is under maintenance ....</title>
<meta charset="UTF-8">
<meta name="description" content="Website under maintenance">
<meta name="author" content="https://downloadfort.com/">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="login/css/maintenance.css" rel="stylesheet"/>
</head>
<body class="body">
<img src="login/img/maintenance.png" class="imgcenter"/>
<p class="txtblue">سامانه در حال بروز رسانی می باشد
    <br/>
    <a class="txtyellow">از صبر و شکیبایی شما سپاسگزاریم</a>
</p>
<p class="txtwhite"><strong>دبیرخانه جشنواره علامه حلی</strong></p>

</body>
</html>