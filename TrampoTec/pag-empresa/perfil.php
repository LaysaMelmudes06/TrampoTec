<?php
include '../dao/conexao.php';

require_once "./beck-end/login/validador_acesso.php";
$id = $_SESSION['idEmpresa'];

// Pega o ID do cliente logado
$cliente_id = $_SESSION['idEmpresa'];

$querySelect = "SELECT tb_empresa.*  , tb_telefone_empresa.*
FROM tb_empresa
INNER JOIN tb_telefone_empresa ON tb_telefone_empresa.fk_idEmpresa = tb_empresa.idEmpresa
    WHERE tb_empresa.idEmpresa = '$cliente_id'
";

$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/componentes/componentE.css'>
    <link rel='stylesheet' href='../pag-empresa/css/perfil.css'>

    <title>TrampoTec</title>
</head>

<body>

    <?php include '../pag-empresa/componentes/sidebar.php' ?>
    <?php include '../pag-empresa/componentes/email.php' ?>
    <?php include '../pag-empresa/componentes/notificacao.php' ?>

    <dialog id="requisito" class="dialog-requisitos">
        <form class="form-requisitos" action="./beck-end/alterar/update.php" method="post">
            <div class="inputs-dialog">
                <span class="nav-dialog">
                    <i onclick="modalrequisito()" class="fa-solid fa-circle-xmark"></i>
                    <b>Editar perfil</b>
                    <button class="salvar-dialog" id="idEmpresa" value="<?= $cliente_id ?>" name="id">SALVAR</button>
                </span>
                <?php foreach ($resultado as $resultado) { ?>
                    <div class="componentes-perfil-dialog">
                        <div class="conteiner-descricao-dialog">
                            <label for="imagem-perfil" style="cursor: pointer;">
                                <img class="foto-perfil-dialog" src="fotosEmpresa/perfil/<?= $resultado[13] ?>"></img>
                                <input id="imagem-perfil" type="file" style="display: none;" value="<?= $resultado[13] ?>" name="imagem-perfil">
                            </label>
                            Altere sua foto clicando na imagem
                        </div>
                    </div>
                    <div class="dialog-corpo-inputs">
                        <label class="campos-inputs-label" for="nome">NOME
                            <input class="campos-inputs-text" placeholder="<?= $resultado[3] ?>" type="text" id="nome" name="nome" value="<?= $resultado[3] ?>">
                        </label>
                        <label class="campos-inputs-label" for="email">EMAIL
                            <input class="campos-inputs-text" placeholder="<?= $resultado[1] ?>" type="text" id="email" name="email" value="<?= $resultado[1] ?>">
                        </label>
                        <label class="campos-inputs-label" for="ano">ANO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[6] ?>" type="text" id="ano" name="ano" value="<?= $resultado[6] ?>">
                        </label>

                        <label class="campos-inputs-label" for="telefone">TELEFONE:
                            <input class="campos-inputs-text" placeholder="<?= $resultado[16] ?>" type="tell" id="telefone" name="telefone" value="<?= $resultado[16] ?>">
                        </label>
                        <label class="campos-inputs-label" for="cep">CEP
                            <input class="campos-inputs-text" placeholder="<?= $resultado[8] ?>" type="text" id="cep" name="cep" value="<?= $resultado[8] ?>">
                        </label>
                        <label class="campos-inputs-label" for="logradouro">LOGRADOURO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[9] ?>" type="text" id="logradouro" name="logradouro" value="<?= $resultado[9] ?>">
                        </label>
                        <label class="campos-inputs-label" for="numero">NUMERO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[7] ?>" type="text" id="numero" name="numero" value="<?= $resultado[7] ?>">
                        </label>
                        <label class="campos-inputs-label" for="bairro">BAIRRO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[11] ?>" type="text" id="bairro" name="bairro" value="<?= $resultado[11] ?>">
                        </label>
                        <label class="campos-inputs-label" for="estado">ESTADO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[12] ?>" type="text" id="estado" name="estado" value="<?= $resultado[12] ?>">
                        </label>
                        <label class="campos-inputs-label" for="descricao">DESCRICAO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[5] ?>" type="text" id="descricao" name="descricao" value="<?= $resultado[5] ?> ">
                        </label>

                        <label class="campos-inputs-label" for="departamento">DEPARTAMENTO
                            <input class="campos-inputs-text" placeholder="<?= $resultado[4] ?>" type="text" id="departamento" name="departamento" value="<?= $resultado[4] ?>">
                        </label>

                    </div>


            </div>
        </form>
    </dialog>

    <img class="baixo" src="./img/fundo1.png" alt="">
    <main class="main">



        <section class="cards-perfil">
          
            <div class="card">
            <div class="componentes-perfil">
                <div class="conteiner-descricao">
                    <img class="foto-perfil" src="fotosEmpresa/perfil/<?= $resultado[13] ?>"></img>
                    <div class="descricao-conta">
                        <p class="nome-perfil"><?= $resultado[3] ?></p>
                        <p class="tipo-perfil"><?= $resultado[4] ?></p>
                    </div>
                </div>
                <div class="div-botao-editar">
                    <button onclick="modalrequisito()" class="botao-editar">EDITAR PERFIL</button>
                </div>
            </div>
                <div class="card-corpo">
                    <div class="card-itens">

                        <span>
                            <p class="titulo-descricao"> Localizacao</p>
                            <p class="conteudo-descricao"> <?= $resultado[8] ?> , <?= $resultado[9] ?>, <?= $resultado[10] ?>, <?= $resultado[11] ?> , <?= $resultado[12] ?> </p>
                        </span>
                        <span>
                            <p class="titulo-descricao"> Email </p>
                            <p class="conteudo-descricao"> <?= $resultado[1] ?></p>
                        </span>

                        <span>
                            <p class="titulo-descricao"> CPNJ</p>
                            <p class="conteudo-descricao"> <?= $resultado[7] ?></p>
                        </span>

                        <!--       <span>
                            <p class="titulo-descricao"> Derpatamento</p>
                            <p class="conteudo-descricao"><?= $resultado[4] ?></p>
                        </span> -->
                        <span>
                            <p class="titulo-descricao"> Ano de origem </p>
                            <p class="conteudo-descricao"><?= $resultado[6] ?> </p>

                        </span>

                        <span>
                            <p class="titulo-descricao"> Telefone</p>
                            <p class="conteudo-descricao"><?= $resultado[16] ?> </p>
                        </span>




                    </div>

                    <div class="card-itens-localizacao">
                        <span>
                            <p class="titulo-descricao"> Descricao</p>
                            <p class="conteudo-descricao" id="descricao-empresa"><?= $resultado[5] ?></p>
                        </span>
                    </div>
                </div>

            </div>


        <?php } ?>

        </section>



    </main>


    <script src="./js/java-empresa.js">

    </script>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>

</html>