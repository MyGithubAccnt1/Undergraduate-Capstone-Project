<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$input_fname = $_POST['fname'];
$input_lname = $_POST['lname'];
$input_mnumber = $_POST['mnumber'];
$input_email = $_POST['email'];
$input_caddress = $_POST['caddress'];

// Initialize variables
$title = "";
$qty = "";
$price = "";
$total = 0;

$sql = "SELECT title, qty, price FROM cart WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title .= $row["title"] . ', ';
        $subtotal = $row["qty"] * $row["price"];
        $total += $subtotal;
    }

    $date = date('Y-m-d H:i');
    $status = "Pending";
    $title = rtrim($title, ', ');

    $checksql = "SELECT * FROM history WHERE email = ? and deyt = ?";
    $checkstmt = $conn->prepare($checksql);
    $checkstmt->bind_param("ss", $email, $date);
    $checkstmt->execute();
    $checkresult = $checkstmt->get_result();

    if ($checkresult->num_rows > 0) {
        
        echo "2";

    } else {

        $insertSql = "INSERT INTO history (email, title, total, deyt, status, input_fname, input_lname, input_mnumber, input_email, input_caddress) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ssdsssssss", $email, $title, $total, $date, $status, $input_fname, $input_lname, $input_mnumber, $input_email, $input_caddress);

        if ($insertStmt->execute()) {

            $sql = "SELECT title, qty, price FROM cart WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $newSql = "INSERT INTO `order` (title, qty, price, email, deyt) VALUES (?, ?, ?, ?, ?)";
                    $newStmt = $conn->prepare($newSql);
                    $newStmt->bind_param("ssdss", $row["title"], $row["qty"], $row["price"], $email, $date);
                    $newStmt->execute();
                    $newStmt->close();
                }

                $deleteSql = "DELETE FROM cart WHERE email = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("s", $email);
                
                if ($deleteStmt->execute()) {

                    echo "4";

                    $notifmessage = "[". $email ."] successfully completed an order of [". $title ."].";
                    $notifcategory = "order";
                    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
                    $notifresult = mysqli_query($conn, $notifsql);

                } else {

                    echo "5";

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
$conn->close();
?>
