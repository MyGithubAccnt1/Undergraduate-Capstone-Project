<?php
session_start(); 
include("connect.php");
$title = mysqli_real_escape_string($conn, $_GET['title']);
$category = mysqli_real_escape_string($conn, $_GET['category']);

$sql = "SELECT * FROM comments WHERE title = '$title' and category = '$category' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if (isset($_SESSION['email']) AND $row['email'] === $_SESSION['email']) {

            if ($row['role'] === 'Admin'){
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-left: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                                echo '<small>: ' . $row['comment'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-left: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small class="font-weight-bold text-primary">' . $row['email'] . '</small>';
                                echo '<small>: ' . $row['comment'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div>';
                echo '</div>';
            }

        } else {

            if ($row['role'] === 'Admin'){
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-right: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                                echo '<small>: ' . $row['comment'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-right: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small class="font-weight-bold text-primary">' . $row['email'] . '</small>';
                                echo '<small>: ' . $row['comment'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div>';
                echo '</div>';
            }

        }

    }
    mysqli_free_result($result);
} else {
    echo '<div class="card p-3" style="width: 95%; margin: 20px auto; transform: scaleY(-1);">';
        echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<div class="d-flex flex-row align-items-center">';
                echo '<span>';
                    echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                    echo '<small class="font-weight-bold">: Be the first one to leave a comment.</small>';
                echo '</span>';
            echo '</div>';
            echo '<small class="text-warning">Verified</small>';
        echo '</div>';
    echo '</div>';
}
mysqli_close($conn);
?>
