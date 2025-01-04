<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

$sql = "SELECT * FROM cart WHERE email = '$email' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$total = 0;
$quantity = 0;
$sub_total = 0;

if (mysqli_num_rows($result) > 0) {

    echo '
        <div class="row text-center text-white bg-dark">
            <div class="col-5 text-start">
                <small>Product Name</small>
            </div>
            <div class="col-2">
                <small>QTY</small>
            </div>
            <div class="col-5 text-end">
                <small>Price</small>
            </div>
        </div>
    ';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="row text-start border" style="border-style: none none solid none !important;">
                <div class="col-5">
                    <small>'. $row['title'] .'</small>
                </div>
                <div class="col-2 text-center">
                    <small>'. $row['qty'] .'</small>
                </div>
                <div class="col-5 text-end">
                    <small>₱'. $row['price'] .'</small>
                </div>
            </div>
        ';
        $quantity = $quantity + str_replace([','], '', $row['qty']);
        $total = $total + floatval(str_replace([','], '', $row['total']));
    }
    $formatted_total = number_format($total, 2);
    echo '
        <div class="row text-center text-white bg-dark">
            <div class="col-6 text-start">
                <small>Items: '. $quantity .'</small>
            </div>
            <div class="col-6 text-end">
                <small>Total: ₱'. $formatted_total .'</small>
            </div>
        </div>
        <div class="row text-start border" style="border-style: none none solid none !important;">
            <div class="col-5">
                <small>Shipping Fee</small>
            </div>
            <div class="col-2 text-center">
                
            </div>
            <div class="col-5 text-end">
                <small>₱0.00</small>
            </div>
        </div>
        <div class="row text-center text-white bg-dark">
            <div class="col-12 text-end">
                <small>Sub-Total: ₱<b>'. $formatted_total .'</b></small>
            </div>
        </div>
        <input type="hidden" id="gcash-total" value="'. $formatted_total .'">
    ';
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