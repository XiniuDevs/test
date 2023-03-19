<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields and trim whitespace
  $name = trim($_POST["name"]);
  $email = trim($_POST["email"]);
  $message = trim($_POST["message"]);

  // Check if name and message are not empty
  if (empty($name) || empty($message)) {
    echo "Name and message are required.";
    exit;
  }

  // Check if email is valid
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    exit;
  }

  // Set the recipient email address
  $to = "rhinoman828@icloud.com";

  // Set the email subject
  $subject = "New message from $name";

  // Set the email message
  $email_message = "Name: $name\n";
  $email_message .= "Email: $email\n\n";
  $email_message .= "Message:\n$message";

  // Set the email headers
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // Send the email
  if (mail($to, $subject, $email_message, $headers)) {
    echo "Thank you for your message!";
  } else {
    echo "Oops! Something went wrong and we couldn't send your message.";
  }
}
