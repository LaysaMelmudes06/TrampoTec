<?php 
include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";
$aluno_id = $_SESSION['idAluno'];
$querySelect = "SELECT * FROM  tb_aluno WHERE idAluno = '$aluno_id' ";

$query = $conexao->query($querySelect);

$aluno = $query->fetchAll();
foreach($aluno as $aluno){
    $curriculo = $aluno[14];
}

if ($_POST && $curriculo==0 ) {
    //passando todos os itens do post para as sua variaveis
    
    $aluno_id = $_SESSION['idAluno'];

    foreach($_POST['habilidades'] ?? [] as $habilidades){
        
        $sql2 = "INSERT INTO tb_habilidade_aluno ( fk_idAluno , fk_idHabilidade ) VALUES
        (   '$aluno_id',
            '$habilidades'       
        )";
         $query = $conexao->prepare($sql2);
         $query->execute();
         $id = $conexao->lastInsertId();
    
      
    }

    $queryAprovar ="UPDATE tb_aluno SET curriculo = 1 WHERE idAluno = $aluno_id";

    $aprovar = $conexao->query($queryAprovar);
    $_SESSION['curriculo'] = 'SIM';


    
     header('Location: ../../index.php?curriculo=true'); 
exit;
}
else if($curriculo == 1){
    header('Location: ../../index.php?curriculoAtualizado=true'); 
}
  
else{
    header('Location: ../../formulario3.php?login=erro');
}



?>