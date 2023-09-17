<?php
// Connect to the database
include("connect.php");

$email = $_POST["email"];
$date = $_POST["date"];
$comment = $_POST["comment"];

$email = mysqli_real_escape_string($conn, $email);
$comment = mysqli_real_escape_string($conn, $comment);

$newsql = "SELECT * FROM account WHERE email = '$email'";
$result = mysqli_query($conn, $newsql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    $id = $row['id'];
    $role = "Admin";

    if (!empty($id) && !empty($email) && !empty($comment) && !empty($date) && !empty($role)) {
        $sql = "INSERT INTO message (sender, email, message, deyt, role, seen) VALUES ('$id', '$email', '$comment', '$date', '$role', '$seen')";
        // Execute the SQL statement here (e.g., using a database connection)
        if (mysqli_query($conn, $sql)) {
            
        } else {

        }
    } else {

    }

}else{

}

mysqli_close($conn);
?>
