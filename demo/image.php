<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" >
  <input type="submit" value="Upload File">
</form>
</body>
</html>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !=false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "File has been uploaded Successfully";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'u1im';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
$fn = $_FILES["fileToUpload"]["name"];
	$st1 = "INSERT INTO image VALUES('".$fn."')";
	$res1 = mysqli_query($con,$st1);
	if($res1)
	{
		echo "inserted file into database";
	}
    
?>
<?php
$query = " SELECT * from image ";
$result = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($result)) {
?>
<br>
<br>


    <img src="./uploads/<?=$data['name']; ?>"  width="500" height="600">
    <form action="" method="POST" enctype="multipart/form-data">
    comment:<textarea rows='5' cols="10" name="txt1" id="txt1"></textarea>
    <br>
    <input type="submit" value="submit" name="btn1" id="btn1"/>
</form>
<?php
$n=$_SESSION["uname"];
if(isset($_POST["btn1"])){
    $v=$_POST["txt1"];
    $DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'lc';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
$qr="INSERT INTO comment values('$n','$v')";
$res1 = mysqli_query($con,$qr);
if($res1){
    $q="SELECT * FROM comment";
$s = mysqli_query($con,$q);
    while($row=mysqli_fetch_array($s,MYSQLI_ASSOC)){
        ?>
        <?=$row['id']; ?>
        <?=$row['comment']; ?>

        <?php
    }
}
}
?>

<?php
}
        
        ?>

        
 
