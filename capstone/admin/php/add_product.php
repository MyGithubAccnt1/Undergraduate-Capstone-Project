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


    $stmt->close();
}
mysqli_close($conn);
?>
