<?php
include("connect.php");
$logo = 0;
$necklace = 0;
$table = 0;
$other = 0;
$sql = "SELECT category, quantity FROM inventory";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['category'] === 'Logo') {
            $logo += $row['quantity'];
        } else if ($row['category'] === 'Necklace') {
            $necklace += $row['quantity'];
        } else if ($row['category'] === 'Table') {
            $table += $row['quantity'];
        } else if ($row['category'] === 'Other') {
            $other += $row['quantity'];
        }
    }
    echo $logo . ', ' . $necklace . ', ' . $table . ', ' . $other;
}
mysqli_close($conn);
?>