<?php
include("connect.php");
$sql = "SELECT COUNT(*) AS total_rows FROM account WHERE status = 'Online'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row["total_rows"];
}
mysqli_close($conn);
?>