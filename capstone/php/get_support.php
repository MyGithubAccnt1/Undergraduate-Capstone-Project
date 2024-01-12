<?php
session_start();
include("connect.php");
$email = $_SESSION["email"];

$sql = "SELECT * FROM message WHERE email = '$email' and deyt IS NULL ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['role'] === 'Admin'){
            echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-right: auto; transform: scaleY(-1);">';
                echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div class="d-flex flex-row align-items-center">';
                        echo '<span>';
                            echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                            echo '<small class="font-weight-bold">: ';
                            echo "{$row['message']}</small>";
                        echo '</span>';
                    echo '</div>';
                    echo "<small>{$row['timestamp']}</small>";
                echo '</div>';
            echo '</div>';
        }else{
            echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-left: auto; transform: scaleY(-1);">';
                echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div style="display: flex; align-items: center; justify-content: space-around; width: 100%;">';
                        echo '<div class="ellipsis" style="flex: 75%;">';
                            echo '<span><small class="font-weight-bold text-primary">';
                            echo "{$row['email']}</small>";
                            echo '<small class="font-weight-bold">: ';
                            echo "{$row['message']}</small></span>";
                        echo '</div>';
                        echo '<div>';
                            echo "<small>{$row['timestamp']}</small>";
                        echo '</div>';
                    echo '</div>';
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
                    echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                    echo '<small class="font-weight-bold">: Do not hesitate to ask questions.</small>';
                echo '</span>';
            echo '</div>';
            echo '<small class="text-warning">Verified</small>';
        echo '</div>';
    echo '</div>';
}
mysqli_close($conn);
?>
