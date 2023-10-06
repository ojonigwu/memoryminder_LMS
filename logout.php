<?php
session_start();

// Destroy the session and log the user out
session_destroy();

// Redirect to the login page (customize the URL)
header('Location: login.html');
exit;
?>

