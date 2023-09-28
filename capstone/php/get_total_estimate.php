<?php
include("connect.php");
$total = 0;
$sql = "SELECT total FROM history WHERE status = 'Pending' OR status = 'On-The-Way'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $total = $total + $row['total'];
    }
    echo $total;
    mysqli_free_result($result);
} else {
    echo "0.00";
}
mysqli_close($conn);
?>
