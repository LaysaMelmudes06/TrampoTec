<?php
include '../../../dao/conexao.php';



if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    $querySelect = "SELECT * FROM  tb_admin WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%'";
} else {
    $querySelect = "SELECT * FROM  tb_admin";
}

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

if ($resultado > 0) {
    foreach ($resultado as $resultado) {
        echo
        '<tr class="infos">
        <td class="table-id">
            ' . $resultado[0] . '
        </td>
        <td class="table-nome-adm">
            ' . $resultado[1] . '
        </td>
        <td class="table-email-adm">
            ' . $resultado[2] . '
        </td>

        <td class="text-center"><a class="dropdown-item" onclick="modalRemover('. $resultado[0] .', \'id_usuario\')"><i class="fas fa-trash-alt fa-lg text-danger"></i></a></td>,
    </tr>';
    }
}
