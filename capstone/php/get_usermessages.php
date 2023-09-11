<?php
include('connect.php');
$id = 0;
$sql = "WITH LatestMessages AS (
    SELECT
        sender,
        email,
        message,
        deyt,
        timestamp,
        ROW_NUMBER() OVER (PARTITION BY deyt, sender ORDER BY timestamp DESC) AS rn
    FROM message
)
SELECT DISTINCT deyt, sender, email, message, timestamp
FROM LatestMessages
WHERE rn = 1
ORDER BY timestamp DESC;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$id = $id + 1;
		echo '<form id="users-container">';
		echo '<button type="submit" style="width: 100%; background-color: inherit;">';
		echo '<div class="reminders" style="margin-top: 10px;">';
		echo '<div class="notification add-reminder">';
		echo '<input type="hidden" name="id" value="' . $row['sender'] . '"/>';
	    echo '<input type="hidden" name="email" value="' . $row['email'] . '"/>';
	    echo '<input type="hidden" name="date" value="' . $row['deyt'] . '"/>';
    	include('connect.php');
    	$rowsql = "SELECT DISTINCT email, deyt FROM message ORDER BY id DESC";
    	$rowresult = $conn->query($rowsql);
    	if ($rowresult) {
    		$row_count = $rowresult->num_rows;
    		echo'<input type="hidden" name="row" value="' . $row_count . '"/>';
		} else {

		}
		echo '<span style="margin-right: 75px;">';
		echo '<small>' . $row['email'] . '</small>';
		echo '</span>';
		echo '<small class="text_muted">';
		echo $row['deyt'];
		echo '</small>';
		echo '<span class="alert">NEW</span>';
		echo '</div>';
		echo '</div>';
		echo '</button>';
		echo '</form>';
	}
} else {
	echo '<div class="d-flex justify-content-center mt-5">';
	echo '<small>No message found.</small>';
	echo '</div>';
}
$conn->close();
?>