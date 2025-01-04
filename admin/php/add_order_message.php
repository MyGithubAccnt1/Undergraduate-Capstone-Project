<?php
include("connect.php");
$id = $_POST["id"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$role = "Admin";
$seen = "Yes";

$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];
    $title = $row['title'];
    $sql = "INSERT INTO message (email, message, role, seen, deyt) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $comment, $role, $seen, $date);
    if ($stmt->execute()) {
        $notifmessage = "An [Admin] has replied to your message on order [". $title ."].";
        $notifcategory = "message";
        $notifredirect = $date;
        $notifunread = "Yes";
        $notifsql = "INSERT INTO notification (message, category, email, redirect, unread) VALUES (?, ?, ?, ?, ?)";
        $notifstmt = $conn->prepare($notifsql);
        $notifstmt->bind_param("sssss", $notifmessage, $notifcategory, $email, $notifredirect, $notifunread);
        if ($notifstmt->execute()) {
            $notifstmt->close();
        }
        $stmt->close();
    }
}
mysqli_close($conn);
?>
