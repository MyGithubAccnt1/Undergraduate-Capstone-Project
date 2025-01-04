<?php
include("connect.php");
$id = $_POST["id"];
$total = $_POST["total"];
$total = number_format($total, 2, '.', ',');
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];

    $sql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['title'] !== null) {
            
        } else {
            $new_id = $row['id'];
            $newsql = "UPDATE `order` SET price = '$total', total = '$total'  WHERE id = '$new_id'";
            $result = mysqli_query($conn, $newsql);
        }
    }

    $sql = "UPDATE history SET total = '$total' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    $notifmessage = "An [Admin] has updated an order total of id [". $id ."].";
    $notifcategory = "order";

    $notifsql = "INSERT INTO notification (message, category) VALUES (?, ?)";
    $notifstmt = $conn->prepare($notifsql);
    $notifstmt->bind_param("ss", $notifmessage, $notifcategory);
    if ($notifstmt->execute()) {
        $notifstmt->close();
    }
    
    $notifmessage = "An [Admin] has updated your order total with date [". $date ."].";
    $notifcategory = "order";
    $notifredirect = $date;
    $notifunread = "Yes";
    $notifsql = "INSERT INTO notification (message, category, email, redirect, unread) VALUES (?, ?, ?, ?, ?)";
    $notifstmt = $conn->prepare($notifsql);
    $notifstmt->bind_param("sssss", $notifmessage, $notifcategory, $email, $notifredirect, $notifunread);
    if ($notifstmt->execute()) {
        $notifstmt->close();
    }
}
mysqli_close($conn);
?>
