<?php
require_once "./back-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../pag-aluno/components/components-aluno.css">
    <link rel="stylesheet" href="../pag-aluno/css/recomendacoes.css">
    <title>Recomendações</title>
</head>

<body>
    <?php
    include('../pag-aluno/components/header.php');
    include('../pag-aluno/components/sidebar.php');
    ?>

    <main id="main">

        <div class="align">
            <h1>CARTAS DE RECOMENDAÇÕES</h1>

            <section class="recomendacoes">
                <section class="pedido-carta">
                    <h2>SOLCITAR UMA CARTA DE RECOMENDAÇÃO</h2>
                    <form action="EnviarRecomendacao.php" method="POST">

                        <div class="box-input">
                            <label for="cod-etec">CÓDIGO ETEC:</label>
                            <input type="text" id="cod-etec" name="cod-etec">
                        </div>

                        <div class="box-input">
                            <label for="professor">PROFESSOR:</label>
                            <input type="text" id="professorNome" name="professorNome">
                        </div>

                        <textarea name="recomendacao" id="recomendacao" rows="10"></textarea>
                        <input class="btn" type="submit" value="ENVIAR">
                    </form>
                </section>

                <section class="cartas">
                    <div class="card-carta">
                        <section class="header-card">
                            <span class="etec">
                                <h3>ETEC:</h3>
                                <p>Etec de Guaianases</p>
                            </span>

                            <span class="prof">
                                <h3>PROF°:</h3>
                                <p>Aline Mendonça</p>
                            </span>
                        </section>
                        <h3 class="titulo-recomendacao">CARTA DE RECOMENDAÇÃO</h3>
                        <section class="conteudo-card">

                            <p>
                                É com grande satisfação que escrevo esta carta de
                                recomendação em nome de Thayna Oliveira Souza,
                                um estudante excepcional que tive o privilégio de
                                conhecer e orientar durante o seu tempo na Etec
                                de Guainases.
                            </p>
                        </section>
                    </div>

                    <div class="card-carta">
                        <section class="header-card">
                            <span class="etec">
                                <h3>ETEC:</h3>
                                <p>Etec de Guaianases</p>
                            </span>

                            <span class="prof">
                                <h3>PROF°:</h3>
                                <p>Aline Mendonça</p>
                            </span>
                        </section>
                        <h3 class="titulo-recomendacao">CARTA DE RECOMENDAÇÃO</h3>
                        <section class="conteudo-card">

                            <p>
                                É com grande satisfação que escrevo esta carta de
                                recomendação em nome de Thayna Oliveira Souza,
                                um estudante excepcional que tive o privilégio de
                                conhecer e orientar durante o seu tempo na Etec
                                de Guainases.
                            </p>
                        </section>
                    </div>

                    <div class="card-carta">
                        <section class="header-card">
                            <span class="etec">
                                <h3>ETEC:</h3>
                                <p>Etec de Guaianases</p>
                            </span>

                            <span class="prof">
                                <h3>PROF°:</h3>
                                <p>Aline Mendonça</p>
                            </span>
                        </section>
                        <h3 class="titulo-recomendacao">CARTA DE RECOMENDAÇÃO</h3>
                        <section class="conteudo-card">

                            <p>
                                É com grande satisfação que escrevo esta carta de
                                recomendação em nome de Thayna Oliveira Souza,
                                um estudante excepcional que tive o privilégio de
                                conhecer e orientar durante o seu tempo na Etec
                                de Guainases.
                            </p>
                        </section>
                    </div>
                </section>
            </section>

        </div>


    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>