<html>
<form method="post" action="login.php">
    <table align="center" >
    <tr>
                  <td><label for="name" style="color:hotpink">Name:</label></td>
                  <td><input type="text" name="name" id="name" placeholder="your name"></td>
    </tr>
    <tr>
                  <td><label for="email" style="color:hotpink">Email:</label></td>
                  <td><input type="text" name="email" id="email" placeholder="your email"></td>
                </tr>
    <tr>
                  <td><input type="submit" class="submit" value="submit" name="submit" /></td>
                </tr>
</table>
</form>
</html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["name"];
        $email=$_POST["email"];
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'user';

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if ($conn) {
            echo "Connection successful.";
        }
        else{
            echo "Connection Failed.";
            die("Connection Failed:".mysqli_connect_error());
        }
        $sql = "select * from tab1 where name='$uname' and email='$email'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           $_SESSION['uname']=$uname;
           header('Location:dash.php');
        }
        else{
            echo "<h5 invalid login";
            header('Location:login.php');
        }
}
?>
<style> 
body{
    background-image:url('im.webp');
    font: weight 2000px;
    font-style: italic;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>