<?php
include("connect.php");

$id =  $_POST['id'];

$sql = "DELETE FROM cart WHERE id='$id'";

if ($conn->query($sql) === TRUE) {

   echo "1";

} else {

  echo "2";

}
mysqli_close($conn);
?>