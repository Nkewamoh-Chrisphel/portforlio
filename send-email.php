<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "nchrisphel@gmail.com";  // Your email address
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    $email_subject = "New Contact Message from $name";
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$message";

    $headers = "From: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?success=true");
        exit;
    } else {
        echo "❌ Failed to send message.";
    }
} else {
    echo "Invalid request.";
}
?>
