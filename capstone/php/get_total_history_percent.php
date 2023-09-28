<?php
include("connect.php");

$totalAccount = 0;
$totalOrder = 0;
$orderPercent = 0;

$sql = "SELECT COUNT(*) AS total_rows FROM account";
$result = $conn->query($sql);

if ($result === false) {
    echo "Query error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalAccount = $row["total_rows"];
    }
}

$newsql = "SELECT COUNT(*) AS total_rows FROM history";
$newresult = $conn->query($newsql);

if ($newresult === false) {
    echo "Query error: " . $conn->error;
} else {
    if ($newresult->num_rows > 0) {
        $row = $newresult->fetch_assoc();
        $totalOrder = $row["total_rows"];
    }
}

if ($totalAccount > 0) {
    $orderPercent = ($totalOrder / $totalAccount) * 100;
    $orderPercent = number_format($orderPercent, 2);
}

echo $orderPercent;

$conn->close();
?>
