<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Hash the password (use a secure hashing algorithm)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Create a database connection (replace with your connection code)
    $dbHost = 'localhost';
    $dbUser = 'your_db_username';
    $dbPass = 'your_db_password';
    $dbName = 'school_management';

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Insert user data into the 'students' table
    $sql = "INSERT INTO students (username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssss", $username, $hashed_password, $first_name, $last_name, $email);

    if (mysqli_stmt_execute($stmt)) {
        // Registration successful
        mysqli_close($conn);
        header('Location: login.html'); // Redirect to login page
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
    }
} else {
    // Handle non-POST requests or direct access to the script
    echo "Invalid request.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h2>Student Registration</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>

