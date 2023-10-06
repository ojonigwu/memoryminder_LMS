<?php
// Add user authentication and session management code here
// Redirect unauthenticated users to the login page

// Include necessary header file
include('header.php');
?>

<div class="container">
    <h2>Course Management</h2>

    <!-- Add a button to add a new course -->
    <a href="add_course.php" class="btn btn-primary">Add New Course</a>

    <!-- Display course records in a table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Credits</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through the list of courses and display their data -->
            <?php
            // Replace this with your actual code to fetch course records from the database
            $courses = getCourseRecords(); // Implement a function to retrieve course records
            foreach ($courses as $course) {
                echo "<tr>";
                echo "<td>{$course['course_id']}</td>";
                echo "<td>{$course['course_name']}</td>";
                echo "<td>{$course['instructor']}</td>";
                echo "<td>{$course['credits']}</td>";
                echo "<td>
                        <a href='edit_course.php?id={$course['course_id']}' class='btn btn-primary'>Edit</a>
                        <a href='delete_course.php?id={$course['course_id']}' class='btn btn-danger'>Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Include necessary footer file
include('footer.php');
?>

