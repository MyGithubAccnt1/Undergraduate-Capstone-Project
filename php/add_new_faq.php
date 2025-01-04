<?php
session_start(); 
include("connect.php");
$email = $_SESSION["email"];
$role = 'Regular';
$seen = "Yes";
$comment = '
    <div class="card p-3" style="width: 95%; margin: 20px auto;">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex flex-row align-items-center ellipsis">
                <div style="width: 100%;">
                    <small class="font-weight-bold">Frequently Asked Questions</small>
                    <small>
                        <button type="button" onclick="faq(1);" class="mt-2 btn btn-outline-danger rounded-0 btn-sm">How long does the order takes to be delivered?</button>
                        <button type="button" onclick="faq(2);"class="mt-2 btn btn-outline-danger rounded-0 btn-sm">Is it free delivery any where on the Philippines?</button>
                        <button type="button" onclick="faq(3);" class="mt-2 btn btn-outline-danger rounded-0 btn-sm">What are available payment methods?</button>
                    </small>
                </div>
            </div>
        </div>
    </div>
';

$sql = "INSERT INTO message (email, message, role, seen) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $email, $comment, $role, $seen);
if ($stmt->execute()) {

    $stmt->close();
}
mysqli_close($conn);
?>
