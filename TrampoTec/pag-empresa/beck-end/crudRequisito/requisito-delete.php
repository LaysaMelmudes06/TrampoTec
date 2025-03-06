<?php
include('../../../dao/conexao.php');
$idRequi = trim($_GET['idRequisito']);
$idVaga = trim($_GET['idVaga']);

$queryDelete ="DELETE FROM tb_requisito_vaga WHERE fk_idVaga = $idVaga AND fk_idRequisito = $idRequi";

$remover = $conexao->query($queryDelete);
header("Location: ../../adicionar-requisito-vaga.php?id=$idVaga&situacao=apagada");
?>