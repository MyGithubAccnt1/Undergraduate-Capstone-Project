<?php
include("connect.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $imageData = $_POST['imageFile'];
    $imageBinary = base64_decode($imageData);
    if ($imageBinary !== false) {
        $uploadDir = "../images/temp/";
        $uniqueFilename = uniqid() . ".png";
        $uploadFile = $uploadDir . $uniqueFilename;
        if (file_put_contents($uploadFile, $imageBinary)) {
            echo $uploadFile;
        }
    }
}
?>
