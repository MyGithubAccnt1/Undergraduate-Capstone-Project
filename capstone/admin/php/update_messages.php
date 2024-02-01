<?php
session_start();
include("connect.php");
$data = $_POST['data'];
$data = explode(' ', $data);
$sql = '';
if ($data[1]) {
    $date = $data[1] . ' ' . $data[2];
    $sql = "UPDATE message SET seen = 'Yes' WHERE email = '$data[0]' and deyt = '$date'";
} else {
    $sql = "UPDATE message SET seen = 'Yes' WHERE email = '$data[0]' and deyt IS NULL";
}
$result = mysqli_query($conn, $sql);
mysqli_free_result($result);
mysqli_close($conn);
?>
