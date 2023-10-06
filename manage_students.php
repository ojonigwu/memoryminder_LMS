<?php
// Fetch a list of student records from the database
$student_records = []; // Retrieve student records from the database

// Check if the administrator is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Manage Students</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php foreach ($student_records as $student) : ?>
                <tr>
                    <td><?php echo $student['student_id']; ?></td>
                    <td><?php echo $student['first_name'] . ' ' . $student['last_name']; ?></td>
                    <td><?php echo $student['email']; ?></td>
                    <!-- Display other student information -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

