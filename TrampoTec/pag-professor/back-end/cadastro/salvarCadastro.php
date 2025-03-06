    <?php
include '../../../dao/conexao.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $curso = trim($_POST['curso']);
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
        $diretorio = "../../fotosProfessor/perfil/";
        //juntando o nome com o diretorio
        $nomeCompleto = $diretorio . $novo_nome;
        //efetuando o upload
        move_uploaded_file($_FILES['foto']['tmp_name'], $nomeCompleto);
    }
    ;

    $sql2 = "INSERT INTO tb_professor (nome , email , senha , imagem, fk_idCurso) VALUES
                (   '$nome',
                    '$email',
                    '$senha',
                    '$novo_nome',
                    '$curso'
                )
                ";
    $query2 = $conexao->prepare($sql2);
    $query2->execute();
    $id = $conexao->lastInsertId();

    header('Location: ../../../one-page/index.html');
    exit;
} else {
    header('Location: login.php?login=erro');
    $_SESSION['autenticado'] = "NAO";
}
