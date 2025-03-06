<?php
include '../../../dao/conexao.php';
require_once "../login/validador_acesso.php";

//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis

   
    $id = trim($_GET['id']);
    $nomeRequisito = trim($_POST['requisitos']);

    
    $querySelect = "SELECT DISTINCT * FROM  tb_requisito WHERE requisito = '$nomeRequisito'";
    $query = $conexao->query($querySelect);
    $resultado = $query->fetchAll();
    foreach($resultado as $resultado){
        echo $resultado[0];
    }
  
    if (count($resultado) == 0) {

        $sql2 = "INSERT INTO tb_requisito ( requisito ) VALUES
        (   
            '$nomeRequisito'

        )
        ";
        $query = $conexao->prepare($sql2);
        $query->execute();
        $idRequi = $conexao->lastInsertId();

        $sql2 = "INSERT INTO tb_requisito_vaga ( fk_idVaga , fk_idRequisito ) VALUES
        (   '$id',
            '$idRequi'

        )
        ";
        $query = $conexao->prepare($sql2);
        $query->execute();

        $atu = trim($_POST['atualiza']);
        if ($atu == "atualizada") {
            header("Location:../../adicionar-requisito-vaga.php?id=$id&vagaAtualizada=true"); 
        }
        else{
            header("Location:../../adicionar-requisito-vaga.php?id=$id&vagaAtualizada=false");   
    
        }

    }
    else{
        $querySelect = "SELECT * FROM  tb_requisito WHERE requisito = '$nomeRequisito'";
        $query = $conexao->query($querySelect);
        $resultado1 = $query->fetchAll();
        foreach($resultado1 as $resultado1){ 
        $idRequi = $resultado1[0];
    }
        $sql2 = "INSERT INTO tb_requisito_vaga ( fk_idVaga , fk_idRequisito ) VALUES
        (   '$id',
            '$idRequi'

        )
        ";
        $query = $conexao->prepare($sql2);
        $query->execute();

        $atu = trim($_POST['atualiza']);
        if ($atu == "atualizada") {
            header("Location:../../adicionar-requisito-vaga.php?id=$id&vagaAtualizada=true"); 
        }
        else{
            header("Location:../../adicionar-requisito-vaga.php?id=$id&vagaAtualizada=false");   
        }
    }

    exit;
} else {

    header('Location: ../../adicionar-requisito-vaga.php?cadastro=erro');
    $_SESSION['autenticado'] = "NAO";
}