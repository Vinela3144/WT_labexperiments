<form action="" method="POST" enctype="multipart/form-data">
    comment:<textarea rows='5' cols="10" name="txt1" id="txt1"></textarea>
    <br>
    <input type="submit" value="submit" name="btn1" id="btn1"/>
</form>
<?php
session_start();
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