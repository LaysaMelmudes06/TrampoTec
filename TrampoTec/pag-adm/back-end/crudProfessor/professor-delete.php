<?php
include('../../../dao/conexao.php');
$id = trim($_GET['id']);

$queryDelete ="DELETE FROM tb_professor WHERE idProfessor= $id";

$remover = $conexao->query($queryDelete);
header('Location: ../../professor.php');
?>