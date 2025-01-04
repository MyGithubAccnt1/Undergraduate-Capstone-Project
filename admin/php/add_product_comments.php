<?php
session_start(); 
include("connect.php");
$email = $_SESSION["email"];
$role = $_SESSION["role"];
$id = $_POST["id"];
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $category = $row['category'];

    $sql = "INSERT INTO comments (email, comment, title, category, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $email, $comment, $title, $category, $role);
    if ($stmt->execute()) {
        $stmt->close();
    }
    mysqli_free_result($result);
}
mysqli_close($conn);
?>
