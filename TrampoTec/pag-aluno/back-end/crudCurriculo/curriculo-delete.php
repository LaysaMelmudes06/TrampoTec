<?php
include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";
$id = trim($_POST['id_usuario']);
$idCurso = trim($_POST['id_curso']);
$idEtec = trim($_POST['id_etec']);


$queryDelete ="DELETE FROM tb_aluno_curso_etec 
WHERE fk_idAluno = $id AND fk_idCurso = $idCurso AND fk_idEtec = $idEtec";

$remover = $conexao->query($queryDelete);
header('Location: ../../curriculo.php');
?>