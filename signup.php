<?php
$servername = "localhost";
$username = "root";
$password = "";  // Default XAMPP MySQL password for root is empty
$dbname = "user_db";  // You will create this database in the next step

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect and sanitize form data
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$hashed_password = password_hash($pass, PASSWORD_DEFAULT); // Hash the password for security

// Insert data into database
$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
