<?php
include("connect.php");
$name = $_POST["name"];
$position = $_POST["position"];
$deyt = $_POST["deyt"];
$salary = $_POST["salary"];
$name = mysqli_real_escape_string($conn, $name);
$position = mysqli_real_escape_string($conn, $position);
$deyt = mysqli_real_escape_string($conn, $deyt);
$salary = mysqli_real_escape_string($conn, $salary);

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
