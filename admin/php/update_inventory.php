<?php
include("connect.php");
$id = $_POST['id'];
$material = mysqli_real_escape_string($conn, $_POST['material']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d');
$sql = "SELECT * FROM inventory WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE inventory SET material = '$material', quantity = '$quantity', category = '$category', deyt = '$date' WHERE id = '$id'";
    $conn->query($sql);
    echo "1";
    $notifmessage = "An [Admin] has updated [". $material ."] in inventory on [". $date ."].";
    $notifcategory = "inventory";
    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
    $notifresult = mysqli_query($conn, $notifsql);
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
