<?php
session_start();
include("connect.php");

$data = $_POST['data'];
$data = explode(' ', $data);

if (isset($data[1]) && isset($data[2])) {
    $date = $data[1] . ' ' . $data[2];
    $sql = "SELECT * FROM message WHERE email = '$data[0]' and deyt = '$date'";
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
    $sql = "SELECT * FROM message WHERE email = '$data[0]' and deyt IS NULL";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
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
