<?php

// Include PHPMailer classes
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Use the PHPMailer namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                      // Gmail SMTP server
        $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
        $mail->Username   = 'ovaidmushtaq.ovi@gmail.com';          // Your Gmail address
        $mail->Password   = 'zkwc oofy ewmz hrrq';                   // Your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom('ovaidmushtaq.ovi@gmail.com', 'Rameez');     // Your email address and name
        $mail->addAddress('ovaidmushtaq.ovi@gmail.com', 'OVAIDMUSHTAQ'); // Recipient's email address and name

        // Content
        $mail->isHTML(true);                                      // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
        <h3>New contact form submission:</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Subject:</strong> $subject</p>
        <p><strong>Message:</strong> $message</p>
        ";

        $mail->send();
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Success</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Message Sent!",
                        text: "Thank you, ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '. Your message has been sent successfully.",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-success"
                        },
                        backdrop: `
                            rgba(0,0,0,0.4)
                            url("https://www.example.com/success-bg.jpg")
                            center center no-repeat`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "index.html?reset=true";
                        }
                    });
                });
            </script>
        </head>
        <body>
        </body>
        </html>';
    } catch (Exception $e) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Error</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Message could not be sent. Error: ' . htmlspecialchars($mail->ErrorInfo, ENT_QUOTES, 'UTF-8') . '",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        },
                        backdrop: `
                            rgba(0,0,0,0.4)
                            url("https://www.example.com/error-bg.jpg")
                            center center no-repeat`
                    });
                });
            </script>
        </head>
        <body>
        </body>
        </html>';
    }
} else {
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Invalid Request</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Invalid Request",
                    text: "Invalid request method.",
                    confirmButtonText: "OK",
                    customClass: {
                        confirmButton: "btn btn-danger"
                    }
                });
            });
        </script>
    </head>
    <body>
    </body>
    </html>';
}
?>
