<?php
include("connect.php");
$id = $_POST["id"];
$sql = "SELECT * FROM inventory WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['material'] . ', ' . $row['quantity'] . ', ' . $row['category'];
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
