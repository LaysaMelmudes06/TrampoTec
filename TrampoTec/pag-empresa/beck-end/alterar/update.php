<?php
include '../../../dao/conexao.php';

require '../../beck-end/cadastro/funcoes.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST

if ($_POST) {

    //passando todos os itens do post para as sua variaveis
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $cep = trim($_POST['cep']);
    $logradouro = trim($_POST['logradouro']);
    $numero = trim($_POST['numero']);
    $bairro = trim($_POST['bairro']);
    $estado = trim($_POST['estado']);
    $departamento = trim($_POST['departamento']);
    $descricao = trim($_POST['descricao']);
    $ano = trim($_POST['ano']);
    $novo_nome = trim($_POST['imagem-perfil']);

    if (!empty($novo_nome)) {
        $sql1 = " UPDATE tb_empresa SET
                  email =  '$email' ,
                  nome = '$nome' ,
                  departamento = '$departamento',
                  descricao = '$descricao',
                  anoFundacao = '$ano' ,
                  cep =  '$cep' ,
                  logradouro = '$logradouro' ,
                  numero= '$numero',
                  bairro='$bairro',
                  estado= '$estado',
                  imagem = '$novo_nome'
             WHERE idEmpresa='$id'
                ";
    } else {
        $sql1 = " UPDATE tb_empresa SET
                          email =  '$email' ,
                  nome = '$nome' ,
                  departamento = '$departamento',
                  descricao = '$descricao',
                  anoFundacao = '$ano' ,
                  cep =  '$cep' ,
                  logradouro = '$logradouro' ,
                  numero= '$numero',
                  bairro='$bairro',
                  estado= '$estado'
   WHERE idEmpresa='$id'
      ";
    }

    $query1 = $conexao->prepare($sql1);
    $query1->execute();

    $sql2 = " UPDATE tb_telefone_empresa SET

                numeroTelefone = '$telefone'

            WHERE fk_idEmpresa='$id'
  ";

    $query2 = $conexao->prepare($sql2);
    $query2->execute();

    header('Location: ../../perfil.php');
    /* if (!empty($novo_nome2)) {
$sql3 = " UPDATE tb_perfil_empresa SET
departamento =  '$departamento' ,
descricao = '$descricao' ,
anoFundacao = '$ano' ,
imagem = '$novo_nome2'
WHERE fk_idEmpresa='$id'
";
} else {
$sql3 = " UPDATE tb_perfil_empresa SET
departamento =  '$departamento' ,
descricao = '$descricao' ,
anoFundacao = '$ano'
WHERE fk_idEmpresa='$id'
";
}

$query3 = $conexao->prepare($sql3);
$query3->execute();
header('Location: ../../perfil.php');
exit;*/
} else {
    header('Location: perfil.php?alterar=erro');
}
