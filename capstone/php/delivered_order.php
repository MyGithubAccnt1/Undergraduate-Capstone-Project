<?php
include("connect.php"); // Include your database connection

// Retrieve the parameters from the URL
$date = mysqli_real_escape_string($conn, $_POST['date']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
// Use prepared statements to prevent SQL injection
$status = "Delivered";

// Use prepared statements
$stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
$stmt->bind_param("sss", $status, $email, $date);

// Execute the prepared statement
$stmt->execute();

$stmt->close();
$conn->close(); // Close the database connection
?>
