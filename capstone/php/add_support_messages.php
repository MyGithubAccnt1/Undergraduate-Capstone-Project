<?php
// Connect to the database
include("connect.php");

// Get the form data
$id = $_POST["id"];
$email = $_POST["email"];
$role = $_POST["role"];
$date = "";
$seen = "No";
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);

// Insert the comment into the database
if (!empty($id) && !empty($email) && !empty($comment) && !empty($role)) {
    $sql = "INSERT INTO message (sender, email, message, deyt, role, seen) VALUES ('$id', '$email', '$comment', '$date', '$role', '$seen')";
    // Execute the SQL statement here (e.g., using a database connection)
    if (mysqli_query($conn, $sql)) {
        // Comment added successfully
    } else {
        // Error inserting comment
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle the case where one or more variables are empty
}

// Close the database connection
mysqli_close($conn);
?>
