<?php
include("connect.php");
$id = $_POST["id"];
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$position = mysqli_real_escape_string($conn, $_POST["position"]);
$deyt = mysqli_real_escape_string($conn, $_POST["deyt"]);
$salary = mysqli_real_escape_string($conn, $_POST["salary"]);
if ($id === "") {

} else {
    $sql = "DELETE FROM payroll WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
