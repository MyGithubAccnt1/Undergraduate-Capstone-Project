<?php
include("connect.php");
$sql = "SELECT * FROM product ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo'
    <thead>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Category</th>
            <th>Popularity</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
            <th>'. $row['title'] .'</th>
            <th>'. $row['price'] .'</th>
            <th>'. $row['category'] .'</th>
            <th>'. $row['popularity'] .'</th>
            <th><button type="button" class="btn btn-sm btn-outline-success rounded-0" onclick="select_button('. $row['id'] .');" style="margin: 0 5px 5px 0;">View</button><button onclick="delete_button('. $row['id'] .');" type="button" class="btn btn-sm btn-outline-danger rounded-0" style="margin: 0 5px 5px 0;">Delete</button>
            </th>
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
