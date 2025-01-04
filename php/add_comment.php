<?php
session_start(); 
include("connect.php");
$email = $_SESSION["email"];
$role = $_SESSION["role"];
$title = mysqli_real_escape_string($conn, $_POST["title"]);
$category = mysqli_real_escape_string($conn, $_POST["category"]);
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);

$sql = "INSERT INTO comments (email, comment, title, category, role) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $email, $comment, $title, $category, $role);
if ($stmt->execute()) {
    $stmt->close();
}
mysqli_close($conn);
?>
