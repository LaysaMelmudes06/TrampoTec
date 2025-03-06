<?php
include '../../../dao/conexao.php';



if ($_GET) {

    $idEmpresa = trim($_GET['idEmpresa']);

$querySelect2 = "SELECT tb_conhecimento.*,tb_conhecimento_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_conhecimento_aluno ON tb_conhecimento_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_conhecimento ON tb_conhecimento.idConhecimento = tb_conhecimento_aluno.fk_idConhecimento

";
$query2 = $conexao->query($querySelect2);
$aluno2 = $query2->fetchAll();

$querySelect3 = "SELECT tb_aluno.*,tb_habilidade.*,tb_habilidade_aluno.*
FROM tb_aluno
INNER JOIN tb_habilidade_aluno ON tb_habilidade_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_habilidade ON tb_habilidade.idHabilidade= tb_habilidade_aluno.fk_idHabilidade


";
$query3 = $conexao->query($querySelect3);
$aluno3 = $query3->fetchAll();

$querySelect4 = "SELECT tb_aluno.*,tb_idioma_aluno.*
FROM tb_aluno
INNER JOIN tb_idioma_aluno ON tb_idioma_aluno.fk_idAluno = tb_aluno.idAluno

";
$query4 = $conexao->query($querySelect4);
$aluno4 = $query4->fetchAll();



$querySelect6 = "SELECT tb_aluno.idAluno , tb_perfil_aluno.*
FROM tb_aluno
INNER JOIN tb_perfil_aluno ON tb_perfil_aluno.fk_idAluno = tb_aluno.idAluno

";
$query6 = $conexao->query($querySelect6);
$aluno6 = $query6->fetchAll();

if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    $querySelect = "SELECT  tb_vaga.* , tb_vaga_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
WHERE tb_vaga.fk_idEmpresa = $idEmpresa AND (tb_aluno.nome LIKE '%$busca%' OR tb_vaga.nome LIKE '%$busca%' OR tb_aluno.email LIKE '%$busca%' )


";
} else {
    $querySelect = "SELECT  tb_vaga.* , tb_vaga_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
WHERE tb_vaga.fk_idEmpresa = $idEmpresa

";
}

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();


foreach ($resultado as $resultado) {

    $querySelect1 = "SELECT tb_aluno.idAluno,tb_aluno.nome, tb_aluno_curso_etec.*,tb_etec.nome ,tb_curso.*
    FROM tb_aluno
    INNER JOIN tb_aluno_curso_etec ON tb_aluno_curso_etec.fk_idAluno = tb_aluno.idAluno
    INNER JOIN tb_curso ON tb_curso.idCurso = tb_aluno_curso_etec.fk_idCurso
    INNER JOIN tb_etec ON tb_etec.idEtec = tb_aluno_curso_etec.fk_idEtec
    ";
    $query1 = $conexao->query($querySelect1);
    $aluno = $query1->fetchAll();

    echo
    '<tr class="infos">
         <td class="table-id">' . $resultado[25] . '</td>',
    '<td class="table-nome-aluno">' . $resultado[1] . '</td>',
    '<td class="table-email-aluno">' . $resultado[23] . ' </td>,
    <td class="table-email-aluno">
  <button type="button" id="ver-mais"  value=" ' . $resultado[0] . '" data-bs-toggle="modal"
    data-bs-target="#exampleModal'  . $resultado[22] . '">

VER CANDIDATOS
</button>
    </td>
        </tr>

        ';
}

}