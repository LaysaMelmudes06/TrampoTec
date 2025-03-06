'<?php include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";

//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $conhecimento = trim($_POST['conhecimentos']);
    echo $conhecimento;
   
    $aluno_id = $_SESSION['idAluno'];


    //Salvando etec
    $sql2 = "INSERT INTO tb_conhecimento ( conhecimento ) VALUES
    (   '$conhecimento'
         
    )";
     $query = $conexao->prepare($sql2);
     $query->execute();
     $id = $conexao->lastInsertId();

     $sql2 = "INSERT INTO tb_conhecimento_aluno ( fk_idConhecimento , fk_idAluno ) VALUES
    (   '$id',
        '$aluno_id'
         
    )";
     $query = $conexao->prepare($sql2);
     $query->execute();



     //Salvando curso
   


    
     header('Location: ../../formulario3.php?primeiro=1'); 
exit;
    }
else{
    header('Location: ../../formulario3.php?login=erro');
}



?>