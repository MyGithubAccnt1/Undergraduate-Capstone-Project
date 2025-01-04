<?php
include('connect.php');

$sql = "WITH LatestMessages AS (
    SELECT
        email,
        message,
        deyt,
        timestamp,
        seen,
        ROW_NUMBER() OVER (PARTITION BY deyt, email ORDER BY timestamp DESC) AS rn
    FROM message
)
SELECT DISTINCT deyt, email, message, timestamp, seen
FROM LatestMessages
WHERE rn = 1
ORDER BY seen ASC, timestamp DESC";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo '
	<div class="row text-center pt-2"><h2>CONTACTS</h2></div>
	';
	while ($row = $result->fetch_assoc()) {
		if ($row['deyt']) {
			echo '
				<div class="row w-100 mx-auto" type="button" onclick="ShowMessages(\'' . $row['email'] . '\', \'' . date('Y-m-d H:i', strtotime($row['deyt'])) . '\');">
			';
		} else {
			echo '
				<div class="row w-100 mx-auto" type="button" onclick="ShowMessages(\'' . $row['email'] . '\', ' . $row['deyt'] . ');">
			';
		}
			echo '<div class="col-10">
				<div class="row">
					<small>' . $row['email'] . '</small>
				</div>
				<div class="row">
					<small>' . $row['message'] . ' - ' . $row['timestamp'] . '</small>
				</div>
			</div>
			<div class="col-2 d-flex align-items-center">';
				if ($row['seen'] == "No") {
					echo '<span class="font-monospace bg-danger px-2 py-0 text-white rounded-pill">NEW</span>';
				}
			echo '</div>
		</div>
		';
	}
} else {
	echo '
	<div class="row text-center pt-2"><h2>CONTACTS</h2></div>
	<div class="row text-center mt-5"><small>NO ONE SENT A MESSAGE</small></div>
	';
}
mysqli_close($conn);
?>