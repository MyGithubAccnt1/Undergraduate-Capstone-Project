<?php
include("connect.php");

$sql = "SELECT COUNT(*) AS total_rows FROM history";
$result = $conn->query($sql);

if ($result === false) {
    echo "Query error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalRows = $row["total_rows"];
        echo $totalRows;
    } else {
        echo $totalRows;
    }
}

$conn->close();
?>