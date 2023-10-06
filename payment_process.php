<?php
// Include the Paystack API library
require_once 'paystack-php.php'; // You'll need to download and include the Paystack PHP library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the payment amount from the form
    $amount = $_POST['amount'] * 100; // Convert amount to kobo (Paystack's currency)

    // Initialize Paystack with your secret key
    $paystack = new Paystack('your_secret_key'); // Replace 'your_secret_key' with your actual Paystack secret key

    // Generate a unique reference for this transaction
    $reference = uniqid();

    // Create a Payment Request
    $paymentRequest = $paystack->paymentRequest([
        'amount' => $amount,
        'email' => 'user@example.com', // Replace with the customer's email
        'currency' => 'NGN', // Replace with your desired currency code
        'reference' => $reference,
        'callback_url' => 'https://yourwebsite.com/payment_callback.php' // Replace with your callback URL
    ]);

    // Redirect the user to Paystack for payment
    header('Location: ' . $paymentRequest['data']['authorization_url']);
    exit;
} else {
    // Handle non-POST requests or direct access to the script
    echo "Invalid request.";
}

if ($paymentData['status'] === 'success') {
    // Payment was successful

    // Update your database or perform any necessary actions here
    // For example, you can update the payment status for the user and log the payment in payment_history
    // You can access the payment details in $paymentData['data']

    // Insert a payment record into payment_history
    $payment_date = date('Y-m-d H:i:s');
    $amount = $paymentData['data']['amount'] / 100; // Convert from kobo to the actual amount
    $description = 'Payment for tuition';

    // Insert payment record into the payment_history table
    $insertPaymentSQL = "INSERT INTO payment_history (student_id, payment_date, amount, description)
                         VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $insertPaymentSQL);
    mysqli_stmt_bind_param($stmt, "isds", $student_id, $payment_date, $amount, $description);
    
    if (mysqli_stmt_execute($stmt)) {
        // Payment successfully logged
    } else {
        // Error logging the payment
    }
    
    // Redirect the user to a success page
    header('Location: payment_success.php');
    exit;
} else {
    // Payment failed or was not successful

    // Redirect the user to a failure page
    header('Location: payment_failure.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css"> </* Reset some default browser styles */
body, h2, form, label, input {
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
>
</head>
<body>
    <div class="container">
        <h2>Payment Page</h2>
        <form action="process_payment.php" method="POST">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required><br>

            <input type="submit" value="Pay with Paystack">
        </form>
    </div>
</body>
</html>

