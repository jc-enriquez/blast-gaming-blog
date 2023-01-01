<?php
include "phpmailer/PHPMailerAutoload.php";

$gmailUsername = "blastphpfinalproj@gmail.com"; //Gmail username to be use as sender(make sure that the gmail settings was ON or enable)
$gmailPassword = "Blasted123"; //Gmail Password used for the gmail 


/////////////////////////////////
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = 'ssl'; // 
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465; // or 587 465
$mail->IsHTML(true);
$mail->Username = $gmailUsername;
$mail->Password = $gmailPassword;

/////////////////////////////////

?>
