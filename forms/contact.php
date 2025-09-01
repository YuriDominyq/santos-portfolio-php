<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require '../vendor/autoload.php';

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail = new PHPMailer(true);

    try{
      $mail->isSMTP();
      $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Username = '7e048b6246c0be';
      $mail->Password = 'ae337549ce0cc6';
      $mail->Port = 2525;

      $mail->setFrom('noreply@example.com', 'Portfolio Contact');
      $mail->addAddress('yuri90378@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = strip_tags($_POST["subject"]);
      $mail->Body = "
      <b>Name:</b> ".htmlspecialchars($_POST["name"])."<br>
      Email:</b> ".htmlspecialchars($_POST["email"])."<br><br>
      ".nl2br(htmlspecialchars($_POST["message"]));

      $mail->send();
      echo "OK";
    }catch(Exception $se){
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
?>
