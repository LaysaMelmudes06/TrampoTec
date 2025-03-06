<?php
include '../../../dao/conexao.php';
require_once "../login/validador_acesso.php";

//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $id_vaga = trim($_POST['id_vaga']);
    $querySelect = "SELECT * FROM  tb_empresa WHERE idEmpresa";
    $query = $conexao->query($querySelect);
    $resultado = $query->fetchAll();

    $nome = trim($_POST['nome']);
    $cidade = trim($_POST['cidade']);
    $bairro = trim($_POST['bairro']);
    $logradouro = trim($_POST['logradouro']);
    $cep = trim($_POST['cep']);
    $numero = trim($_POST['numero']);
    $salario = trim($_POST['salario']);
    $estado = trim($_POST['estado']);
    $curso = trim($_POST['curso']);
    $descricao = trim($_POST['descricao']);
    $area = trim($_POST['area']);
    $periodo = trim($_POST['periodo']);
    $inicio = trim($_POST['inicio']);
    $termino = trim($_POST['termino']);
    $tipoTrabalho = trim($_POST['tipo']);
    $semana = trim($_POST['semana']);
    $cliente_id = $_SESSION['idEmpresa'];
    echo $curso;

    if (is_numeric($id_vaga)) {
        $sql = " UPDATE tb_vaga SET
        nome = '$nome',
        logradouro = '$logradouro',
        numero = '$numero',
        cep = '$cep',
        cidade = '$cidade',
        bairro= '$bairro',
        estado = '$estado',
        modalidade= '$tipoTrabalho',
        salario= '$salario',
        descricao= '$descricao',
        inicio= '$inicio',
        termino= '$termino',
        periodo= '$periodo',
        escala= '$semana',   
        fk_idEmpresa= '$cliente_id',
        fk_idCurso= '$curso'
        WHERE idVaga = $id_vaga
        ";

        $query = $conexao->prepare($sql);
        $query->execute();


        header("Location: ../../adicionar-requisito-vaga.php?id=$id_vaga&vagaAtualizada=true");
    } else {
        $sql2 = "INSERT INTO tb_vaga ( nome , logradouro , numero , cep , cidade , bairro , estado ,  modalidade , salario , descricao , inicio , termino , periodo , area , escala , fk_idEmpresa , fk_idCurso) VALUES
                (   '$nome',
                    '$logradouro',
                    '$numero',
                    '$cep',
                    '$cidade',
                    '$bairro',
                    '$estado',
                    '$tipoTrabalho',
                    '$salario',
                    '$descricao',
                    '$inicio',
                    '$termino',
                    '$periodo',
                    '$area',
                    '$semana',
                    '$cliente_id',
                    '$curso'

                )
                ";
        $query2 = $conexao->prepare($sql2);
        $query2->execute();
        $id = $conexao->lastInsertId();





        header("Location: ../../adicionar-requisito-vaga.php?id=$id&vagaAtualizada=false");
        exit;
    }
} else {
    header('Location: ../../cadastrar-vaga.php?CadastroVaga=erro');
    $_SESSION['autenticado'] = "NAO";
}
