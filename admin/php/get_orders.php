<?php
include("connect.php");
$sql = "SELECT * FROM history ORDER BY CASE WHEN status = 'Pending' THEN 0 ELSE 1 END, id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo'
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
            <th>'. $row['title'] .'</th>
            <th>'. $row['total'] .'</th>
            <th>'. $row['status'] .'</th>
            <th>'. $row['deyt'] .'</th>
            <th><button type="button" class="btn btn-sm btn-outline-success rounded-0" onclick="select_button('. $row['id'] .');">View</button></th>
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
