<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$buyer = $_POST['buyer'];
$mnumber = $_SESSION['mnumber'];
$address = $_POST['address'];
$payment = $_POST['payment'];
$proof = $_POST['proof'];
$title = "";
$qty = 0;
$price = 0;
$total = 0;

$sql = "SELECT title, total FROM cart WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $total = $total + floatval(str_replace([','], '', $row['total']));
    }
    $formatted_total = number_format($total, 2);
    $checksql = "SELECT * FROM history ORDER BY id DESC";
    $checkstmt = $conn->prepare($checksql);
    $checkstmt->execute();
    $checkresult = $checkstmt->get_result();
    if ($checkresult->num_rows > 0) {
        $row = $checkresult->fetch_assoc();
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
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d H:i');
    $status = "Pending";
    
    $checksql = "SELECT * FROM history WHERE email = ? and deyt = ?";
    $checkstmt = $conn->prepare($checksql);
    $checkstmt->bind_param("ss", $email, $date);
    $checkstmt->execute();
    $checkresult = $checkstmt->get_result();

    if ($checkresult->num_rows > 0) {
        echo "2";
    } else {
        $insertSql = "INSERT INTO history (email, title, total, deyt, status, buyer, mnumber, caddress, payment, proof) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("ssssssssss", $email, $title, $formatted_total, $date, $status, $buyer, $mnumber, $address, $payment, $proof);
        if ($insertStmt->execute()) {
            $sql = "SELECT * FROM cart WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $newSql = "INSERT INTO `order` (thumbnail, title, qty, price, total, email, deyt) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $newStmt = $conn->prepare($newSql);
                    $newStmt->bind_param("sssssss", $row["thumbnail"], $row["title"], $row["qty"], $row["price"], $row["total"], $email, $date);
                    $newStmt->execute();
                    $newStmt->close();
                }
                $deleteSql = "DELETE FROM cart WHERE email = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("s", $email);
                if ($deleteStmt->execute()) {
                    echo "4";
                    $notifmessage = "[". $email ."] successfully completed an order on [". $date ."] with [". $payment ."].";
                    $notifcategory = "order";
                    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
                    $notifresult = mysqli_query($conn, $notifsql);

                    $notifmessage = "You successfully completed an order on [". $date ."] with [". $payment ."].";
                    $notifcategory = "order";
                    $notifredirect = $date;
                    $notifunread = "Yes";
                    $notifsql = "INSERT INTO notification (message, category, email, redirect, unread) VALUES ('$notifmessage', '$notifcategory', '$email', '$notifredirect', '$notifunread')";
                    $notifresult = mysqli_query($conn, $notifsql);
                }
                $deleteStmt->close();
            }
        } else {
            echo "3";
        }
        $insertStmt->close();
    }
    $checkstmt->close();
} else {
    echo "1";
}
mysqli_close($conn);
?>
