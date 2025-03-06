<?php
require_once "./beck-end/login/validador_acesso.php";
?>
<?php
include('../dao/conexao.php');

$querySelect = "SELECT * FROM  tb_curso  ORDER BY nome ASC";


$query = $conexao->query($querySelect);

$resultado = $query->fetchAll();



$querySelect2 = "SELECT * FROM  tb_requisito ";

$query2 = $conexao->query($querySelect2);

$requisito = $query2->fetchAll();
// Loop para coletar todos os campos do formulário

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dados = [];

    // Loop para coletar todos os campos do formulário
    $contadorCampos = 1;
    while (isset($_POST["campo{$contadorCampos}"])) {
        $campo = $_POST["campo{$contadorCampos}"];
        $dados[] = $campo;
        $contadorCampos++;
    }

    // Agora, você pode fazer o que quiser com os dados (por exemplo, armazená-los no banco de dados ou exibi-los)
    foreach ($dados as $campo) {
        echo "Campo: " . htmlspecialchars($campo) . "<br>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/componentes/componentE.css'>
    <link rel='stylesheet' href='../pag-empresa/css/cadastrar-requisitos.css'>
    <title>TrampoTec</title>

   
</head>

<body>
  
    <?php include('../pag-empresa/componentes/sidebar.php') ?>
    <?php include('../pag-empresa/componentes/email.php') ?>
    <?php include('../pag-empresa/componentes/notificacao.php') ?>


    <img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">
    <main class="main">
        <?php

        if ($_GET) {
            $idVaga = trim($_GET['id']);

            $querySelect = "SELECT  tb_requisito.* ,  tb_requisito_vaga.* 
            FROM tb_requisito

            INNER JOIN tb_requisito_vaga ON tb_requisito_vaga.fk_idRequisito = tb_requisito.idRequisito WHERE tb_requisito_vaga.fk_idVaga = $idVaga";
            $query = $conexao->query($querySelect);

            $requisitoJoin = $query->fetchAll();
        }

        ?>
        <a class="cabecalho" href="./cadastrar-vaga.php?id=<?= $idVaga ?>"><i class="fa-solid fa-chevron-left"></i> Cadastro de requisitos</a>

        <section class="formulario-cadastrar-vaga">
            <form action="beck-end/cadastroVaga/salvarRequisitoVaga.php?id=<?= $idVaga ?>" method="post">

                <h1>FORMULARIO CADASTRO DE REQUISITOS</h1>

                <div class="alinhaento-inputs">
                    <!--<div class="caixa-add-requisito">
                        <span>
                            <i id="adicionarCampo" class="add-requisito fa-solid fa-circle-plus"></i>
                            ADICIONAR REQUISITO
                        </span>
                        <div id="campos" class="body-inputs">

                        </div>
                    </div>

                    </*?php
                    if (isset($_GET['CadastroVaga']) && $_GET['CadastroVaga'] == "erro") {
                        ?>
                        <div class="text-danger">
                            Erro ao Cadastrar Vaga
                        </div>
                        </*?php
                    }
                    ?/*>-->

                    <div class="input-box">
                        <label for="curso">REQUISITO</label>
                        <input list="requisito" name="requisitos" id="requisitos" type="text">

                    </div>
                    <?php
                    if (isset($_GET['vagaAtualizada']) && $_GET['vagaAtualizada'] == "true") {
                    ?>
                        <input type="hidden" value="atualizada" name="atualiza">
                    <?php
                    }
                    ?>
                    <button class="addCampo" type="submit">ADICIONAR REQUISITO</button>
                    <?php
                    if (isset($_GET['vagaAtualizada']) && $_GET['vagaAtualizada'] == "true") {
                    ?>
                        <a href="vagas.php?atualizada=true" class="btn" value="FINALIZAR"> FINALIZAR</a>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_GET['vagaAtualizada']) && $_GET['vagaAtualizada'] == "false") {
                    ?>
                        <a href="vagas.php?cadastrada=true" class="btn" value="FINALIZAR"> FINALIZAR</a>
                    <?php
                    }
                    ?>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">REQUISITOS CADASTRADOS PARA A VAGA</th>
                            </tr>
                        </thead>
                        <tbody class="infos">
                            <?php foreach ($requisitoJoin as $requisitoJoin) { ?>
                                <tr>
                                    <td>
                                        <?= $requisitoJoin[1] ?>
                                    </td>

                                    <td> <a href="./beck-end/crudRequisito/requisito-delete.php?idRequisito=<?= $requisitoJoin[0] ?>&idVaga=<?= $idVaga ?>"><i class="fa-solid fa-x" style="color: #000000;"></i></a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </section>
    </main>

    <script src="./js/funcoes.js"></script>
    <script src="./js/java-empresa.js"></script>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>

    <script>
        document.getElementById('requisitos').addEventListener('input', function() {
            var input = this;
            var datalist = document.getElementById('requisito');
            var selectedOption = Array.from(datalist.options).find(option => option.value === input.value);

            if (selectedOption) {
                // Em vez de ocultar o value, você pode manipular o que é exibido no campo de entrada
                input.value = selectedOption.text;
            }
        });
    </script>
  
</body>

</html>