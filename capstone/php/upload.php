<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = mysqli_real_escape_string($conn, $_POST["id"]); // Sanitize user input
    
    $uploadDir = "../images/"; // Directory where you want to store the uploaded images
    $uploadFile = $uploadDir . basename($_FILES["imageFile"]["name"]);

    // Check if the file is an actual image
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = array("png");

    if (in_array($imageFileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $uploadFile)) {
            // Update the product's thumbnail in the database
            $thumbnailPath = "images/" . basename($_FILES["imageFile"]["name"]);
            $sql = "UPDATE product SET thumbnail = '$thumbnailPath' WHERE id = '$id'";
            
            if (mysqli_query($conn, $sql)) {

                $notifmessage = "An [Admin] has changed a product thumbnail of [". $thumbnailPath ."].";
                $notifcategory = "log";
                $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
                $notifresult = mysqli_query($conn, $notifsql);

                // Redirect to the product.php page after successful update
                header("Location: ../product.php");
                exit(); // Ensure no more PHP code is executed after the redirect
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
