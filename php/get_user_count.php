<?php
include("connect.php");

$sql = "SELECT COUNT(*) AS total_rows FROM account";
$result = $conn->query($sql);

if ($result === false) {
    echo "over 1000";
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalRows = $row["total_rows"];
        if ($totalRows < 999) {
            echo "over 1000";
        } else {
            echo $totalRows;
        }
    } else {
        echo "over 1000";
    }
}
mysqli_close($conn);
?>