<?php
session_name('aluno_session');
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'não'){
    
    
    header ('Location: ../../../one-page/index.php?login=erro');
    
}
else if (!isset($_SESSION['curriculo']) || $_SESSION['curriculo'] == 'NAO'){
    
    
    header ('Location: curriculo.php?curri=true');
    
}/* else{
    include('../dao/conexao.php');
    
    $querySelect = "SELECT tb_aluno.*, tb_telefone_aluno.telefoneAluno FROM tb_aluno 
    INNER JOIN tb_telefone_aluno ON tb_telefone_aluno.fk_idAluno = tb_aluno.idAluno
    WHERE idAluno = ".$_SESSION['idAluno'];
    $resultado = $conexao->query($querySelect);
    $aluno = $resultado->fetchAll();
    return $aluno;    
} */


?>