<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$date = $_SESSION['date'];
$title = "Customize Item";
$total = 0;
$status = "For Review";
$input_fname = $_POST['fname'];
$input_lname = $_POST['lname'];
$input_mnumber = $_POST['mnumber'];
$input_email = $_POST['email'];
$input_caddress = $_POST['caddress'];

$checksql = "SELECT * FROM history WHERE email = ? and deyt = ?";
$checkstmt = $conn->prepare($checksql);
$checkstmt->bind_param("ss", $email, $date);
$checkstmt->execute();
$checkresult = $checkstmt->get_result();

if ($checkresult->num_rows > 0) {

    echo "1";

} else {

    $insertSql = "INSERT INTO history (email, title, total, deyt, status, input_fname, input_lname, input_mnumber, input_email, input_caddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("ssdsssssss", $email, $title, $total, $date, $status, $input_fname, $input_lname, $input_mnumber, $input_email, $input_caddress);

    if ($insertStmt->execute()) {

        echo "2";

        $notifmessage = "[". $email ."] successfully completed an order of [". $title ."].";
        $notifcategory = "order";
        $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
        $notifresult = mysqli_query($conn, $notifsql);

    } else {

        echo "3";

    }

}

$insertStmt->close();
$checkstmt->close();
$conn->close();
?>
