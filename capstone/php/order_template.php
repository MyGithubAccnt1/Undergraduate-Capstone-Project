<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$date = $_SESSION['date'];
$title = "Customize Item";
$total = 0;
$status = "For Review";

$checksql = "SELECT * FROM history WHERE email = ? and deyt = ?";
$checkstmt = $conn->prepare($checksql);
$checkstmt->bind_param("ss", $email, $date);
$checkstmt->execute();
$checkresult = $checkstmt->get_result();

if ($checkresult->num_rows > 0) {

} else {

    $insertSql = "INSERT INTO history (email, title, total, deyt, status) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ssdss", $email, $title, $total, $date, $status);

    if ($insertStmt->execute()) {

        $notifmessage = "[". $email ."] successfully completed an order of [". $title ."].";
        $notifcategory = "order";
        $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
        $notifresult = mysqli_query($conn, $notifsql);

    } else {
        echo "Error making order: " . $insertStmt->error;
        sleep(2);
        header("Location: ../make-customize.php");
    }

}

$insertStmt->close();
$checkstmt->close();
$conn->close();
?>
