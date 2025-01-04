<?php
include("connect.php");
$id = $_POST["id"];
$status = $_POST["status"];

$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $email = $row['email'];
    $date = $row['deyt'];
    $sql = "UPDATE history SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($status === 'Delivered') {
        $earn = $row['total'];
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $sql = "SELECT * FROM earning WHERE deyt = '$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            $order = $row['order'] + 1;
            $sql = "UPDATE earning SET earn = '$earn', `order` = '$order' WHERE deyt = '$date'";
            $result = mysqli_query($conn, $sql);
        } else {
            $order = 1;
            $sql = "INSERT INTO earning (earn, deyt, `order`) VALUES ('$earn', '$date', '$order')";
            $result = mysqli_query($conn, $sql);
        }
    }

    $notifmessage = "An [Admin] has updated an order status of id [". $id ."].";
    $notifcategory = "order";

    $notifsql = "INSERT INTO notification (message, category) VALUES (?, ?)";
    $notifstmt = $conn->prepare($notifsql);
    $notifstmt->bind_param("ss", $notifmessage, $notifcategory);
    if ($notifstmt->execute()) {
        $notifstmt->close();
    }
    
    $notifmessage = "An [Admin] has updated your orders' status with date [". $date ."].";
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
