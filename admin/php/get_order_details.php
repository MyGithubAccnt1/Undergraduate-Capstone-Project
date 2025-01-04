<?php
include("connect.php");
$id = $_GET["id"];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $date = $row['deyt'];
    $sql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        echo'
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            echo'
            <tr>
                <th>'. $row['title'] .'</th>
                <th>'. $row['price'] .'</th>
                <th>'. $row['qty'] .'</th>
                <th>'. $row['total'] .'</th>
            </tr>
            ';
        }
        echo'
        </tbody>
        ';
    }
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
