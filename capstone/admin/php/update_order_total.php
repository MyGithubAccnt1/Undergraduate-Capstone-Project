<?php
include("connect.php");
$id = $_POST["id"];
$total = $_POST["total"];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];

    $sql = "UPDATE `order` SET price = '$total' WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);

    $total = null;

    $sql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $total = $total + ($row['price'] * $row['qty']);
    }

    $total = number_format($total, 2, '.', ',');

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

    $notifsql = "INSERT INTO notification (message, category, email) VALUES (?, ?, ?)";
    $notifstmt = $conn->prepare($notifsql);
    $notifstmt->bind_param("sss", $notifmessage, $notifcategory, $email);
    if ($notifstmt->execute()) {
        $notifstmt->close();
    }
}
mysqli_close($conn);
?>
