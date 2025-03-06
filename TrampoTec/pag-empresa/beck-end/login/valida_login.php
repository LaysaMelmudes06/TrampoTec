<?php
include '../../../dao/conexao.php';

$email_empresa = $_POST['email'];
$senha_empresa = $_POST['senha'];

$querySelect = "SELECT * FROM tb_empresa WHERE email = '$email_empresa' and senha = '$senha_empresa' ";
$resultado = $conexao->query($querySelect);
$empresas = $resultado->fetchAll();
$n = count($empresas);

if ($n == 1) {
    session_name('empresa_session');
    session_start();
    $_SESSION['idEmpresa'] = $empresas[0]['idEmpresa'];
    $_SESSION['imagem'] = $empresas[0]['imagem'];
    $_SESSION['email'] = $empresas[0]['email'];
    $_SESSION['senha'] = $empresas[0]['senha'];

    /* $_SESSION['imgUser'] = $empresa[0]['imgUser'];*/
    $_SESSION['autenticado'] = 'SIM';
    $aprovado = $empresas[0]['aprovado'];
    if ($aprovado == 1) {
        $_SESSION['aprovado'] = 'SIM';
    } else {
        $_SESSION['aprovado'] = 'não';
    }
    header('Location: ../../dash.php');

} else {
    header('Location: ../../pags-logins/login.php?login=erro');
    $_SESSION['autenticado'] = "não";
}
