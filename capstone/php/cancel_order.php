<?php
session_start(); // Start the session

include("connect.php"); // Include your database connection

$email = $_SESSION['email'];
$date = mysqli_real_escape_string($conn, $_POST['date']);

$newsql = "SELECT status FROM history WHERE email = '$email' AND deyt = '$date'";
$result = mysqli_query($conn, $newsql);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if ($row) {

    $status = $row['status'];

    if ($status === "Pending" || $status === "For Review") {

        $status = "Canceled";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
        $stmt->bind_param("sss", $status, $email, $date);

        if ($stmt->execute()) {

            echo "1";

        } else {

            echo "2";

        }

        $stmt->close();

    } else {
        echo "3";
    }
} else {

    echo "4";

}

$conn->close(); // Close the database connection
?>
