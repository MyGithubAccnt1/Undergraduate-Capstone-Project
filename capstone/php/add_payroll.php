<?php
include("connect.php");
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$position = mysqli_real_escape_string($conn, $_POST["position"]);
$deyt = mysqli_real_escape_string($conn, $_POST["deyt"]);
$salary = mysqli_real_escape_string($conn, $_POST["salary"]);

if ($name === "") {
    $name = "Empty";
}
if ($position === "") {
    $position = "Empty";
}
if ($deyt === "") {
    $deyt = "1-1-0001";
}
if ($salary === "") {
    $salary = "0.00";
}
$sql = "INSERT INTO payroll (name, position, deyt, salary) VALUES ('$name', '$position', '$deyt', '$salary')";
if (mysqli_query($conn, $sql)) {

} else {
    echo "Error: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
