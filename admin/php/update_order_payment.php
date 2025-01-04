<?php
include("connect.php");
$id = $_POST["id"];
$payment = $_POST["payment"];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];

    $sql = "UPDATE history SET confirmed_payment = '$payment' WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>
