<?php
include '../../../dao/conexao.php';

$idAluno = trim($_GET['idAluno']);
$idVaga = trim($_GET['idVaga']);

$queryDelete = "DELETE FROM tb_vaga_aluno WHERE fk_idVaga = $idVaga AND fk_idAluno = $idAluno";

$remover = $conexao->query($queryDelete);
header('Location: ../../processos-seletivos.php');
?>