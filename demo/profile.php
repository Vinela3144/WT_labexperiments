<?php
session_start();
$n=$_SESSION["uname"];
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'user';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM tab1 where name='$n'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    $n=$row["name"];
    $m=$row["mail"];
    $p=$row["number"];
    $g=$row["gender"];

    }
} else {
    echo "0 results";
}

$con->close();
?>

	<form action="" method="POST" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" >
  <input type="submit" value="Upload File">
</form>
</body>
</html>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if(isset($_FILES["fileToUpload"])){
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
    $DATABASE_NAME = 'user';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
$fn = $_FILES["fileToUpload"]["name"];
$id=$_SESSION["uname"];
	$st1 = "INSERT INTO image(image_name,user_name) VALUES('".$fn."','$id')";
	$res1 = mysqli_query($con,$st1);
	if($res1)
	{
		echo "inserted file into database";
        
	}
  
?>
<?php
$query = " SELECT * from image where user_name='$id' ";
$result = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($result)) {
?>
<style>
            .box {
                height:500;
                width: 500;
                background-color: independenceblue;
                display:inline-block;
            }
        </style>
<div class='box'>
<h3><br><?=$data['user_name']; ?></h3>
<br>
    <img src="./uploads/<?=$data['image_name']; ?>"  width="200" height="200">
</div>
<?php
}
}       
        ?>
<style>
  body {
  font-family: Arial, Helvetica, sans-serif;
  background-image:url('prof.jpeg');
  background-size: cover;

  
}
</style>
        
 
