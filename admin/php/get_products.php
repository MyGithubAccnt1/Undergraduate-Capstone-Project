<?php
include("connect.php");
$logo = 0;
$necklace = 0;
$table = 0;
$sql = "SELECT category FROM product";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['category'] === 'Logo') {
            $logo += 1;
        } else if ($row['category'] === 'Necklace') {
            $necklace += 1;
        }else if ($row['category'] === 'Table') {
            $table += 1;
        }
    }
    echo $logo . ', ' . $necklace . ', ' . $table;
}
mysqli_close($conn);
?>