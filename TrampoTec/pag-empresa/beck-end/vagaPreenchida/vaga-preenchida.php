<?php
include '../../../dao/conexao.php';

$idVaga = trim($_POST['idVaga']);

$QuerySelect = "UPDATE tb_vaga SET preenchida = 1 WHERE idVaga = $idVaga";
$query = $conexao->prepare($QuerySelect);
$query->execute();

header('Location: ../../vagas.php');
exit;