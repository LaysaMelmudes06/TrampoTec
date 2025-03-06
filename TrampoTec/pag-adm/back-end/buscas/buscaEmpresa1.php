<?php
include '../../../dao/conexao.php';

if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    $campo = 1;
    $querySelect = "SELECT * FROM  tb_empresa WHERE  ( email LIKE '%$busca%' OR cnpj LIKE '%$busca%'
        OR cep LIKE '%$busca%' OR numero LIKE '%$busca%' OR estado LIKE '%$busca%' ) AND aprovado = $campo";
} else {
    $querySelect = "SELECT * FROM  tb_empresa WHERE aprovado = 1";
}

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

if ($resultado > 0) {
    foreach ($resultado as $resultado) {
        echo
        '<tr class="infos">
         <td class="table-id">' . $resultado[0] . '</td>',
        '<td class="table-nome-empresa">' . $resultado[3] . '</td>',
        '<td class="table-email-empresa">' . $resultado[1] . '</td>',
        '<td class="table-cnpj">' . $resultado[7] . '</td>',
        '<td class="table-cep">' . $resultado[8] . '</td>',
        '<td class="table-estado">' . $resultado[12] . '</td>',
        '<td class="table-id"><a class="dropdown-item" onclick="modalRemover('. $resultado[0] .', \'id_usuario\')"><i class="fas fa-trash-alt fa-lg text-danger"></i></a></td>',
    '</tr>';
    }
}
