<?php
// Fetch a list of course information from the database
$course_list = []; // Retrieve course information from the database

// Check if the administrator is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Courses</title>
    <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Manage Courses</h2>
        <table>
            <tr>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credits</th>
                <!-- Add more columns as needed -->
            </tr>
            <?php foreach ($course_list as $course) : ?>
                <tr>
                    <td><?php echo $course['course_code']; ?></td>
                    <td><?php echo $course['course_title']; ?></td>
                    <td><?php echo $course['credits']; ?></td>
                    <!-- Display other course information -->
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

