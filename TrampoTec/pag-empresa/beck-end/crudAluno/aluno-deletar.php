<?php
include '../../../dao/conexao.php';

$idAluno = trim($_GET['idAluno']);
$idVaga = trim($_GET['idVaga']);

$queryDelete = "UPDATE tb_vaga_aluno SET aprovado = 2 WHERE fk_idVaga = $idVaga AND fk_idAluno = $idAluno";

$remover = $conexao->query($queryDelete);
header("Location: ../../vagas-candidato.php?aprovado=0&idVaga=$idVaga");
?>