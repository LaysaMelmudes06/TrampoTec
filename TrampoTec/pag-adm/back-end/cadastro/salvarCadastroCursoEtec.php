<?php
include '../../../dao/conexao.php';

//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST && $_GET) {
    //passando todos os itens do post para as sua variaveis
    $idCurso = trim($_POST['curso']);
    $idEtec = trim($_GET['etec']);


    $sql = " INSERT INTO tb_curso_etec ( fk_idCurso , fk_idEtec ) VALUES
                (   '$idCurso',
                    '$idEtec'
                )
                ";
    $query = $conexao->prepare($sql);
    $query->execute();
    $id = $conexao->lastInsertId();

    $atu = trim($_POST['atualiza']);
    if ($atu == "atualizada") {
        header("Location:../../cadastrar-curso-etec.php?etec=$idEtec&atualizada=true"); 
    }
    else{
        header("Location:../../cadastrar-curso-etec.php?etec=$idEtec&cadastro=true");   

    }
    


    
    exit;
} else {
    header('Location: ../../cadastro-etec.php?cadastro=erro');
}
