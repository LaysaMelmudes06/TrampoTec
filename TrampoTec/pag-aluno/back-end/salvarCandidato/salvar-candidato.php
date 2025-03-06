<?php
include '../../../dao/conexao.php';
//VERIFICA SE ESTÁ VINDO INFORMAÇÕES VIA POST

if ($_POST) {

    $idAluno = trim($_POST['bnt']);
    $idVaga = trim($_POST['idVaga']);

    $querySelect = "SELECT * FROM tb_vaga_aluno WHERE fk_idAluno = $idAluno AND fk_idVaga = $idVaga";
    $resultado = $conexao->query($querySelect);
    $num = $resultado->fetchALL();
    $qtn = count($num);

 if( $qtn >= 1){
    header('Location: ../../painel-de-vagas.php?candidaturaJaFeita=true&area=qualquer&curso=qualquer&periodo=qualquer&salario=qualquer');
    exit;
 }else{
    $sql = "INSERT INTO tb_vaga_aluno ( fk_idAluno, fk_idVaga ) VALUES
    (   '$idAluno',
        '$idVaga'

    )
    ";
    $query = $conexao->prepare($sql);
    $query->execute();
    header('Location: ../../painel-de-vagas.php?candidaturaFeita=true&area=qualquer&curso=qualquer&periodo=qualquer&salario=qualquer');
    exit;
 }


} else {
    header('Location: ../../painel-de-vagas.php?candidaturaErro=true&area=qualquer&curso=qualquer&periodo=qualquer&salario=qualquer');
    exit;
}
