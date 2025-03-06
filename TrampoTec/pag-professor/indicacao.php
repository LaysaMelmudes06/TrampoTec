<?php
include('../Dao/conexao.php');

if(isset($_POST)){
    $nomeAluno = trim($_POST['nomeAluno']);
    $mensagem = trim($_POST['texto-indicacao']);
    
    $sql = "SELECT * FROM tb_aluno WHERE nome LIKE '%$nomeAluno%'";

    $query = $conexao->query($sql);

    $resultado = $query->fetchAll();

    foreach($resultado as $resultado){
        $idAluno = $resultado[0];
        $idEtec = $resultado[11];
    }
    session_start();
    $idProfessor=  $_SESSION['idProfessor'];

    $sql1 = "INSERT INTO tb_indicacao ( cartaRecomendacao,fk_idAluno ,fk_idProfessor,fk_idEtec) VALUES
    ( '$mensagem','$idAluno','$idProfessor','$idEtec')";

    $query1 = $conexao->prepare($sql1);

    $query1->execute();

    header('location: index.php');


}





?>