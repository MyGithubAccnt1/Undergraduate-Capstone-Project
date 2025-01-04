<?php
include("connect.php");
echo '
    <div class="col-12">
        <h4 class="p-0 m-0 text-center"><small><b>PRODUCT REPORT</b></small></h4>
    </div>
    <div class="col-12 my-3">
        <h6 class="p-0 m-0 text-start"><small><b>PRODUCT LIST</b></small></h6>
    </div>
    <div class="col-3 text-start">
       <small><b>ITEM</b></small>
    </div>
    <div class="col-3 text-end">
        <small><b>PRICE</b></small>
    </div>
    <div class="col-3 text-start">
        <small><b>CATEGORY</b></small>
    </div>
    <div class="col-3 text-center">
        <small><b>POPULARITY</b></small>
    </div>
';
$sql = "SELECT * FROM product WHERE category = 'Logo' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
               <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                <small>₱'. $row['price'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['popularity'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM product WHERE category = 'Necklace' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
               <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                <small>₱'. $row['price'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['popularity'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM product WHERE category = 'Table' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
               <small>'. $row['title'] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                <small>₱'. $row['price'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $row['popularity'] .'</small>
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
