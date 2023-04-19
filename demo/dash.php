<?php 
session_start();
?>
<style> 
body{
    background-color:lightseagreen;
    background-image:url('db.jpg');
  background-repeat: no-repeat;
  background-size: cover;

}
</style>
<html>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;

}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
</head>
<body>

<ul>
  <li><a  href='profile.php'>UPLOAD</a></li>
  <li><a href='try.php'>FEED</a></li>
  <li><a href='logout.php'>LOGOUT</a></li>
</ul>

</body>
</html>
<?php
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
<html>
<style> 
body{
    background-color:lightseagreen;
    background-image:url('dash.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  color:white;

}
</style>
    <h2 style="text-align:center;" >PROFILE</h2>
    <table border=1 cellspacing='2' cellpadding='5' align="center">
        <tr><td><label>USERNAME:</label></td>
        <td><h2><?php echo $n?></h2></td>
    </tr>
    <tr><td><label>MAIL:</label></td>
        <td><h2><?php echo $m?></h2></td>
    </tr>
    <tr><td><label>PHONE NUMBER:</label></td>
        <td><h2><?php echo $p?></h2></td>
    </tr>
    <tr><td><label>GENDER:</label></td>
        <td><h2><?php echo $g?></h2></td>
    </tr>
    
<body>
        
 