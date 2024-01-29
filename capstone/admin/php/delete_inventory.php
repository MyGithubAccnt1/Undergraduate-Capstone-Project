<?php
include("connect.php");
$id = $_POST["id"];
$sql = "DELETE FROM inventory WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {

}
mysqli_close($conn);
?>
