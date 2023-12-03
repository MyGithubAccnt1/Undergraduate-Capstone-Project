<?php
include("connect.php");
$title = mysqli_real_escape_string($conn, $_POST["title"]);
$price = mysqli_real_escape_string($conn, $_POST["price"]);
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);

if (empty($title)) {
    $title = "Empty";
}
if (empty($price)) {
    $price = "0.00";
}
if (empty($description)) {
    $description = "Empty";
}

$thumbnail = "images/products/new.png";
$popularity = 0;
$sql = "INSERT INTO product (price, title, thumbnail, description, category, popularity) VALUES ('$price', '$title', '$thumbnail', '$description', '$category', '$popularity')";

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
