<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $uploadDir = "../../images/products/";
    $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = array("png");
    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            $thumbnailPath = "images/products/" . basename($_FILES["image"]["name"]);
            $sql = "UPDATE product SET thumbnail = '$thumbnailPath' WHERE id = '$id'";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../product.php");

                $notifmessage = "An [Admin] has changed a product thumbnail with id [". $id ."].";
                $notifcategory = "product";
                $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
                $notifresult = mysqli_query($conn, $notifsql);
                
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type. Only PNG files are allowed.";
    }
}
?>
