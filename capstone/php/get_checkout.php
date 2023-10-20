<?php
session_start(); 
include('connect.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM cart WHERE email = '$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<input type="hidden" id="proceed" value="go">';
    while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-5 text-start">
        	<span>'. $row["title"] . '</span>
        </div>
        <div class="col-3 text-center">
            <span style="margin: 0 5px;">' . $row["qty"] . '</span>
        </div>
        <div class="col-4 text-start">
        	<span>PHP' . $row["price"] . '</span>
        </div>
        ';
    }
} else {
    echo "<small>Your cart is empty.</small>";
    echo '<input type="hidden" name="proceed" value="no">';
}

mysqli_close($conn);
?>