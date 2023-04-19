<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$con = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST["submit"])){
    $imid=$_POST["img_id"];
    $uid=$_SESSION["uname"];
    $sql="SELECT * FROM `post_likes` WHERE user_id='$uid' and post_id='$imid'";
    $res=$con->query($sql);
    $rcount=mysqli_num_rows($res);
    if($rcount>0){
        echo "<script>alert('you have already liked the photo')</script>";
    }
    else{
        $s="UPDATE image SET likes_count=likes_count+1 Where id='$imid'";
        $resu=$con->query($s);
        $sq="INSERT INTO post_likes (user_id,post_id) VALUES('$uid','$imid')";
        $r=$con->query($sq);
    }
}
$con->close();
echo '<script>window.location.replace("feed.php");</script>';
?>
