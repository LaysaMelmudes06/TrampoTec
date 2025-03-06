<?php
require_once "./back-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../pag-aluno/css/notificacao.css">
    <title>Document</title>
</head>

<body>
    <?php
include '../pag-aluno/components/header.php';
?>
    <main id="main">

        <div class="align">
            <h1>MINHAS NOTIFICAÇÕES</h1>

            <section class="empresas">
                <div class="container-cards">
                    <div class="card-empresa">
                        <section class="header-card">
                            <img src="img/nuts.png" alt="">
                            <div class="part1">
                                <h2>Nuts.</h2>
                                <h3>Empresa de Tecnologia</h3>
                            </div>

                            <div class="part2">
                                <h3>Desde 2023</h3>

                            </div>
                        </section>
                        <div class="linha"> </div>
                        <section class="descricao-empresa">
                            <p> Parabés Roberta, olhamos o seu
                                curriculo e suas competências se
                                encaixam exatamente no que
                                estamos precisando, que tal
                                agendar uma entrevista?
                            </p>
                        </section>
                        <button>AGENDAR</button>
                    </div>


                    <div class="card-empresa">
                        <section class="header-card">
                            <img src="img/nuts.png" alt="">
                            <div class="part1">
                                <h2>Nuts.</h2>
                                <h3>Empresa de Tecnologia</h3>
                            </div>

                            <div class="part2">
                                <h3>Desde 2023</h3>

                            </div>
                        </section>
                        <div class="linha"> </div>
                        <section class="descricao-empresa">
                            <p> Parabés Roberta, olhamos o seu
                                curriculo e suas competências se
                                encaixam exatamente no que
                                estamos precisando, que tal
                                agendar uma entrevista?
                            </p>
                        </section>
                        <button>AGENDAR</button>
                    </div>

                    <div class="card-empresa">
                        <section class="header-card">
                            <img src="img/nuts.png" alt="">
                            <div class="part1">
                                <h2>Nuts.</h2>
                                <h3>Empresa de Tecnologia</h3>
                            </div>

                            <div class="part2">
                                <h3>Desde 2023</h3>
                            </div>

                        </section>
                        <div class="linha"> </div>
                        <section class="descricao-empresa">
                            <p> Parabés Roberta, olhamos o seu
                                curriculo e suas competências se
                                encaixam exatamente no que
                                estamos precisando, que tal
                                agendar uma entrevista?
                            </p>
                        </section>
                        <button>AGENDAR</button>
                    </div>
                </div>
            </section>
        </div>


    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>