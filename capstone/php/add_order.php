<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$buyer = $_POST['buyer'];
$mnumber = $_SESSION['mnumber'];
$caddress = $_SESSION['caddress'];
$alt_address = $_POST['alt_address'];
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
        $title .= $row["title"] . ', ';
        $total = $total + floatval(str_replace([','], '', $row['total']));
    }
    $title = rtrim($title, ', ');
    $formatted_total = number_format($total, 2);
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
        if ($alt_address === null) {
            $insertSql = "INSERT INTO history (email, title, total, deyt, status, buyer, mnumber, caddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("ssssssss", $email, $title, $formatted_total, $date, $status, $buyer, $mnumber, $caddress);
        } else {
            $insertSql = "INSERT INTO history (email, title, total, deyt, status, buyer, mnumber, caddress, alt_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertStmt = $conn->prepare($insertSql);
            $insertStmt->bind_param("sssssssss", $email, $title, $formatted_total, $date, $status, $buyer, $mnumber, $caddress, $alt_address);
        }
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
                    $notifmessage = "[". $email ."] successfully completed an order of [". $title ."] on [". $date ."].";
                    $notifcategory = "order";
                    $notifsql = "INSERT INTO notification (message, category, email) VALUES ('$notifmessage', '$notifcategory', '$email')";
                    $notifresult = mysqli_query($conn, $notifsql);

                    $notifmessage = "You successfully completed an order on [". $date ."].";
                    $notifcategory = "user";
                    $notifsql = "INSERT INTO notification (message, category, email) VALUES ('$notifmessage', '$notifcategory', '$email')";
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
