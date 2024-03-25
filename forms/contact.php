<?php
// Formspree endpoint URL
$formspree_url = "https://formspree.io/f/mdoqlqdn";

// Check if the form was submitted via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (you can add validation logic here if needed)

    // Prepare the data to be sent
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Set the email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n";
    $email_body .= "Message: $message\n";

    // Prepare the cURL request
    $ch = curl_init($formspree_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $email_body);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: text/plain;charset=utf-8",
        "From: $name <$email>",
        "Reply-To: $email"
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the cURL request
    $result = curl_exec($ch);

    // Check if the email was sent successfully
    if ($result) {
        // Redirect to the Thank You page
        header("Location: thanks.html");
        exit;
    } else {
        // Handle the error (you can add error handling code here if needed)
        echo "An error occurred. Please try again later.";
    }

    // Close cURL session
    curl_close($ch);
} else {
    // If the form wasn't submitted via POST request, redirect users back to the form page
    header("Location: index.html");
    exit;
}
?>
