<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

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

    // Retrieve user data from the 'students' table (customize the table name)
    $sql = "SELECT student_id, username, password FROM students WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $student_id, $db_username, $db_password);
    mysqli_stmt_fetch($stmt);

    // Verify password
    if (password_verify($password, $db_password)) {
        // Password is correct, log the user in
        $_SESSION['student_id'] = $student_id;
        header('Location: student_portal.php'); // Redirect to the student portal or dashboard
        exit;
    } else {
        echo "Invalid username or password.";
    }

    mysqli_close($conn);
} else {
    // Handle non-POST requests or direct access to the script
    echo "Invalid request.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>

