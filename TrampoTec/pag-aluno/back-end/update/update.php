<?php
include '../../../dao/conexao.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST

if ($_POST) {

    //passando todos os itens do post para as sua variaveis
    $id = trim($_POST['id']);
    $senha = trim($_POST['senha']);
    $nome = trim($_POST['nome']);
    $data_nasc = trim($_POST['nasc-aluno']);
    $cpf = trim($_POST['cdp-aluno']);
    $telefone = trim($_POST['telefone']);
    $logradouro = trim($_POST['logradouro']);
    $cep = trim($_POST['cep']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $bairro = trim($_POST['bairro']);
    $complemento = trim($_POST['complemento']);
    $numero = trim($_POST['numero']);
    $novo_nome = trim($_POST['foto_usuario']);
    $logradouro = trim($_POST['logradouro']);

    if (!empty($novo_nome)) {
        $sql = " UPDATE tb_aluno SET
                  nome = '$nome' ,
                  senha = '$senha' ,
                  cpf =  '$cpf' ,
                  dtNasc = '$data_nasc',
                  bairro = '$bairro',
                  estado = '$estado',
                  cep = '$cep',
                  imagem = '$novo_nome',
                  logradouro = '$logradouro',
                  numero = '$numero',
                  complemento = '$complemento'

             WHERE idAluno='$id'
                ";
    } else {
        $sql = " UPDATE tb_aluno SET
                    nome = '$nome' ,
                    senha = '$senha' ,
                    cpf =  '$cpf' ,
                    dtNasc = '$data_nasc',
                    bairro = '$bairro',
                    estado = '$estado',
                    cep = '$cep',
                    logradouro = '$logradouro',
                    numero = '$numero',
                    complemento = '$complemento'

               WHERE idAluno='$id'
                  ";
    }

    $sql2 = " UPDATE tb_telefone_aluno SET

                telefoneAluno = '$telefone'

            WHERE fk_idAluno='$id'
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
