<?php
include("connect.php");
$id = $_GET["id"];

$sql = "SELECT * FROM history WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo '
    <form id="change_status" class="container p-3 my-auto">
        <input type="hidden" value="' . $row['id'] . '" name="id">
        <small>Current Status: '. $row['status'] .'</small>
        <div class="d-flex justify-content-start align-items-center mb-2">
            <small style="margin-right: 5px;">Change Status to:</small>
            <small><select id="status">
    ';
        if ($row['status'] === 'Pending') {
            echo '
                <option value="Processing">Processing</option>
            ';
            if ($row['total'] === 'Estimating...') {
                
            } else {
                echo '<option value="Delivered">Delivered</option>';
            }
            echo '
                <option value="Rejected">Rejected</option>
            ';
        } else if ($row['status'] === 'Processing') {
            echo '
                <option value="Pending">Pending</option>
            ';
            if ($row['total'] === 'Estimating...') {
                
            } else {
                echo '<option value="Delivered">Delivered</option>';
            }
            echo '
                <option value="Rejected">Rejected</option>
            ';
        } else if ($row['status'] === 'Delivered') {
            echo '
                <option value="null" selected>Can`t be changed</option>
            ';
        } else if ($row['status'] === 'Rejected') {
            echo '
                <option value="Pending">Pending</option>
                <option value="Processing">Processing</option>
            ';
            if ($row['total'] === 'Estimating...') {
                
            } else {
                echo '<option value="Delivered">Delivered</option>';
            }
        } else if ($row['status'] === 'Canceled') {
            echo '
                <option value="Pending">Pending</option>
                <option value="Processing">Processing</option>
            ';
            if ($row['total'] === 'Estimating...') {
                
            } else {
                echo '<option value="Delivered">Delivered</option>';
            }
            echo '
                <option value="Rejected">Rejected</option>
            ';
        }
    echo '
            </select></small>
        </div>
        <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto">Submit</button>
    </form>
    ';

    echo '
        <form id="change_total" class="container p-3">
            <input type="hidden" value="' . $row['id'] . '" name="id">
            <small>Current Total: '. $row['total'] .'</small>
            <div class="d-flex justify-content-start align-items-center mb-2">
                <small>Change Total to: <input type="text" name="total" oninput="validate(this)" required></small>
            </div>
            <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto">Submit</button>
        </form>
    ';
    if ($row['confirmed_payment'] !== null) {
        $confirmed = $row['confirmed_payment'];
    } else {
        $confirmed = 'Waiting for confirmation...';
    }
    echo '
        <form id="change_payment" class="container p-3">
            <input type="hidden" value="' . $row['id'] . '" name="id">
            <small>Current Payment: '. $confirmed .'</small>
            <div class="d-flex justify-content-start align-items-center mb-2">
                <small>Change Payment to: <input type="text" name="payment" oninput="validate(this)" required></small>
            </div>
            <button type="submit" class="btn btn-outline-success rounded-pill btn-sm w-50 mx-auto">Submit</button>
        </form>
    ';
}
mysqli_close($conn);
?>
