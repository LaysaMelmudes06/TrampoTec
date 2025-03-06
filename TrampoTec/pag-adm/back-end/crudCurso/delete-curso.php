<?php
include('../../../dao/conexao.php');
$id = trim($_GET['id']);

$queryDelete ="DELETE FROM tb_curso WHERE idCurso = $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../curso.php?etec=apagada');
?>