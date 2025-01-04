<?php
session_start();
include('connect.php');
if (isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM cart WHERE email = '$email' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '
        <div class="mb-2">
            <small>Recently Added Products</small>
        </div>
        ';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="row">
                <div>
                    <img src="'. $row["thumbnail"] .'" class="cart-header-img" alt="X">
                </div>
                <div>
                    <small>'. $row["title"] .'</small>
                </div>
                <div>
                    <small>₱'. $row["price"] .'</small>
                </div>
            </div>
            ';
        }
        mysqli_free_result($result);
    } else {
        echo '
        <div class="row my-auto">
            <small class="py-2" style="width: 100%; text-align: center; margin-block: auto;">
                Your cart is empty.
            </small>
        </div>
        ';
    }
}
mysqli_close($conn);
?>