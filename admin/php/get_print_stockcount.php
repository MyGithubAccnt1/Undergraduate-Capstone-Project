<?php
include("connect.php");
$sql = "SELECT * FROM inventory";
$result = mysqli_query($conn, $sql);
$logo = 0;
$necklace = 0;
$other = 0;
$table = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['category'] === 'Logo') {
            $logo += 1;
        } else if ($row['category'] === 'Necklace') {
            $necklace += 1;
        } else if ($row['category'] === 'Other') {
            $other += 1;
        } else if ($row['category'] === 'Table') {
            $table += 1;
        }
    }
    echo '
        <div class="col-12">
            <h4 class="p-0 m-0 text-center"><small><b>STOCK REPORT</b></small></h4>
        </div>
        <div class="col-12 my-3">
            <h6 class="p-0 m-0 text-start"><small><b>MATERIALS COUNT</b></small></h6>
        </div>
        <div class="col-3 text-center border" style="border-style: none solid solid none !important;">
            <small>Logo Seal: '. $logo .'</small>
        </div>
        <div class="col-3 text-center border" style="border-style: none solid solid none !important;">
            <small>Necklace: '. $necklace .'</small>
        </div>
        <div class="col-3 text-center border" style="border-style: none solid solid none !important;">
            <small>Table: '. $table .'</small>
        </div>
        <div class="col-3 text-center border" style="border-style: none none solid none !important;">
            <small>Other: '. $other .'</small>
        </div>
    ';
}
echo '
    <div class="col-12 my-3">
        <h6 class="p-0 m-0 text-start"><small><b>CRITICAL COUNT MATERIALS</b></small></h6>
    </div>
    <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
       <small><b>MATERIAL</b></small>
    </div>
    <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
        <small><b>QUANTITY</b></small>
    </div>
    <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
        <small><b>CATEGORY</b></small>
    </div>
    <div class="col-3 text-center border" style="border-style: none none solid none !important;">
        <small><b>DATE</b></small>
    </div>
';
$sql = "SELECT * FROM inventory WHERE category = 'Logo'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['quantity'] <= 10) {
            echo '
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                   <small>'. $row['material'] .'</small>
                </div>
                <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                    <small>'. $row['quantity'] .'</small>
                </div>
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                    <small>'. $row['category'] .'</small>
                </div>
                <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                    <small>'. $row['deyt'] .'</small>
                </div>
            ';
        }
    }
}
$sql = "SELECT * FROM inventory WHERE category = 'Necklace'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['quantity'] <= 10) {
            echo '
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                   <small>'. $row['material'] .'</small>
                </div>
                <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                    <small>'. $row['quantity'] .'</small>
                </div>
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                    <small>'. $row['category'] .'</small>
                </div>
                <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                    <small>'. $row['deyt'] .'</small>
                </div>
            ';
        }
    }
}
$sql = "SELECT * FROM inventory WHERE category = 'Table'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['quantity'] <= 10) {
            echo '
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                   <small>'. $row['material'] .'</small>
                </div>
                <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                    <small>'. $row['quantity'] .'</small>
                </div>
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                    <small>'. $row['category'] .'</small>
                </div>
                <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                    <small>'. $row['deyt'] .'</small>
                </div>
            ';
        }
    }
}
$sql = "SELECT * FROM inventory WHERE category = 'Other'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['quantity'] <= 10) {
            echo '
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                   <small>'. $row['material'] .'</small>
                </div>
                <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                    <small>'. $row['quantity'] .'</small>
                </div>
                <div class="col-3 text-start border" style="border-style: none solid solid none !important;">
                    <small>'. $row['category'] .'</small>
                </div>
                <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                    <small>'. $row['deyt'] .'</small>
                </div>
            ';
        }
    }
}
echo '
    <div class="col-12 mt-3">
        <h6 class="p-0 m-0 text-center"><small><b>END OF PAGE</b></small></h6>
    </div>
';
mysqli_close($conn);
?>
