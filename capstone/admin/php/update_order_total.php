<?php
include("connect.php");
$id = $_POST["id"];
$total = $_POST["total"];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];

    $sql = "UPDATE history SET total = '$total' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `order` SET price = '$total' WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);

    $notifmessage = "An [Admin] has updated an order total with id [". $id ."].";
    $notifcategory = "order";
    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
    $notifresult = mysqli_query($conn, $notifsql);
}
mysqli_close($conn);
?>
