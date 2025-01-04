<?php
include("connect.php");
$id = $_POST['id'];
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$sql = "UPDATE product SET title = '$title', description = '$description', price = '$price' WHERE id = '$id'";
$conn->query($sql);
$notifmessage = "An [Admin] has updated a product with id [". $id ."].";
$notifcategory = "product";
$notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
$notifresult = mysqli_query($conn, $notifsql);
mysqli_close($conn);
?>
