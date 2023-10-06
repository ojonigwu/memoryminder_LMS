<?php
// Include the permissions helper file
include 'permissions.php';

// Check permissions
if (hasPermission('Admin')) {
    // Allow admin-only functionality
} else {
    // Display an error or deny access
}
// Rest of your PHP code

