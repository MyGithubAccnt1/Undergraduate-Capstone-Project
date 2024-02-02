<?php
session_start();
include("connect.php");
$data = $_POST['data'];
$data = explode(' ', $data);
$sql = '';

if ($data[1]) {
    $date = $data[1] . ' ' . $data[2];
    $sql = "SELECT seen FROM message WHERE email = '$data[0]' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['seen'] === 'No') {
            $sql = "UPDATE message SET seen = 'Yes' WHERE email = '$data[0]' and deyt = '$date'";
            $result = mysqli_query($conn, $sql);
        }
    }
} else {
    $sql = "SELECT seen FROM message WHERE email = '$data[0]' and deyt IS NULL";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['seen'] === 'No') {
            $sql = "UPDATE message SET seen = 'Yes' WHERE email = '$data[0]' and deyt = '$date'";
            $result = mysqli_query($conn, $sql);
        }
    }
}
mysqli_free_result($result);
mysqli_close($conn);
?>
