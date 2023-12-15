<?php
session_start();
include("connect.php");

$email = mysqli_real_escape_string($conn, $_GET['email']);
$deyt = mysqli_real_escape_string($conn, $_GET['deyt']);
$view = mysqli_real_escape_string($conn, $_GET['view']);
$product = mysqli_real_escape_string($conn, $_GET['product']);
$front = "";
$back = "";

$_SESSION['date'] = $deyt;

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $new_sql = "SELECT front, back FROM template WHERE email = '$email' and deyt = '$deyt' and product = '$product'";
    $new_result = mysqli_query($conn, $new_sql);
    if (mysqli_num_rows($new_result) > 0) {
        $row = $new_result->fetch_assoc();
        $front = $row['front'];
        $back = $row['back'];
    } else {
        echo "1";
        exit();
    }

    if ($view === "Front") {
        $sql = "SELECT objectType, properties FROM object WHERE email = '$email' AND deyt = '$front' AND view = '$view' and product = '$product'";
        $result = mysqli_query($conn, $sql);
    } else if ($view === "Back") {
        $sql = "SELECT objectType, properties FROM object WHERE email = '$email' AND deyt = '$back' AND view = '$view' and product = '$product'";
        $result = mysqli_query($conn, $sql);
    }

    if (mysqli_num_rows($result) > 0) {
        $objects = array(); // Create an array to store the objects

        // Loop through the results and fetch each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Add each row (object) to the $objects array
            $objects[] = $row;
        }

        // Return the array as JSON response
        header('Content-Type: application/json');
        echo json_encode($objects);
    } else {
        // Handle the query error
        echo "Error executing SQL query: " . mysqli_error($conn);
    }
} else {
    // Handle other HTTP methods if needed
    echo "Invalid request method.";
}
?>
