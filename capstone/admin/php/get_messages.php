<?php
session_start();
include("connect.php");
$data = $_GET['data'];
$data = explode(' ', $data);
$date = null;
$sql = '';
if ($data[1]) {
    $date = $data[1] . ' ' . $data[2];
    $sql = "SELECT * FROM message WHERE email = '$data[0]' and deyt = '$date' ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM message WHERE email = '$data[0]' and deyt IS NULL ORDER BY id DESC";
}
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['role'] === 'Admin'){
            echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-left: auto; transform: scaleY(-1);">';
                echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div class="d-flex flex-row align-items-center">';
                        echo '<span>';
                            echo '<small class="font-weight-bold text-warning">[Administrator]</small>';
                            echo '<small>: ';
                            echo "{$row['message']}</small>";
                        echo '</span>';
                    echo '</div>';
                    echo "<small>{$row['timestamp']}</small>";
                echo '</div>';
            echo '</div>';
        }else{
            echo '<div class="card p-3" style="width: 85%; margin: 20px; margin-right: auto; transform: scaleY(-1);">';
                echo '<div class="d-flex justify-content-between align-items-center">';
                    echo '<div style="display: flex; align-items: center; justify-content: space-around; width: 100%;">';
                        echo '<div class="ellipsis" style="flex: 75%; text-align: left;">';
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
    echo '<div class="text-center text-danger w-100" style="transform: scaleY(-1); position: absolute; top: 10px;">';
        if ($date) {
            echo '<small>ORDER DATE: '. $date .'</small>';
        } else {
            echo '<small>CUSTOMER SUPPORT</small>';
        }
        
    echo '</div>';
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
