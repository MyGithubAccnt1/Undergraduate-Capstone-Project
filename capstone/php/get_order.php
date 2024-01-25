<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];

$sql = "SELECT COUNT(*) AS total_rows FROM history WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $totalRows = $row["total_rows"];
    echo '
    <input type="hidden" name="row" value="'. $totalRows .'">
    ';
}

$sql = "SELECT * FROM history WHERE email = '$email' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '
    <div class="row">
        <div>
            <small>NAME</small>
        </div>
        <div>
            <small>TOTAL</small>
        </div>
        <div>
            <small>STATUS</small>
        </div>
        <div>
            <small>DATE</small>
        </div>
    </div>
    ';
    $id = 0;
    $date = "";
    $detailsArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $id + 1;
        echo '
        <div class="row" data-bs-toggle="collapse" data-bs-target="#collapseExample'. $id .'">
            <div>
                <small>'. $row["title"] .'</small>
            </div>
            <div>
                <small style="color: red;">PHP '. $row["total"] .'</small>
            </div>
            <div>
        ';
            if ($row['status'] === "Pending"){
                echo '
                <small style="color: #f4c430;">'. $row["status"] .'</small>
                ';
            }elseif ($row['status'] === "On-The-Way"){
                echo '
                <small style="color: #f4c430;">'. $row["status"] .'</small>
                ';
            }elseif ($row['status'] === "Delivered"){
                echo '
                <small style="color: #f4c430">'. $row["status"] .'</small>
                ';
            }elseif ($row['status'] === "Canceled"){
                echo '
                <small style="color: #f4c430;">'. $row["status"] .'</small>
                ';
            }elseif ($row['status'] === "Rejected"){
                echo '
                <small style="color: #f4c430;">'. $row["status"] .'</small>
                ';
            }else{
                echo '
                <small>'. $row["status"] .'</small>
                ';
            }
        echo '
            </div>
            <div>
                <small>'. $row["deyt"] .'</small>
            </div>
            <input type="hidden" name="id" value="'. $id .'">
        </div>
        ';
        $date = $row['deyt'];
        echo '
        <div class="custom-collapse collapse" id="collapseExample'. $id .'">
            <div class="container">
                <div class="row">
                    <div class="container">
                        <div class="cart-container">
        ';
                        $newsql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
                        $newresult = $conn->query($newsql);
                        if ($newresult->num_rows > 0) {

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
                            </div>
        ';

                            while ($newrow = $newresult->fetch_assoc()) {

        echo '
                                <div class="row">
                                    <div class="img-box">
                                        <img src="'. $newrow["thumbnail"] .'" class="cart-img img-responsive" alt="X">
                                        <input type="hidden" value="'. $newrow["thumbnail"] .'" name="image">
                                    </div>
                                    <div>
        ';

                                    if (empty($newrow['title'])) {
                                        echo '
                                        <small>Customize Item</small>
                                        ';
                                    } else {
                                        echo '
                                        <small>'. $newrow["title"] .'</small>
                                        ';
                                    }

                                echo '
                                    </div>
                                    <div>
                                ';

                                    if (empty($newrow['price'])) {
                                        echo '
                                        <small>Estimating...</small>
                                        ';
                                    } else {
                                        echo '
                                        <small>PHP '. $newrow["price"] .'</small>
                                        ';
                                    }

                                echo '
                                    </div>
                                    <div>
                                        <small>'. $newrow["qty"] .'</small>
                                    </div>
                                    <div>
                                    ';

                                    if (empty($newrow['total'])) {
                                        echo '
                                        <small>Estimating...</small>
                                        ';
                                    } else {
                                        echo '
                                        <small>PHP '. $newrow["total"] .'</small>
                                        ';
                                    }

                                echo '
                                    </div>
                                </div>
                                ';

                                if (!is_null($newrow['details'])) {
                                    $detailsArray = explode(', ', $newrow['details']);
                                } else {
                                    $detailsArray = array();
                                }
                            }
                        }
        echo '
                        </div>
        ';
                        if (!empty($detailsArray)) {
                            echo'
                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p>ORDER DETAILS</p>
                                </div>
                            </div>
                            ';

                            foreach ($detailsArray as $value) {
                                $details = explode(': ', $value);
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
                        }
        echo '
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p>PERSONAL DETAILS</p>
                            </div>
                        </div>
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

                        if ($row['status'] === "Pending") {
                            echo '
                            <div class="row">
                                <div class="col-12 text-center">
                                    <form action="" id="cancel">
                                        <input type="hidden" value="'. $date .'" name="date">
                                        <input type="submit" class="btn btn-danger btn-sm rounded-0" value="Cancel This Order">
                                    </form>
                                </div>
                            </div>
                            ';
                        }


        echo '
                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
                                <div class="border border-black card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px; transform: scaleY(-1);" id="message-container'. $id .'">
                                    <!-- dynamic -->
                                </div>
                                <div class="stick-bot">
                                    <form id="message-form'. $id .'" class="message-form">
                                        <input type="hidden" name="date" value="'. $row['deyt'] .'">
                                        <div class="comment-area">
                                            <div class="bg-dark" style="display: flex; justify-content: center; align-items: center; flex-direction: row; margin: 0; padding: 0;">
                                                <div class="w-100 p-1">
                                                    <textarea class="form-control rounded-pill" placeholder="Type your message here." rows="1" name="comment" required></textarea>
                                                </div>
                                                <div class="w-50 p-1 d-flex align-items-center">
                                                    <button type="submit" class="btn btn-sm btn-primary py-1 w-100 rounded-pill">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        ';
    }
    mysqli_free_result($result);
} else {
    echo '
    <div class="row">
        <small style="width: 100%; text-align: center; margin-block: auto;">
            There is no history of order.
        </small>
    </div>
    ';
}
mysqli_close($conn);
?>