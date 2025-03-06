<?php
include '../dao/conexao.php';
require_once "./beck-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idEmpresa'];

$querySelect0 = "SELECT  tb_vaga.* , tb_vaga_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
WHERE tb_vaga.fk_idEmpresa = $cliente_id
";
$query = $conexao->query($querySelect0);
$resultado = $query->fetchAll();

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/componentes/componente.css'>
    <link rel='stylesheet' href='../pag-empresa/css/Candidatos.css'>
    <title>TrampoTec</title>
</head>

<body>

    <?php include '../pag-empresa/componentes/sidebar.php'?>



    <img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">




    <main class="main">
    <div id="loading">
            <img src="img/loading.gif" alt="Carregando"> <!-- Use uma imagem de loading ou outra animação -->
            <p>Carregando...</p>
        </div>

<div id="content">


        <p>Perfis de estudantes</p>

        <section class="sistema-busca">
            <div class="secao-busca">


                <div class="barra-pesquisa">
                    <input type="text" name="busca" id="busca" placeholder="buscar por aluno">
                    <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                </div>

                <div class="align-filtro">
                    <!--
                    <div class="filtro" onclick="abrirFiltro()">
                        <i class="fa-solid fa-filter"></i>
                        <span>Filtrar</span>

                    </div>
                    -->
                </div>

                <div class="modal-filtro" id="abrir-filtro">
                    <form action="">
                        <div class="align-form-filtro">
                            <label for="">Data</label>
                            <input type="checkbox" name="" id="">
                        </div>

                        <div class="align-form-filtro">
                            <label for="">Area</label>
                            <input type="checkbox" name="" id="">
                        </div>
                        <input type="submit" value="Aplicar" class="button-filtro">

                    </form>
                </div>
            </div>
        </section>


        <section class="candidato">

            <table>
                <thead>
                    <tr>

                        <th>NOME</th>
                        <th>VAGA</th>
                        <th>EMAIL</th>
                        <th>CURRICULO</th>

                    </tr>

                </thead>

                <tbody class="infos" id="result">


                </tbody>
        </section>
</div>

        <?php foreach ($resultado as $resultado) {?>

            <div class="modal fade" id="exampleModal<?=$resultado[19]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2>Perfil do candidato</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="itens-curriculo" id="itens-curriculo">

                            <div class="imagem-perfil-update" id="imagem-perfil-update">
                                <img src="../pag-aluno/fotosAluno/perfil/<?=$resultado[35] != "" ? $resultado[35] : '';?>" alt="">
                                <div class="info1" id="info1">
                                    <p class="nome" id="nome"><?=$resultado[25]?></p>



                                    <?php
$querySelect6 = "SELECT tb_aluno.idAluno, tb_aluno.nome, tb_aluno_curso_etec.*,tb_etec.*
                                                                FROM tb_aluno
                                                                INNER JOIN tb_aluno_curso_etec ON tb_aluno_curso_etec.fk_idAluno = tb_aluno.idAluno
                                                                INNER JOIN tb_etec ON tb_etec.idEtec = tb_aluno_curso_etec.fk_idEtec
                                                                WHERE tb_aluno.idAluno = $resultado[19]
                                                                ";
    $query = $conexao->query($querySelect6);
    $alunoUm = $query->fetchAll();

    foreach ($alunoUm as $alunoUm) {?>
                                        <p class="instituicao" id="instituicao"><?=$alunoUm[7]?> - <?=$alunoUm[10]?></p>
                                    <?php }?>

                                </div>

                            </div>
                            <div class="align-modal" id="align-modal">
                                <div class="habilidades" id="habilidades">
                                    <div class="itens-habilidades" id="itens-habilidades">
                                        <p class="title-habilidades " id="title-habilidades"> CURSOS</p>
                                        <?php
$querySelect10 = "SELECT tb_aluno.idAluno, tb_aluno_curso_etec.*,tb_curso.*
                            FROM tb_aluno
                            INNER JOIN tb_aluno_curso_etec ON tb_aluno_curso_etec.fk_idAluno = tb_aluno.idAluno
                            INNER JOIN tb_curso ON tb_curso.idCurso = tb_aluno_curso_etec.fk_idCurso
                            WHERE tb_aluno.idAluno = $resultado[19]
                            ";
    $query5 = $conexao->query($querySelect10);
    $alunoCinco = $query5->fetchAll();
    foreach ($alunoCinco as $alunoCinco) {?>
                                        <p class="itens" id="itens"><?=$alunoCinco[6]?> - <?=$alunoCinco[7]?> Horas </p>
                                        <?php }?>
                                    </div>

                                    <div class="itens-habilidades" id="itens-habilidades">
                                        <p class="title-habilidades" id="title-habilidades"> CONHECIMENTOS</p>
                                        <?php
$querySelect7 = "SELECT tb_conhecimento.*,tb_conhecimento_aluno.* , tb_aluno.*
                            FROM tb_aluno
                            INNER JOIN tb_conhecimento_aluno ON tb_conhecimento_aluno.fk_idAluno = tb_aluno.idAluno
                            INNER JOIN tb_conhecimento ON tb_conhecimento.idConhecimento = tb_conhecimento_aluno.fk_idConhecimento
                            WHERE tb_aluno.idAluno = $resultado[19]
                            ";
    $query2 = $conexao->query($querySelect7);
    $alunoDois = $query2->fetchAll();
    foreach ($alunoDois as $alunoDois) {?>
                                            <p class="itens" id="itens"> <?=$alunoDois[1]?></p>
                                        <?php }?>
                                    </div>
                                </div>



                                <div class="habilidades" id="habilidades">
                                    <div class="itens-habilidades" id="itens-habilidades">
                                        <p class="title-habilidades" id="title-habilidades"> HABILIDADES</p>
                                        <?php
$querySelect8 = "SELECT tb_aluno.*,tb_habilidade.*,tb_habilidade_aluno.*
                            FROM tb_aluno
                            INNER JOIN tb_habilidade_aluno ON tb_habilidade_aluno.fk_idAluno = tb_aluno.idAluno
                            INNER JOIN tb_habilidade ON tb_habilidade.idHabilidade= tb_habilidade_aluno.fk_idHabilidade
                            WHERE tb_aluno.idAluno = $resultado[19]
                            ";
    $query3 = $conexao->query($querySelect8);
    $alunoTres = $query3->fetchAll();
    foreach ($alunoTres as $alunoTres) {?>
                                            <p class="itens" id="itens"> <?=$alunoTres[16]?> </p>
                                        <?php }?>
                                    </div>


                                    <div class="itens-habilidades" id="itens-habilidades1">
                                        <p class="title-habilidades" id="title-habilidades"> IDIOMAS</p>
                                        <?php
$querySelect9 = "SELECT tb_aluno.*,tb_idioma_aluno.*
                            FROM tb_aluno
                            INNER JOIN tb_idioma_aluno ON tb_idioma_aluno.fk_idAluno = tb_aluno.idAluno
                            WHERE tb_aluno.idAluno = $resultado[19]
                            ";
    $query4 = $conexao->query($querySelect9);
    $alunoQuatro = $query4->fetchAll();
    foreach ($alunoQuatro as $alunoQuatro) {?>
                                            <p class="itens" id="itens"><?=$alunoQuatro[16]?> - <?=$alunoQuatro[17]?></em></p>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <?php }?>

    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var busca = ("");
            $.post('./beck-end/buscaAluno/buscaAluno.php?idEmpresa=<?=$cliente_id?>', {
                busca
            }, function(data) {
                $("#result").html(data);
            });


            $("#busca").keyup(function() {

                busca = $("#busca").val();
                $.post('./beck-end/buscaAluno/buscaAluno.php?idEmpresa=<?=$cliente_id?>', {
                    busca: busca
                }, function(data) {
                    $("#result").html(data);
                });


            });
        });
    </script>
    <script src="./js/java-empresa.js"></script>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
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

</body>

</html>