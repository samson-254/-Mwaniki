<?php
$servername = "laragon";
$username = "samson"; 
$password = "2345";
$dbname = "users_db";

// Create connection
$conn = new mysqli( "sql303.infinityfree.com", "if0_38712300
", "5kdbwkRA4LChW ", "if0_38712300_XXX");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['samson'];
    $email = $_POST['airosamson9@gmail.com'];
    $password = password_hash($_POST['2345'], PASSWORD_DEFAULT); // Hash the password for security

    // Prepare SQL query to insert data into users table
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
