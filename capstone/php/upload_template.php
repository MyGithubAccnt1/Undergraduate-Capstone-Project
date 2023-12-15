<?php
session_start();
include("connect.php");

$email = $_SESSION['email'];
$date = $_SESSION['date'];
$view = $_SESSION['view'];
$product = $_SESSION['product'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract the base64-encoded image data
    $imageData = $_POST['imageFile'];

    // Decode base64 to binary image data
    $imageBinary = base64_decode($imageData);

    if ($imageBinary !== false) {
        // Define the directory where you want to save the image
        $uploadDir = "../images/templates/";
        $uniqueFilename = uniqid() . ".png";
        $uploadFile = $uploadDir . $uniqueFilename;

        if (file_put_contents($uploadFile, $imageBinary)) {

            $thumbnailPath = "images/templates/" . $uniqueFilename;
            
            if ($view == "Front") {
                $sql = "UPDATE template SET thumbnail = '$thumbnailPath', frontthumb = '$thumbnailPath' WHERE email = '$email' and deyt = '$date' and product = '$product'";
            } else {
                $sql = "UPDATE template SET thumbnail = '$thumbnailPath', backthumb = '$thumbnailPath' WHERE email = '$email' and deyt = '$date' and product = '$product'";
            }

            if (mysqli_query($conn, $sql)) {
                exit();
            } else {
                echo "Error updating database: " . mysqli_error($conn);
            }
            
        } else {
            echo "Error saving image.";
        }
    } else {
        echo "Error decoding base64 data.";
    }
}
?>
