<?php
include '../../../dao/conexao.php';

$querySelect = "SELECT  tb_vaga.* , tb_vaga_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
WHERE aprovado = 1 ";

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

foreach ($resultado as $resultado) {
    echo
    '<tr class="infos">
     <td class="table-id">' . $resultado[17] . '</td>',
    '<td class="table-nome-empresa">' . $resultado[5] . '</td>',
    '<td class="nome-aluno">' . $resultado[20] . '</td>',
    '<td class="table-cnpj">' . $resultado[18] . '</td>',
        '<td class="icone-table">

            <a href="./back-end/crudEmpresaCadastrada/empresa-delete.php?id=' . $resultado[0] . '">
            <i class="fa-solid fa-x" style="color: #000000;"></i></a>
    </td>
    </tr>';
}
