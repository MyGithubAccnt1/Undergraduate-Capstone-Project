<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$date = $_GET['date'];

$sql = "SELECT * FROM history WHERE email = '$email' and deyt = '$date'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
        <div class="row">
            <div class="col-6 p-2">
                <div class="border border-dark text-center">
                    DETAILS
                </div>
                <div class="border border-dark text-center p-3 mb-3" style="border-style: none solid solid solid !important;">
                    <div class="row">';
    if ($row['payment'] !== null) {
        $payment = explode(':', $row['payment']);
        echo '
                        <div class="col-6 text-end">
                            <p>'. $payment[0] .' : </p>
                        </div>
                        <div class="col-6 text-start">
                            <p>'. $payment[1] .'</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>Confirmed Payment : </p>
                        </div>
        ';
        if ($row['confirmed_payment'] !== null) {
            $confirmed = '₱' . $row['confirmed_payment'];
        } else {
            $confirmed = 'Waiting for confirmation...';
        }
        echo '
                        <div class="col-6 text-start">
                            <p>'. $confirmed .'</p>
                        </div>
                        <div class="col-6 text-end">
                            <p>Submitted Proof : </p>
                        </div>
                        <div class="col-6 text-start">
        ';
        $proof = explode(',', $row['proof']);
        foreach ($proof as $value) {
            if (strpos($value, '../') !== false) {
                $image = str_replace('../', '', $value);
                echo '
                                <img src="'. $image .'" class="img-fluid">
                ';
            } else {
                echo '
                                <p>'. $value .'</p>
                ';
            }
        }
        echo '
                        </div>
                    </div>
        ';
    } else {
        echo '
                        <div class="col-12 text-center">
                            <p>There is no record yet.</p>
                        </div>
                    </div>
        ';
    }
    echo'       </div>
            </div>
            <div class="col-6 p-2">
                <div class="border border-dark text-center">
                    METHOD
                </div>
                <div class="text-center p-3">
                    <div class="row">
                        <form class="payment">
                            <div class="col-12 text-start">
                                <input type="radio" checked>
                                <label><small><b>Gcash</b></small></label>
                            </div>
                            <div class="col-12 text-center p-1">
                                <div class="border border-dark p-4">
                                    <input type="radio" id="full-payment" checked>
                                    <label class="full-payment">
                                        <button style="background-color: inherit; border: none;">
                                            <small>
                                                <b>Full Payment</b>
                                            </small>
                                        </button>
                                    </label>
                                    <div style="transition: height 0.5s linear;">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6 mx-auto my-auto">
                                                <h6 class="text-start mb-1"><small>Name: <b>JE●●●●●N L.</b></small></h6>
                                                <h6 class="text-start mb-1"><small>Mobile Number: 0967 395 6545</small></h6>';
                                            if ($row['confirmed_payment'] !== null) {
                                                $payment = $row['confirmed_payment'];
                                                $total = $row['total'];
                                                $amount = $total - $payment;
                                                echo '
                                                    <h6 class="text-start mb-1"><small>Amount: ₱'. $amount .'</small></h6>
                                                ';
                                            } else {
                                                echo '
                                                    <h6 class="text-start mb-1"><small>Amount: ₱<b>'. $row['total'] .'</b></small></h6>
                                                ';
                                            }
    echo '
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 mx-auto my-1 text-center">
                                                <img src="images/gcash.png" class="img-fluid border border-dark" alt="X">
                                            </div>
                                        </div>
                                        <p class="text-center text-danger"><b><small>Your order will be delivered once you have fully paid.</small></b></p>
                                        <p class="text-start"><small>Upload your Gcash proof of payment via:</small></p>
                                        <p class="text-start">
                                            <small>IMAGE</small>
                                            <button type="button" class="btn btn-sm rounded-0 btn-danger ms-2 image_guide" style="height: 30px; width: 30px;">
                                                <small>?</small>
                                            </button>
                                        </p>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <small><input type="file" class="gcashfp_image" accept="image/*"></small>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6">
                                                <img src="" class="uploaded_gcashfp_image" style="width: 100%; height: auto;">
                                            </div>
                                        </div>
                                        <p class="text-center"><small>OR</small></p>
                                        <p class="text-start">
                                            <small>TEXT</small>
                                            <button type="button" class="btn btn-sm rounded-0 btn-danger ms-2 text_guide" style="height: 30px; width: 30px;">
                                                <small>?</small>
                                            </button>
                                        </p>
                                        <small><textarea class="w-50" type="text" rows="5" style="resize: none;" name="gcashfp_text"></textarea></small>
                                        <div class="row mt-2">
                                            <div class="col-6">
                                                <input type="hidden" name="id" value="'. $row['id'] .'">
                                            </div>
                                            <div class="col-6 text-center">
                                                <button type="submit" class="btn btn-success btn-sm rounded-pill w-75">Submit Payment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    ';
}
mysqli_free_result($result);
mysqli_close($conn);
?>