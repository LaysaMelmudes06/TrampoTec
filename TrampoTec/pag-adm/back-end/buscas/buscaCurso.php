<?php
include '../../../dao/conexao.php';



if (isset($_POST['busca'])) {
    $busca = $_POST['busca'];
    $querySelect = "SELECT * FROM  tb_curso WHERE nome LIKE '%$busca%' OR cargaHoraria LIKE '%$busca%'
    OR semestre LIKE '%$busca%' OR modalidade LIKE '%$busca%' OR ensino LIKE '%$busca%'";
} else {
    $querySelect = "SELECT * FROM  tb_curso";
}

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

if ($resultado > 0) {
    foreach ($resultado as $resultado) {
        echo
        '<tr class="infos">
         <td class="table-id">' . $resultado[0] . '</td>',
        '<td class="table-nome-curso">' . $resultado[1] . '</td>',
        '<td class="table-nome-curso">' . $resultado[2] . '</td>',
        '<td class="table-nome-curso">' . $resultado[3] . '</td>',
        '<td class="table-nome-curso">' . $resultado[4] . '</td>',
        '<td class="table-nome-curso">' . $resultado[5] . '</td>',
        '<td class="text-center">
                <form action="cadastro-curso.php" method="POST">
                    <input type="hidden" class="form-control" id="id_curso" name="id_curso" value="' . $resultado[0] . '">
                    <button type="submit" class="botao-editar" class="dropdown-item">
                    <i class="fas fa-edit fa-lg text-secondary"></i>
                    </button>
                </form>
            </td>
        <td class="icone-table">

        <a href="./back-end/crudCurso/delete-curso.php?id=' . $resultado[0] . '"> <i class="fa-solid fa-xmark"></i></a>
        </td>
    </tr>';
    }
}
