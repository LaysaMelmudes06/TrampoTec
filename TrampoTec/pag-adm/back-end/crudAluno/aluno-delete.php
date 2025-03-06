<?php
include('../../../dao/conexao.php');
$id = trim($_POST['id_usuario']);

$queryDelete ="DELETE FROM tb_aluno WHERE idAluno= $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../aluno.php');
?>