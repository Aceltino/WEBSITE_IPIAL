<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email 
{
        static public function EnviarEmail($emailInfo)
    {
         $mail = new PHPMailer(true);
         //Server settings
         $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
         $mail->isSMTP();                                            //Send using SMTP
         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
         $mail->Username   = 'cesaltinoquianvo@gmail.com';                     //SMTP username
         $mail->Password   = 'mmtsnflksegubzej';                               //SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
         //Recipients
         $mail->setFrom('IPIALaldalara@gmail.com', 'Alda Lara');
         $mail->addAddress('cesaltinoquianvo@gmail.com', 'Quianvo');     //Add a recipient
         $mail->addReplyTo('cesaltinoquianvo@gmail.com', 'Information');
 
         //Content
         $mail->isHTML(true);                                  //Set email format to HTML
         $mail->Subject = 'Teste de envio IPIAL - ACEL';
         $mail->Body    = 'This is the HTML message body <b>Estou testando</b>';
         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
         if($mail->send())
         {
         return true;
         }  else 
         {
         return false;
    //      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
      }
               
        
}
?>