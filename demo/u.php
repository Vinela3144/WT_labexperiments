<?php
session_start();
$DATABASE_HOST = 'localhost';
          $DATABASE_USER = 'root';
          $DATABASE_PASS = '';
          $DATABASE_NAME = 'user';
          $con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
$n=$_SESSION["uname"];
if(isset($_POST["btn1"])){
    $v=$_POST["txt1"];
    $t=$_POST['text'];
    
$qr="INSERT INTO comment values('$n','$v','$t')";
$res1 = mysqli_query($con,$qr);
echo $n;
echo $v;
echo $t;}
header("Location:feed.php")?>