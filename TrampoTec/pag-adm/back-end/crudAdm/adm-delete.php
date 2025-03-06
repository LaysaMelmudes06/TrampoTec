<?php
include '../../../dao/conexao.php';
$id = trim($_POST['id_usuario']);

$queryDelete = "DELETE FROM tb_admin WHERE idAdmin = $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../adm.php');
