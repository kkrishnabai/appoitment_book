<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Initialize PHPMailer
$mail = new PHPMailer(true);

// Retrieve form values
$date = $_POST['date'];
$time = $_POST['time'];
$type = $_POST['type'];
$name = $_POST['name'];
$email = $_POST['email'];

// Email content for applicant
$applicant_subject = 'Appointment Confirmed';
$applicant_body = "
<p>Dear $name,</p>
<p>Your appointment has been confirmed. Below are the details:</p>
<ul>
    <li><strong>Date:</strong> $date</li>
    <li><strong>Time:</strong> $time</li>
    <li><strong>Type of Consultation:</strong> $type</li>
</ul>
<p>Thank you for choosing our services.</p>";




// Email content for doctor
$doctor_email = 'pratyuspratye@gmail.com'; // Specify doctor's email address
$doctor_subject = 'New Appointment';
$doctor_body = "
<p>Hello Doctor,</p>
<p>A new appointment has been booked. Below are the details:</p>
<ul>
    <li><strong>Patient Name:</strong> $name</li>
    <li><strong>Date:</strong> $date</li>
    <li><strong>Time:</strong> $time</li>
    <li><strong>Type of Consultation:</strong> $type</li>
    <li><strong>Email:</strong> $email</li>
</ul>
<p>Please attend to this appointment accordingly.</p>";

// Set mailer to use SMTP
$mail->isSMTP();

// SMTP settings
$mail->Host       = 'smtp.gmail.com'; // Your SMTP server
$mail->SMTPAuth   = true;                // Enable SMTP authentication
$mail->Username   = 'intmatdatabase@gmail.com'; // SMTP username
$mail->Password   = 'nyqa mxem qdfv qgrr';            // SMTP password
$mail->SMTPSecure = 'tls';               // Enable TLS encryption, `ssl` also accepted
$mail->Port       = 587;                 // TCP port to connect to

// Sender and recipient settings
$mail->setFrom('intmatdatabase@gmail.com'); // Sender's email and name
$mail->addAddress($_POST['email'], $_POST['name']); // Recipient's email and name

// Email content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject= $applicant_subject;
$mail->Body    =$applicant_body; // Email body


// Send email
if($mail->send()) {
    echo 'Message has been sent';
} else {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}





// Sender and recipient settings
$mail->setFrom('intmatdatabase@gmail.com'); // Sender's email and name
$mail->addAddress($doctor_email); // Recipient's email and name

// Email content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject= $doctor_subject;
$mail->Body    =$doctor_body;


// Send email
if($mail->send()) {
    echo 'Message has been sent';
} else {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
}




?>
