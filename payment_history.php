<?php
// Include necessary database and session setup

// Retrieve the logged-in student's ID from the session (customize this based on your authentication)
$student_id = $_SESSION['student_id'];

// Retrieve payment history for the student from the database
$sql = "SELECT * FROM payment_history WHERE student_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $student_id);
mysqli_stmt_execute($stmt);

$payment_history = [];

while ($row = mysqli_fetch_assoc($result)) {
    $payment_history[] = $row;
}

// Close the database connection

// Include HTML and CSS for displaying payment history
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment History</title>
    <!-- Include your CSS file here if needed -->
</head>
<body>
    <div class="container">
        <h2>Payment History</h2>
        <table>
            <tr>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
            <?php foreach ($payment_history as $payment) : ?>
                <tr>
                    <td><?php echo $payment['payment_date']; ?></td>
                    <td><?php echo $payment['amount']; ?></td>
                    <td><?php echo $payment['description']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

