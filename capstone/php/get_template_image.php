<?php
session_start(); 
include("connect.php");

$email = $_SESSION["email"];
$date = $_SESSION["date"];

$templatesql = "SELECT thumbnail FROM template WHERE email = '$email' and deyt = '$date'";
$templateresult = $conn->query($templatesql);
if ($templateresult->num_rows > 0) {
    $templaterow = $templateresult->fetch_assoc();

    echo '<img src="'. $templaterow['thumbnail'] .'" style="width: auto; height: 300px;">';

}

mysqli_close($conn);
?>
