<?php
include '../../../dao/conexao.php';
$id = trim($_GET['id']);
echo $id;
$queryDelete = "DELETE FROM tb_vaga WHERE idVaga = $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../vagas.php?vaga=apagada');
