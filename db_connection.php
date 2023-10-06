<?php
// Database connection parameters
$host = "localhost"; // Your database host (usually "localhost" for local development)
$username = "your_username"; // Your MySQL username
$password = "your_password"; // Your MySQL password
$database = "your_database"; // Your MySQL database name

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set the character set to UTF-8 (if needed)
mysqli_set_charset($conn, "utf8");
?>

