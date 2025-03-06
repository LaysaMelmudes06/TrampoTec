<?php
include('../../../dao/conexao.php');
$id = trim($_POST['id_usuario']);

$queryDelete ="DELETE FROM tb_empresa WHERE idEmpresa = $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../empresa.php?aprovado=1');
?>