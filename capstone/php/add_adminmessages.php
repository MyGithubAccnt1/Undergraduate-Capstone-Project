<?php
// Connect to the database
include("connect.php");

// Get the form data
$id = $_POST["id"];
$email = $_POST["email"];
$role = "Admin";
$date = $_POST["date"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$seen = "Yes";

if ($comment === "") {
    echo "1";
} else {

    $sql = "INSERT INTO message (sender, email, message, deyt, role, seen) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $id, $email, $comment, $date, $role, $seen);
    if ($stmt->execute()) {
        echo "2";
    } else {
        echo "3";
    }
    $stmt->close();
}
mysqli_close($conn);
?>
