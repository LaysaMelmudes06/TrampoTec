<?php
include '../../../dao/conexao.php';

$email_pro = $_POST['email-professor'];
$senha_pro = $_POST['senha-professor'];

$querySelect = "SELECT * FROM tb_professor WHERE email = '$email_pro' and senha = '$senha_pro'";
$resultado = $conexao->query($querySelect);
$professor = $resultado->fetchAll();
$n = count($professor);

if ($n == 1) {
    session_start();
    $_SESSION['idProfessor'] = $professor[0]['idProfessor'];
    $_SESSION['email'] = $professor[0]['email'];
    $_SESSION['senha'] = $professor[0]['senha'];

    /* $_SESSION['imgUser'] = $empresa[0]['imgUser'];*/
    $_SESSION['autenticado'] = 'SIM';
    header('Location: ../../index.php');

} else {
    header('Location: ../../cadastro.php?login=erro');
    $_SESSION['autenticado'] = "não";
}
