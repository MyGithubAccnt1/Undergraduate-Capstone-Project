<?php
include("connect.php");
$id = $_POST["id"];
$sql = "DELETE FROM product WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
	$notifmessage = "An [Admin] has deleted a product with id [". $id ."].";
	$notifcategory = "product";
	$notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
	$notifresult = mysqli_query($conn, $notifsql);
}
mysqli_close($conn);
?>
