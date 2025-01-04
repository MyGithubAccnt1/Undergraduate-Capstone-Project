<?php
session_start();
include('connect.php');
$category = $_GET['category'];

if (isset($_SESSION['email'])) {
    if ($category === "Necklace") {
        echo '
            <div class="col-md-12 text-center">
                <div class="row gy-3 p-3">
                    <div class="col-sm-12 col-md-6">
                        <h4 id="price" class="m-1"></h4>
                    </div>
                    <div class="col-sm-12 col-md-6" style="display: flex; justify-content: center; align-items: center;">
                        <h5 style="margin-right: 5px;">Quantity: </h5>
                        <input type="number" id="quantity" value="1" style="width: 45px;">
                    </div>
                </div>
            </div>
            
            <h5>DESCRIPTION</h5>
            <p id="decription"></p>
            <div class="col-md-12 text-center" id="options">
                <div class="row gy-3 p-3">
                    <div class="col-sm-12 col-md-6">
                        <button class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill" type="button" onclick="add_to_cart();">Add to Cart</button>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <button class="btn btn-sm btn-outline-danger py-1 w-75 rounded-pill" type="button" onclick="buy_now();">Buy Now</button>
                    </div>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="col-md-12 text-center">
                <div class="row p-3">
                    <div class="col-sm-12 col-md-6 mx-auto" style="display: flex; justify-content: center; align-items: center;">
                        <h5 style="margin-right: 5px;">Quantity: </h5>
                        <input type="number" id="quantity" value="1" style="width: 45px;">
                    </div>
                </div>
            </div>
            
            <h5>DESCRIPTION</h5>
            <p id="decription"></p>
            <div class="col-md-12 text-center" id="options">
                <div class="row p-3">
                    <div class="col-sm-12 col-md-6 mx-auto">
                        <button class="btn btn-sm btn-outline-success py-1 w-50 rounded-pill" type="button" onclick="make_customize();">Customize Now</button>
                    </div>
                </div>
            </div>
        ';
    }
} else {
    if ($category === "Necklace") {
        echo '
            <div class="col-md-12 text-center">
                <div class="row gy-3 p-3">
                    <div class="col-sm-12 col-md-6">
                        <h4 id="price" class="m-1"></h4>
                    </div>
                    <div class="col-sm-12 col-md-6" style="display: flex; justify-content: center; align-items: center;">
                        <h5 style="margin-right: 5px;">Quantity: </h5>
                        <input type="number" id="quantity" value="1" style="width: 45px;">
                    </div>
                </div>
            </div>
            
            <h5>DESCRIPTION</h5>
            <p id="decription"></p>
            <div class="col-md-12 text-center" id="options">
                <div class="row gy-3 p-3">
                    <div class="col-sm-12 col-md-6">
                        <button class="btn btn-sm btn-outline-success py-1 w-75 rounded-pill" type="button" onclick="redirect_to_login();">Add to Cart</button>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <button class="btn btn-sm btn-outline-danger py-1 w-75 rounded-pill" type="button" onclick="redirect_to_login();">Buy Now</button>
                    </div>
                </div>
            </div>
        ';
    } else {
        echo '
            <div class="col-md-12 text-center">
                <div class="row p-3">
                    <div class="col-sm-12 col-md-6 mx-auto" style="display: flex; justify-content: center; align-items: center;">
                        <h5 style="margin-right: 5px;">Quantity: </h5>
                        <input type="number" id="quantity" value="1" style="width: 45px;">
                    </div>
                </div>
            </div>
            
            <h5>DESCRIPTION</h5>
            <p id="decription"></p>
            <div class="col-md-12 text-center" id="options">
                <div class="row p-3">
                    <div class="col-sm-12 col-md-6 mx-auto">
                        <button class="btn btn-sm btn-outline-success py-1 w-50 rounded-pill" type="button" onclick="make_customize();">Customize Now</button>
                    </div>
                </div>
            </div>
        ';
    }
}
mysqli_close($conn);
?>