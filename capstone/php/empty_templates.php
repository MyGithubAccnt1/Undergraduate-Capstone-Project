<?php
include("connect.php");

$sql = "DELETE FROM object WHERE email != 'test@admin'";

if ($conn->query($sql) === TRUE) {

    $sql = "SELECT * FROM template";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == "test@admin") {

            } else {
                $imageFile = $row['thumbnail'];
                if (file_exists("../" . $imageFile)) {
                    unlink("../" . $imageFile);
                }
            }
        }
    } 
    $templatesql = "DELETE FROM template WHERE email != 'test@admin'";
    if (mysqli_query($conn, $templatesql)) {
        echo "1";
    } else {
        echo "2";
    }
} else {
    echo "3";
}
mysqli_close($conn);
?>