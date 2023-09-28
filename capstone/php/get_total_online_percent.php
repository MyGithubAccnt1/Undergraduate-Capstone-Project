<?php
include("connect.php");

$totalAccount = 0;
$totalOnline = 0;
$onlinePercent = 0;

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

$newsql = "SELECT COUNT(*) AS total_rows FROM account WHERE status = 'Online'";
$newresult = $conn->query($newsql);

if ($newresult === false) {
    echo "Query error: " . $conn->error;
} else {
    if ($newresult->num_rows > 0) {
        $row = $newresult->fetch_assoc();
        $totalOnline = $row["total_rows"];
    }
}

if ($totalAccount > 0) {
    $onlinePercent = ($totalOnline / $totalAccount) * 100;
    $onlinePercent = number_format($onlinePercent, 2);
}

echo $onlinePercent;

$conn->close();
?>
