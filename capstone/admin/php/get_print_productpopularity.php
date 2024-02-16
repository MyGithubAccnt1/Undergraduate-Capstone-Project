<?php
include("connect.php");
$sql = "SELECT * FROM product ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
$directory = 0;
$necklace = 0;
$pin = 0;
$table = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['category'] === 'Directory') {
            $directory += $row['popularity'];
        } else if ($row['category'] === 'Necklace') {
            $necklace += $row['popularity'];
        } else if ($row['category'] === 'Pin') {
            $pin += $row['popularity'];
        } else if ($row['category'] === 'Table') {
            $table += $row['popularity'];
        }
    }
    echo '
        <div class="col-12 mb-3">
            <h6 class="p-0 m-0 text-start"><small><b>PRODUCT POPULARITY</b></small></h6>
        </div>
        <div class="col-3 text-center border" style="border-style: none none solid none !important;">
            <small>Directory Marker: '. $directory .'</small>
        </div>
        <div class="col-3 text-center border" style="border-style: none none solid none !important;">
            <small>Necklace: '. $necklace .'</small>
        </div>
        <div class="col-3 text-center border" style="border-style: none none solid none !important;">
            <small>Pin: '. $pin .'</small>
        </div>
        <div class="col-3 text-center border" style="border-style: none none solid none !important;">
            <small>Table: '. $table .'</small>
        </div>
    ';
}
echo '
    <div class="col-12 my-3">
        <h6 class="p-0 m-0 text-start"><small><b>MOST POPULAR PRODUCT</b></small></h6>
    </div>
    <div class="col-1 text-center">
        <small>ID</small>
    </div>
    <div class="col-5 text-center">
       <small>ITEM</small>
    </div>
    <div class="col-2 text-center">
        <small>PRICE</small>
    </div>
    <div class="col-3 text-center">
        <small>CATEGORY</small>
    </div>
    <div class="col-1 text-center">
        <small>POPULARITY</small>
    </div>
';
$sql = "SELECT * FROM product WHERE category = 'Directory' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
        <div class="col-1 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['id'] .'</small>
        </div>
        <div class="col-5 text-start border" style="border-style: none none solid none !important;">
           <small>'. $row['title'] .'</small>
        </div>
        <div class="col-2 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['price'] .'</small>
        </div>
        <div class="col-3 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['category'] .'</small>
        </div>
        <div class="col-1 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['popularity'] .'</small>
        </div>
    ';
}
$sql = "SELECT * FROM product WHERE category = 'Necklace' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
        <div class="col-1 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['id'] .'</small>
        </div>
        <div class="col-5 text-start border" style="border-style: none none solid none !important;">
           <small>'. $row['title'] .'</small>
        </div>
        <div class="col-2 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['price'] .'</small>
        </div>
        <div class="col-3 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['category'] .'</small>
        </div>
        <div class="col-1 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['popularity'] .'</small>
        </div>
    ';
}
$sql = "SELECT * FROM product WHERE category = 'Pin' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
        <div class="col-1 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['id'] .'</small>
        </div>
        <div class="col-5 text-start border" style="border-style: none none solid none !important;">
           <small>'. $row['title'] .'</small>
        </div>
        <div class="col-2 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['price'] .'</small>
        </div>
        <div class="col-3 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['category'] .'</small>
        </div>
        <div class="col-1 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['popularity'] .'</small>
        </div>
    ';
}
$sql = "SELECT * FROM product WHERE category = 'Table' ORDER BY popularity DESC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
        <div class="col-1 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['id'] .'</small>
        </div>
        <div class="col-5 text-start border" style="border-style: none none solid none !important;">
           <small>'. $row['title'] .'</small>
        </div>
        <div class="col-2 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['price'] .'</small>
        </div>
        <div class="col-3 text-start border" style="border-style: none none solid none !important;">
            <small>'. $row['category'] .'</small>
        </div>
        <div class="col-1 text-end border" style="border-style: none none solid none !important;">
            <small>'. $row['popularity'] .'</small>
        </div>
    ';
}
mysqli_close($conn);
?>
