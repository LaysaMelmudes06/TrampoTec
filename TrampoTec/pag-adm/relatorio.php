<?php
require_once "back-end/login/validador_acesso.php";
?>
<?php
include '../dao/conexao.php';
$querySelect = "SELECT * FROM tb_empresa WHERE aprovado = '1'";
$resultado = $conexao->query($querySelect);
$empresa = $resultado->fetchALL();
$n_empresa = count($empresa);

$querySelect = "SELECT * FROM tb_aluno";
$resultado = $conexao->query($querySelect);
$aluno = $resultado->fetchALL();
$n_aluno = count($aluno);

$querySelect = "SELECT * FROM tb_admin";
$resultado = $conexao->query($querySelect);
$admin = $resultado->fetchALL();
$n_admin = count($admin);

$querySelect = "SELECT * FROM tb_empresa WHERE aprovado = '0'";
$resultado = $conexao->query($querySelect);
$pendenteEm = $resultado->fetchALL();
$n_pendenteEmpresa = count($pendenteEm);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/relatorio.css">

    <title>Document</title>

</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>

    <main>
        <div class="align-busca">
            <a href="index.php"><i class="fa-solid fa-chevron-left"></i></a>
            <div class="barra-pesquisa">
                <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
            <input  type="text" name="pesquisa" id="pesquisa" placeholder="Pesquise aqui" >

            </div>
        </div>

            <section id="conteudo" class="coluna-um">
           <div class="align-geral">
                <div class="align-card">
                <a href="professor.php">
                    <div class="card">
                        <div class="header-card">
                            <i id="prof" class="fa-solid fa-chalkboard-user" ></i>
                            <h3>Total de Alunos</h3>

                            <h2>
                                <?=$n_aluno?>
                            </h2>
                        </div>
                    </div>
                </a>

                <a href="professor.php">
                    <div class="card">
                        <div class="header-card">
                        <i id="prof" class="fa-solid fa-chalkboard-user" ></i>
                            <h3>Total de Indicações</h3>

                            <h2>
                                <?=$n_professor?>
                            </h2>
                        </div>
                    </div>
                </a>
                <a href="professor.php">
                    <div class="card">
                        <div class="header-card">
                        <i id="prof" class="fa-solid fa-chalkboard-user" ></i>
                            <h3>Total de Entrevistas</h3>
                            <h2>
                                <?=$n_professor?>
                            </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="align-dados">
                <div class="dados-empresa">
                <p class="empresa-cadastrada">
                    Total de Empresas Cadastradas
                </p>
                <p class="dados"><?=$n_empresa?></p>
                </div>
                <div class="dados-empresa">
                <p class="empresa-cadastrada">
                    Total de Professores Cadastrados
                </p>
                <p class="dados"><?=$n_professor?></p>
                </div>
            </div>
        </div>


        <div class="dash-card">
            <img class="grafico1" src="img/grafico1.png" alt="">
            <img class="grafico2" src="img/grafico2.png" alt="">
        </div>

        <div class="align-pdf">
            <button id="pdf"><i class="fa-regular fa-file-pdf"></i></button>
        </div>


        </section>
    </main>


    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/pdf.js" defer></script>
</body>

</html>