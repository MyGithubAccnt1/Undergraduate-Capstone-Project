<?php
include("connect.php");
$from = $_GET['from'];
$to = $_GET['to'];
$year = $_GET['year'];
$sql = "SELECT deyt, earn, `order` FROM earning ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$date = [];
$amount = [];
$order = [];
if ($from === 'None' && $to === 'None') {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>SALES REPORT OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));

        // Check if the current row is from the specified year
        if ($currentYear == $year) {
            $date[] = $row['deyt'];
            $amount[] = floatval(str_replace(',', '', strval($row['earn'])));
            $order[] = $row['order'];
        }
    }
} else if ($from !== 'None' && $to === 'None') {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>SALES REPORT FROM '. strtoupper($from) .' OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));
        $currentMonth = date('m', strtotime($row['deyt']));

        // Convert month name to numeric value
        $fromMonthNumeric = date('m', strtotime($from));

        // Check if the current row is within the specified year and month
        if (($currentYear == $year) && ($currentMonth >= $fromMonthNumeric)) {
            $date[] = $row['deyt'];
            $amount[] = floatval(str_replace(',', '', strval($row['earn'])));
            $order[] = $row['order'];
        }
    }
} else if ($from === 'None' && $to !== 'None') {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>SALES REPORT TO '. strtoupper($to) .' OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));
        $currentMonth = date('m', strtotime($row['deyt']));  // Use numeric month

        // Convert month name to numeric value
        $toMonthNumeric = date('m', strtotime($to));

        // Check if the current row is within the specified year and month
        if ($currentYear == $year && $currentMonth <= $toMonthNumeric) {
            $date[] = $row['deyt'];
            $amount[] = floatval(str_replace(',', '', strval($row['earn'])));
            $order[] = $row['order'];
        }
    }
} else {
    echo '
        <div class="col-12 mb-3">
            <h4 class="p-0 m-0 text-center"><small><b>SALES REPORT FROM '. strtoupper($from) .' TO '. strtoupper($to) .' OF '. $year .'</b></small></h4>
        </div>
    ';
    while ($row = mysqli_fetch_assoc($result)) {
        $currentYear = date('Y', strtotime($row['deyt']));
        $currentMonth = date('m', strtotime($row['deyt']));  // Use numeric month

        // Convert month name to numeric value
        $toMonthNumeric = date('m', strtotime($to));
        $fromMonthNumeric = date('m', strtotime($from));
        // Check if the current row is within the specified year and month
        if ($currentYear == $year && ($currentMonth >= $fromMonthNumeric) && ($currentMonth <= $toMonthNumeric)) {
            $date[] = $row['deyt'];
            $amount[] = floatval(str_replace(',', '', strval($row['earn'])));
            $order[] = $row['order'];
        }
    }
}

echo '
    <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
        <small><b>DATE</b></small>
    </div>
    <div class="col-4 text-end border" style="border-style: none solid solid none !important;">
        <small><b>AMOUNT</b></small>
    </div>
    <div class="col-4 text-center border" style="border-style: none none solid none !important;">
        <small><b>ORDERS</b></small>
    </div>
';

if (!empty($date)) {
    $data = [];
    for ($i = 0; $i < count($date); $i++) {
        $data[$date[$i]][] = ['amount' => $amount[$i], 'order' => $order[$i]];
    }

    $monthlySum = [];
    foreach ($data as $date => $values) {
        $month = date('F Y', strtotime($date));
        foreach ($values as $entry) {
            if (!isset($monthlySum[$month])) {
                $monthlySum[$month] = ['amount' => 0, 'order' => 0];
            }
            $monthlySum[$month]['amount'] += $entry['amount'];
            $monthlySum[$month]['order'] += $entry['order'];
        }
    }

    foreach ($monthlySum as $month => $sum) {
        echo '
            <div class="col-4 text-center border" style="border-style: none solid solid none !important;">
                <small>' . $month . '</small>
            </div>
            <div class="col-4 text-end border" style="border-style: none solid solid none !important;">
                <small>₱' . number_format($sum['amount'], 2) . '</small>
            </div>
            <div class="col-4 text-center border" style="border-style: none none solid none !important;">
                <small>' . $sum['order'] . '</small>
            </div>
        ';
    }
} else {
    echo '<div class="col-12 text-center"><small>No data available for the specified date.</small></div>';
}

echo '
    <div class="col-12 mt-3">
        <h6 class="p-0 m-0 text-center"><small><b>END OF PAGE</b></small></h6>
    </div>
';
mysqli_close($conn);
?>
