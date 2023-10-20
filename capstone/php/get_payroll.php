<?php
include("connect.php");
$sql = "SELECT * FROM payroll ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Database has data, so proceed with displaying the comments
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<form class="dynamic-form" action="">';
            echo '<input type="hidden" name="id" value="'. $row['id'] .'">';
            echo '<input type="hidden" name="name" value="'. $row['name'] .'">';
            echo '<input type="hidden" name="position" value="'. $row['position'] .'">';
            echo '<input type="hidden" name="deyt" value="'. $row['deyt'] .'">';
            echo '<input type="hidden" name="salary" value="'. $row['salary'] .'">';
            echo '<button type="submit" class="record">';
                echo '<div class="record-1">'. $row['name'] .'</div>';
                echo '<div class="record-2">'. $row['position'] .'</div>';
                echo '<div class="record-3">'. $row['deyt'] .'</div>';
                echo '<div class="record-4">PHP '. $row['salary'] .'</div>';
            echo '</button>';
        echo '</form>';
    }
    mysqli_free_result($result);
} else {
    echo '<div style="width: 100%; text-align: center; margin-top: 10px;">';
        echo '<small>There are currently no records.</small>';
    echo '</div>';
}
mysqli_close($conn);
?>
