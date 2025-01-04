<?php
session_start(); 
include("connect.php");
$faq = $_POST['number'];
$email = $_SESSION["email"];
$role = 'Regular';
$seen = "Yes";
$comment = '';
if ($faq === '1') {
    $comment = 'How long does the order takes to be delivered?';
} else if ($faq === '2') {
    $comment = 'Is it free delivery any where on the Philippines?';
} else if ($faq === '3') {
    $comment = 'What are available payment methods?';
}

$sql = "INSERT INTO message (email, message, role, seen) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $email, $comment, $role, $seen);
if ($stmt->execute()) {

    if ($faq === '1') {
        $comment = 'Usually is takes up to 3-5 working days. (Holidays may delay the delivery)';
    } else if ($faq === '2') {
        $comment = 'Yes. If your order shows that you`re in the Philippines, we got you covered!';
    } else if ($faq === '3') {
        $comment = 'We are accepting payments thru Gcash, we also allows 50 percent down payment. (It will be deliver once completely paid.)';
    }

    $role = 'Admin';

    $sql_admin = "INSERT INTO message (email, message, role, seen) VALUES (?, ?, ?, ?)";
    $stmt_admin = $conn->prepare($sql_admin);
    $stmt_admin->bind_param("ssss", $email, $comment, $role, $seen);
    if ($stmt_admin->execute()) {
        $stmt_admin->close();
    }
}
mysqli_close($conn);
?>
