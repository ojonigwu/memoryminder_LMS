<?php
// Fetch student profile information from the database based on $_SESSION['student_id']
$student_profile = []; // Retrieve student profile from the database

// Check if the student is logged in
if (!isset($_SESSION['student_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Profile</title>
    <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Student Profile</h2>
        <p>Name: <?php echo $student_profile['first_name'] . ' ' . $student_profile['last_name']; ?></p>
        <p>Email: <?php echo $student_profile['email']; ?></p>
        <!-- Display other profile information -->
    </div>
</body>
</html>

