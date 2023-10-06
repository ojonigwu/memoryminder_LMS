// permissions.php

function hasPermission($requiredRole) {
    // Check if the user is logged in
    if (!isset($_SESSION['user_role'])) {
        return false;
    }

    // Get the user's role
    $userRole = $_SESSION['user_role'];

    // Compare the user's role with the required role
    return ($userRole === $requiredRole);
}

