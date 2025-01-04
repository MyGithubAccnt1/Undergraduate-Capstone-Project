<?php
session_start();
include("connect.php");
$email = $_SESSION['email'];
$date = mysqli_real_escape_string($conn, $_POST['date']);

$sql = "SELECT status FROM history WHERE email = ? and deyt = ?";
$newstmt = $conn->prepare($sql);
$newstmt->bind_param("ss", $email, $date);
$newstmt->execute();
$newresult = $newstmt->get_result();

if ($newresult->num_rows > 0) {

    while ($row = $newresult->fetch_assoc()) {
        $status = $row['status'];

        if ($status === "Pending" || $status === "For Review") {
            $status = "Canceled";

            $stmt = $conn->prepare("UPDATE history SET status = ? WHERE email = ? AND deyt = ?");
            $stmt->bind_param("sss", $status, $email, $date);

            if ($stmt->execute()) {
                echo "1";
            }
            $stmt->close();
        }
    }
}
$newstmt->close();
mysqli_close($conn);
?>
