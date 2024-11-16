<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the input data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Define the recipient email address (your email)
    $to = "sammyk063@gmail.com"; // Change this to your email address

    // Set the subject
    $subject = "New message from contact form";

    // Create the email body
    $body = "You have received a new message from $name.\n\n".
            "Email: $email\n\n".
            "Message:\n$message";

    // Set the headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong. Please try again.";
    }
}
?>
