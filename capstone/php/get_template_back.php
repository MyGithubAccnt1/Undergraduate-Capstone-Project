<?php
session_start(); 
include("connect.php");

$email = $_SESSION["email"];
$date = $_SESSION["date"];
$product = $_GET["product"];

$templatesql = "SELECT backthumb FROM template WHERE email = '$email' and deyt = '$date' and product = '$product'";
$templateresult = $conn->query($templatesql);
if ($templateresult->num_rows > 0) {
    $templaterow = $templateresult->fetch_assoc();
    
    if ($templaterow['backthumb']) {
        echo '<img src="'. $templaterow['backthumb'] .'" style="width: auto; height: 300px;">';
    } else {
        echo "No Available Image";
    }

} else {
    echo "No Available Image";
}

mysqli_close($conn);
?>