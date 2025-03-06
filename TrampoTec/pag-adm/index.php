<?php
require_once "back-end/login/validador_acesso.php";

include '../dao/conexao.php';
$querySelect = "SELECT * FROM tb_empresa WHERE aprovado = '1'";
$resultado = $conexao->query($querySelect);
$empresa = $resultado->fetchALL();
$n_empresa = count($empresa);

$querySelect = "SELECT * FROM tb_aluno";
$resultado = $conexao->query($querySelect);
$aluno = $resultado->fetchALL();
$n_aluno = count($aluno);
/*
$querySelect = "SELECT * FROM tb_professor";
$resultado = $conexao->query($querySelect);
$professor = $resultado->fetchALL();
$n_professor = count($professor);
 */
$querySelect = "SELECT * FROM tb_admin";
$resultado = $conexao->query($querySelect);
$admin = $resultado->fetchALL();
$n_admin = count($admin);

$querySelect = "SELECT * FROM tb_empresa WHERE aprovado = '0'";
$resultado = $conexao->query($querySelect);
$pendenteEm = $resultado->fetchALL();
$n_pendenteEmpresa = count($pendenteEm);

$total = $n_admin + $n_empresa + $n_aluno;

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>
    <header>
        <br><br>
        <h1>Dashboard</h1>
    </header>
    <!--<img class="baixo" src="img/fundo1.png" alt="">-->

    <img class="cima" src="img/fundo2.png" alt="">

    <main>

        <section id="dashboard" class="dashboard">

            <div class="align-card">
                <a href="empresa.php?aprovado=1">
                    <div class="card">
                        <div class="header-card">
                            <h3>Empresas cadastradas </h3>
                            <i id="empresas" class="fa-solid fa-building" "></i>
                        </div>
                        <h2>
                            <?=$n_empresa?>
                        </h2>
                    </div>
                </a>

                <a href="aluno.php">
                    <div class="card">
                        <div class="header-card">
                            <h3>Alunos cadastrados</h3>
                            <i id="aluno" class="fa-solid fa-user" "></i>
                        </div>
                        <h2>
                            <?=$n_aluno?>
                        </h2>
                    </div>
                </a>
               <!-- <a href=" relatorio.php"><button type="submit" class="btn-relatorio">Ver Relatório </button>-->
                </a>
            </div>
            <div class="align-graficos">
                <div class="align-card2">
                    <a href="adm.php">
                        <div class="card">
                            <div class="header-card">
                                <h3>Administradores Cadastrados</h3>
                                <i id="adm" class="fa-solid fa-user"></i>
                            </div>
                            <h2>
                                <?=$n_admin?>
                            </h2>
                        </div>
                    </a>


                    <a href="empresa.php?aprovado=0">
                        <div class="card">
                            <div class="header-card">
                                <h3>Empresas Pendentes </h3>
                                <i id="empresas" class="fa-solid fa-building"></i>
                            </div>
                            <h2>
                                <?=$n_pendenteEmpresa?>
                            </h2>
                        </div>
                    </a>
                    <a href="empresa.php?aprovado=0">
                        <div class="card">
                            <div class="header-card">
                                <h3>Total de Usúarios </h3>
                                <i id="empresas" class="fa-solid fa-building"></i>
                            </div>
                            <h2>
                                <?=$total?>
                            </h2>
                        </div>
                    </a>
                </div>




                <div class="dash-card">
                    <div id="donutchart"></div>
                    <!--   <div id="chart_div"></div> -->
                </div>
            </div>
        </section>


        <div class="align-pdf">
            <button id="pdf"><i class="fa-regular fa-file-pdf"></i></button>
        </div>
    </main>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Empresas', <?=$n_empresa?>],
                ['Alunos', <?=$n_aluno?>],
                ['Administradores', <?=$n_admin?>]
            ]);

            var options = {
                title: 'Usuarios Totais Cadastrados (<?=$total?>)',
                pieHole: 0.2,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
    <!-- <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses'],
                ['2013', 1000, 400],
                ['2014', 1170, 460],
                ['2015', 660, 1120],
                ['2016', 1030, 540]
            ]);

            var options = {
                title: 'Company Performance',
                hAxis: {
                    title: 'Year',
                    titleTextStyle: {
                        color: '#333'
                    }
                },
                vAxis: {
                    minValue: 0
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script> -->
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/pdf.js" defer></script>

</body>

</html>