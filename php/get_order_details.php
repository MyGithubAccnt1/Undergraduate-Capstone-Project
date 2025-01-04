<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$date = $_GET['date'];

$sql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
$customizeresult = mysqli_query($conn, $sql);

if (mysqli_num_rows($customizeresult) > 0) {
    $customizerow = mysqli_fetch_assoc($customizeresult);

    if (!is_null($customizerow['details'])) {
        $detailsArray = explode(', ', $customizerow['details']);
    } else {
        $detailsArray = array();
    }

    if (!empty($detailsArray)) {
        foreach ($detailsArray as $value) {
            if (strpos($value, ':') !== false) {
                $details = explode(': ', $value);
                if ($details[0] === 'Reference') {
                    $image = $details[1];
                    $image = str_replace('../', '', $image);
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
                $image = str_replace('../', '', $image);
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

    $sql = "SELECT * FROM history WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo '
            <div class="row">
                <div class="col-6 text-end">
                    <p>Buyer : </p>
                </div>
                <div class="col-6 text-start">
                    <p>'. $row['buyer'] .'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-end">
                    <p>Number : </p>
                </div>
                <div class="col-6 text-start">
                    <p>'. $row['mnumber'] .'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-end">
                    <p>Email : </p>
                </div>
                <div class="col-6 text-start" style="overflow-wrap: break-word;">
                    <p>'. $row['email'] .'</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 text-end">
                    <p>Address : </p>
                </div>
                <div class="col-6 text-start">
                    <p>'. $row['caddress'] .'</p>
                </div>
            </div>
        ';

        if (!empty($row['alt_address'])) {
            echo '
            <div class="row">
                <div class="col-6 text-end">
                    <p>Alternative : </p>
                </div>
                <div class="col-6 text-start">
                    <p>'. $row['alt_address'] .'</p>
                </div>
            </div>
            ';
        }
    }
    mysqli_free_result($result);
}
mysqli_close($conn);
?>