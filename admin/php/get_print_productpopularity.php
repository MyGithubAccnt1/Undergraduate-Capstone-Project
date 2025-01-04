<?php
include("connect.php");
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
$logo = 0;
$necklace = 0;
$table = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['category'] === 'Logo') {
            $logo += $row['popularity'];
        } else if ($row['category'] === 'Necklace') {
            $necklace += $row['popularity'];
        } else if ($row['category'] === 'Table') {
            $table += $row['popularity'];
        }
    }
    echo '
        <div class="col-12">
            <h4 class="p-0 m-0 text-center"><small><b>PRODUCT REPORT</b></small></h4>
        </div>
        <div class="col-12 my-3">
            <h6 class="p-0 m-0 text-start"><small><b>PRODUCT POPULARITY</b></small></h6>
        </div>
        <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
            <small>Logo Seal: '. $logo .'</small>
        </div>
        <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
            <small>Necklace: '. $necklace .'</small>
        </div>
        <div class="col-4 text-center border" style="border-style: none none solid none !important;">
            <small>Table Nameplate: '. $table .'</small>
        </div>
    ';
}
echo '
    <div class="col-12 my-3">
        <h6 class="p-0 m-0 text-start"><small><b>MOST POPULAR PRODUCT</b></small></h6>
    </div>
    <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
       <small><b>ITEM</b></small>
    </div>
    <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
        <small><b>PRICE</b></small>
    </div>
    <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
        <small><b>CATEGORY</b></small>
    </div>
    <div class="col-3 text-center border" style="border-style: none none solid none !important;">
        <small><b>POPULARITY</b></small>
    </div>
';
$sql = "SELECT * FROM product WHERE category = 'logo' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
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
$sql = "SELECT * FROM product WHERE category = 'Necklace' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
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
$sql = "SELECT * FROM product WHERE category = 'Table' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
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
$sql = "SELECT * FROM product ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '
        <div class="col-12 my-3">
            <h6 class="p-0 m-0 text-start"><small><b>LATEST PRODUCTS</b></small></h6>
        </div>
        <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
           <small><b>ITEM</b></small>
        </div>
        <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
            <small><b>PRICE</b></small>
        </div>
        <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
            <small><b>CATEGORY</b></small>
        </div>
        <div class="col-3 text-center border" style="border-style: none none solid none !important;">
            <small><b>POPULARITY</b></small>
        </div>
    ';
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
