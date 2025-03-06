<?php 
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

function sendMail($subject, $message, $to) {
    $mail = new PHPMailer();
    
    $mail->isSMTP();
    $mail->isHTML();
    $mail->CharSet = 'UTF-8';
    $mail->Host = 'smtp.office365.com'; // Defina o servidor SMTP que você irá usar
    $mail->SMTPAuth = true;
    $mail->Username = 'trampotec@outlook.com'; // Seu email
    $mail->Password = 't&chnologyAlpha'; // Sua senha
    $mail->SMTPSecure = 'STARTTLS'; // tls ou ssl, dependendo das configurações do seu servidor
    $mail->Port = 587; // Porta de conexão
    
    $mail->setFrom('trampotec@outlook.com', 'TrampoTec'); // Seu email e nome
    $mail->addAddress($to); // Email e nome do destinatário
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}
