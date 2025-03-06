<?php
include '../../../dao/conexao.php';

//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST

if ($_POST) {

    //passando todos os itens do post para as sua variaveis
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $sql1 = " UPDATE tb_admin SET
        nome =  '$nome' ,
        email = '$email',
        senha = '$senha'

   WHERE idAdmin='$id'
      ";

    $query1 = $conexao->prepare($sql1);
    $query1->execute();
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
