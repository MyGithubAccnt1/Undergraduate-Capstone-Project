<?php
include("connect.php");
echo '
    <div class="col-12">
        <h4 class="p-0 m-0 text-center"><small><b>ORDER REPORT</b></small></h4>
    </div>
    <div class="col-12 my-3">
        <h6 class="p-0 m-0 text-start"><small><b>ORDER LIST</b></small></h6>
    </div>
    <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
        <small><b>ORDER ID</b></small>
    </div>
    <div class="col-3 text-center border" style="border-style: none solid solid none !important;">
       <small><b>TOTAL</b></small>
    </div>
    <div class="col-2 text-center border" style="border-style: none solid solid none !important;">
        <small><b>STATUS</b></small>
    </div>
    <div class="col-3 text-center border" style="border-style: none none solid none !important;">
        <small><b>DATE</b></small>
    </div>
';
$sql = "SELECT * FROM history WHERE status = 'Pending' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
                <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
        ';
        if ($row['total'] === 'Estimating...') {
            echo '
                <small>'. $row['total'] .'</small>
            ';
        } else {
            echo '
                <small>₱'. $row['total'] .'</small>
            ';
        }
        echo '
            </div>
            <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['status'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM history WHERE status = 'Processing' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
                <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
               <small>₱'. $row['total'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['status'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM history WHERE status = 'Delivered' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
                <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
               <small>₱'. $row['total'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['status'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM history WHERE status = 'Canceled' || status = 'Rejected' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
                <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
               <small>₱'. $row['total'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['status'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
echo '
    <div class="col-12 mt-3">
        <h6 class="p-0 m-0 text-center"><small><b>END OF PAGE</b></small></h6>
    </div>
';
mysqli_close($conn);
?>
