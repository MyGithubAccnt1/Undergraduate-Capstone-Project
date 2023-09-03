<?php
session_start(); 
include('connect.php');
$email = $_SESSION['email'];
$sql = "SELECT SUM(total) AS subtotal_cart FROM cart WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $subtotal_cart = $row["subtotal_cart"];
    echo '
    <strong>Sub-Total: ₱' . $subtotal_cart . '</strong>
    ';
} else {
    echo "Sub-Total: ₱0";
}
$conn->close();
?>