<?php
include("connect.php");
echo '
    <div class="col-12">
        <h6 class="p-0 m-0 text-start"><small><b>STOCK LIST</b></small></h6>
    </div>
    <div class="col-1 text-center">
        <small>ID</small>
    </div>
    <div class="col-4 text-center">
       <small>MATERIAL</small>
    </div>
    <div class="col-2 text-center">
        <small>QUANTITY</small>
    </div>
    <div class="col-2 text-center">
        <small>CATEGORY</small>
    </div>
    <div class="col-3 text-center">
        <small>DATE</small>
    </div>
';
$sql = "SELECT * FROM inventory WHERE category = 'Directory' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-1 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['id'] .'</small>
            </div>
            <div class="col-4 text-start border" style="border-style: none none solid none !important;">
               <small>'. $row['material'] .'</small>
            </div>
            <div class="col-2 text-center border" style="border-style: none none solid none !important;">
               <small>'. $row['quantity'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM inventory WHERE category = 'Necklace' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-1 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['id'] .'</small>
            </div>
            <div class="col-4 text-start border" style="border-style: none none solid none !important;">
               <small>'. $row['material'] .'</small>
            </div>
            <div class="col-2 text-center border" style="border-style: none none solid none !important;">
               <small>'. $row['quantity'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM inventory WHERE category = 'Table' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-1 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['id'] .'</small>
            </div>
            <div class="col-4 text-start border" style="border-style: none none solid none !important;">
               <small>'. $row['material'] .'</small>
            </div>
            <div class="col-2 text-center border" style="border-style: none none solid none !important;">
               <small>'. $row['quantity'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['deyt'] .'</small>
            </div>
        ';
    }
}
$sql = "SELECT * FROM product WHERE category = 'Other' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
            <div class="col-1 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['id'] .'</small>
            </div>
            <div class="col-4 text-start border" style="border-style: none none solid none !important;">
               <small>'. $row['material'] .'</small>
            </div>
            <div class="col-2 text-center border" style="border-style: none none solid none !important;">
               <small>'. $row['quantity'] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none none solid none !important;">
                <small>'. $row['category'] .'</small>
            </div>
            <div class="col-3 text-start border" style="border-style: none none solid none !important;">
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
