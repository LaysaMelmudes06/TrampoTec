<?php
require_once "back-end/login/validador_acesso.php";
?>
<?php
include '../dao/conexao.php';

$querySelect = "SELECT * FROM  tb_aluno";

$query = $conexao->query($querySelect);

$resultado = $query->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--link icone filtro-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/aluno.css">

    <title>Document</title>
</head>

<body>
    <img class="cima" src="img/fundo2.png" alt="">
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>

    <header>
        <h1>Alunos</h1>

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
                        <input type="text" id="busca" placeholder="buscar por aluno">
                    </div>
<!--
                    <div class="align-filtro">
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


            <section class="aluno">

                <table>
                    <thead>
                            <th class="text-center">ID</th>
                            <th class="text-center">NOME</th>
                            <th class="text-center">EMAIL INSTITUICIONAL</th>
                            <th class="text-center">CPF</th>
                            <th class="text-center">CEP</th>
                            <th class="text-center">ESTADO</th>
                            <th class="text-center"></th>
                    </thead>
                    <tbody class="infos" id="result">

                    </tbody>
                </table>

                <div class="modal fade" id="modalExcluir" role="dialog">
                    <div class=" modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Aluno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body  ">
                        <form action="back-end/crudAluno/aluno-delete.php" method="post">
                            <input class="form-control" id="id_usuario" name="id_usuario" type="hidden">
                            <p>Tem certeza que deseja excluir esse aluno?
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
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var busca = ("");
            $.post('./back-end/buscas/buscaAluno.php', {
                busca
            }, function(data) {
                $("#result").html(data);
            });


            $("#busca").keyup(function() {

                busca = $("#busca").val().trim();
                $.post('./back-end/buscas/buscaAluno.php', {
                    busca: busca
                }, function(data) {
                    $("#result").html(data);
                });


            });
        });
    </script>
    <script src="js/modal-aluno.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="js/anim-load.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src='js/modal-deletar.js'></script>
</body>

</html>