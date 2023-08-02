<?php
include("connect.php");

$date = date('Y-m-d H:i');

// Fetch comments from the database
$sql = "SELECT * FROM comments ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Display comments as HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="comment">';
    echo "<p>{$row['name']} ({$row['timestamp']}):</p>";
    echo "<p>{$row['comment']}</p>";
    echo '</div>';
}

mysqli_close($conn);
?>
