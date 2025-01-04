<?php
session_start();
include('connect.php');
$details = $_GET['details'];
$quantity = $_GET['quantity'];

echo '
    <div class="row text-center text-white bg-dark">
        <div class="col-12">
            Details
        </div>
    </div>
';
$detailsArray = explode(', ', $details);
foreach ($detailsArray as $value) {
    if (strpos($value, ':') !== false) {
        if (strpos($value, 'Reference') !== false) {
            $details = explode(': ', $value);
            $image = $details[1];
            $image = str_replace('../', '', $image);
            echo '
                <div class="row text-start">
                    <div class="col-6 text-start" style="overflow-x: hidden;">
                        '. $details[0] .' :
                    </div>
                    <div class="col-6 text-start" style="overflow-x: hidden;">
                        <img src="'. $image .'" class="img-fluid">
                    </div>
                </div>
            ';
        } else {
            echo '
                <div class="row text-start border" style="border-style: none none solid none !important;">
                    <div class="col-12 text-start" style="overflow-x: hidden; overflow-wrap: break-word;">
                        '. $value .'
                    </div>
                </div>
            ';
        }
    } else {
        $image = $value;
        $image = str_replace('../', '', $image);
        echo '
            <div class="row text-start border" style="border-style: none none solid none !important;">
                <div class="col-6 text-end" style="overflow-x: hidden;">
                    
                </div>
                <div class="col-6 text-start" style="overflow-x: hidden;">
                    <img src="'. $image .'" class="img-fluid">
                </div>
            </div>
        ';
    }
}
echo '
    <div class="row text-center text-white bg-dark">
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
    <div class="row text-start border" style="border-style: none none solid none !important;">
        <div class="col-5">
            Customize Item
        </div>
        <div class="col-2 text-center">
            '. $quantity .'
        </div>
        <div class="col-5 text-end">
            PHP Estimating...
        </div>
    </div>
    <div class="row text-center text-white bg-dark">
        <div class="col-6 text-start">
            Items: 1
        </div>
        <div class="col-6 text-end">
            Total: PHP Estimating...
        </div>
    </div>
    <div class="row text-start border" style="border-style: none none solid none !important;">
        <div class="col-5">
            Shipping Fee
        </div>
        <div class="col-2 text-center">
            -
        </div>
        <div class="col-5 text-end">
            PHP 0.00
        </div>
    </div>
';
echo '
    <div class="row text-center text-white bg-dark">
        <div class="col-12">
            Preview
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <div class="img-box">
                <img src="" class="img-responsive" width="75%" height="auto" alt="Missing Image" id="image">
                <input type="hidden" name="image" id="hidden_image" value="">
            </div>
        </div>
    </div>
    
';

mysqli_close($conn);
?>