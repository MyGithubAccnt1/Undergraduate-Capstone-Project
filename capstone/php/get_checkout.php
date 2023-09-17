<?php
session_start(); 
include('connect.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM cart WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-6 text-center">
        	<span>'. $row["title"] . '</span>
        </div>
        <div class="col-3 text-center">
            <span style="margin: 0 5px;">' . $row["qty"] . '</span>
        </div>
        <div class="col-3 text-center">
        	<span>₱' . $row["price"] . '</span>
        </div>
        ';
    }
} else {
    echo '<small>Your cart is empty.</small>';
}
$conn->close();
?>