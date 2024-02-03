<?php
session_start();
include('connect.php');
$category = $_GET['category'];

if (isset($_SESSION['email'])) {
    if ($category === "Necklace") {
        echo '
            <div class="row gy-3 p-3">
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill" type="button" onclick="add_to_cart();">Add to Cart</button>
                </div>
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-sm btn-outline-danger py-1 w-75 rounded-pill" type="button" onclick="buy_now();">Buy Now</button>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="row p-3">
                <div class="col-sm-12 col-md-6 mx-auto">
                    <button class="btn btn-sm btn-outline-success py-1 w-50 rounded-pill" type="button" onclick="make_customize();">Customize Now</button>
                </div>
            </div>
        ';
    }
} else {
    if ($category === "Necklace") {
        echo '
            <div class="row gy-3 p-3">
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill" type="button" onclick="redirect_to_login();">Add to Cart</button>
                </div>
                <div class="col-sm-12 col-md-6">
                    <button class="btn btn-sm btn-outline-danger py-1 w-75 rounded-pill" type="button" onclick="redirect_to_login();">Buy Now</button>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="row p-3">
                <div class="col-sm-12 col-md-6 mx-auto">
                    <button class="btn btn-sm btn-outline-success py-1 w-50 rounded-pill" type="button" onclick="redirect_to_login();">Customize Now</button>
                </div>
            </div>
        ';
    }
}
mysqli_close($conn);
?>