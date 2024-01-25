<?php
session_start();
include('connect.php');
$details = mysqli_real_escape_string($conn, $_GET['details']);

echo '
    <div class="row text-center text-white bg-dark">
        <div class="col-12">
            Details
        </div>
    </div>
';
$detailsArray = explode(', ', $details);
foreach ($detailsArray as $value) {
    echo '
        <div class="row text-start border" style="border-style: none none solid none !important;">
            <div class="col-12 text-start">
                '. $value .'
            </div>
        </div>
    ';
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
            1
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
                <img src="" class="img-responsive" width="75%" height="auto" alt="Missing Image" id="image" style="background-image: linear-gradient(90deg, rgb(33,33,33) 0%,transparent 59%),repeating-linear-gradient(45deg, rgba(168, 168, 168,0.1) 0px, rgba(168, 168, 168,0.1) 1px,transparent 1px, transparent 13px),repeating-linear-gradient(135deg, rgba(168, 168, 168,0.1) 0px, rgba(168, 168, 168,0.1) 1px,transparent 1px, transparent 13px),linear-gradient(90deg, rgb(33,33,33),rgb(33,33,33));">
                <input type="hidden" name="image" id="hidden_image" value="">
            </div>
        </div>
    </div>
    
';

mysqli_close($conn);
?>