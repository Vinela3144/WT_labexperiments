
<?php
session_start();
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
    background-color:lightseagreen;
    background-image:url('fe.webp');
  background-repeat: no-repeat;
  background-size: cover;
  color:white;

}
            .box {
                height:300;
                width: 300;
                background-color: skyblue;
                display:inline-block;
            }
            input[type=text]{
              visibility: hidden;
            }
        </style>
<div class='box'>
<h3><?=$data['user_name']; ?></h3>
<br>
    <img src="./uploads/<?=$data['image_name']; ?>"  width="300" height="300">
    <form  action="lik.php" method="POST">
    <input type="text" name="img_id" value="<?php echo $data["id"]; ?>" />
    <input type="submit" value="like" name="submit" id="submit"/>
    <?php echo $data["likes_count"]?>
    </form>


</div>
<?php
}
      
        ?>


        
 
