<?php
session_start();
include("connect.php");

$email = mysqli_real_escape_string($conn, $_GET['email']);
$deyt = mysqli_real_escape_string($conn, $_GET['deyt']);

$_SESSION['date'] = $deyt;

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Retrieve objects from the database
    $sql = "SELECT objectType, properties FROM object WHERE email = '$email' AND deyt = '$deyt'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
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
