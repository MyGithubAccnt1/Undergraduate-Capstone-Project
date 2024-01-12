<?php
include("connect.php");

$sql = "SELECT COUNT(*) AS total_rows FROM cart";
$result = $conn->query($sql);

if ($result === false) {
    echo "(0)";
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '('. $row["total_rows"] .')';
    } else {
        echo "(0)";
    }
}
mysqli_close($conn);
?>