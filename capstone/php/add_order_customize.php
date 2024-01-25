<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$buyer = $_POST['buyer'];
$mnumber = $_SESSION['mnumber'];
$caddress = $_SESSION['caddress'];
$alt_address = $_POST['alt_address'];
$thumbnail = $_POST['thumbnail'];
$details = $_POST['details'];
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i');
$status = "Pending";
$title = 'Customize Item';
$total = 'Estimating...';
$quantity = '1';

$checksql = "SELECT * FROM history WHERE email = ? and deyt = ?";
$checkstmt = $conn->prepare($checksql);
$checkstmt->bind_param("ss", $email, $date);
$checkstmt->execute();
$checkresult = $checkstmt->get_result();

if ($checkresult->num_rows > 0) {
    echo "1";
} else {
    if ($alt_address === null) {
        $insertSql = "INSERT INTO history (email, title, total, deyt, status, buyer, mnumber, caddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ssssssss", $email, $title, $total, $date, $status, $buyer, $mnumber, $caddress);
    } else {
        $insertSql = "INSERT INTO history (email, title, total, deyt, status, buyer, mnumber, caddress, alt_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("sssssssss", $email, $title, $total, $date, $status, $buyer, $mnumber, $caddress, $alt_address);
    }
    if ($insertStmt->execute()) {
        $newSql = "INSERT INTO `order` (thumbnail, qty, email, deyt, details) VALUES (?, ?, ?, ?, ?)";
        $newStmt = $conn->prepare($newSql);
        $newStmt->bind_param("sssss", $thumbnail, $quantity, $email, $date, $details);
        
        if ($newStmt->execute()) {
            echo "3";
            $notifmessage = "[". $email ."] successfully completed an order of [". $title ."] on [". $date ."].";
            $notifcategory = "order";
            $notifsql = "INSERT INTO notification (message, category, email) VALUES ('$notifmessage', '$notifcategory', '$email')";
            $notifresult = mysqli_query($conn, $notifsql);

            $notifmessage = "You successfully completed an order on [". $date ."].";
            $notifcategory = "user";
            $notifsql = "INSERT INTO notification (message, category, email) VALUES ('$notifmessage', '$notifcategory', '$email')";
            $notifresult = mysqli_query($conn, $notifsql);
        }
        $newStmt->close();
    } else {
        echo "2";
    }
    $insertStmt->close();
}
mysqli_close($conn);
?>
