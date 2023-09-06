<?php
session_start(); // Start the session

include("connect.php"); // Include your database connection

$email = $_SESSION['email'];

// Escape user inputs and use prepared statements
$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
$status = "Canceled";

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
$stmt->bind_param("sss", $status, $email, $date);

if ($stmt->execute()) {
    echo "<script>alert('Notice: An order has been canceled successfully!')</script>";
    $script = "<script>window.location = '../view_order.php';</script>";
    echo $script;
} else {
    echo "Error: " . $stmt->error;
    sleep(2);
    header("Location: ../view_order.php");
}

$stmt->close();
$conn->close(); // Close the database connection
?>
