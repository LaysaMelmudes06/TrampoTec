<?php
include('../../../dao/conexao.php');
$id = trim($_GET['id']);

$queryDelete = "DELETE FROM tb_empresa WHERE idEmpresa = '$id'";

$remover = $conexao->query($queryDelete);
header('Location: ../../empresa.php');
exit;


?>