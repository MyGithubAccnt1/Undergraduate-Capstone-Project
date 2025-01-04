<?php
session_start(); 
include("connect.php");
$email = $_SESSION["email"];
$role = $_SESSION["role"];
$seen = "No";
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$date = $_POST["date"];

$sql = "INSERT INTO message (email, message, role, seen, deyt) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $email, $comment, $role, $seen, $date);
if ($stmt->execute()) {
    $stmt->close();
}
mysqli_close($conn);
?>
