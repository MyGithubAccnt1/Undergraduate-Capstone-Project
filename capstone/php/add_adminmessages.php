<?php
// Connect to the database
include("connect.php");

// Get the form data
$id = $_POST["id"];
$email = $_POST["email"];
$role = "Admin";
$date = $_POST["date"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);

if ($comment === "" || $date === "") {
    echo "1";
} else {

    $sql = "INSERT INTO message (sender, email, message, deyt, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $id, $email, $comment, $date, $role);
    if ($stmt->execute()) {
        echo "2";
    } else {
        echo "3";
    }
    $stmt->close();
}
mysqli_close($conn);
?>
