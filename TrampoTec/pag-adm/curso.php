<?php
include '../dao/conexao.php';

require_once "back-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/curso.css">
    <title>Cursos</title>
</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>
    <img class="cima" src="img/fundo2.png" alt="">
    <header>
        <h1>Cursos</h1>
        <section id="content2">
        <div class="secao-cadastro">
            <a href="cadastro-curso.php">
                <i id="icon-titulo" class="fa-solid fa-plus" ></i>
                <h2>Cadastrar um novo curso</h2>
            </a>
        </div>
        </section>
    </header>
    <main>
    <div id="loading">
        <img src="img/loading.gif" alt="Carregando"> <!-- Use uma imagem de loading ou outra animação -->
        <p>Carregando...</p>
    </div>
        <section id="content">
        <div class="secao-busca">
            <section class="sistema-busca">
                <div class="barra-pesquisa">
                    <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                    <input type="text" id="busca" placeholder="buscar por curso">
                </div>
<!--
                <div class="align-filtro">
                    <div class="btn-side">
                        <a href="empresa.php?aprovado=1">
                            <p>CADASTRADAS</p><a>
                    </div>
                    <div class="btn-side">
                        <a href="empresa.php?aprovado=0">
                            <p>PENDENTES</p><a>
                    </div>
                    <div class="filtro" onclick="abrirFiltro()">
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
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="align-form-filtro">
                            <label for="">Horario</label>
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
-->
            </section>
        </div>

        <section>
            <table>
                <thead>

                        <th>ID</th>
                        <th>NOME</th>
                        <th>Carga Horaria</th>
                        <th>Semestre</th>
                        <th>Modalidade</th>
                        <th>Ensino</th>
                        <th></th>
                        <th></th>

                </thead>
                <tbody class="infos" id="result">

                </tbody>
            </table>


        </section>
    </section>
    </main>

    <dialog id="modal">
        <section class="modal-infos">
            <table class="table-dialog">
                <thead>
                    <th>Areas</th>
                    <th>Requisitos</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Areas 1</td>
                        <td>Requisitos 1</td>
                    </tr>

                    <tr>
                        <td>Areas 2</td>
                        <td>Requisitos 2</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </dialog>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var busca = ("");
            $.post('./back-end/buscas/buscaCurso.php', {
                busca
            }, function(data) {
                $("#result").html(data);
            });


            $("#busca").keyup(function() {

                busca = $("#busca").val();
                $.post('./back-end/buscas/buscaCurso.php', {
                    busca: busca
                }, function(data) {
                    $("#result").html(data);
                });


            });
        });
    </script>
    <script src="js/modal-curso.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="js/anim-load.js"></script>
</body>

</html>