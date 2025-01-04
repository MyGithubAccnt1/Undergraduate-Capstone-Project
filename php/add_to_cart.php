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

$sql = "SELECT * FROM cart WHERE email = '$email' and thumbnail = '$thumbnail' and title = '$title' and price = '$price'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) > 0) {
    echo "1";
} else {

    $sql = "INSERT INTO cart (email, thumbnail, title, price, qty, total) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $email, $thumbnail, $title, $price, $quantity, $calculated);
    if ($stmt->execute()) {
        echo "2";
        $stmt->close();
    }
    
}
mysqli_close($conn);
?>
