<?php
include("connect.php");
$material = mysqli_real_escape_string($conn, $_POST['material']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$sql = "SELECT * FROM inventory WHERE material = '$material'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    
    echo "There is already an existing data with the same material.";
    mysqli_free_result($result);

} else {
    $sql = "INSERT INTO inventory (material, quantity, category) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $material, $quantity, $category);
    if ($stmt->execute()) {
        echo "1";
        $notifmessage = "An [Admin] has added [". $material ."] on inventory.";
        $notifcategory = "inventory";
        $notifsql = "INSERT INTO notification (message, category) VALUES ('$notifmessage', '$notifcategory')";
        $notifresult = mysqli_query($conn, $notifsql);
        $stmt->close();
    }
}
mysqli_close($conn);
?>
