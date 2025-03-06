<?php
include '../dao/conexao.php';

require_once "./beck-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idEmpresa'];

$querySelect = "SELECT * FROM tb_vaga WHERE fk_idEmpresa = $cliente_id ";
$resultado = $conexao->query($querySelect);
$vaga = $resultado->fetchALL();
$n_vagas = count($vaga);

$querySelect = "SELECT tb_vaga.* , tb_vaga_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
WHERE tb_vaga.fk_idEmpresa = $cliente_id";
$resultado = $conexao->query($querySelect);
$aluno = $resultado->fetchALL();
$n_aluno = count($aluno);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/componentes/componentE.css'>
    <link rel='stylesheet' href='../pag-empresa/css/dash.css'>


    <title>TrampoTec</title>
</head>

<body>

    <?php include '../pag-empresa/componentes/sidebar.php' ?>
    <?php include '../pag-empresa/componentes/email.php' ?>
    <?php include '../pag-empresa/componentes/notificacao.php' ?>


    <img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">
    <main>


        <main class="main">

            <section class="cards-alunos">

                <a href="./candidatos.php" style="text-decoration: none;" class="card">
                    <div class="card-corpo">
                        <div class="card-itens">
                            <p class="informacao"> Candidatos Totais</p>
                            <p class="numero">
                                <?= $n_aluno ?>
                            </p>

                        </div>
                        <div class="icon-home">
                            <i class="fa-regular fa-user"></i>
                        </div>
                    </div>
                </a>

                <a href="./vagas.php" style="text-decoration: none;" class="card">
                    <div class="card-corpo">
                        <div class="card-itens">
                            <p class="informacao"> Vagas Cadastradas</p>
                            <p class="numero">
                                <?= $n_vagas ?>
                            </p>

                        </div>
                        <div class="icon-home">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </div>
                    </div>
                </a>
            </section>


            <section class="container-imagens">
                <div id="piechart" style="width: 900px; height: 500px; "></div>
            </section>




        </main>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Vagas', <?= $n_vagas ?>],
                    ['Candidatos', <?= $n_aluno ?>]
                ]);

                var options = {
                    title: 'Grafico geral'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>

        <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
        <script src="./js/java-empresa.js"></script>
</body>

</html>