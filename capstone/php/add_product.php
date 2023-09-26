<?php
include("connect.php");
$title = $_POST["title"];
$price = $_POST["price"];
$description = $_POST["description"];
$category = $_POST["category"];
$title = mysqli_real_escape_string($conn, $title);
$price = mysqli_real_escape_string($conn, $price);
$description = mysqli_real_escape_string($conn, $description);
$category = mysqli_real_escape_string($conn, $category);

if (empty($title)) {
    $title = "Empty";
}
if (empty($price)) {
    $price = "0.00";
}
if (empty($description)) {
    $description = "Empty";
}

$thumbnail = "images/cross.png";
$sql = "INSERT INTO product (price, title, thumbnail, description, category) VALUES ('$price', '$title', '$thumbnail', '$description', '$category')";

if (mysqli_query($conn, $sql)) {

    $notifmessage = "An [Admin] has added a new product with a category of [". $category ."].";
    $notifcategory = "log";
    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
    $notifresult = mysqli_query($conn, $notifsql);

} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
