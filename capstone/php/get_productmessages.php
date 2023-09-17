<?php
include("connect.php");
// Get the form data
$email = $_GET["email"];
$date = $_GET["date"];

$newsql = "UPDATE message SET seen = 'Yes' WHERE email = '$email' and deyt = '$date'";
$result = mysqli_query($conn, $newsql);

// Fetch comments from the database
$sql = "SELECT * FROM message WHERE email = '$email' and deyt = '$date' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

// Checking if the query was successful
if (mysqli_num_rows($result) > 0) {
    // Database has data, so proceed with displaying the comments
    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['role'] === 'Admin'){

            echo '<div class="card" style="margin-left: auto;">';
            echo '<div style="display: flex; flex-direction: row; justify-content: start; align-items: center; width: 100%; margin-left: 50px;">';
            echo '<span><small style="color: #FFC107;">[Administrator] </small>';
            echo '<small style="margin-left: 6px;">says: ';
            echo "{$row['message']}</small></span>";
            echo '<div style="margin-left: auto; margin-right: 50px;">';
            echo "<small>{$row['timestamp']}</small>";
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }else{

            echo '<div class="card" style="margin-right: auto;">';
            echo '<div style="display: flex; flex-direction: row; justify-content: start; align-items: center; width: 100%; margin-left: 50px;">';
            echo '<span><small style="color: #0D6EFD;">[User: ';
            echo "{$row['sender']}]</small> ";
            echo '<small>says: ';
            echo "{$row['message']}</small></span>";
            echo '<div style="margin-left: auto; margin-right: 50px;">';
            echo "<small>{$row['timestamp']}</small>";
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }

    }
    // Don't forget to close the database connection when you're done with it
    mysqli_free_result($result);
} else {
    // Database is empty, so display a message or perform other actions
    echo '<div class="card" style="margin: 0 auto; margin-top: 25px;">';
    echo '<div style="display: flex; flex-direction: row; justify-content: space-around; align-items: center; width: 100%; margin-left: 10px;">';
    echo '<span>';
    echo '<small style="color: #FFC107; font-size: .85rem;">[Administrator]</small>';
    echo '<small style="font-size: .85rem; margin-left: 6px;">says: There is no existing messages found.</small>';
    echo '</span>';
    echo '<div>';
    echo '<small style="color: #DC3545; font-size: .85rem;">Verified</small>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
// Don't forget to close the database connection when you're done with it
mysqli_close($conn);
?>
