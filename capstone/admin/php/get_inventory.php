<?php
include("connect.php");
$sql = "SELECT * FROM inventory ORDER BY material ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo'
    <thead>
        <tr>
            <th>Material</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo'
        <tr>
            <th>'. $row['material'] .'</th>
            <th>'. $row['quantity'] .'</th>
            <th>'. $row['category'] .'</th>
            <th><button onclick="delete_button('. $row['id'] .');" type="button" class="btn btn-sm btn-outline-danger rounded-0" style="margin: 5px 5px 0 0;">Delete</button><button onclick="success_button('. $row['id'] .');" type="button" class="btn btn-sm btn-outline-success rounded-0" style="margin: 5px 5px 0 0;">Edit</button>
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
