<?php
// Fetch a list of admission records from the database
$admission_records = []; // Retrieve admission records from the database

// Check if the administrator is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Admissions</title>
    <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Manage Admissions</h2>
        <table>
            <tr>
                <th>Admission ID</th>
                <th>Student Name</th>
                <th>Admission Date</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php foreach ($admission_records as $admission) : ?>
                <tr>
                    <td><?php echo $admission['admission_id']; ?></td>
                    <td><?php echo $admission['student_name']; ?></td>
                    <td><?php echo $admission['admission_date']; ?></td>
                    <!-- Display other admission information -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

