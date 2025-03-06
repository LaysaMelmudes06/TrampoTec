<?php
include '../../../dao/conexao.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST

if ($_POST) {

    //passando todos os itens do post para as sua variaveis
    $id = trim($_POST['id']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $novo_nome = trim($_POST['foto_usuario']);
    $curso = trim($_POST['curso']);

    if (!empty($novo_nome)) {
        $sql = " UPDATE tb_professor SET
                  nome = '$nome' ,
                  email =  '$email' ,
                  senha = '$senha',
                  imagem = '$novo_nome'

             WHERE idProfessor='$id'
                ";
    } else {
        $sql = " UPDATE tb_professor SET
                  nome = '$nome' ,
                  email =  '$email' ,
                  senha = '$senha'
             WHERE idProfessor='$id'
                ";
    }

    $sql2 = " UPDATE tb_curso SET
            nome='$curso'

            WHERE fk_idProfessor='$id'
";

    $query2 = $conexao->prepare($sql2);
    $query2->execute();

    $query = $conexao->prepare($sql);
    $query->execute();
    header('Location: ../../perfil.php');
    exit;

} else {
    header('Location: ../../perfil.php?alterar=erro');

}
