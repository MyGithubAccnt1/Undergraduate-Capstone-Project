<?php
// Connect to the database
include("connect.php");

// Get the form data
$name = $_POST["name"];
$title = $_POST["title"];
date_default_timezone_set('Asia/Manila');
$date = date('Y-m-d H:i');
$role = $_POST["role"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);

if ($comment == "") {

    echo "1";

} else {

    $sql = "INSERT INTO comments (name, date, comment, title, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $date, $comment, $title, $role);
    if ($stmt->execute()) {

        echo "2";

    } else {

        echo "3";

    }
    $stmt->close();
}
mysqli_close($conn);
?>
