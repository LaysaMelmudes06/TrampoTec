<?php include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $nome = trim($_POST['nome-etec']);
    $curso = trim($_POST['curso']);
     $semestre = trim($_POST['semestre']);
    $periodo = trim($_POST['periodo']);
    $conclusao = trim($_POST['conclusao']);
   
    $aluno_id = $_SESSION['idAluno'];

     $sql = "INSERT INTO tb_aluno_curso_etec ( fk_idAluno , fk_idCurso , fk_idEtec , conclusao ) VALUES
     (   '$aluno_id',
         '$curso',
         '$nome' ,
         '$conclusao' 
     )";
   
    $query = $conexao->prepare($sql);
    $query->execute();

 

    $id = $conexao->lastInsertId();
    header('Location: ../../curriculo.php?primeiro=1');
exit;
    }
else{
    header('Location: ../../pags-logins/login.php?login=erro');
}



?>