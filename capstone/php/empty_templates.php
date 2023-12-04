<?php
include("connect.php");

$sql = "TRUNCATE TABLE object";

if ($conn->query($sql) === TRUE) {

    $sql = "TRUNCATE TABLE template";

    if ($conn->query($sql) === TRUE) {

        $folderPath = '../images/temp/';
        $imageFiles = glob($folderPath . '/*.png');
        foreach ($imageFiles as $imageFile) {
            unlink($imageFile);
        }

        $folderPath = '../images/templates/';
        $imageFiles = glob($folderPath . '/*.png');
        foreach ($imageFiles as $imageFile) {
            unlink($imageFile);
        }

        echo "1";

    } else {

        echo "2";

    }

} else {

    echo "3";

}
mysqli_close($conn);
?>