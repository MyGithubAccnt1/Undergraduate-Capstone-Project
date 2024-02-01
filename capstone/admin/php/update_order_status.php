<?php
include("connect.php");
$id = $_POST["id"];
$status = $_POST["status"];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $sql = "UPDATE history SET status = '$status' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if ($status === 'Delivered') {
        $earn = $row['total'];
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $sql = "SELECT * FROM earning WHERE deyt = '$date'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            $order = $row['order'] + 1;
            $sql = "UPDATE earning SET earn = '$earn', `order` = '$order' WHERE deyt = '$date'";
            $result = mysqli_query($conn, $sql);
        } else {
            $order = 1;
            $sql = "INSERT INTO earning (earn, deyt, `order`) VALUES ('$earn', '$date', '$order')";
            $result = mysqli_query($conn, $sql);
        }
    }
    
    $notifmessage = "An [Admin] has updated an order status with id [". $id ."].";
    $notifcategory = "order";
    $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
    $notifresult = mysqli_query($conn, $notifsql);
}
mysqli_close($conn);
?>
