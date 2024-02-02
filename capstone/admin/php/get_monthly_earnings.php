<?php
include("connect.php");
$sql = "SELECT DAY(deyt) AS day, earn
    FROM earning
    WHERE DATE_FORMAT(deyt, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')
      AND DAY(deyt) <= DAY(CURDATE())
    ORDER BY deyt;";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $dailyEarnings = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $earnings = floatval(str_replace(',', '', $row['earn']));
        $dailyEarnings[] = $earnings;
    }
    echo json_encode(['data' => $dailyEarnings], JSON_NUMERIC_CHECK);
    mysqli_free_result($result);
} else {
    $fallbackData = [];
    for ($i = 1; $i <= 31; $i++) {
        $fallbackData[] = $i;
    }

    echo json_encode(['data' => $fallbackData], JSON_NUMERIC_CHECK);
}
mysqli_close($conn);
?>