<?php
include("connect.php");
$email = $_POST["email"];
$deyt = $_POST["deyt"];
$email = mysqli_real_escape_string($conn, $email);
$deyt = mysqli_real_escape_string($conn, $deyt);

$checksql = "SELECT * FROM history WHERE email = '$email' and deyt = '$deyt'";
$checkresult = mysqli_query($conn, $checksql);
if (mysqli_num_rows($checkresult) > 0) {
    exit;
} else {
    $objectsql = "DELETE FROM object WHERE email = '$email' and deyt = '$deyt'";
    if (mysqli_query($conn, $objectsql)) {

        $gettemplatesql = "SELECT thumbnail FROM template WHERE email = '$email' and deyt = '$deyt'";
        $result = mysqli_query($conn, $gettemplatesql);
        if (mysqli_num_rows($result) > 0) {
             $row = $result->fetch_assoc();
             $imageFile = $row['thumbnail'];
             if (file_exists("../" . $imageFile)) {
                unlink("../" . $imageFile);
             }
        }

        $templatesql = "DELETE FROM template WHERE email = '$email' and deyt = '$deyt'";
        if (mysqli_query($conn, $templatesql)) {

        } else {
            echo "Error: " . mysqli_error($conn);
        }

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
