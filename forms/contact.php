<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receiving_email_address = 'aimanzahid02@gmail.com';

    // Sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Compose email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message";

    // Send email using mail() function
    $success = mail($receiving_email_address, $subject, $email_body);

    if ($success) {
        echo "OK"; // Return OK if email is sent successfully
    } else {
        echo "Error"; // Return Error if there is an issue with sending email
    }
} else {
    echo "Method Not Allowed"; // Return Method Not Allowed if form is not submitted using POST method
}
?>
