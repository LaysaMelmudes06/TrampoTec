<?php
include '../../../dao/conexao.php';

if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    $querySelect = "SELECT * FROM  tb_aluno WHERE cpf LIKE '%$busca%' OR nome LIKE '%$busca%'
    OR cep LIKE '%$busca%' OR estado LIKE '%$busca%'";
} else {
    $querySelect = "SELECT * FROM  tb_aluno";
}

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

if ($resultado > 0) {
    foreach ($resultado as $resultado) {
        echo
        '<tr class="infos">
         <td class="table-id text-center">' . $resultado[0] . '</td>',
        '<td class="table-nome-aluno text-center">' . $resultado[3] . '</td>',
        '<td class="table-email-aluno text-center">' . $resultado[1] . '</td>',
        '<td class="text-center">' . $resultado[4] . '</td>',
        '<td class="text-center">' . $resultado[12] . '</td>',
        '<td class="text-center">' . $resultado[10] . '</td>',
        '<td class="text-center"><a class="dropdown-item" onclick="modalRemover('. $resultado[0] .', \'id_usuario\')"><i class="fas fa-trash-alt fa-lg text-danger"></i></a></td>',
        '</tr>';
    }
}
