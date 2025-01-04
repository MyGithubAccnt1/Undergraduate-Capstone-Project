<?php
include("connect.php");
$sql = "SELECT * FROM notification WHERE email IS NULL ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo'
    <thead>
        <tr>
            <th>Content</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
            <th>'. $row['message'] .'</th>
            <th>'. $row['category'] .'</th>
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
