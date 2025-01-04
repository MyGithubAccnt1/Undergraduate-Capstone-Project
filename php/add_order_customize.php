<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$buyer = $_POST['buyer'];
$mnumber = $_SESSION['mnumber'];
$address = $_POST['address'];
$thumbnail = $_POST['thumbnail'];
$details = $_POST['details'];
$quantity = $_POST['quantity'];
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i');
$status = "Pending";
$title = '';
$total = 'Estimating...';

$checksql = "SELECT * FROM history WHERE email = ? and deyt = ?";
$checkstmt = $conn->prepare($checksql);
$checkstmt->bind_param("ss", $email, $date);
$checkstmt->execute();
$checkresult = $checkstmt->get_result();

if ($checkresult->num_rows > 0) {
    echo "1";
} else {
    $newSql = "INSERT INTO `order` (thumbnail, qty, email, deyt, details) VALUES (?, ?, ?, ?, ?)";
    $newStmt = $conn->prepare($newSql);
    $newStmt->bind_param("sssss", $thumbnail, $quantity, $email, $date, $details);
    
    if ($newStmt->execute()) {
        $checkedsql = "SELECT * FROM history ORDER BY id DESC";
        $checkedstmt = $conn->prepare($checkedsql);
        $checkedstmt->execute();
        $checkedresult = $checkedstmt->get_result();
        if ($checkedresult->num_rows > 0) {
            $row = $checkedresult->fetch_assoc();
            $id = $row['id'] + 1;
            if (strlen($id) < 6) {
                $title = 'SBM' . str_repeat('0', 6 - strlen($id)) . $id;
            } else {
                $title = 'SBM' . $id;
            }
        } else {
            $id = 1;
            if (strlen($id) < 6) {
                $title = 'SBM' . str_repeat('0', 6 - strlen($id)) . $id;
            }
        }
        $insertSql = "INSERT INTO history (email, title, total, deyt, status, buyer, mnumber, caddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("ssssssss", $email, $title, $total, $date, $status, $buyer, $mnumber, $address);

        if ($insertStmt->execute()) {

            echo "2";
            $notifmessage = "[". $email ."] successfully completed an order on [". $date ."].";
            $notifcategory = "order";
            $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
            $notifresult = mysqli_query($conn, $notifsql);

            $notifmessage = "You successfully completed an order on [". $date ."].";
            $notifcategory = "order";
            $notifredirect = $date;
            $notifunread = "Yes";
            $notifsql = "INSERT INTO notification (message, category, email, redirect, unread) VALUES ('$notifmessage', '$notifcategory', '$email', '$notifredirect', '$notifunread')";
            $notifresult = mysqli_query($conn, $notifsql);

        }
        $insertStmt->close();

    }
    $newStmt->close();
}
mysqli_close($conn);
?>
