<?php include '../../../dao/conexao.php';
require 'funcoes.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cdp-aluno']);
    $dtNascimento = trim($_POST['nasc-aluno']);
    $senha = trim($_POST['senha']);
    $cep = trim($_POST['cep']);
    $logradouro = trim($_POST['logradouro']);
    $numero = trim($_POST['numero']);
    $bairro = trim($_POST['bairro']);
    $cidade = trim($_POST['cidade']);
    $estado = trim($_POST['estado']);
    $telAluno = trim($_POST['telefone']);
    $email = trim($_POST['email']);
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
        $diretorio = "../../fotosAluno/perfil/";
        //juntando o nome com o diretorio
        $nomeCompleto = $diretorio . $novo_nome;
        //efetuando o upload
        move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
    }
    ;

    $sqlValidaCpf = "SELECT * FROM tb_aluno WHERE cpf = '$cpf' ";
    $queryCpf = $conexao->query($sqlValidaCpf);

    if ($queryCpf->rowCount() > 0) {
        header("Location: ../../cadastro.php?cpfCadastrado=true&email=$email&nome=$nome&dtNascimento=$dtNascimento&senha=$senha&cep=$cep&logradouro=$logradouro&numero=$numero&bairro=$bairro&cidade=$cidade&estado=$estado&telAluno=$telAluno");
    }

    $sql2 = "INSERT INTO tb_aluno ( email , senha , nome , cpf , dtNasc ,logradouro,numero, bairro , estado , cidade , cep ,  imagem) VALUES
    (   '$email',
        '$senha',
        '$nome',
        '$cpf',
        '$dtNascimento',
        '$logradouro',
        '$numero',

        '$bairro',
        '$estado',
        '$cidade',
        '$cep',
        '$novo_nome'
    )
    ";

    $query2 = $conexao->prepare($sql2);
    $query2->execute();
    $id = $conexao->lastInsertId();

    $sql = "INSERT INTO tb_telefone_aluno ( telefoneAluno , fk_idAluno ) VALUES
    (   '$telAluno',
        '$id'
    )
    ";

    $query = $conexao->prepare($sql);
    $query->execute();
    header('Location: ../../../one-page/index.html?cadastroFeito=true');
    exit;
} else {
    header('Location: ../../pags-logins/login.php?login=erro');
}
