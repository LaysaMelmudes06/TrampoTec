<?php
require_once "back-end/login/validador_acesso.php";

include '../dao/conexao.php';

$querySelect = "SELECT * FROM  tb_empresa WHERE";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--link icone filtro-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/empresa.css">


    <title>Empresas</title>
</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>
    <img class="cima" src="img/fundo2.png" alt="">
    <header>
        <h1>Empresas</h1>
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
                        <input type="text" id="busca" placeholder="buscar por empresa">
                    </div>

                    <div class="align-filtro">
                        <div class="btn-side">
                            <a href="empresa.php?aprovado=1">
                                <p>CADASTRADAS</p>
                            </a>
                        </div>
                        <div class="btn-side">
                            <a href="empresa.php?aprovado=0">
                                <p>PENDENTES</p>
                            </a>
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
                </section>
            </div>


            <table>
                <thead>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>CNPJ</th>
                    <th>CEP</th>
                    <th>ESTADO</th>

                </thead>
                <tbody class="infos" id="result">

                </tbody>
            </table>
            <div class="modal fade" id="modalExcluir" role="dialog">
                <div class=" modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Empresa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body  ">
                            <form action="back-end/crudEmpresaCadastrada/empresa-delete.php" method="post">
                                <input class="form-control" id="id_usuario" name="id_usuario" type="hidden">
                                <p>Tem certeza que deseja excluir o item selcionado?
                                <div class=" text-end">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                                    <button type="submit" class="btn btn-warning ms-3">Sim </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {

            <?php if (isset($_GET['aprovado']) && $_GET['aprovado'] == "1") {?>

                var busca = ("");
                $.post('./back-end/buscas/buscaEmpresa1.php', {
                    busca
                }, function (data) {
                    $("#result").html(data);
                });


                $("#busca").keyup(function () {

                    busca = $("#busca").val();
                    $.post('./back-end/buscas/buscaEmpresa1.php', {
                        busca: busca
                    }, function (data) {
                        $("#result").html(data);
                    });


                });
            <?php }?>
            <?php if (isset($_GET['aprovado']) && $_GET['aprovado'] == "0") {?>

                var busca = ("0");
                $.post('./back-end/buscas/buscaEmpresa.php', {
                    busca
                }, function (data) {
                    $("#result").html(data);
                });


                $("#busca").keyup(function () {

                    busca = $("#busca").val();
                    $.post('./back-end/buscas/buscaEmpresa.php', {
                        busca: busca
                    }, function (data) {
                        $("#result").html(data);
                    });


                });
            <?php }?>
        });
    </script>
    <script src="js/modal-empresa.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Simular um carregamento de 2 segundos
            setTimeout(function () {
                // Oculta a tela de carregamento
                document.getElementById("loading").style.display = "none";

                // Exibe a tela de conteúdo
                document.getElementById("content").style.display = "block";
            }, 2000); // Tempo de espera em milissegundos
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    <script src='js/modal-deletar.js'></script>
</body>

</html>