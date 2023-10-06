<?php
// Check the username and password against the database
if ($valid_credentials) {
    // Set session variables and redirect to the admin dashboard
    $_SESSION['admin_id'] = $admin_id;
    header('Location: admin_dashboard.php');
    exit;
} else {
    // Display an error message or redirect to the login page with an error message
    header('Location: admin_login.php?error=1');
    exit;
}
?>

