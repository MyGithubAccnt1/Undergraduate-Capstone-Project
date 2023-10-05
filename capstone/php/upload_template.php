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

    if ($imageBinary !== false) {
        // Define the directory where you want to save the image
        $uploadDir = "../images/templates/";
        $uniqueFilename = uniqid() . ".png";
        $uploadFile = $uploadDir . $uniqueFilename;

        if (file_put_contents($uploadFile, $imageBinary)) {

            $gettemplatesql = "SELECT thumbnail FROM template WHERE email = '$email' and deyt = '$date'";
            $result = mysqli_query($conn, $gettemplatesql);
            if (mysqli_num_rows($result) > 0) {
                 $row = $result->fetch_assoc();
                 $Thumbnail = $row['thumbnail'];

                 var_dump($Thumbnail);

                 if (file_exists("../" . $Thumbnail)) {
                    unlink("../" . $Thumbnail);
                 }
            }

            $thumbnailPath = "images/templates/" . $uniqueFilename;
            $sql = "UPDATE template SET thumbnail = '$thumbnailPath' WHERE email = '$email' and deyt = '$date'";

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
