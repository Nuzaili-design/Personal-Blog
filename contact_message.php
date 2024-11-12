<?php

$servername = "localhost";
$username = "root1";
$password = "";
$dbname = "messages"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ? , ?)");
$stmt->bind_param("sss", $name, $email, $message);


if ($stmt->execute()) {

    echo "Your message has been received successfully.";
} else {
    
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conn->close();
?>



