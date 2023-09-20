<?php
include("connect.php");
$sql = "SELECT * FROM inventory ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Database has data, so proceed with displaying the comments
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<form class="dynamic-form" action="">';
            echo '<input type="hidden" name="id" value="'. $row['id'] .'">';
            echo '<input type="hidden" name="material" value="'. $row['material'] .'">';
            echo '<input type="hidden" name="quantity" value="'. $row['quantity'] .'">';
            echo '<input type="hidden" name="category" value="'. $row['category'] .'">';
            echo '<button type="submit" class="record">';
                echo '<div class="record-1">'. $row['material'] .'</div>';
                echo '<div class="record-2">'. $row['quantity'] .'</div>';
                echo '<div class="record-3">'. $row['category'] .'</div>';
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
