<?php
include("connect.php");
$title = mysqli_real_escape_string($conn, $_POST["title"]);
$price = mysqli_real_escape_string($conn, $_POST["price"]);
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);
$thumbnail = 'images/products/new.png';
$popularity = 0;

$sql = "INSERT INTO product (title, description, price, category, thumbnail, popularity) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $title, $description, $price, $category, $thumbnail, $popularity);
if ($stmt->execute()) {
    $notifmessage = "An [Admin] has added a new product with category [". $category ."].";
    $notifcategory = "product";
    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
    $notifresult = mysqli_query($conn, $notifsql);
    $stmt->close();
}
mysqli_close($conn);
?>
