<?php
session_start();
include("connect.php");

$email = $_POST['email'];

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $sql = "SELECT * FROM message WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['seen'] === 'No') {
                $seen = 'Yes';
                $id = $row['id'];
                $updateSql = "UPDATE message SET seen = ? WHERE id = ?";
                $stmt = $conn->prepare($updateSql);
                $stmt->bind_param("ss", $seen, $id);
                $stmt->execute();
            }
        }
    }
} else {
    $sql = "SELECT * FROM message WHERE email = '$email' and deyt IS NULL";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['seen'] === 'No') {
                $seen = 'Yes';
                $id = $row['id'];
                $updateSql = "UPDATE message SET seen = ? WHERE id = ?";
                $stmt = $conn->prepare($updateSql);
                $stmt->bind_param("ss", $seen, $id);
                $stmt->execute();
            }
        }
    }
}
mysqli_close($conn);
?>
