<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $program = $_POST['program'];
    $message = $_POST['message'];

    // Validate and sanitize the data (customize as needed)
    $full_name = filter_var($full_name, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = filter_var($phone, FILTER_SANITIZE_STRING);
    $address = filter_var($address, FILTER_SANITIZE_STRING);
    $program = filter_var($program, FILTER_SANITIZE_STRING);
    $message = filter_var($message, FILTER_SANITIZE_STRING);

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

    // SQL query to insert application data into the 'admission_applications' table
    $sql = "INSERT INTO admission_applications (full_name, email, phone, address, program_of_interest, additional_info) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "ssssss", $full_name, $email, $phone, $address, $program, $message);

    if (mysqli_stmt_execute($stmt)) {
        // Application successfully submitted
        mysqli_close($conn);
        header('Location: application_success.php'); // Redirect to a success page
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

