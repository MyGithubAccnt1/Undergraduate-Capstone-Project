<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

$sql = "SELECT * FROM notification WHERE email = '$email' AND unread = 'Yes'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $sql = "UPDATE notification SET unread = 'No' WHERE email = '$email' AND unread = 'Yes'";
        $result = mysqli_query($conn, $sql);
    }
}
mysqli_close($conn);
?>
