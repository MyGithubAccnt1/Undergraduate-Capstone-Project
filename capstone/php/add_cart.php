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
    echo"<script>alert('Notice: This item is already added to your cart. The same item cannot be added twice.')</script>";
    $script = "<script>window.location = '../index.php';</script>";
    echo $script;
} else {
    // Insert into the database
    $sql = "INSERT INTO cart (email, title, price, qty, total) VALUES ('$email', '$title', '$price', '$qty', '$total')";
    if (mysqli_query($conn, $sql)) {
        echo"<script>alert('Notice: An item has been added to cart.')</script>";
        $script = "<script>window.location = '../preview.php';</script>";
        echo $script;
    } else {
        // Error inserting comment
        echo "Error: " . mysqli_error($conn);
    }
}
// Close the database connection
mysqli_close($conn);
?>
