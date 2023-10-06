<?php
// Check if the administrator is logged in
if (isset($_SESSION['admin_id'])) {
    // Unset all session variables
    $_SESSION = [];

    // Destroy the session
    session_destroy();
}

// Redirect to the admin login page
header('Location: admin_login.php');
exit;
?>

