<?php
// Check if the administrator is logged in, if not, redirect to the admin login page
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Welcome, Admin!</h2>
        <ul>
            <li><a href="manage_students.php">Manage Students</a></li>
            <li><a href="manage_courses.php">Manage Courses</a></li>
            <li><a href="manage_admissions.php">Manage Admissions</a></li>
            <!-- Add more links to other administrative tools as needed -->
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>

