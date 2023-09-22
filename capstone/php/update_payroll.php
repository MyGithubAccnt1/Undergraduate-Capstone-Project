<?php
include("connect.php");
$id = $_POST["id"];
$name = $_POST["name"];
$position = $_POST["position"];
$deyt = $_POST["deyt"];
$salary = $_POST["salary"];
$name = mysqli_real_escape_string($conn, $name);
$position = mysqli_real_escape_string($conn, $position);
$deyt = mysqli_real_escape_string($conn, $deyt);
$salary = mysqli_real_escape_string($conn, $salary);
if ($id === "") {

} else {
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
    $sql = "UPDATE payroll SET name = '$name', position = '$position', deyt = '$deyt', salary = '$salary' WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {

    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
