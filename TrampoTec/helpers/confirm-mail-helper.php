<?php
require 'phpmailer-helper.php';
include('../dao/conexao.php');
$to = $_POST['email'];

$sqlValidaEmail = "SELECT * FROM tb_aluno WHERE email = '$to'  ";
$queryEmail = $conexao->query($sqlValidaEmail);


if ($queryEmail->rowCount() > 0) {
    echo json_encode(array('icon' => 'error', 'title' => 'Ops...', 'text' => 'Este email ja foi cadastrado. Ultilize outro!!'));
    exit;
} else {

$template = $_POST['template'] ?? '../templates/confirm-your-mail.html';

if (sendMail('Confirme seu email', str_replace('@user_mail', $to, file_get_contents($template)), $to)) {
    echo json_encode(array('icon' => 'success', 'title' => 'Email enviado!', 'text' => 'Siga as instruções do e-mail para concluir seu cadastro.'));
} else {
    echo json_encode(array('icon' => 'error', 'title' => 'Ops...', 'text' => 'Não foi possível enviar o email. Tente novamente em breve.'));
}
exit;
}
