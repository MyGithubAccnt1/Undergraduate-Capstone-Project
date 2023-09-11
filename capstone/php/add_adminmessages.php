<?php
// Connect to the database
include("connect.php");

// Get the form data
$id = $_POST["id"];
$email = $_POST["email"];
$role = "Admin";
$date = $_POST["date"];
$comment = $_POST["comment"];

// Escape user input to prevent SQL injection (not secure, use prepared statements in production)
$email = mysqli_real_escape_string($conn, $email);
$comment = mysqli_real_escape_string($conn, $comment);

// Insert the comment into the database
$sql = "INSERT INTO message (sender, email, message, deyt, role) VALUES ('$id', '$email', '$comment', '$date', '$role')";

if (mysqli_query($conn, $sql)) {
    // Comment added successfully
} else {
    // Error inserting comment
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
