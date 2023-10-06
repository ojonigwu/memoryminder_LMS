<?php
// Check the username and password against the database
if ($valid_credentials) {
    // Set session variables and redirect to the student dashboard
    $_SESSION['student_id'] = $student_id;
    header('Location: student_dashboard.php');
    exit;
} else {
    // Display an error message or redirect to the login page with an error message
    header('Location: login.php?error=1');
    exit;
}
?>

