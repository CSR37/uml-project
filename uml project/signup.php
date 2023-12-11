<?php
// Database configuration
$servername = "localhost";
$username = "id21117780_ww";
$password = "Alpha@37";
$dbname = "id21117780_vr";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

// Insert user data into the database
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    
    header("Location: index1.html"); // Redirect to the homepage
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
