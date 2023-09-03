<?php
session_start(); 
include("connect.php");

// Escape user inputs for security
$id = $_POST['id'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$qty = $qty + 1;
$total = $qty * $price;
// Insert into the database
$sql = "UPDATE cart SET qty='$qty', total='$total' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
	echo"<script>alert('Notice: A new quantity has been added to cart.')</script>";
	$script = "<script>window.location = '../account.php';</script>";
    echo $script;
} else {
    // Error inserting comment
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
