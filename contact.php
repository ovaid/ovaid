<?php
echo "PHP is running!";
?>


<?php
  phpinfo();
?>

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
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);

    // Create an instance of PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();                                           // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';                      // Gmail SMTP server
        $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
        $mail->Username   = 'ovaidmushtaq.ovi@gmail.com';          // Your Gmail address
        $mail->Password   = 'zkwc oofy ewmz hrrq';             // Your app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          // Enable TLS encryption
        $mail->Port       = 587;                                   // TCP port to connect to

        // Recipients
        $mail->setFrom('ovaidmushtaq.ovi@gmail.com', 'Your Name'); // Your email address and name
        $mail->addAddress('ovaidmushtaq.ovi@gmail.com', 'Recipient Name'); // Recipient's email address and name

        // Content
        $mail->isHTML(true);                                      // Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
        <h3>New contact form submission:</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone Number:</strong> $phone</p>
        <p><strong>Address:</strong> $address</p>
        ";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo 'Invalid request method';
}
?>