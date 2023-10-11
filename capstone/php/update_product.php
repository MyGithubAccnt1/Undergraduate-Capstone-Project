<?php
include("connect.php");
$id = $_POST["id"];
$title = mysqli_real_escape_string($conn, $_POST["title"]);
$price = mysqli_real_escape_string($conn, $_POST["price"]);
$thumbnail = mysqli_real_escape_string($conn, $_POST["thumbnail"]);
$description = mysqli_real_escape_string($conn, $_POST["description"]);
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

            echo "2";

            $notifmessage = "An [Admin] has updated a product with a title of [". $title ."].";
            $notifcategory = "log";
            $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
            $notifresult = mysqli_query($conn, $notifsql);

        } else {

            echo "3";
            
        }

    } else {

        echo "1";

    }
    
}
mysqli_close($conn);
?>
