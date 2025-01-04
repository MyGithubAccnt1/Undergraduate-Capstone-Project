<?php
session_start(); 
include("connect.php");
$title = mysqli_real_escape_string($conn, $_POST['title']);
$thumbnail = mysqli_real_escape_string($conn, $_POST['thumbnail']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$email = $_SESSION['email'];
$total = $quantity * $price;
$calculated = number_format($total, 2);

$sql = "INSERT INTO cart (email, thumbnail, title, price, qty, total) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $email, $thumbnail, $title, $price, $quantity, $calculated);
if ($stmt->execute()) {
    echo "1";
    $stmt->close();
}
mysqli_close($conn);
?>
