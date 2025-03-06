<?php
include('../../../dao/conexao.php');
$id = trim($_POST['id_usuario']);

$queryDelete ="DELETE FROM tb_etec WHERE idEtec = $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../etec.php?etec=apagada');
?>