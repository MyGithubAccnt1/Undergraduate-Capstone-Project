<?php
include("connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];

    if ($date) {
        $sql = "SELECT * FROM message WHERE email = '$email' and deyt = '$date' ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM message WHERE email = '$email' and deyt IS NULL ORDER BY id DESC";
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            if ($row['role'] === 'Admin'){
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-left: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                                echo '<small>: ' . $row['message'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div>';
                echo '</div>';
            }else{
                echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-right: auto; transform: scaleY(-1);">';
                    echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="d-flex flex-row align-items-center ellipsis">';
                            echo '<div style="width: 100%;">';
                                echo '<small class="font-weight-bold text-primary">' . $row['email'] . '</small>';
                                echo '<small>: ' . $row['message'] . '</small>';
                            echo '</div>';
                        echo '</div>';
                        echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div>';
                echo '</div>';
            }

        }
        mysqli_free_result($result);
    } else {
        echo '<div class="card p-3" style="width: 95%; margin: 20px auto; transform: scaleY(-1);">';
            echo '<div class="d-flex justify-content-between align-items-center">';
                echo '<div class="d-flex flex-row align-items-center">';
                    echo '<span>';
                        echo '<small class="font-weight-bold text-warning">[System]</small>';
                        echo '<small>: The user did not send a message yet.</small>';
                    echo '</span>';
                echo '</div>';
                echo '<small class="text-warning">Verified</small>';
            echo '</div>';
        echo '</div>';
    }
}
mysqli_close($conn);
?>
