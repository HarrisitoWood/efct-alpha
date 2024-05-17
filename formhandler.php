<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $details = htmlspecialchars($_POST["details"]);
    $date = htmlspecialchars($_POST["date"]);
    $time = htmlspecialchars($_POST["time"]);
    $place = htmlspecialchars($_POST["place"]);

    $message = "Details: $details\n";
    $message .= "Date: $date\n";
    $message .= "Time: $time\n";
    $message .= "Place: $place\n";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'd32890752@gmail.com'; 
        $mail->Password   = 'harxwcyyffdboidg'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('d32890752@gmail.com', 'EFCT'); // Sender's email address and name
        $mail->addAddress('henrywoodaqp@gmail.com'); // Recipient's email address and name

        //Content
        $mail->isHTML(false);
        $mail->Subject = 'EFCT CONTACT';
        $mail->Body = $message;

        // Send email
        $mail->send();
        echo 'EFCT will contact you soon...';
    } catch (Exception $e) {
        // Log the detailed error message
        error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
    
        // Display a generic error message to the user
        echo 'Oops! Something went wrong. Please try again later.';
    }
} else {
    echo "WTF?";
}