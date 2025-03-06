<?php
include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";
$idiomaid = trim($_GET['id']);

$queryDelete ="DELETE FROM tb_idioma_aluno WHERE ididiomaAluno = $idiomaid";

$remover = $conexao->query($queryDelete);
header('Location: ../../formulario2.php');
?>