<?php include('../../../dao/conexao.php');
require_once "../login/validador_acesso.php";
require_once "../login/valida_login.php";
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $idioma = trim($_POST['idioma']);
    $nivel = trim($_POST['nivel']);
   
    $aluno_id = $_SESSION['idAluno'];


    //Salvando etec
    $sql2 = "INSERT INTO tb_idioma_aluno ( nome , nivel , fk_idAluno ) VALUES
    (   '$idioma',
        '$nivel',
        '$aluno_id'   
    )";
     $query = $conexao->prepare($sql2);
     $query->execute();

     //Salvando curso



    $id = $conexao->lastInsertId();
    header('Location: ../../formulario2.php?primeiro=1');
exit;
    }
else{
    header('Location: ../../formulario2.php?login=erro');
}



?>