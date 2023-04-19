<!DOCTYPE html>
<html>
<style> 
body{
    background-color:lightseagreen;
    background-image:url('fr.webp');
  background-repeat: no-repeat;
  background-size: cover;
  color:white;

}
</style>
<body>

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

$sql = "SELECT name FROM tab1 WHERE name <> '$n'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " Name: ". $row["name"] ?> <br><?php ;
    }
} else {
    echo "0 results";
}

$con->close();
?>

</body>
</html>