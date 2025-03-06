<?php
include('../../../dao/conexao.php');
$ids = trim($_GET['id']);
$id = trim($_GET['etec']);

$queryDelete ="DELETE FROM tb_curso_etec WHERE fk_idCurso = $ids";

$remover = $conexao->query($queryDelete);
header("Location: ../../cadastrar-curso-etec.php?curso=apagad&etec=$id");
?>