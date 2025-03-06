<?php
include('../dao/conexao.php');

if(isset($_POST)){
 $codEtec = trim($_POST['cod-etec']);
 $professorNome = trim($_POST['professorNome']);
 $recomendacao = trim($_POST['recomendacao']); 

// select para puxar o codigo da etec que o usuario digitou 
$sql1 = "SELECT * FROM tb_etec WHERE codigo = $codEtec";

 $query = $conexao->query($sql1);
 $resultado = $query->fetchAll();

//jogando o valor da pesquisa para a variavel
foreach($resultado as $resultado){
    $etecNome = $resultado[0];
    
}
// select para puxar o nome do professor que o usuario digitou
$sql2 = "SELECT * FROM tb_professor WHERE nome LIKE '%$professorNome%'";

$query2 = $conexao->query($sql2);
$resultado2 = $query2->fetchAll();

//jogando o valor da pesquisa para variavel 
foreach($resultado2 as $resultado2){
    $professorNome = $resultado2[0];
}
//colocando o valor do resultado na variavel


//puxando a sessao do Aluno e fazendo uma pesquisa no banco para puxar o id do Aluno 
session_start();
$cliente_id =  $_SESSION['idAluno'];

$querySelect = "SELECT * FROM  tb_professor WHERE idProfessor = $cliente_id";

$query = $conexao->query($querySelect);

$resultado = $query->fetchAll();

$aprovado = 0;
//inserindo todos os dados coletado no banco no campo recomendacao
$sql3 = "INSERT INTO tb_recomendacao (recomendacao , fk_idProfessor , fk_idAluno ,fk_idEtec,Aprovado) VALUES
( '$recomendacao','$professorNome','$cliente_id','$etecNome','$aprovado')";

$query3 = $conexao->prepare($sql3);
$query3->execute();
header('Location: recomendacoes.php');
}else{
    header('Location: ../../pags-logins/login.php?login=erro');
}


?>

