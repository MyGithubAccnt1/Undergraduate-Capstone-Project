<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

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
        
        echo "<script>alert('Notice: Only 1 order can be made every minute per account.')</script>";
        $script = "<script>window.location = '../proceed.php';</script>";
        echo $script;

    } else {

        $insertSql = "INSERT INTO history (email, title, total, deyt, status) VALUES (?, ?, ?, ?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("ssdss", $email, $title, $total, $date, $status);

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
                    if ($newStmt->execute()) {
                        // Insertion was successful, now delete from cart
                    } else {
                        // Handle the error if insertion fails
                        echo "Error inserting into `order`: " . $newStmt->error;
                    }
                    // Close the statement after each iteration
                    $newStmt->close();
                }
                $deleteSql = "DELETE FROM cart WHERE email = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("s", $email);
                
                if ($deleteStmt->execute()) {
                    echo "<script>alert('Notice: Order has been submitted successfully.')</script>";
                    $script = "<script>window.location = '../view_order.php';</script>";
                    echo $script;

                    $notifmessage = "[". $email ."] successfully completed an order of [". $title ."].";
                    $notifcategory = "order";
                    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
                    $notifresult = mysqli_query($conn, $notifsql);
                } else {
                    echo "Error deleting cart items: " . $deleteStmt->error;
                    sleep(2);
                    header("Location: ../proceed.php");
                }
            }

        } else {
            echo "Error inserting into history: " . $insertStmt->error;
            sleep(2);
            header("Location: ../proceed.php");
        }

    }

    $insertStmt->close();
    $deleteStmt->close();
    $checkstmt->close();
} else {

    echo "<script>alert('Notice: Your cart is empty.')</script>";
    $script = "<script>window.location = '../index.php';</script>";
    echo $script;

}

$conn->close();
?>
