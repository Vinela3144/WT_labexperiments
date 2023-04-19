<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="f1" >
  <input type="submit" value="Upload File">
</form>
</body>
</html>

<?php
$target_dir = "fileup/";
$target_file = $target_dir . basename($_FILES["f1"]["name"]);
if(isset($_FILES["f1"])){
	
	$fn = $_FILES["f1"]["name"];
    $ft = $_FILES["f1"]["type"];
    $fs = $_FILES["f1"]["size"];
    $ftp = $_FILES["f1"]["tmp_name"];
    $fe=$_FILES["f1"]["error"];
echo "File Name:".$fn." <br>"."File Type:".$ft . "<br>"."FIle Size:".$fs."<br>"."Temp:".$ftp."<br>"."error:".$fe;
if (!file_exists($target_file)) {
  
  if (move_uploaded_file($_FILES["f1"]["tmp_name"], $target_file)) {
        echo "<br><h3>The file  has been uploaded.</h3>";
    }
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'demo';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
	$st1 = "INSERT INTO files VALUES('".$fn."')";
	$res1 = mysqli_query($con,$st1);
	if($res1)
	{
		echo "inserted file into database";
	}

}
 else
 {
 	echo "<br><h3>sorry file existes</h3>";
 }
}
?>
