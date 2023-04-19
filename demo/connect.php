<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'user';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = $_REQUEST['name'];
$mail = $_REQUEST['email']; 
$num = $_REQUEST['phoneNumber'];
$gender = $_REQUEST['gender'];
$sql = "INSERT INTO tab1 VALUES ('$name','$mail','$num','$gender')";

if(mysqli_query($con, $sql)){
    echo "<h3>data stored in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";
header("Location: flayout.php");
} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($con);
}
mysqli_close($con);
?>
