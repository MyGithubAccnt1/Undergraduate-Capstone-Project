<?php
session_start(); // Start the session

include("connect.php"); // Include your database connection

$email = $_SESSION['email'];

// Escape user inputs and use prepared statements
$date = mysqli_real_escape_string($conn, $_REQUEST['date']);

$newsql = "SELECT status FROM history WHERE email = '$email' AND deyt = '$date'";
$result = mysqli_query($conn, $newsql);

if (!$result) {
    // Handle the query error, e.g., log it or show an error message
    die("Database query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if ($row) {

    $status = $row['status'];

    if ($status === "Pending") {

        $status = "Canceled";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
        $stmt->bind_param("sss", $status, $email, $date);

        if ($stmt->execute()) {
            echo "<script>alert('Notice: An order has been canceled successfully!')</script>";
            $script = "<script>window.location = '../view_order.php';</script>";
            echo $script;
        } else {
            echo "Error: " . $stmt->error;
            sleep(2);
            header("Location: ../view_order.php");
        }

        $stmt->close();

    } else {
        echo "<script>alert('Notice: You can not cancel the order at this time.')</script>";
        $script = "<script>window.location = '../view_order.php';</script>";
        echo $script;
    }
} else {
    echo "<script>alert('Notice: There is something wrong with the selected order.')</script>";
    $script = "<script>window.location = '../view_order.php';</script>";
    echo $script;
}

$conn->close(); // Close the database connection
?>
