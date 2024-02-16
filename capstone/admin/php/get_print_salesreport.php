<?php
include("connect.php");
$sql = "SELECT deyt, earn, `order` FROM earning ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
$date = [];
$amount = [];
$order = [];
while ($row = mysqli_fetch_assoc($result)) {
    $date[] = $row['deyt'];
    $amount[] = floatval(str_replace(',', '', strval($row['earn'])));
    $order[] = $row['order'];
}
$data = [];
for ($i = 0; $i < count($date); $i++) {
    $data[$date[$i]][] = ['amount' => $amount[$i], 'order' => $order[$i]];
}
$monthlySum = [];
foreach ($data as $date => $values) {
    $month = date('Y-m', strtotime($date));
    foreach ($values as $entry) {
        if (!isset($monthlySum[$month])) {
            $monthlySum[$month] = ['amount' => 0, 'order' => 0];
        }
        $monthlySum[$month]['amount'] += $entry['amount'];
        $monthlySum[$month]['order'] += $entry['order'];
    }
}
echo '
    <div class="col-12 mb-3">
        <h6 class="p-0 m-0 text-start"><small><b>SALES REPORT</b></small></h6>
    </div>
    <div class="col-4 text-center">
        <small>DATE(MONTH - YEAR)</small>
    </div>
    <div class="col-4 text-center">
        <small>AMMOUNT</small>
    </div>
    <div class="col-4 text-center">
        <small>ORDERS</small>
    </div>
';
foreach ($monthlySum as $month => $sum) {
    $monthYear = date('F Y', strtotime($month));
    echo '
        <div class="col-4 text-start border" style="border-style: none none solid none !important;">
            <small>' . $monthYear . '</small>
        </div>
        <div class="col-4 text-start border" style="border-style: none none solid none !important;">
            <small>' . number_format($sum['amount'], 2) . '</small>
        </div>
        <div class="col-4 text-center border" style="border-style: none none solid none !important;">
            <small>' . $sum['order'] . '</small>
        </div>
    ';
}
mysqli_close($conn);
?>
