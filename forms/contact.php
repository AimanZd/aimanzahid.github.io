<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data (you can add validation logic here if needed)

    // Set the location of the Thank You page
    $thank_you_page = "thanks.html"; // Adjust the URL if needed

    // Redirect to the Thank You page
    header("Location: $thank_you_page");
    exit; // Ensure that no further code is executed after redirection
} else {
    // If the form wasn't submitted via POST request, redirect users back to the form page
    header("Location: index.html"); // Adjust the URL if needed
    exit;
}
?>
