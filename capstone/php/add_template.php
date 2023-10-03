<?php
session_start(); 
include("connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requestData = file_get_contents("php://input");
    $canvasObjects = json_decode($requestData, true);

    $email = $canvasObjects['email'];
    $date = $canvasObjects['deyt'];

    if ($email = "test@admin"){
        $email = $_SESSION['email'];
        $date = date('Y-m-d H:i');
    }

    if (is_array($canvasObjects)) {
        foreach ($canvasObjects as $obj) {
            foreach ($obj as $new) {
                if (isset($new['objectType']) && isset($new['properties'])) {
                    $objectType = $new['objectType'];
                    $properties = json_encode($new['properties']);

                    $viewsql = "SELECT * FROM template WHERE email = '$email' and deyt = '$date'";
                    $viewresult = mysqli_query($conn, $viewsql);
                    if (mysqli_num_rows($viewresult) > 0) {
                        
                    }else{
                        $thumbnail = "images/new.png";
                        $viewsql = "INSERT INTO template (email, deyt, thumbnail) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($viewsql);
                        $stmt->bind_param("sss", $email, $date, $thumbnail);
                        if ($stmt->execute()) {
                            $_SESSION['date'] = $date;
                            $date = $_SESSION['date'];
                            $stmt->close();
                        } else {
                            // Handle execution error
                            echo 'Error executing SQL query: ' . $stmt->error;
                            exit; // Exit script to prevent further execution
                        }
                    }
                    $sql = "SELECT * FROM object WHERE objectType = '$objectType' and properties = '$properties' and email = '$email' and deyt = '$date'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        exit;
                    } else {
                        $sql = "INSERT INTO object (objectType, properties, email, deyt) VALUES (?, ?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssss", $objectType, $properties, $email, $date);
                        if ($stmt->execute()) {
                            $stmt->close();
                        } else {
                            // Handle execution error
                            echo 'Error executing SQL query: ' . $stmt->error;
                            exit; // Exit script to prevent further execution
                        }
                    }
                } else {
                    // Handle missing or empty data
                    echo 'Invalid JSON data';
                    exit; // Exit script to prevent further execution
                }
            }
            
        }

        // Send a success response
        echo 'Canvas objects saved successfully';
    } else {
        // Handle JSON data format error
        echo 'Error in JSON data format';
    }

} else {
    // Handle non-POST requests
    echo 'Method not allowed';
}

// Close the database connection
$conn->close();
?>