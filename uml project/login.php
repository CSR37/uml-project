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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the login form
    $username = $_POST['myname'];
    $password = $_POST['mypassword'];

    // Query the database to retrieve the user's information
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            
            header("Location: index1.html"); // Redirect to the homepage
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "User not found. Please register an account.";
    }
}

$conn->close();
?>