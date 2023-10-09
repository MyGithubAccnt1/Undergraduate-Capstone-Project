<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$title = $_POST['title'];
$price = $_POST['price'];
$email = $_POST['email'];
$qty = 1;
$total = $qty * $price;

$sql = "SELECT * FROM cart WHERE email = '$email' and title = '$title'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) === 1) {

    echo "1";

} else {
    // Insert into the database
    $sql = "INSERT INTO cart (email, title, price, qty, total) VALUES ('$email', '$title', '$price', '$qty', '$total')";
    if (mysqli_query($conn, $sql)) {
        
        echo "2";
    
    } else {
        
        echo "3";
    
    }
}
mysqli_close($conn);
?>
