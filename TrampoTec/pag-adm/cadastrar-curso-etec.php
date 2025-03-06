<?php
include('../dao/conexao.php');

require_once "back-end/login/validador_acesso.php";

$querySelect = "SELECT * FROM  tb_curso";

$query = $conexao->query($querySelect);

$curso = $query->fetchAll();




if ($_GET) {
    $idEtec = $_GET['etec'];

    $querySelect = "SELECT  tb_etec.* ,  tb_curso_etec.* , tb_curso.nome , tb_curso.ensino
    FROM tb_etec

    INNER JOIN tb_curso_etec ON tb_curso_etec.fk_idEtec = tb_etec.idEtec
    INNER JOIN tb_curso ON tb_curso.idCurso = tb_curso_etec.fk_idCurso
    WHERE tb_curso_etec.fk_idEtec = $idEtec";

    $query = $conexao->query($querySelect);

    $etecJoin = $query->fetchAll();
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--link icone filtro-->
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/cadastro-etec.css">

    <title>cadastrar etecs</title>
</head>

<body>
    <!--<img class="cima" src="img/fundo2.png" alt="">-->
    <?php
    include('../pag-adm/components/sidebar-adm.php');
    ?>

    <header>
        <div class="secao-cadastro">
            <a href="cadastro-etec.php?etec=<?= $idEtec ?>">
                <i id="icon-titulo" class="fa-solid fa-chevron-left"></i>
                <h2>Voltar</h2>
            </a>
        </div>
    </header>
    <main>
        <section class="formulario-etec">
            <form action="back-end/cadastro/salvarCadastroCursoEtec.php?etec=<?= $idEtec ?>" method="post">

                <div class="input-box">
                    <label for="curso">CURSO</label>
                    <select id="cursos" name="curso">   
                        <?php foreach ($curso as $curso) { ?>
                            <option value="<?= $curso[0] ?>"> <?= $curso[1] ?> - <?= $curso[5] ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                if (isset($_GET['atualizada']) && $_GET['atualizada'] == "true") {
                ?>
                     <input type="hidden" value="atualizada" name="atualiza">
                <?php
                }
                ?>           
                <button class="addCampo" type="submit">ADICIONAR CURSO</button>
                <?php
                if (isset($_GET['atualizada']) && $_GET['atualizada'] == "true") {
                ?>
                    <a href="etec.php?atualizada=true" class="btn2" value="FINALIZAR"> FINALIZAR</a>
                <?php
                }
                ?>
                <?php
                if (isset($_GET['cadastro']) && $_GET['cadastro'] == "true") {
                ?>
                    <a href="etec.php?cadastro=true" class="btn2" value="FINALIZAR"> FINALIZAR</a>
                <?php
                }
                ?>
                


                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">CURSO</th>
                            <th scope="col">ENSINO</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="infos">
                        <?php foreach ($etecJoin as $etecJoin) { ?>
                            <tr>
                                <td>
                                    <?= $etecJoin[7] ?>
                                </td>
                                <td>
                                    <?= $etecJoin[8] ?>
                                </td>

                                <td> <a href="./back-end/crudEtec/etec-curso-delete.php?id=<?= $etecJoin[5] ?>&etec=<?= $idEtec ?>"><i class="fa-solid fa-x" style="color: #000000;"></i></a>

                                </td>

                            </tr>
                        <?php } ?>


                    </tbody>


                </table>
            </form>


        </section>
    </main>
    <script src="modal-etec.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>

</body>

</html>