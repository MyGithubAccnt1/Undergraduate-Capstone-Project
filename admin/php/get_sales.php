<?php
include("connect.php");
$sql = "SELECT * FROM earning ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo'
    <thead>
        <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Orders</th>
        </tr>
    </thead>
    <tbody>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
            <th>'. $row['deyt'] .'</th>
            <th>'. $row['earn'] .'</th>
            <th>'. $row['order'] .'</th>
        </tr>
        ';
    }
    echo'
    </tbody>
    ';
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
