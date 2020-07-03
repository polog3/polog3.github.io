<?php 

$name = $_POST['user_name'];
$name_2 = $_POST['user_name_2'];
$phone = $_POST['user_phone'];
$message = $_POST['user_message'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.seznam.cz';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'Shtrykareg@seznam.cz';                 // Наш логин
$mail->Password = 'ulz2S#Zk?D';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('Shtrykareg@seznam.cz', 'POPTÁVKA');   // От кого письмо 
$mail->addAddress('donas3@mail.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'POPTÁVKA';
$mail->Body    = '
	Uživatel zanechal své osobní údaje <br> 
	Jméno: ' . $name . ' <br>
	Příjmení: ' . $name_2 . ' <br>
	Telefonní číslo: ' . $phone . ' <br>
 Zpráva: ' . $message . ' <br>
	';
$mail->AltBody = 'Toto je alternativní text';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>