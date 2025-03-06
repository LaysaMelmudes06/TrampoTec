<?php
require_once "back-end/login/validador_acesso.php";

include '../dao/conexao.php';

// Pega o ID do cliente logado
$cliente_id = $_SESSION['idAdmin'];

$querySelect = "SELECT nome,email,senha FROM  tb_admin
    WHERE tb_admin.idAdmin = '$cliente_id'
";

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/configuracao.css">
    <title>Document</title>
</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>
<dialog id="requisito" class="dialog-requisitos">
        <form class="form-requisitos" action="./back-end/alterar/update.php" method="post">
            <div class="inputs-dialog">
                <span class="nav-dialog">
                    <i onclick="modalrequisito()" class="fa-solid fa-xmark"></i>
                    <b>EDITAR PERFIL</b>
                    <button class="salvar-dialog" id="idAdmin" value="<?=$cliente_id?>" name="id">SALVAR</button>
                </span>
                <?php foreach ($resultado as $resultado) {?>
                    <div class="componentes-perfil-dialog">
                        <div class="conteiner-descricao-dialog">

                        </div>
                    </div>
                    <div class="dialog-corpo-inputs">
                        <label class="campos-inputs-label" for="nome">NOME
                            <input class="campos-inputs-text" placeholder="<?=$resultado[0]?>" type="text" id="nome" name="nome" value="<?=$resultado[0]?>">
                        </label>
                        <label class="campos-inputs-label" for="email">EMAIL
                            <input class="campos-inputs-text" placeholder="<?=$resultado[1]?>" type="text" id="email" name="email" value="<?=$resultado[1]?>">
                        </label>
                        <label class="campos-inputs-label" for="senha">SENHA
                            <input class="campos-inputs-text" placeholder="<?=$resultado[2]?>" type="text" id="senha" name="senha" value="<?=$resultado[2]?>">
                        </label>

                    </div>
                    <?php }?>


            </div>
        </form>
    </dialog>

    <header>
        <h1>Configurações</h1>
    </header>
    <main>
        <section class="configuracoes">
            <div onclick="modalrequisito()" class="configuracao">
                <div class="part1">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <h2> Alterar Dados</h2>
                </div>
                <i class="fa-solid fa-chevron-right" ></i>
            </div>




        </section>

    </main>

    <script src="./js/modal-editar.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>