<?php
// Connect to the database
include("connect.php");

// Get the form data
$name = $_POST["name"];
$title = $_POST["title"];
$comment = $_POST["comment"];
$date = date('Y-m-d H:i');

// Escape user input to prevent SQL injection (not secure, use prepared statements in production)
$name = mysqli_real_escape_string($conn, $name);
$comment = mysqli_real_escape_string($conn, $comment);

// Insert the comment into the database
$sql = "INSERT INTO comments (name, comment, date, title) VALUES ('$name', '$comment', '$date', '$title')";

if (mysqli_query($conn, $sql)) {
    // Comment added successfully
} else {
    // Error inserting comment
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
