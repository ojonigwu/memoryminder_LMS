<?php
// Check if the student is logged in
if (isset($_SESSION['student_id'])) {
    // Unset all session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();
}

// Redirect to the login page
header('Location: login.php');
exit;
?>

