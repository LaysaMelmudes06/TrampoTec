<?php
include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";
$conheId = trim($_GET['id']);

$queryDelete ="DELETE FROM tb_conhecimento WHERE idConhecimento = $conheId";

$remover = $conexao->query($queryDelete);
header('Location: ../../formulario3.php');
?>