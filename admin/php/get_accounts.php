<?php
include("connect.php");
$sql = "SELECT * FROM account ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo'
    <thead>
        <tr>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Date Created</th>
            <th>Verified Location</th>
        </tr>
    </thead>
    <tbody>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
            <th>'. $row['email'] .'</th>
            <th>'. $row['role'] .'</th>
            <th>'. $row['status'] .'</th>
            <th>'. $row['deyt'] .'</th>
            <th>'. $row['verified_location'] .'</th>
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
