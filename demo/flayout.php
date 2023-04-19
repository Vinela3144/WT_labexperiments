<!DOCTYPE html>
<html lang="en">
<head>
<style>
* {
  box-sizing: border-box;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  background-image:url('main.webp');
  background-size: cover;

  
}
header {
  background-color:cadetblue;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color:black;
  background-image:url('lo.jpeg');
    font: weight 2000px;
    font-style: italic;
    background-repeat: no-repeat;
    background-size: cover;
}
section{
    background-color:steelblue;
}
nav {
  float: left;
  width: 30%;
  height: 700px; 
  background: magicmint;
  padding: 20px;
  background-image:url('R.jpg');
    font: weight 2000px;
    font-style: italic;
    background-repeat: no-repeat;
    background-size: cover;
}
article {
  float: left;
  padding: 20px;
  width: 70%;
  color: white;
  text-align: center;
  height: 700px; 
    font: weight 2000px;
    font-style: italic;
}
input[type=submit] {
        background-color: #62529c;
        border: none;
        color: #fff;
        padding: 5px 10px;
        text-decoration: none;
        margin: 2px 2px;
        cursor: pointer;
      }
</style>
</head>
<body>
  <article>
    <br>
    <br>
    <h1>Login form</h1>
    <br>
    <form method="post" action="flayout.php">
    <table align="center" >
    <tr>
                  <th><label for="name" style="color:white">Name:</label></th>
                  <td><input type="text" name="name" id="name" placeholder="your name" size='50'></td>
    </tr>
    <tr>
                  <th><label for="email" style="color:white">Email:</label></th>
                  <td><input type="text" name="email" id="email" placeholder="your email" size="50"></td>
                </tr>            
</table>
<input type="submit" class="submit" value="LOGIN" name="submit" style="height:40px; width:410px" />

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
        $sql = "SELECT * from tab1 where name='$uname' and mail='$email'";
        $res = mysqli_query($conn,$sql);

        if(mysqli_num_rows($res)>0){
           $_SESSION['uname']=$uname;
           header('Location:dash.php');
        }
        else{
            echo "<h5 invalid login";
            header('Location:flayout.php');
        }
}
?>
<br>
<h5 style="color:black">Sign up?<br> if you do not have an account?</h5>
<br>
<form method="post" action="form.php">
<input type="submit" class="submit" value="Sign up" name="submit" style="height:40px; width:400px" />
    
</form>
  </article>
</section>

</body>
</html>

