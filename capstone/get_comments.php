<?php
include("connect.php");

// Fetch comments from the database
$sql = "SELECT * FROM comments ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Display comments as HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="comment card p-3 mx-4">';
    echo '<div class="d-flex justify-content-between align-items-center">';
    echo '<div class="d-flex flex-row align-items-center">';
    echo '<span><small class="font-weight-bold text-primary">User: ';
    echo "{$row['name']}</small> ";
    echo '<small class="font-weight-bold">';
    echo "{$row['comment']}</small> <small>{$row['date']}</small></span>";
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
mysqli_close($conn);
?>
