<?php
include("connect.php");
$email = $_POST["email"];
$deyt = $_POST["deyt"];
$email = mysqli_real_escape_string($conn, $email);
$deyt = mysqli_real_escape_string($conn, $deyt);

$objectsql = "DELETE FROM object WHERE email = '$email' and deyt = '$deyt'";
if (mysqli_query($conn, $objectsql)) {

    $templatesql = "DELETE FROM template WHERE email = '$email' and deyt = '$deyt'";
    if (mysqli_query($conn, $templatesql)) {

    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
