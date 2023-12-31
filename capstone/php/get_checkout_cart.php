<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

$sql = "SELECT * FROM cart WHERE email = '$email' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$total = 0;
$sub_total = 0;

if (mysqli_num_rows($result) > 0) {

    echo '
        <div class="row text-center" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="col-5">
                Product Name
            </div>
            <div class="col-2">
                QTY
            </div>
            <div class="col-5">
                Price
            </div>
        </div>
    ';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="row text-start border" style="border-style: none none solid none !important;">
                <div class="col-5">
                    '. $row['title'] .'
                </div>
                <div class="col-2 text-center">
                    '. $row['qty'] .'
                </div>
                <div class="col-5">
                    PHP '. $row['price'] .'
                </div>
            </div>
        ';
        $total = $total + floatval(str_replace([','], '', $row['total']));
    }
    $formatted_total = number_format($total, 2);
    echo '
        <div class="row text-center" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="col-12 text-end">
                Total: PHP '. $formatted_total .'
            </div>
        </div>
        <div class="row text-start border" style="border-style: none none solid none !important;">
            <div class="col-5">
                Shipping Fee
            </div>
            <div class="col-2 text-center">
                Free
            </div>
            <div class="col-5">
                PHP 0.00
            </div>
        </div>
        <div class="row text-center" style="background-color: rgba(0, 0, 0, 0.1);">
            <div class="col-12 text-end">
                Sub-Total: PHP '. $formatted_total .'
            </div>
        </div>
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