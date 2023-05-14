<!DOCTYPE html>
<html>
<head>
    <title>PHP import Excel data</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Upload Excel File</h1>
    <form method="POST" action="uploadexcel.php" enctype="multipart/form-data">
        <div class="form-group">
            <label>Choose File</label>
            <input type="file" name="uploadFile" class="form-control" />
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Upload</button>
        </div>
    </form>
</div>
</body>
</html>