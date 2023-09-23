<?php
include("connect.php");
$id = $_POST["id"];
$title = $_POST["title"];
$price = $_POST["price"];
$thumbnail = $_POST["thumbnail"];
$description = $_POST["description"];
$title = mysqli_real_escape_string($conn, $title);
$price = mysqli_real_escape_string($conn, $price);
$thumbnail = mysqli_real_escape_string($conn, $thumbnail);
$description = mysqli_real_escape_string($conn, $description);
if ($id === "") {

} else {

    $sql = "DELETE FROM product WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
}
mysqli_close($conn);
?>
