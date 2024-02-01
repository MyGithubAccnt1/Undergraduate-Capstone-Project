<?php
include("connect.php");
$email = $_POST["email"];
$date = $_POST["date"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$role = "Admin";
$seen = "Yes";

$sql = "INSERT INTO message (email, message, role, seen, deyt) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $email, $comment, $role, $seen, $date);
if ($stmt->execute()) {
    $stmt->close();
}
mysqli_close($conn);
?>
