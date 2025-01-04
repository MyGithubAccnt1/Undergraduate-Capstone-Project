<?php
session_start(); 
include("connect.php");
$email = $_SESSION["email"];
$role = $_SESSION["role"];
$seen = "No";
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);

$sql = "INSERT INTO message (email, message, role, seen) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $email, $comment, $role, $seen);
if ($stmt->execute()) {
    $stmt->close();
}
mysqli_close($conn);
?>
