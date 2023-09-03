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
        <div class="col-3 text-center">
        	<span>'. $row["title"] . '</span>
        </div>
        <div class="col-2 text-center">
        	<span>₱' . $row["price"] . '</span>
        </div>
        <div class="col-4 text-center d-flex justify-content-evenly">
            <form action="./php/minus_cart.php" method="POST">
                <input type="submit" value= "-" style="width: 25px;">
                <input type="hidden" value= "' . $row["qty"] . '" name="qty">
                <input type="hidden" value="' . $row["price"] . '" name="price">
                <input type="hidden" value="' . $row["id"] . '" name="id">
            </form>
        	<span style="margin: 0 5px;">' . $row["qty"] . '</span>
            <form action="./php/plus_cart.php" method="POST">
                <input type="submit" value= "+" style="width: 25px;">
                <input type="hidden" value= "' . $row["qty"] . '" name="qty">
                <input type="hidden" value="' . $row["price"] . '" name="price">
                <input type="hidden" value="' . $row["id"] . '" name="id">
            </form>
        </div>
        <div class="col-2 text-center">
        	<span>₱' . $row["total"] . '</span>
        </div>
        <div class="col-1 text-center mx-auto">
            <form action="./php/delete_cart.php">
                <input type="hidden" value="' . $row["id"] . '" name="id">
                <input type="submit" class="btn-main rounded-0 btn btn-md" value="X" onclick="return confirm_delete()">
            </form>
        </div>
        ';
    }
} else {
    echo '<small>Your cart is empty.</small>';
}
$conn->close();
?>