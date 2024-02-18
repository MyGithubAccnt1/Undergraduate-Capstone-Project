<?php
include("connect.php");
$id = $_GET['id'];
$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo'
    <h1 class="text-center bg-dark text-white">SALES INVOICE</h1>
    <p class="mb-0 text-center"><small>Saint Benedict Medallion</small></p>
    <p class="mb-0 text-center"><small>Trece Martires City, Cavite</small></p>
    <p class="mb-0 text-center"><small id="current-date">'. $row['deyt'] .'</small></p>
    <p class="my-1 mt-3"><small>Buyer: '. $row['buyer'] .'</small></p>
    <p class="my-1"><small>Number: '. $row['mnumber'] .'</small></p>
    <p class="my-1"><small>Email: '. $row['email'] .'</small></p>
    <p class="my-1"><small>Address: '. $row['caddress'] .'</small></p>
    ';
    if ($row['alt_address']) {
        echo'
            <p class="my-1"><small>Alternative: '. $row['alt_address'] .'</small></p>
        ';
    }
    $email = $row['email'];
    $accountsql = "SELECT * FROM account WHERE email = '$email'";
    $accountresult = mysqli_query($conn, $accountsql);
    if (mysqli_num_rows($accountresult) > 0) {
        $accountrow = mysqli_fetch_assoc($accountresult);
        if ($accountrow['verified_location']) {
            echo'
                <p class="my-1"><small>Verified Address: '. $accountrow['verified_location'] .'</small></p>
            ';
        }
    }
    $date = $row['deyt'];
    $newsql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
    $newresult = $conn->query($newsql);
    if (mysqli_num_rows($newresult) > 0) {
        echo '
        <div class="container">
            <div class="row bg-dark text-center text-white">
                <div class="col-4">
                    <small>ITEM</small>
                </div>
                <div class="col-4">
                    <small>QTY</small>
                </div>
                <div class="col-4">
                    <small>PRICE</small>
                </div>
            </div>
        ';
        $qty = null;
        $total = null;
        $image = null;
        $title = null;
        $detailsArray = array();
        while ($row = mysqli_fetch_assoc($newresult)) {
            echo'
            <div class="row text-center border" style="border-style: none none solid none !important;">
                <div class="col-4">
            ';
                if ($row['title']) {
                    echo '<small>'. $row['title'] .'</small>';
                    $title = $row['title'];
                } else {
                    echo '<small>Customize Item</small>';
                    $title = 'Customize Item';
                }
            echo '
                </div>
                <div class="col-4">
                    <small>'. $row['qty'] .'</small>
                </div>
                <div class="col-4">
            ';
                if ($row['price']) {
                    echo '<small>₱'. $row['price'] .'</small>';
                } else {
                    echo '<small>Estimating...</small>';
                }
            echo '
                </div>
            </div>
            ';
            $qty = $qty + $row['qty'];
            if ($row['thumbnail']) {
                $image = $row['thumbnail'];
            }
            if ($row['price']) {
                $total = $total + ($row['qty'] * $row['price']);
            } else {
                $total = 'Estimating...';
            }
            if (!is_null($row['details'])) {
                $detailsArray = explode(', ', $row['details']);
            } else {
                $detailsArray = array();
            }
        }
        if (is_numeric($total) && $total > 0) {
            $total = number_format(floatval($total), 2, '.', ',');
        }
        echo'
            <div class="row bg-dark text-white">
                <div class="col-6 text-start">
                    <small>Items: '. $qty .'</small>
                </div>
                <div class="col-6 text-end">
                    <small>Total: ₱'. $total .'</small>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-4">
                    <small>Shipping Fee</small>
                </div>
                <div class="col-4">
                    <small> - </small>
                </div>
                <div class="col-4">
                    <small>₱0.00</small>
                </div>
            </div>
            ';
            if ($title === 'Customize Item') {
                echo '
                    <div class="row bg-dark text-white">
                        <div class="col-12 text-center">
                            <small>Preview</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="img-box">
                                <img src="'. $image .'" class="img-responsive" width="75%" height="auto" alt="Missing Image" id="image">
                                <input type="hidden" name="image" value="'. $image .'">
                            </div>
                        </div>
                    </div>
                ';
            } else {
                echo '
                <div class="row bg-dark text-white">
                    <div class="col-12 text-end">
                        <small>Total: ₱<b>'. $total .'</b></small>
                    </div>
                </div>
                ';
            }
            if (!empty($detailsArray)) {
                echo'
                <div class="row bg-dark text-white">
                    <div class="col-12 text-center">
                        <small>Details</small>
                    </div>
                </div>
                ';
                foreach ($detailsArray as $value) {
                    if (strpos($value, ':') !== false) {
                        $details = explode(': ', $value);
                        if ($details[0] === 'Reference') {
                            $image = $details[1];
                            echo '
                                <div class="row">
                                    <div class="col-6 text-end">
                                        <p>'. $details[0] .' : </p>
                                    </div>
                                    <div class="col-6 text-start">
                                        <img src="'. $image .'" class="img-fluid">
                                    </div>
                                </div>
                            ';
                        } else {
                            echo '
                                <div class="row">
                                    <div class="col-6 text-end">
                                        <p>'. $details[0] .' : </p>
                                    </div>
                                    <div class="col-6 text-start">
                                        <p>'. $details[1] .'</p>
                                    </div>
                                </div>
                            ';
                        }
                    } else {
                        $image = $value;
                        echo '
                            <div class="row">
                                <div class="col-6 text-end">
                                    
                                </div>
                                <div class="col-6 text-start">
                                    <img src="'. $image .'" class="img-fluid">
                                </div>
                            </div>
                        ';
                    }
                }
            }
        echo '
        </div>
        ';
    }
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
