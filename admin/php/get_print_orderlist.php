<?php
include("connect.php");
$status = $_GET['status'];
$from = $_GET['from'];
$to = $_GET['to'];
$year = $_GET['year'];

if ($status === 'None') {
    $sql = "SELECT * FROM history ORDER BY id ASC";
} else {
    $sql = "SELECT * FROM history WHERE status = '$status' ORDER BY id ASC";
}
$result = mysqli_query($conn, $sql);

$date = [];
$total = [];
$status = [];
$title = [];

if ($from === 'None' && $to === 'None') {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>ORDER REPORT OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));

        if ($currentYear == $year) {
            $title[] = $row['title'];
            $total[] = floatval(str_replace(',', '', strval($row['total'])));
            $status[] = $row['status'];
            $date[] = $row['deyt'];
        }
    }
} else if ($from !== 'None' && $to === 'None') {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>ORDER REPORT FROM '. strtoupper($from) .' OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));
        $currentMonth = date('m', strtotime($row['deyt']));

        $fromMonthNumeric = date('m', strtotime($from));

        if (($currentYear == $year) && ($currentMonth >= $fromMonthNumeric)) {
            $title[] = $row['title'];
            $total[] = floatval(str_replace(',', '', strval($row['total'])));
            $status[] = $row['status'];
            $date[] = $row['deyt'];
        }
    }
} else if ($from === 'None' && $to !== 'None') {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>ORDER REPORT TO '. strtoupper($to) .' OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));
        $currentMonth = date('m', strtotime($row['deyt']));

        $toMonthNumeric = date('m', strtotime($to));

        if ($currentYear == $year && $currentMonth <= $toMonthNumeric) {
            $title[] = $row['title'];
            $total[] = floatval(str_replace(',', '', strval($row['total'])));
            $status[] = $row['status'];
            $date[] = $row['deyt'];
        }
    }
} else {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>ORDER REPORT FROM '. strtoupper($from) .' TO '. strtoupper($to) .' OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));
        $currentMonth = date('m', strtotime($row['deyt']));

        $toMonthNumeric = date('m', strtotime($to));
        $fromMonthNumeric = date('m', strtotime($from));

        if ($currentYear == $year && ($currentMonth >= $fromMonthNumeric) && ($currentMonth <= $toMonthNumeric)) {
            $title[] = $row['title'];
            $total[] = floatval(str_replace(',', '', strval($row['total'])));
            $status[] = $row['status'];
            $date[] = $row['deyt'];
        }
    }
}

echo '
    <div class="col-12 my-3">
        <h6 class="p-0 m-0 text-start"><small><b>ORDER LIST</b></small></h6>
    </div>
    <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
        <small><b>ORDER ID</b></small>
    </div>
    <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
       <small><b>TOTAL</b></small>
    </div>
    <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
        <small><b>STATUS</b></small>
    </div>
    <div class="col-3 text-center border" style="border-style: none none solid none !important;">
        <small><b>DATE</b></small>
    </div>
';

if (!empty($date)) {
    $data = [];
    for ($i = 0; $i < count($date); $i++) {
        echo '
            <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
                <small>'. $title[$i] .'</small>
            </div>
            <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
                <small>₱'. $total[$i] .'</small>
            </div>
            <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
                <small>'. $status[$i] .'</small>
            </div>
            <div class="col-3 text-center border" style="border-style: none none solid none !important;">
                <small>'. $date[$i] .'</small>
            </div>
        ';
    }
} else {
    echo '<div class="col-12 text-center"><small>No data available for the specified date.</small></div>';
}




// if ($status === 'None') {

//     $sql = "SELECT * FROM history ORDER BY id ASC";
//     $result = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             echo '
//                 <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
//                     <small>'. $row['title'] .'</small>
//                 </div>
//                 <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
//             ';
//             if ($row['total'] === 'Estimating...') {
//                 echo '
//                     <small>'. $row['total'] .'</small>
//                 ';
//             } else {
//                 echo '
//                     <small>₱'. $row['total'] .'</small>
//                 ';
//             }
//             echo '
//                 </div>
//                 <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
//                     <small>'. $row['status'] .'</small>
//                 </div>
//                 <div class="col-3 text-center border" style="border-style: none none solid none !important;">
//                     <small>'. $row['deyt'] .'</small>
//                 </div>
//             ';
//         }
//     }

// } else {

//     $sql = "SELECT * FROM history WHERE status = '$status' ORDER BY id ASC";
//     $result = mysqli_query($conn, $sql);
//     if (mysqli_num_rows($result) > 0) {
//         while ($row = mysqli_fetch_assoc($result)) {
//             echo '
//                 <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
//                     <small>'. $row['title'] .'</small>
//                 </div>
//                 <div class="col-3 text-end border" style="border-style: none solid solid none !important;">
//             ';
//             if ($row['total'] === 'Estimating...') {
//                 echo '
//                     <small>'. $row['total'] .'</small>
//                 ';
//             } else {
//                 echo '
//                     <small>₱'. $row['total'] .'</small>
//                 ';
//             }
//             echo '
//                 </div>
//                 <div class="col-2 text-start border" style="border-style: none solid solid none !important;">
//                     <small>'. $row['status'] .'</small>
//                 </div>
//                 <div class="col-3 text-center border" style="border-style: none none solid none !important;">
//                     <small>'. $row['deyt'] .'</small>
//                 </div>
//             ';
//         }
//     }

// }
echo '
    <div class="col-12 mt-3">
        <h6 class="p-0 m-0 text-center"><small><b>END OF PAGE</b></small></h6>
    </div>
';
mysqli_close($conn);
?>
