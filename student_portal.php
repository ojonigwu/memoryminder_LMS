<?php
session_start();

// Check if the user is logged in as a student (customize this check)
if (!isset($_SESSION['student_id'])) {
    header('Location: login.html'); // Redirect to the student login page
    exit;
}

// Database configuration (modify with your database credentials)
$dbHost = 'localhost';
$dbUser = 'your_db_username';
$dbPass = 'your_db_password';
$dbName = 'school_management';

// Create a database connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve and display the status of the student's admission application
$student_id = $_SESSION['student_id'];
$sql = "SELECT status FROM admission_applications WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $student_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $status);

$status_message = "";

if (mysqli_stmt_fetch($stmt)) {
    $status_message = "Application Status: " . $status;
} else {
    $status_message = "Application status not available.";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> </* Reset some default browser styles */
body, h2, p {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

p {
    margin-bottom: 20px;
}

a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    color: #007bff;
}

a:hover {
    text-decoration: underline;
}
>
</head>
<body>
    <div class="container">
        <h2>Welcome to the Student Portal</h2>

        <p><?php echo $status_message; ?></p>

        <a href="logout.php">Logout</a> <!-- Provide a logout link for students (create logout.php) -->
    </div>
</body>
</html>

