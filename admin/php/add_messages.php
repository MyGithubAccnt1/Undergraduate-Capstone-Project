<?php
include("connect.php");
$email = $_POST["email"];
$date = $_POST["date"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$role = "Admin";
$seen = "Yes";
if (!empty($date)) {
    $sql = "INSERT INTO message (email, message, role, seen, deyt) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $comment, $role, $seen, $date);
    if ($stmt->execute()) {
        $sql = "SELECT title FROM history WHERE email = '$email' AND deyt = '$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
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
        }
    }
} else {
    $sql = "INSERT INTO message (email, message, role, seen) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $email, $comment, $role, $seen);
    if ($stmt->execute()) {
        $notifmessage = "An [Admin] has replied to your message on customer support.";
        $notifcategory = "message";
        $notifredirect = "null";
        $notifunread = "Yes";
        $notifsql = "INSERT INTO notification (message, category, email, redirect, unread) VALUES (?, ?, ?, ?, ?)";
        $notifstmt = $conn->prepare($notifsql);
        $notifstmt->bind_param("sssss", $notifmessage, $notifcategory, $email, $notifredirect, $notifunread);
        if ($notifstmt->execute()) {
            $notifstmt->close();
        }
    }
}
mysqli_close($conn);
?>
