<?php
include('./3rd_Party_Libraries/email_server/PHPMailerAutoload.php');

$mail = new PHPMailer;

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'yourEmail@gmail.com';          // SMTP username
$mail->Password = 'yourEmailPassword'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
//$mail->SMTPDebug = 3;


$mail->setFrom('yourEmail@gmail.com', 'Cole Davis');//This is the sender
$mail->addReplyTo('yourEmail@gmail.com', 'Cole Davis');//Reply back to...
$mail->addAddress('recipient@yahoo.com');   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML
?>


<!--  Generate the Manager Report-->
  <?php $mail->Body = "<table style='width: 40%; text-align:left;'><tr><th>Name:</th><th>Quantity:</th></tr>" ?>
  <?php foreach ($productNames as $key => $value):?>
    <?php $mail->Body .= "<tr><td> {$productNames[$key]}</td>  <td>$qtys[$key]<td> </tr>"?>
  <?php endforeach; ?>
  <?php $mail->Body .= "</table>" ?>



<?php
  $mail->Subject = 'We made a sale!';

  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo '<br><br>Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent. (Im being displayed from email/email.php)';
  }
?>
