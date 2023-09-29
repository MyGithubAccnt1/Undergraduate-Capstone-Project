<?php
include("connect.php");

$totalOrder = 0;
$totalEstimate = 0;
$estimatePercent = 0;

$sql = "SELECT COUNT(*) AS total_rows FROM history";
$result = $conn->query($sql);

if ($result === false) {
    echo "Query error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalOrder = $row["total_rows"];
    } else {

    }
}

$newsql = "SELECT COUNT(*) AS total_rows FROM history WHERE status = 'Delivered'";
$newresult = $conn->query($newsql);

if ($newresult === false) {
    echo "Query error: " . $conn->error;
} else {
    if ($newresult->num_rows > 0) {
        $row = $newresult->fetch_assoc();
        $totalEstimate = $row["total_rows"];
    } else {

    }
}

if ($totalOrder > 0) {
    $estimatePercent = ($totalEstimate / $totalOrder) * 100;
    $estimatePercent = number_format($estimatePercent, 2);
}

echo $estimatePercent;

$conn->close();
?>