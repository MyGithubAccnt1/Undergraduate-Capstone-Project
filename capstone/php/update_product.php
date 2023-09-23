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

    $sql = "SELECT * FROM product WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($title === "") {
                $title = $row['title'];
            }
            if ($price <= 0) {
                $price = $row['price'];
            }else if ($price === ""){
                $price = $row['price'];
            }
            if ($thumbnail === "") {
                $thumbnail = $row['thumbnail'];
            }
            if ($description === "") {
                $description = $row['description'];
            }
        }

        $sql = "UPDATE product SET title = '$title', price = '$price', thumbnail = '$thumbnail', description = '$description' WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {

        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }
    
}
mysqli_close($conn);
?>
