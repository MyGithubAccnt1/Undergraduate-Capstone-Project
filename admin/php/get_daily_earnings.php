<?php
include("connect.php");
$sql = "SELECT earn FROM earning WHERE DATE(deyt) = CURDATE();";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row["earn"];
} else {
    echo 0;
}
mysqli_close($conn);
?>