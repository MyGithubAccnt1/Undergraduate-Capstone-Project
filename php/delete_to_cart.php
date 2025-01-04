<?php
include("connect.php");
$id =  $_POST['id'];

$sql = "DELETE FROM cart WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
   echo "1";
}
mysqli_close($conn);
?>