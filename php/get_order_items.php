<?php
session_start();
include('connect.php');
$email = $_SESSION['email'];
$date = $_GET['date'];

$sql = "SELECT * FROM `order` WHERE email = '$email' and deyt = '$date'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo '
    <div class="row">
        <div class="col-1 border" style="border-style: none none solid none !important">
            
        </div>
        <div class="col-3 border" style="border-style: none solid solid none !important">
            <small>NAME</small>
        </div>
        <div class="col-3 border" style="border-style: none solid solid none !important">
            <small>PRICE</small>
        </div>
        <div class="col-2 border" style="border-style: none solid solid none !important">
            <small>QTY</small>
        </div>
        <div class="col-3 border" style="border-style: none none solid none !important">
            <small>TOTAL</small>
        </div>
    </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['thumbnail'];
        $image = str_replace('../', '', $image);
        echo '
            <div class="row">
                <div class="img-box col-1 border" style="border-style: none none solid none !important">
                    <img src="'. $image .'" class="cart-img img-responsive" alt="X">
                    <input type="hidden" value="'. $image .'" name="image">
                </div>
                <div  class="col-3 border" style="border-style: none solid solid none !important">
        ';

        if (empty($row['title'])) {
                echo '
                    <small>Customize Item</small>
                ';
        } else {
                echo '
                    <small>'. $row["title"] .'</small>
                ';
        }

            echo '
                </div>
                <div class="col-3 border" style="border-style: none solid solid none !important">
            ';

        if (empty($row['price'])) {
                echo '
                    <small>Estimating...</small>
                ';
        } else {
                echo '
                    <small>₱'. $row["price"] .'</small>
                ';
        }

            echo '
                </div>
                <div class="col-2 border" style="border-style: none solid solid none !important">
                    <small>'. $row["qty"] .'</small>
                </div>
                <div class="col-3 border" style="border-style: none none solid none !important">
            ';

        if (empty($row['total'])) {
                echo '
                    <small>Estimating...</small>
                ';
        } else {
                echo '
                    <small>₱'. $row["total"] .'</small>
                ';
        }

            echo '
                </div>
            </div>
            ';
    }

    $sql = "SELECT * FROM history WHERE email = '$email' and deyt = '$date'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['status'] === "Pending") {
            echo '
            <div class="row mt-3">
                <div class="col-12 mx-auto text-center">
                    <form action="" id="cancel">
                        <input type="hidden" value="'. $date .'" name="date">
                        <input type="submit" class="btn btn-danger btn-sm rounded-pill w-50" value="Cancel This Order">
                    </form>
                </div>
            </div>
            ';
        }
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