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
    if (!empty($date)) {
        $sql = "SELECT title FROM history WHERE email = '$email' AND deyt = '$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $title = $row['title'];
            $notifmessage = "An [Admin] has replied to your message on order [". $title ."].";
            $notifcategory = "message";
            $notifredirect = $date;
            $notifsql = "INSERT INTO notification (message, category, email, redirect) VALUES (?, ?, ?, ?)";
            $notifstmt = $conn->prepare($notifsql);
            $notifstmt->bind_param("ssss", $notifmessage, $notifcategory, $email, $notifredirect);
            if ($notifstmt->execute()) {
                $notifstmt->close();
            }
        }
    } else {
        $notifmessage = "An [Admin] has replied to your message on customer support.";
        $notifcategory = "message";
        $notifredirect = "null";
        $notifsql = "INSERT INTO notification (message, category, email, redirect) VALUES (?, ?, ?, ?)";
        $notifstmt = $conn->prepare($notifsql);
        $notifstmt->bind_param("ssss", $notifmessage, $notifcategory, $email, $notifredirect);
        if ($notifstmt->execute()) {
            $notifstmt->close();
        }
    }
    $stmt->close();
}
mysqli_close($conn);
?>
