<?php
session_name('aluno_session');
session_start();
include('../../../dao/conexao.php');

$email_aluno = $_POST['nome-aluno'];
$senha_aluno = $_POST['senha-aluno'];

$querySelect = "SELECT * FROM tb_aluno WHERE email = '$email_aluno' and senha = '$senha_aluno'";
$resultado = $conexao->query($querySelect);
$aluno = $resultado->fetchAll();



$n = count($aluno);

if ($n == 1) {

        $_SESSION['idAluno'] = $aluno[0]['idAluno'];
        $_SESSION['email'] = $aluno[0]['email'];
        $_SESSION['senha'] = $aluno[0]['senha'];
       /* $_SESSION['imgUser'] = $empresa[0]['imgUser'];*/
        $_SESSION['autenticado'] = 'SIM';
        $curriculo = $aluno[0]['curriculo'];
        if($curriculo == 1 ){
            $_SESSION['curriculo'] = 'SIM';
        }
        else{
            $_SESSION['curriculo'] = 'NAO';
        }
        header('Location: ../../index.php');
    } 
else {
    $_SESSION['autenticado'] = "NAO";
    header('Location: ../../login.php?login=erro');
}

?>