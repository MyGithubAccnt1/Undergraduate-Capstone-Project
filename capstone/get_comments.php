<?php
session_start();
include("connect.php");
$title = $_SESSION['title'];
$pdo = new PDO('mysql:host=localhost;dbname=sbm;charset=utf8', 'username', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Fetch comments from the database
$sql = "SELECT * FROM comments WHERE title = '$title' ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Checking if the query was successful
if ($stmt->rowCount() > 0) {
    // Database has data, so proceed with displaying the comments
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
    // Don't forget to close the database connection when you're done with it
    mysqli_free_result($result);
} else {
    // Database is empty, so display a message or perform other actions
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
}
// Don't forget to close the database connection when you're done with it
mysqli_close($conn);
?>
