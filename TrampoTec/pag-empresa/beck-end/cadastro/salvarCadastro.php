<?php
include '../../../dao/conexao.php';
require 'funcoes.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $cnpj = trim($_POST['cnpj']);
    $cep = trim($_POST['cep']);
    $logradouro = trim($_POST['logradouro']);
    $numero = trim($_POST['numero']);
    $bairro = trim($_POST['bairro']);
    $estado = trim($_POST['estado']);
    $telefone = trim($_POST['telefone']);
    $novo_nome = trim($_POST['foto_usuario']);

    echo empty($_FILES['foto']['size']);
    //a foto vem com a extenção $_FILES
    if (empty($_FILES['foto']['size']) != 1) {
        //pegar as extensão do arquivo
        $extensao = strtolower(substr($_FILES['foto']['name'], -4));
        if ($novo_nome == "") {
            //Ciando um nome novo
            $novo_nome = md5(time()) . $extensao;
        }
        //definindo o diretorio
        $diretorio = "../../fotosEmpresa/perfil/";
        //juntando o nome com o diretorio
        $nomeCompleto = $diretorio . $novo_nome;
        //efetuando o upload
        move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
    }
    ;


    $sqlValidaCnpj = "SELECT * FROM tb_empresa WHERE cnpj = '$cnpj' ";
    $queryCnpj = $conexao->query($sqlValidaCnpj);

    if($queryCnpj->rowCount() > 0){
        header("Location: ../../pags-logins/criar-login.php?erroCnpj=true&nome=$nome&email=$email&senha=$senha&cep=$cep&logradouro=$logradouro&numero=$numero&bairro=$bairro&estado=$$estado&telefone=$telefone");
    }

    $sqlValidaEmail = "SELECT * FROM tb_empresa WHERE email = '$email' ";
    $queryEmail = $conexao->query($sqlValidaEmail);

    if($queryEmail->rowCount() > 0){
        header("Location: ../../pags-logins/criar-login.php?erroEmail=true&nome=$nome&cnpj=$cnpj&senha=$senha&cep=$cep&logradouro=$logradouro&numero=$numero&bairro=$bairro&estado=$estado&telefone=$telefone");
    }
    $sql2 = "
                INSERT INTO tb_empresa (email , senha , nome , cnpj, cep , logradouro , numero , bairro , estado , imagem) VALUES
                (   '$email',
                    '$senha',
                    '$nome',
                    '$cnpj',
                    '$cep',
                    '$logradouro',
                    '$numero',
                    '$bairro',
                    '$estado',
                    '$novo_nome'
                )
                ";
    $query2 = $conexao->prepare($sql2);
    $query2->execute();
    $id = $conexao->lastInsertId();

    $sql = "INSERT INTO tb_telefone_empresa ( numeroTelefone , fk_idEmpresa ) VALUES
    (   '$telefone',
        '$id'
    )
    ";

    $query = $conexao->prepare($sql);
    $query->execute();
    header('Location: ../../../one-page/index.html?cadastroEmpresaFeito=true');
    exit;
} else {
    header('Location: login.php?login=erro');
    $_SESSION['autenticado'] = "NAO";
}
