<?php
include '../../../dao/conexao.php';

if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    $querySelect = "SELECT * FROM  tb_etec WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%'
    OR codigo LIKE '%$busca%' OR municipio LIKE '%$busca%'";
} else {
    $querySelect = "SELECT * FROM  tb_etec";
}

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

if ($resultado > 0) {
    foreach ($resultado as $resultado) {
        echo
        '<tr class="infos">
         <td class="table-id">' . $resultado[0] . '</td>',
        '<td class="table-nome-etec">' . $resultado[1] . '</td>',
        '<td class="table-email-etec">' . $resultado[2] . '</td>',
        '<td class="">' . $resultado[3] . '</td>',
        '<td>' . $resultado[4] . '</td>',
        '<td class="text-center">
        <form action="cadastro-etec.php" method="POST">
            <input type="hidden" class="form-control" id="id_etec" name="id_etec"
                value="' . $resultado[0] . '">', '
            <button type="submit" class="botao-editar" class="dropdown-item">
            <i class="fas fa-edit fa-lg"></i>
            </button>
        </form>
    </td>
    <td class="text-center"><a class="dropdown-item" onclick="modalRemover('. $resultado[0] .', \'id_usuario\')"><i class="fas fa-trash-alt fa-lg text-danger"></i></a></td>,
    </tr>';
    }
}
