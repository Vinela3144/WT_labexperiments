<?php
include "image.php";
$query = " SELECT * from image ";
$result = mysqli_query($con, $query);

while ($data = mysqli_fetch_assoc($result)) {
?>
    <img src="./uploads/<?=$data['name']; ?>"  width="500" height="600">

<?php
}
        
        ?>