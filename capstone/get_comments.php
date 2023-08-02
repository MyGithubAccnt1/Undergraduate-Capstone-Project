<?php
session_start();
include("connect.php");
$title = $_SESSION['title'];

// Fetch comments from the database
$sql = "SELECT * FROM comments WHERE title = '$title' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Checking if the query was successful
if (mysqli_num_rows($result) == 0) {
    // No rows were returned, so the result is empty
   echo '<div class="comment card p-3 mx-4">';
    echo '<div class="d-flex justify-content-between align-items-center">';
    echo '<div class="d-flex flex-row align-items-center">';
    echo '<span><small class="font-weight-bold text-warning">[';
    echo 'Administrator]</small> ';
    echo '<small class="font-weight-bold">says: ';
    echo 'Be the first one to leave your comment.</small></span>';
    echo '</div>';
    echo '<small class="text-danger">Verified</small>';
    echo '</div>';
    echo '</div>';
} else {
    // Rows were returned, so you can display the data as usual
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="comment card p-3 mx-4">';
        echo '<div class="d-flex justify-content-between align-items-center">';
        echo '<div class="d-flex flex-row align-items-center">';
        echo '<span><small class="font-weight-bold text-primary">[User: ';
        echo "{$row['name']}]</small> ";
        echo '<small class="font-weight-bold">says: ';
        echo "{$row['comment']}</small></span>";
        echo '</div>';
        echo "<small>{$row['date']}</small>";
        echo '</div>';
        echo '</div>';
    }
    mysqli_free_result($result);
}
// Don't forget to close the database connection when you're done with it
mysqli_close($conn);
?>
