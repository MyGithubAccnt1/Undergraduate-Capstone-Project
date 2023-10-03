<?php
session_start();
include("connect.php");

$email = $_SESSION['email'];
$date = $_SESSION['date'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Extract the base64-encoded image data
    $imageData = $_POST['imageFile'];

    // Decode base64 to binary image data
    $imageBinary = base64_decode($imageData);

    var_dump($imageBinary);

    if ($imageBinary !== false) {
        // Define the directory where you want to save the image
        $uploadDir = "../images/templates/";
        $uniqueFilename = uniqid() . ".png";
        $uploadFile = $uploadDir . $uniqueFilename;

        // Save the image to the server
        if (file_put_contents($uploadFile, $imageBinary)) {
            // Update the product's thumbnail path in the database
            $thumbnailPath = "images/templates/" . $uniqueFilename;
            $sql = "UPDATE template SET thumbnail = '$thumbnailPath' WHERE email = '$email' and deyt = '$date'";

            if (mysqli_query($conn, $sql)) {
                // Image saved and database updated successfully
                echo "Image uploaded and database updated.";
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
