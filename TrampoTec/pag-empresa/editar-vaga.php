<?php
require_once "./beck-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/componentes/componente.css'>
    <link rel='stylesheet' href='../pag-empresa/css/editar-vaga.css'>
    <title>TrampoTec</title>
</head>

<body>

    <?php include('../pag-empresa/componentes/sidebar.php') ?>
    <?php include('../pag-empresa/componentes/email.php') ?>
    <?php include('../pag-empresa/componentes/notificacao.php') ?>


    <img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">
    <main class="main">

        <a href="./vagas.php"><i class="fa-solid fa-chevron-left"></i> Editar Vaga</a>


        <section class="formulario-cadastrar-vaga">
            <form>
                <h1>FORMULARIO DE CADASTRO DE VAGA</h1>

                <div class="alinhaento-inputs">

                    <div>
                        <span>
                            <label for="nome">NOME</label>
                            <input name="nome" type="text">

                        </span>

                        <span>
                            <label for="cidade">CIDADE</label>
                            <input name="cidade" type="text">
                        </span>
                    </div>

                    <div>
                        <span>
                            <label for="bairro">BAIRRO</label>
                            <input name="bairro" type="text">
                        </span>


                        <span>
                            <label for="tipo">TIPO TRABALHO</label>
                            <input name="tipo" type="text">
                        </span>
                    </div>

                    <div>
                        <span>
                            <label for="salario">SALARIO</label>
                            <input name="salario" type="number">
                        </span>

                        <span>
                            <label for="curso">CURSO</label>
                            <input name="curso" type="text">

                        </span>

                    </div>

                    <div>
                        <span>
                            <label for="descricao">DESCRIÇÃO</label>
                            <input class="descricao" name="descricao" type="text">
                        </span>

                    </div>

                    <div>
                        <span>
                            <label for="area">AREA</label>
                            <input name="area" type="text">
                        </span>

                        <span>
                            <label for="periodo">PERIODO</label>
                            <input name="periodo" type="text">
                        </span>
                    </div>



                    <div>
                        <span>
                            <label for="inicio">INICIO</label>
                            <input name="inicio" type="time">
                        </span>

                        <span>
                            <label for="termino">TERMINO</label>
                            <input name="termino" type="time">
                        </span>
                    </div>

                </div>


                <textarea>
                  saber java script
              
                </textarea>



                <button class="botao-vaga" type="submit">EDITAR</button>
            </form>



        </section>



    </main>
    <script src="./js/java-empresa.js"></script>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>

</html>