<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

$sql = "SELECT * FROM cart WHERE email = '$email' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '
    <div class="row">
        <div>
            
        </div>
        <div>
            <small>NAME</small>
        </div>
        <div>
            <small>PRICE</small>
        </div>
        <div>
            <small>QTY</small>
        </div>
        <div>
            <small>TOTAL</small>
        </div>
        <div>
            
        </div>
    </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="row">
            <div class="img-box">
                <img src="'. $row["thumbnail"] .'" class="cart-img img-responsive" alt="X">
                <input type="hidden" value="'. $row["thumbnail"] .'" name="image">
            </div>
            <div>
                <small>'. $row["title"] .'</small>
            </div>
            <div>
                <small>₱'. $row["price"] .'</small>
            </div>
            <div>
                <small>'. $row["qty"] .'</small>
            </div>
            <div>
                <small>₱'. $row["total"] .'</small>
            </div>
            <div>
                <form action="" id="delete">
                    <input type="hidden" value="'. $row["id"] .'" name="id">
                    <button type="submit" title="Delete this item" class="btn btn-sm btn-outline-danger rounded-0">X</button>
                </form>
            </div>
        </div>
        ';
    }
    mysqli_free_result($result);
} else {
    echo '
    <div class="row">
        <small style="width: 100%; text-align: center; margin-block: auto;">
            Your cart is empty.
        </small>
    </div>
    ';
}
mysqli_close($conn);
?>