<?php
require_once('../3rd_Party_Libraries/email_server/PHPMailerAutoload.php');

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'cobdavis64@gmail.com';          // SMTP username
$mail->Password = 'Dont look at my password Larry'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
$mail->SMTPDebug = 3;


$mail->setFrom('cobdavis64@gmail.com', 'Cole Davis');//This is the sender
$mail->addReplyTo('cobdavis64@gmail.com', 'Cole Davis');//Reply back to...
$mail->addAddress('welcomemat64@gmail.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = '<h1>THIS IS AN EMAIL HOORAY</h1>';
$bodyContent .= '<p>This is the HTML email sent from localhost using PHP script.</p>';

$mail->Subject = 'Email from Localhost';
$mail->Body    = $bodyContent;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo '<br><br>Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
