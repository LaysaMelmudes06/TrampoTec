<?php
include '../../../dao/conexao.php';

//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $id_etec = trim($_POST['id_etec']);

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $codigo = trim($_POST['codigo']);
    $municipio = trim($_POST['municipio']);

    if (is_numeric($id_etec)) {
        $sql = " UPDATE tb_etec SET
        nome = '$nome',
        email = '$email',
        codigo= '$codigo',
        municipio= '$municipio'   
        WHERE idEtec = $id_etec
        ";

        $query = $conexao->prepare($sql);
        $query->execute();

       
        header("Location: ../../cadastrar-curso-etec.php?etec=$id_etec&atualizada=true");
    } else {
       


        $sql = " INSERT INTO tb_etec ( nome , email , codigo , municipio ) VALUES
                (   '$nome',
                    '$email',       
                    '$codigo',
                    '$municipio'

                )
                ";
        $query = $conexao->prepare($sql);
        $query->execute();
        $id = $conexao->lastInsertId();




        header("Location:../../cadastrar-curso-etec.php?etec=$id&cadastro=true");
        exit;
    }
} else {
    header('Location: ../../cadastro-etec.php?cadastro=erro');
}
