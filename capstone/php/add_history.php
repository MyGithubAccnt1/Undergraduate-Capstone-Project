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
}
$date = date('Y-m-d H:i');
$status = "Pending";
$title = rtrim($title, ', ');
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
                $deleteSql = "DELETE FROM cart WHERE email = ?";
                $deleteStmt = $conn->prepare($deleteSql);
                $deleteStmt->bind_param("s", $email);
                
                if ($deleteStmt->execute()) {
                    echo "<script>alert('Notice: Order has been submitted successfully.')</script>";
                    $script = "<script>window.location = '../view_order.php';</script>";
                    echo $script;
                } else {
                    echo "Error deleting cart items: " . $deleteStmt->error;
                    sleep(2);
                    header("Location: ../proceed.php");
                }

            } else {
                // Handle the error if insertion fails
                echo "Error inserting into `order`: " . $newStmt->error;
            }
            // Close the statement after each iteration
            $newStmt->close();
        }

    }

} else {
    echo "Error inserting into history: " . $insertStmt->error;
    sleep(2);
    header("Location: ../proceed.php");
}

$insertStmt->close();
$deleteStmt->close();
$conn->close();
?>
