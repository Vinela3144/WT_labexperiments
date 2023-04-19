<?php
session_start();
$n=$_SESSION["uname"];
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'user';
$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
$query = " SELECT * from image ";
$result = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($result)) {
?>
<style> 
body{
  color:white;

}
            .box {
                height:900;
                width: 520;
                background-color: lavender;
                border-style: outset;
                display: grid;
                color:black;
                
            }
            input[type=text]{
              visibility: hidden;
            }
        </style>
<div class='box' align="center">
<h3><?=$data['user_name']; ?></h3>
    <img src="./uploads/<?=$data['image_name']; ?>"  width="400" height="400">
    <table style="color:black;">
    <tr><form  action="like.php" method="POST" >
    <input type="text" name="img_id" value="<?php echo $data["id"]; ?>" />
    <td><input type="submit" value="like" name="submit" id="submit"/>
    <?php echo $data["likes_count"]?></td>
    </form>
    </tr>
    <tr>
    <form action="u.php" method="POST" enctype="multipart/form-data">
     <input type=text value="<?=$data['image_name'];?>" name="text">
    <td><h2 align:left;>comment:</h2></td>
    <td><textarea rows='5' cols="30" name="txt1" id="txt1"></textarea></td>
    <td><input type="submit" value="submit" name="btn1" id="btn1"/></td>
    </form>
    </tr>
    </table>
          <?php 
          $DATABASE_HOST = 'localhost';
          $DATABASE_USER = 'root';
          $DATABASE_PASS = '';
          $DATABASE_NAME = 'user';
          $x=$data['image_name'];
          $con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
 $q="SELECT * FROM comment where user_name='$n' and text='$x'";
$s = mysqli_query($con,$q);
    while($row=mysqli_fetch_array($s,MYSQLI_ASSOC)){?>
        <br>
        <h3><?= $row['image'];?></h3>
    </div>
<br>
<?php
}}
      
        ?>


        
 
