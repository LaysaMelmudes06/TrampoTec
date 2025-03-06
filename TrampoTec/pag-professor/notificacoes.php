<?php
include '../pag-professor/components/sidebar.php';

require_once "./back-end/login/validador_acesso.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/side.css">
    <link rel="stylesheet" href="css/notificaca.css">
    <link rel="stylesheet" href="css/geral.css">

    <title>Document</title>
</head>
<body>
    <main>
        <span class="titulo-notificacao">Notificações</span>
        <div class="barra-pesquisa">
        <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
            <input  type="text" name="pesquisa" id="pesquisa" placeholder="Pesquise aqui" >

        </div>
        <div class="img-cima">
        <img src="img/fundo 2.png" alt="">
        </div>
    </main>

    <section class="notificacao">
        <div class="alinhar-notificacao">
            <div class="imagem-notificacao">
                <img src="img/ryan.jpg" alt="Foto do aluno ">
            </div>
                 <p class="mensagem-notificacao">"Ryan" começou a te seguir.</p>
        </div>
        <span class="linha"> </span>

        <div class="alinhar-notificacao">
            <div class="imagem-notificacao">
                <img src="img/ryan.jpg" alt="Foto do aluno ">
            </div>
                <p class="mensagem-notificacao">"Ryan" lhe enviou uma solicitação de amizade.</p>
        </div>
        <span class="linha"> </span>


    </section>

    <div class="img-baixo">
        <img src="img/fundo 1.png" alt="">
    </div>


<script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>
</html>
