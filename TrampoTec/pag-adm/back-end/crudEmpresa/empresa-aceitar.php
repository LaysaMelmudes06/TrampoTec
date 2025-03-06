<?php
include('../../../dao/conexao.php');
$id = trim($_GET['id']);

$queryAprovar ="UPDATE tb_empresa SET aprovado = 1 WHERE idEmpresa = $id";

$aprovar = $conexao->query($queryAprovar);
header('Location: ../../empresa.php?aprovado=0');
?>