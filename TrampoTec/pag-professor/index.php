
<?php
/*
include('../Dao/conexao.php');
$querySelect = "SELECT * FROM tb_recomendacao WHERE Aprovado = 0 ";
$resultado = $conexao->query($querySelect);
$recomendacao = $resultado->fetchAll();
*/
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/side.css">
    <link rel="stylesheet" href="css/indicacar.css">
    <link rel="stylesheet" href="css/geral.css">
</head>

<body>
    <?php
    include '../pag-professor/components/sidebar.php';
    ?>
    <main class="main">
        <span class="titulo-vagas">Indicaçoes Pendentes</span>
        <img src="" alt="">
        <div class="img-cima">
            <img src="img/fundo 2.png" alt="">
        </div>

    </main>
    <div class="align-tudo">
        <section class="sistema-busca">
            <div class="barra-pesquisa">
                <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                <input type="text" name="pesquisa" id="pesquisa" placeholder="">
            </div>
            <div class="align-filtro" onclick="abrirFiltro()">
                <div class="filtro">
                    <span class="material-symbols-outlined">
                        tune
                    </span>
                    <p>Filtrar</p>

                </div>
            </div>
            <div class="modal-filtro" id="abrir-filtro">
                <form action="">
                    <div class="align-form-filtro">
                        <label for="">Periodo</label>
                        <select name="" id="">

                            <option value="">Tarde</option>
                            <option value="">Manhã</option>
                            <option value="">Noite</option>
                        </select>
                    </div>
                    <div class="align-form-filtro">
                        <label for="">Etec</label>
                        <input type="checkbox" name="" id="">
                    </div>
                    <div class="align-form-filtro">
                        <label for="">Curso</label>
                        <input type="checkbox" name="" id="">
                    </div>
                    <div class="align-form-filtro">
                        <label for="">Area</label>
                        <input type="checkbox" name="" id="">
                    </div>
                    <input type="submit" value="Aplicar" class="button-filtro">

                </form>
            </div>

        </section>

        <section class="empresa">

            <table>
                <thead>
                    <tr class="infos">

                        <th>MENSAGEM</th>
                        <th>NOME</th>
                        <th>ETEC</th>

                    </tr>
                </thead>
                <tbody>
                    <tr class="infos">
                        <?php foreach ($recomendacao as $recomendacao) {

                            $idAluno = $recomendacao[3];

                            $querySelect2 = "SELECT * FROM tb_aluno WHERE idAluno LIKE $idAluno";
                            $resultado2 = $conexao->query($querySelect2);
                            $id = $resultado2->fetchAll();

                            foreach ($id as $id) {
                                $nomeAluno = $id[3];
                            }

                            $idEtec = $recomendacao[4];

                            $querySelect3 = "SELECT * FROM  tb_etec WHERE idEtec LIKE $idEtec";
                            $resultado3 = $conexao->query($querySelect3);
                            $id2 = $resultado3->fetchAll();

                            foreach ($id2 as $id2) {
                                $nomeEtec = $id2[1];
                            }
                            ?>
                        <tr>
                            <td>
                                <?= $recomendacao[1] ?>
                            </td>
                            <td>
                                <?= $nomeAluno ?>
                            </td>
                            <td>
                                <?= $nomeEtec ?>
                            </td>
                            <td class="text-center">
                            <td class="icone-table">
                                <div class="icons">
                                    <i id="btn1" class="fa-solid fa-circle-check" style="color: #0c5fed;"></i>
                                    <i class="fa-solid fa-xmark" style="color: #e00000;"></i>

                                    <dialog id="abrir-indicacao">

                                        <div class="align-card-indicacao">
                                            <h5 class="title-indicacao">Indicar Aluno</h5>
                                            <form method="POST" action="indicacao.php">
                                                <label for="destinatario">Destinatario</label>
                                                <input type="text" name="nomeAluno" id="nomeAluno">
                                                <br>
                                                <label for="mensagem">Mensagem</label>
                                                <textarea name="texto-indicacao" id="texto-indicacao" cols="30"
                                                    rows="10"></textarea>

                                                <input type="submit" value="Enviar" class="botao-indicacao">
                                            </form>
                                        </div>

                                    </dialog>

                                </div>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>


        </section>
    </div>


    <div class="img-baixo">
        <img src="img/fundo 1.png" alt="">
    </div>

    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
    <script>
        var filtro = document.getElementById('abrir-filtro')
        function abrirFiltro() {
            if (filtro.style.display == "none") {
                filtro.style.display = "block"
                filtro.style.transform = "translateY(25px)"
                filtro.style.transition = "all 5s"
            }
            else if (filtro.style.display = "block") {
                filtro.style.display = "none"
            }
            else {
                filtro.style.display = "block"
            }
        }
        var button1 = document.getElementById("btn1")
        var button2 = document.getElementById("btn2")
        var button3 = document.getElementById("btn3")
        var indicar = document.getElementById('abrir-indicacao')
        var body = document.getElementsByTagName('body')
        button1.onclick = function () {
            indicar.showModal()
        }
        button2.onclick = function () {
            indicar.showModal()
        }
        button3.onclick = function () {
            indicar.showModal()
        }

    </script>
</body>